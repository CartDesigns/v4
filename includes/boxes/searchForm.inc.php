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
|	searchForm.inc.php
|   ========================================
|	Search Box
+--------------------------------------------------------------------------
*/

if (!defined('CC_INI_SET')) die("Access Denied");

// include lang file
$lang = getLang('includes'.CC_DS.'boxes'.CC_DS.'searchForm.inc.php');
$box_content = new XTemplate ('boxes'.CC_DS.'searchForm.tpl');

$box_content->assign('LANG_SEARCH_FOR',$lang['searchForm']['search_for']);
if (isset($_GET['searchStr'])) {
	$box_content->assign('SEARCHSTR', sanitizeVar($_GET['searchStr']));
} else {
	$box_content->assign('SEARCHSTR', '');
}
$box_content->assign('LANG_GO', $lang['searchForm']['go']);
$box_content->assign('LANG_ADVANCED_SEARCH', $lang['searchForm']['search_advanced']);

$box_content->parse('search_form');
$box_content = $box_content->text('search_form');
?>