<?php
/*-------------------------------------------------------+
| PHP-Fusion Module
| Copyright (C) 2015 Igor Gambit
| http://www.webmaster-gambit.ru/
+--------------------------------------------------------+
| Filename: infusions/mymodule_panel/mymodule_admin.php
| Author: Webmaster Gambit (Gambit)
| Url: http://webmaster-gambit.ru
+--------------------------------------------------------+
| This module is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/

require_once "../../maincore.php";
require_once THEMES."templates/admin_header.php";

include INFUSIONS."mymodule_panel/infusion_db.php";

// Выбор локализации
if (file_exists(INFUSIONS."mymodule_panel/locale/".$settings['locale'].".php"))
	include INFUSIONS."mymodule_panel/locale/".$settings['locale'].".php";
else
	include INFUSIONS."mymodule_panel/locale/English.php";

if (!checkrights("S") || !defined("iAUTH") || $_GET['aid'] != iAUTH) redirect("../../index.php");

if (!isset($_GET['page']) || $_GET['page'] != "settings") {
	include INCLUDES."infusions_include.php";
	if (isset($_POST['WGambit_settings'])) {
		if (isset($_POST['first_setting'])) {
			$setting = set_setting("first_setting", $_POST['first_setting'], "mymodule_panel");
		}
		if (isset($_POST['second_setting'])) {
			$setting = set_setting("second_setting", $_POST['second_setting'], "mymodule_panel");
		}
		if (isset($_POST['select_setting']) && ($_POST['select_setting'] == 1 || $_POST['select_setting'] == 0)) {
			$setting = set_setting("select_setting", $_POST['select_setting'], "mymodule_panel");
		}
		redirect(FUSION_SELF.$aidlink."&amp;status=update_ok");
	}

	if (isset($_GET['status'])) {
		if ($_GET['status'] == "update_ok")	$message = $locale['WGambit_update_ok'];
	}

	if (isset($message) && $message != "") echo "<div id='close-message'><div class='admin-message'>".$message."</div></div>\n";

	$inf_settings = get_settings("mymodule_panel");
	opentable($locale['WGambit_settings']);
	echo "<form method='post' action='".FUSION_SELF.$aidlink."'>\n";
	echo "<table cellpadding='0' cellspacing='0' align='center' class='tbl-border' style='width:300px; margin-top:20px;'>\n";
	echo "<tr>\n";
	echo "<td class='tbl1'>".$locale['WGambit_first_setting']."</td>\n";
	echo "<td class='tbl1'><input type='text' name='first_setting' class='textbox' value='".$inf_settings['first_setting']."' /></td>\n";
	echo "</tr>\n<tr>\n";
	echo "<td class='tbl1'>".$locale['WGambit_second_setting']."</td>\n";
	echo "<td class='tbl1'><input type='text' name='second_setting' class='textbox' value='".$inf_settings['second_setting']."' /></td>\n";
	echo "</tr>\n<tr>\n";
	echo "<td class='tbl1'>".$locale['WGambit_select_setting']."</td>\n";
	echo "<td class='tbl1'><select name='select_setting' size='1' class='textbox'>";
	echo "<option value='1' ".($inf_settings['select_setting'] == 1 ? "selected='selected'" : "").">".$locale['WGambit_yes']."</option>\n";
	echo "<option value='0'".($inf_settings['select_setting'] == 0 ? "selected='selected'" : "").">".$locale['WGambit_no']."</option>\n";
	echo "</select></td>\n";
	echo "</tr>\n<tr>\n";
	echo "<td class='tbl1' colspan='2' style='text-align:center;'><input type='submit' name='WGambit_settings' value='".$locale['WGambit_submit']."' class='button' /></td>\n";
	echo "</tr>\n</table>\n";
	echo "</form>\n";
	closetable();
}
require_once THEMES."templates/footer.php";
?>