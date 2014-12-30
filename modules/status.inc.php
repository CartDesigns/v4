<?php
/*
+--------------------------------------------------------------------------
|   CubeCart 4
|   ========================================
|	CubeCart is a Trade Mark of CubeCart Limited
|   Copyright CubeCart Limited 2014. All rights reserved.
|	UK Private Limited Company No. 5323904
|   ========================================
|   Web: http://www.cubecart.com
|   Email: sales@cubecart.com
|	License: GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
+--------------------------------------------------------------------------
|	status.php
|   ========================================
|	Manage Module State
+--------------------------------------------------------------------------
*/

if(!defined('CC_INI_SET')){ die("Access Denied"); }

if (isset($_POST['module'])) {
	$query = sprintf("SELECT * FROM ".$glob['dbprefix']."CubeCart_Modules WHERE module = %s AND folder = %s", $db->mySQLSafe($module), $db->mySQLSafe($moduleName));
	$moduleState = $db->select($query);

	$data['status'] = $db->mySQLSafe($_POST['module']['status']);
	$data['default'] = $db->mySQLSafe($_POST['module']['default']);

	if($moduleType['default']==1){

		$resetData['default'] = 0;
		$where = "module = ".$db->mySQLSafe($module);
		$update = $db->update($glob['dbprefix']."CubeCart_Modules", $resetData, $where);

	}

	if($moduleState){

		$where = "module = ".$db->mySQLSafe($module)." AND folder = ".$db->mySQLSafe($moduleName);
		$update = $db->update($glob['dbprefix']."CubeCart_Modules", $data, $where);

	} else {

		$data['folder'] = $db->mySQLSafe($moduleName);
		$data['module'] = $db->mySQLSafe($module);
		$insert = $db->insert($glob['dbprefix']."CubeCart_Modules", $data);

	}
}
?>