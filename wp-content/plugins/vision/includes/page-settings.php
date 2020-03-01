<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED );

?>
<div class="wrap vision">
	<?php require 'page-info.php'; ?>
	<div class="vision-page-header">
		<div class="vision-title"><?php _e('Vision Settings', VISION_PLUGIN_NAME); ?></div>
	</div>
	<div class="vision-messages" id="vision-messages">
	</div>
	<!-- vision app -->
	<div id="vision-app-settings" class="vision-app" style="display:none;">
		<div class="vision-loader-wrap">
			<div class="vision-loader">
				<div class="vision-loader-bar"></div>
				<div class="vision-loader-bar"></div>
				<div class="vision-loader-bar"></div>
				<div class="vision-loader-bar"></div>
			</div>
		</div>
		<div class="vision-wrap">
			<div class="vision-workplace">
				<div class="vision-main-tabs vision-clear-fix">
					<div class="vision-tab" al-attr.class.vision-active="appData.ui.tabs.general" al-on.click="appData.fn.onTab(appData, 'general')"><?php _e('General', VISION_PLUGIN_NAME); ?></div>
					<div class="vision-tab" al-attr.class.vision-active="appData.ui.tabs.actions" al-on.click="appData.fn.onTab(appData, 'actions')"><?php _e('Actions', VISION_PLUGIN_NAME); ?></div>
					<div class="vision-tab">
						<div class="vision-button vision-blue" al-on.click="appData.fn.saveConfig(appData);"><?php _e('Save', VISION_PLUGIN_NAME); ?></div>
					</div>
				</div>
				<div class="vision-main-data">
					<div al-if="appData.ui.tabs.general">
						<div class="vision-stage">
							<div class="vision-main-panel">
								<div class="vision-data">
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Choose a default theme for your custom javascript editor', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('JavaScript editor theme', VISION_PLUGIN_NAME); ?></div>
										<select class="vision-select" al-select="appData.config.themeJavaScript">
											<option al-option="null"><?php _e('default', VISION_PLUGIN_NAME); ?></option>
											<option al-repeat="theme in appData.themes" al-option="theme.id">{{theme.title}}</option>
										</select>
									</div>
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Choose a default theme for your custom css editor', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('CSS editor theme', VISION_PLUGIN_NAME); ?></div>
										<select class="vision-select" al-select="appData.config.themeCSS">
											<option al-option="null"><?php _e('default', VISION_PLUGIN_NAME); ?></option>
											<option al-repeat="theme in appData.themes" al-option="theme.id">{{theme.title}}</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div al-if="appData.ui.tabs.actions">
						<div class="vision-stage">
							<div class="vision-main-panel">
								<div class="vision-data">
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Delete all book items from database', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-button vision-red" al-on.click="appData.fn.deleteAllData(appData, '. <?php _e('Do you really want to delete all data?', VISION_PLUGIN_NAME); ?> . ');"><?php _e('Delete all data', VISION_PLUGIN_NAME); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /end vision app -->
</div>