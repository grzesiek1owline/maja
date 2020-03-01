<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

$list_table = new Vision_List_Table_Items();
$list_table->prepare_items();

?>
<div class="wrap vision">
	<?php require 'page-info.php'; ?>
	<div class="vision-page-header">
		<div class="vision-title"><?php _e('Vision Items', VISION_PLUGIN_NAME); ?></div>
		<div class="vision-actions">
			<a href="?page=<?php echo VISION_PLUGIN_NAME . '_item'; ?>"><?php _e('Add Item', VISION_PLUGIN_NAME); ?></a>
		</div>
	</div>
	<!-- vision app -->
	<div id="vision-app-items" class="vision-app">
		<form method="get">
			<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>">
			<?php $list_table->display() ?>
		</form>
	</div>
	<!-- /end vision app -->
</div>