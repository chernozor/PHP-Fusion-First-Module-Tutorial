<?php
/*-------------------------------------------------------+
| PHP-Fusion Module
| Copyright (C) 2015 Igor Gambit
| http://www.webmaster-gambit.ru/
+--------------------------------------------------------+
| Filename: infusions/mymodule_panel/mymodule_panel.php
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

if (!defined("IN_FUSION"))	die("Access Denied");

if (iGUEST)
	include_once INFUSIONS."mymodule_panel/webmaster-gambit.php";
else
	include_once INFUSIONS."mymodule_panel/webmaster-gambit.php";
?>