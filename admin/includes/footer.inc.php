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
|	footer.inc.php
|   ========================================
|	Admin Footer
+--------------------------------------------------------------------------
*/
if (!defined('CC_INI_SET')) die("Access Denied");
if (isset($GLOBALS[CC_ADMIN_SESSION_NAME]) && !isset($skipFooter)) {
?>
</div>
<!-- start wrapping table -->
	</td>
  </tr>
</table>
<!-- end wrapping table -->
<?php } ?>
</body>
</html>