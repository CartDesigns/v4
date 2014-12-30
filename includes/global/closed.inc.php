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
|	closed.inc.php
|   ========================================
|	Store Closed Splash Page
+--------------------------------------------------------------------------
*/
if(!defined('CC_INI_SET')) die("Access Denied");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charsetIso; ?>" />
<title><?php echo htmlspecialchars(str_replace("&#39;","'",$config['siteTitle'])); ?></title>
</head>

<body>
<?php echo stripslashes(base64_decode($config['offLineContent'])); ?>
</body>
</html>