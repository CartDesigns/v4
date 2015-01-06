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
|	account.inc.php
|   ========================================
|	Customers Account Homepage
+--------------------------------------------------------------------------
*/

if (!defined('CC_INI_SET')) die("Access Denied");


if ($cc_session->ccUserData['customer_id']>0) {

	$lang = getLang('includes'.CC_DS.'content'.CC_DS.'account.inc.php');

	$account = new XTemplate ('content'.CC_DS.'account.tpl');

	$account->assign('LANG_YOUR_ACCOUNT', $lang['account']['your_account']);
	$account->assign('TXT_PERSONAL_INFO', $lang['account']['personal_info']);
	$account->assign('TXT_ORDER_HISTORY', $lang['account']['order_history']);
	$account->assign('TXT_CHANGE_PASSWORD', $lang['account']['change_password']);
	$account->assign('TXT_NEWSLETTER', $lang['account']['newsletter']);

	$account->parse('account');
	$page_content = $account->text('account');
} else {
	httpredir('index.php?_a=login&amp;redir='.urlencode(str_replace('&amp;','&',currentPage())));
}
?>