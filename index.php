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
|	index.php
+--------------------------------------------------------------------------
*/

$debugStart = microtime();

header('X-Frame-Options: SAME-ORIGIN');

## v3 Compatbility from old search Links
if(isset($_GET['act']) && !empty($_GET['act'])) {
	switch($_GET['act']) {
		case 'viewProd':
			$url = 'Location: index.php?_a=viewProd&productId='.$_GET['productId'];
		break;
		case 'viewCat':
			$url = ($_GET['catId']=='saleItems') ? 'Location: index.php?_a=viewCat&catId=saleItems' : 'Location: index.php?_a=viewCat&catId='.$_GET['catId'];
		break;
		case 'viewDoc':
			$url = 'Location: index.php?_a=viewDoc&docId='.$_GET['docId'];
		break;
		default:
			$url = 'index.php';
		break;
	}
	header($url, false, 301);
}


if (isset($_GET['_a']) && $_GET['_a'] == 'search') {
	## Do nothing yet...
} else {
	if(preg_match('#([a-z]{1,6})_([a-z0-9\+]+)\.?([a-z]+)?(\?.*)?$#i', $_SERVER['REQUEST_URI'], $matches)) {
		if(is_numeric($matches[2])) {
			switch ($matches[1]) {
				case 'c':
				case 'cat':
					$_GET['_a'] = 'viewCat';
					$_GET['catId'] = $matches[2];
					break;
				case 'i':
				case 'info':
					$_GET['_a'] = 'viewDoc';
					$_GET['docId'] = $matches[2];
					break;
				case 'p':
				case 'prod':
					$_GET['_a'] = 'viewProd';
					$_GET['productId'] = $matches[2];
					break;
				case 't':
				case 'taf':
				case 'tell':
					$_GET['_a'] = 'tellafriend';
					$_GET['productId'] = $matches[2];
				break;
			}
		} elseif($matches[1]=='s' || $matches[1]=='search') {
			$_GET['_a'] = 'viewCat';
			$_GET['searchStr'] = $matches[2];
		}
	}
}

require_once 'ini.inc.php';

## If global.inc.php doesn't exist, the store probably needs to be installed
if (!file_exists('includes'.CC_DS.'global.inc.php')) {
	header('Location: setup/index.php');
	exit;
}
require_once 'includes'.CC_DS.'global.inc.php';

## If it does exist, then check that the install worked, and that the admin file exists
if (!$glob['installed'] || !isset($glob['adminFile'])) {
	# Nope, lets do the install
	header('Location: setup/index.php');
	exit;
}

$debugTime['start'] = microtime();

require_once ("includes" . CC_DS . "functions.inc.php");
require_once ("classes" . CC_DS . "db" . CC_DS . "db.php");
$db = new db();
require_once ("classes" . CC_DS . "cache" . CC_DS . "cache.php");
$config = fetchdbconfig("config");


if(($config['offLine']==1 && isset($_SESSION[CC_ADMIN_SESSION_NAME]) && $config['offLineAllowAdmin']==0) || ($config['offLine']==1 && !isset($_SESSION[CC_ADMIN_SESSION_NAME])))
{
		$offlineContent = false;
		$offlineFiles = glob("offline.{php,htm,html}", GLOB_BRACE);
		if (!empty($offlineFiles) || is_array($offlineFiles))
		{
				foreach ($offlineFiles as $file)
				{
						include ($file);
						exit();
				}
		}
		echo stripslashes(base64_decode($config['offLineContent']));
		exit();
}
require_once ("classes" . CC_DS . "xtpl" . CC_DS . "xtpl.php");
if ($_REQUEST['_g'] !== "rm")
{
		require_once ("includes" . CC_DS . "sef_urls.inc.php");
		require_once ("includes" . CC_DS . "sslSwitch.inc.php");
		require_once ("classes" . CC_DS . "session" . CC_DS . "cc_session.php");
		$cc_session = new session();
		$lang = getlang("common.inc.php");
}
require_once ("includes" . CC_DS . "currencyVars.inc.php");
switch ($_REQUEST['_g'])
{
		case "ajax":
		case "json":
		case "xmlhttp":
				$skipload = true;
				require_once ("xml.php");
				exit();
		case "co":
				require_once ("includes" . CC_DS . "global" . CC_DS . "cart.inc.php");
				break;
		case "sw":
				require_once ("includes" . CC_DS . "global" . CC_DS . "switch.inc.php");
				break;
		case "dl":
				require_once ("includes" . CC_DS . "global" . CC_DS . "download.inc.php");
				break;
		case "ex":
				require_once ("includes" . CC_DS . "global" . CC_DS . "extra.inc.php");
				exit();
		case "rm":
				require_once ("includes" . CC_DS . "remote" . CC_DS . "remote.inc.php");
				exit();
		case "cs":
				$decodedPath = get_magic_quotes_gpc() ? stripslashes(urldecode($_GET['_p'])):
				urldecode($_GET['_p']);
				if (in_array($decodedPath, $allowed_modules))
				{
					include_once ($decodedPath);
					exit();
				}
		default:
				require_once ("includes" . CC_DS . "global" . CC_DS . "index.inc.php");
}
if ($config['debug'])
{
	$debug = "<div style='margin-top: 15px; font-family: Courier New, Courier, mono; border: 1px dashed #666; padding: 10px; color: #000; background: #FFF'>";
	$debug .= "<strong>\$_POST Variables:</strong><br />" . cc_print_array($_POST) . "<hr size=1 />";
	$debug .= "<strong>\$_GET Variables:</strong><br />" . cc_print_array($_GET) . "<hr size=1 />";
	$debug .= "<strong>\$_COOKIE Variables:</strong><br />" . cc_print_array($_COOKIE) . "<hr size=1  />";
	$debug .= "<strong>\$basket Variables:</strong> (unserialize(\$cc_session->ccUserData['basket']))<br />" . cc_print_array(unserialize($cc_session->ccUserData['basket'])) . "<hr size=1  />";
	$debug .= "<strong>\$cc_session->ccUserData  Variables:</strong><br />" . cc_print_array($cc_session->ccUserData) . "<hr size=1  />";
	$debug .= "<strong>MySQL Queries (" . count($db->queryArray) . "):</strong><br />" . cc_print_array($db->queryArray);
	$debug .= "</div>";
}
if (isset($body) && is_object($body))
{
	$body->assign("PAGE_CONTENT", $page_content);
	$body->assign("VAL_ROOTREL", $glob['rootRel']);
	$body->assign("DEBUG_INFO", $debug);
	$body->parse("body");
	$htmlOut = $body->text("body");
	

	if (isset($config['google_analytics'], $config['google_analytics']))
	{
			$googleAnalytics = "
			<script type=\"text/javascript\">
				var gaJsHost = ((\"https:\" == document.location.protocol) ? \"https://ssl.\" : \"http://www.\");
				document.write(unescape(\"%3Cscript src='\" + gaJsHost + \"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E\"));
			</script>
			<script type=\"text/javascript\">
				var pageTracker = _gat._getTracker(\"" . $config['google_analytics'] . "\");
				pageTracker._initData();
				pageTracker._trackPageview();
			</script>";
	}
	else
	{
			$googleAnalytics = "";
	}
	$htmlOut = preg_replace("/(\\<\\/head\\>)/i", $googleAnalytics . "\$1", $htmlOut);
	echo $htmlOut;
}
?>