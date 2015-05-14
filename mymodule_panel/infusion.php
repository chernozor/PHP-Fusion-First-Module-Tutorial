<?php
/*-------------------------------------------------------+
| PHP-Fusion Module
| Copyright (C) 2015 Igor Gambit
| http://www.webmaster-gambit.ru/
+--------------------------------------------------------+
| Filename: infusions/mymodule_panel/infusion.php
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

if (!defined("IN_FUSION")) { die("Access Denied"); }

include INFUSIONS."mymodule_panel/infusion_db.php";

// Выбор локализации
if (file_exists(INFUSIONS."mymodule_panel/locale/".$settings['locale'].".php"))
	include INFUSIONS."mymodule_panel/locale/".$settings['locale'].".php";
else
	include INFUSIONS."mymodule_panel/locale/English.php";


// Информация о модуле
$inf_title = $locale['WGambit_title'];
$inf_description = $locale['WGambit_desc'];
$inf_version = "1.0";
$inf_developer = "Gambit";
$inf_email = "admin@webmaster-gambit.ru";
$inf_weburl = "http://webmaster-gambit.ru";

$inf_folder = "mymodule_panel"; // Папка модуля

// Работаем с БД
// Создаём новую собственную таблицу
$inf_newtable[1] = DB_mymodule." (
id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
user_id int(10) unsigned NOT NULL,
provider VARCHAR(255) NOT NULL,
internet VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM;";

// Создаём панель и настройки нашего модуля
$inf_insertdbrow[1] = DB_PANELS." (panel_name, panel_filename, panel_content, panel_side, panel_order, panel_type, panel_access, panel_display, panel_status)
										VALUES('".$locale['WGambit_title']."', 'mymodule_panel', '', '4', '3', 'file', '0', '0', '1')";
$inf_insertdbrow[2] = DB_SETTINGS_INF." (settings_name, settings_value, settings_inf) VALUES('first_setting', '', '".$inf_folder."')";
$inf_insertdbrow[3] = DB_SETTINGS_INF." (settings_name, settings_value, settings_inf) VALUES('second_setting', '', '".$inf_folder."')";
$inf_insertdbrow[4] = DB_SETTINGS_INF." (settings_name, settings_value, settings_inf) VALUES('select_setting', '', '".$inf_folder."')";

// Удаление табличек
$inf_droptable[1] = DB_mymodule;

$inf_deldbrow[1] = DB_PANELS." WHERE panel_filename='".$inf_folder."'";
$inf_deldbrow[2] = DB_SETTINGS_INF." WHERE settings_inf='".$inf_folder."'";

// Админка модуля
$inf_adminpanel[1] = array(
	"title" => $locale['WGambit_admin'],
	"image" => "",
	"panel" => "mymodule_admin.php",
	"rights" => "S"
);
?>