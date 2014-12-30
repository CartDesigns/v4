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
|	imageNoCache.inc.php
|   ========================================
|	Preview Image
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
$skipFooter = 1;

require('classes'.CC_DS.'gd'.CC_DS.'gd.inc.php');

$imagePath = ($glob['rootRel'] != CC_DS) ? str_replace($glob['rootRel'], '', $_GET['file']) : $_GET['file'];
$imagePath = CC_ROOT_DIR.CC_DS.$imagePath;

$img = new gd($imagePath);
$img->show(1);
?>