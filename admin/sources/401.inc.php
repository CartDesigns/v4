<?php
/*
+--------------------------------------------------------------------------
|   CubeCart 4
|   ========================================
|	CubeCart is a registered trade mark of CubeCart Limited
|   Copyright CubeCart Limited 2014. All rights reserved.
|	UK Private Limited Company No. 5323904
|   ========================================
|   Web: http://www.cubecart.com
|   Email: sales@cubecart.com
|	License: GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
+--------------------------------------------------------------------------
|	401.inc.php
|   ========================================
|	Admin Access Denied Page
+--------------------------------------------------------------------------
*/

if(!defined('CC_INI_SET')){ die("Access Denied"); }

require($glob['adminFolder'].CC_DS.'includes'.CC_DS.'header.inc.php');
?>
<p class="warnText"><?php echo $lang['admin_common']['other_401']; ?></p>
<p align="center"><img src="images/largeWarning.gif" alt="" width="220" height="192" title="" /></p>