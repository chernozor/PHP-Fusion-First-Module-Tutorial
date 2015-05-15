<?php
/*-------------------------------------------------------+
| PHP-Fusion Module
| Copyright (C) 2015 Igor Gambit
| http://www.webmaster-gambit.ru/
+--------------------------------------------------------+
| Filename: infusions/mymodule_panel/webmaster-gambit.php
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

if (!defined("IN_FUSION"))
{
	die("Access Denied");
}
include_once INFUSIONS."mymodule_panel/infusion_db.php";
include_once INCLUDES."infusions_include.php";

// Выбор локализации
if (file_exists(INFUSIONS."mymodule_panel/locale/".$settings['locale'].".php"))
	include INFUSIONS."mymodule_panel/locale/".$settings['locale'].".php";
else
	include INFUSIONS."mymodule_panel/locale/English.php";

global $locale;
$inf_settings = get_settings("mymodule_panel");
if (iGUEST)
{
	openside($locale['WGambit_title']);
	echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_all_ok'].'</div>';
	echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_first_setting'].$inf_settings['first_setting'].'</div>';
	echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_second_setting'].$inf_settings['second_setting'].'</div>';
	$third_sett = ($inf_settings['select_setting']==0) ? $locale['WGambit_no'] : $locale['WGambit_yes'];
	echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_select_setting'].$third_sett.'</div>';
	closeside();
}
else
{
	global $userdata;
	$current_user = isset($userdata['user_id']) ? $userdata['user_id'] : 0;
	$member_b = dbquery("SELECT * FROM ".DB_PREFIX."users where user_id=".$current_user);
	$member = dbarray($member_b);
	if (dbrows($member_b) > 0)
	{
		echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_member_id'].$member['user_id'].'</div>';
		echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_member_name'].$member['user_name'].'</div>';
	}
	else echo '<div style="text-align:center; margin-bottom: 10px;">'.'Вы не авторизованы'.'</div>';

	// а сейчас повторим тоже самое, только в виде панели
	openside($locale['WGambit_title']);
	if (dbrows($member_b) > 0)
	{
		echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_member_id'].$member['user_id'].'</div>';
		echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_member_name'].$member['user_name'].'</div>';
		echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_first_setting'].$inf_settings['first_setting'].'</div>';
		echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_second_setting'].$inf_settings['second_setting'].'</div>';
		$third_sett = ($inf_settings['select_setting']==0) ? $locale['WGambit_no'] : $locale['WGambit_yes'];
		echo '<div style="text-align:center; margin-bottom: 10px;">'.$locale['WGambit_select_setting'].$third_sett.'</div>';
	}
	closeside();
}

?>