<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRIPPED );
$author = get_the_author_meta('display_name', $item->author);
$modified = mysql2date(get_option('date_format'), $item->modified) . ' at ' . mysql2date(get_option('time_format'), $item->modified);

?>
<div class="wrap vision">
	<?php require 'page-info.php'; ?>
	<div class="vision-page-header">
		<div class="vision-title"><?php _e('Vision Item', VISION_PLUGIN_NAME); ?></div>
		<div class="vision-actions">
			<a href="?page=<?php echo VISION_PLUGIN_NAME . '_item'; ?>"><?php _e('Add Item', VISION_PLUGIN_NAME); ?></a>
		</div>
	</div>
	<div class="vision-messages" id="vision-messages">
	</div>
	<!-- vision app -->
	<div id="vision-app-item" class="vision-app" style="display:none;">
		<input id="vision-load-config-from-file" type="file" style="display:none;" />
		<div class="vision-loader-wrap">
			<div class="vision-loader">
				<div class="vision-loader-bar"></div>
				<div class="vision-loader-bar"></div>
				<div class="vision-loader-bar"></div>
				<div class="vision-loader-bar"></div>
			</div>
		</div>
		<div class="vision-wrap">
			<div class="vision-main-header">
				<input class="vision-title" type="text" al-text="appData.config.title" placeholder="<?php _e('Title', VISION_PLUGIN_NAME); ?>">
			</div>
			<div class="vision-workplace">
				<div class="vision-main-menu">
					<div class="vision-left-panel">
						<a class="vision-version-lite" href="https://codecanyon.net/item/vision-interactive-image-map-builder-for-wordpress/22919726/?ref=avirtum" al-if="appData.plan=='lite'"><?php _e('Buy pro version', VISION_PLUGIN_NAME); ?></a>
						<a class="vision-version-pro" href="#" al-if="appData.plan=='pro'"><?php _e('Pro Version', VISION_PLUGIN_NAME); ?></a>
					</div>
					<div class="vision-right-panel">
						<div class="vision-item">
							<i class="vision-icon vision-icon-menu"></i>
							<div class="vision-menu-list">
								<a href="#" al-on.click="appData.fn.loadConfigFromFile(appData)"><i class="vision-icon vision-icon-from-file"></i><?php _e('Load Config From File', VISION_PLUGIN_NAME); ?></a>
								<a href="#" al-on.click="appData.fn.saveConfigToFile(appData)"><i class="vision-icon vision-icon-to-file"></i><?php _e('Save Config To File', VISION_PLUGIN_NAME); ?></a>
							</div>
						</div>
						<div class="vision-item" al-on.click="appData.fn.toggleFullscreen(appData)">
							<i class="vision-icon vision-icon-size-fullscreen" al-if="!appData.ui.fullscreen"></i>
							<i class="vision-icon vision-icon-size-actual" al-if="appData.ui.fullscreen"></i>
						</div>
					</div>
				</div>
				<div class="vision-main-tabs vision-clear-fix">
					<div class="vision-tab" al-attr.class.vision-active="appData.ui.tabs.general" al-on.click="appData.fn.onTab(appData, 'general')"><?php _e('General', VISION_PLUGIN_NAME); ?><div class="vision-status" al-if="appData.config.active"></div></div>
					<div class="vision-tab" al-attr.class.vision-active="appData.ui.tabs.layers" al-on.click="appData.fn.onTab(appData, 'layers')"><?php _e('Layers', VISION_PLUGIN_NAME); ?></div>
					<div class="vision-tab" al-attr.class.vision-active="appData.ui.tabs.customCSS" al-on.click="appData.fn.onTab(appData, 'customCSS')"><?php _e('Custom CSS', VISION_PLUGIN_NAME); ?><div class="vision-status" al-if="appData.config.customCSS.active"></div></div>
					<div class="vision-tab" al-attr.class.vision-active="appData.ui.tabs.customJS" al-on.click="appData.fn.onTab(appData, 'customJS')"><?php _e('Custom JS', VISION_PLUGIN_NAME); ?><div class="vision-status" al-if="appData.config.customJS.active"></div></div>
					<div class="vision-tab" al-attr.class.vision-active="appData.ui.tabs.shortcode" al-on.click="appData.fn.onTab(appData, 'shortcode')" al-if="appData.wp_item_id"><?php _e('Shortcode', VISION_PLUGIN_NAME); ?></div>
					<div class="vision-tab">
						<div class="vision-button vision-green" al-on.click="appData.fn.preview(appData);" al-if="appData.wp_item_id" title="<?php _e('The item should be saved before preview', VISION_PLUGIN_NAME); ?>"><?php _e('Preview', VISION_PLUGIN_NAME); ?></div>
						<div class="vision-button vision-blue" al-on.click="appData.fn.saveConfig(appData);"><?php _e('Save', VISION_PLUGIN_NAME); ?></div>
					</div>
				</div>
				<div class="vision-main-data">
					<div class="vision-section" al-attr.class.vision-active="appData.ui.tabs.general">
						<div class="vision-stage">
							<div class="vision-main-panel">
								<div class="vision-data">
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Enable/disable item', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Enable item', VISION_PLUGIN_NAME); ?></div>
										<div al-toggle="appData.config.active"></div>
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Sets a main image (jpeg or png format)', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Main image', VISION_PLUGIN_NAME); ?></div>
										<div class="vision-input-group">
											<div class="vision-input-group-cell">
												<input class="vision-text vision-long" type="text" al-text="appData.config.image.url" placeholder="<?php _e('Select an image', VISION_PLUGIN_NAME); ?>">
											</div>
											<div class="vision-input-group-cell vision-pinch">
												<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.config.image)" title="<?php _e('Select an image', VISION_PLUGIN_NAME); ?>"><span><i class="vision-icon vision-icon-select"></i></span></div>
											</div>
										</div>
										<div class="vision-input-group">
											<div class="vision-input-group-cell vision-pinch">
												<div al-checkbox="appData.config.image.relative"></div>
											</div>
											<div class="vision-input-group-cell">
												<?php _e('Use relative path', VISION_PLUGIN_NAME); ?>
											</div>
										</div>
									</div>
									
									<div class="vision-control">
										<div class="vision-info"><?php _e('Container settings', VISION_PLUGIN_NAME); ?></div>
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('The container width will be auto calculated', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Auto width', VISION_PLUGIN_NAME); ?></div>
										<div al-toggle="appData.config.autoWidth"></div>
									</div>
									
									<div class="vision-control" al-if="!appData.config.autoWidth">
										<div class="vision-helper" title="<?php _e('Sets the container width, can be any valid CSS units, not just pixels', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Custom width', VISION_PLUGIN_NAME); ?></div>
										<input class="vision-text" type="text" al-text="appData.config.containerWidth" placeholder="<?php _e('Default: auto', VISION_PLUGIN_NAME); ?>">
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('The container height will be auto calculated', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Auto height', VISION_PLUGIN_NAME); ?></div>
										<div al-toggle="appData.config.autoHeight"></div>
									</div>
									
									<div class="vision-control" al-if="!appData.config.autoHeight">
										<div class="vision-helper" title="<?php _e('Sets the container height, can be any valid CSS units, not just pixels', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Custom height', VISION_PLUGIN_NAME); ?></div>
										<input class="vision-text" type="text" al-text="appData.config.containerHeight" placeholder="<?php _e('Default: auto', VISION_PLUGIN_NAME); ?>">
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Specifies a theme of elements', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Main theme', VISION_PLUGIN_NAME); ?></div>
										<select class="vision-select vision-capitalize" al-select="appData.config.theme">
											<option al-option="null"><?php _e('none', VISION_PLUGIN_NAME); ?></option>
											<option al-repeat="theme in appData.themes" al-option="theme.id">{{theme.title}}</option>
										</select>
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Background color in hexadecimal format (#fff or #555555)', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Background color', VISION_PLUGIN_NAME); ?></div>
										<div class="vision-color" al-color="appData.config.background.color"></div>
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Sets a background image (jpeg or png format)', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Background image', VISION_PLUGIN_NAME); ?></div>
										<div class="vision-input-group">
											<div class="vision-input-group-cell">
												<input class="vision-text vision-long" type="text" al-text="appData.config.background.image.url" placeholder="<?php _e('Select an image', VISION_PLUGIN_NAME); ?>">
											</div>
											<div class="vision-input-group-cell vision-pinch">
												<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.config.background.image)" title="<?php _e('Select a background image', VISION_PLUGIN_NAME); ?>"><span><i class="vision-icon vision-icon-select"></i></span></div>
											</div>
										</div>
										<div class="vision-input-group">
											<div class="vision-input-group-cell vision-pinch">
												<div al-checkbox="appData.config.background.image.relative"></div>
											</div>
											<div class="vision-input-group-cell">
												<?php _e('Use relative path', VISION_PLUGIN_NAME); ?>
											</div>
										</div>
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Specifies a size of the background image', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Background size', VISION_PLUGIN_NAME); ?></div>
										<div class="vision-select" al-backgroundsize="appData.config.background.size"></div>
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('How the background image will be repeated', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Background repeat', VISION_PLUGIN_NAME); ?></div>
										<div class="vision-select" al-backgroundrepeat="appData.config.background.repeat"></div>
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Sets a starting position of the background image', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Background position', VISION_PLUGIN_NAME); ?></div>
										<input class="vision-text" type="text" al-text="appData.config.background.position" placeholder="<?php _e('Example: 50% 50%', VISION_PLUGIN_NAME); ?>">
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Sets additional css classes to the container', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Additional CSS classes', VISION_PLUGIN_NAME); ?></div>
										<input class="vision-text" type="text" al-text="appData.config.class">
									</div>
									
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Sets ID to the container', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-label"><?php _e('Container ID', VISION_PLUGIN_NAME); ?></div>
										<input class="vision-text" type="text" al-text="appData.config.containerId">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vision-section" al-attr.class.vision-active="appData.ui.tabs.layers">
						<div class="vision-stage">
							<div class="vision-main-panel">
								<div class="vision-edit-layers">
									<div class="vision-layers-toolbar-navigation" al-if="appData.config.layers.length > 0">
										<i class="vision-icon vision-icon-prev" al-on.click="appData.fn.prevLayer(appData)" title="<?php _e('Prev layer', VISION_PLUGIN_NAME); ?>"></i>
										<i class="vision-icon vision-icon-next" al-on.click="appData.fn.nextLayer(appData)" title="<?php _e('Next layer', VISION_PLUGIN_NAME); ?>"></i>
									</div>
									<div class="vision-layers-toolbar-view">
										<i class="vision-icon vision-icon-zoom-in" al-on.click="appData.fn.canvasZoomIn(appData)" title="<?php _e('Zoom in', VISION_PLUGIN_NAME); ?>"></i>
										<span class="vision-zoom-value">{{appData.fn.getCanvasZoom(appData)}}%</span>
										<i class="vision-icon vision-icon-zoom-out" al-on.click="appData.fn.canvasZoomOut(appData)" title="<?php _e('Zoom out', VISION_PLUGIN_NAME); ?>"></i>
										<i class="vision-icon vision-icon-zoom-default" al-on.click="appData.fn.canvasZoomDefault(appData)" title="<?php _e('Zoom default', VISION_PLUGIN_NAME); ?>"></i>
										<i class="vision-icon vision-icon-zoom-fit" al-on.click="appData.fn.canvasZoomFit(appData)" title="<?php _e('Zoom fit', VISION_PLUGIN_NAME); ?>"></i>
										<i class="vision-icon vision-icon-center" al-on.click="appData.fn.canvasMoveDefault(appData)" title="<?php _e('Move default', VISION_PLUGIN_NAME); ?>"></i>
									</div>
									<div id="vision-layers-canvas-wrap" class="vision-layers-canvas-wrap" al-on.mousedown="appData.fn.onMoveCanvasStart(appData, $event)">
										<div id="vision-layers-canvas" class="vision-layers-canvas">
											<div id="vision-layers-image" class="vision-layers-image"></div>
											<div class="vision-layers-stage">
												<div class="vision-layer"
												 tabindex="1"
												 al-on.click="appData.fn.onLayerClick(appData, layer)"
												 al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'drag', $event)"
												 al-on.keydown="appData.fn.onEditLayerKeyDown(appData, layer, $event)"
												 al-attr.class.vision-active="appData.fn.isLayerActive(appData, layer)"
												 al-attr.class.vision-hidden="!layer.visible"
												 al-attr.class.vision-lock="layer.lock"
												 al-attr.class.vision-layer-link="layer.type == 'link'"
												 al-attr.class.vision-layer-text="layer.type == 'text'"
												 al-attr.class.vision-layer-image="layer.type == 'image'"
												 al-attr.class.vision-layer-svg="layer.type == 'svg'"
												 al-style.top="appData.fn.getLayerStyle(appData, layer, 'y')"
												 al-style.left="appData.fn.getLayerStyle(appData, layer, 'x')"
												 al-style.width="appData.fn.getLayerStyle(appData, layer, 'width')"
												 al-style.height="appData.fn.getLayerStyle(appData, layer, 'height')"
												 al-style.transform="appData.fn.getLayerStyle(appData, layer, 'angle')"
												 al-repeat="layer in appData.config.layers"
												 al-init="appData.fn.initLayer(appData, layer, $element)"
												>
													<div class="vision-layer-inner"
														 al-on.dblclick="appData.fn.onEditLabelText(appData, layer, $element, $event)"
														 spellcheck="false"
														 al-style.border-radius="appData.fn.getLayerStyle(appData, layer, 'border-radius')"
														 al-style.background-color="appData.fn.getLayerStyle(appData, layer, 'background-color')"
														 al-style.background-image="appData.fn.getLayerStyle(appData, layer, 'background-image')"
														 al-style.background-size="appData.fn.getLayerStyle(appData, layer, 'background-size')"
														 al-style.background-repeat="appData.fn.getLayerStyle(appData, layer, 'background-repeat')"
														 al-style.background-position="appData.fn.getLayerStyle(appData, layer, 'background-position')"
														 al-style.color="appData.fn.getLayerStyle(appData, layer, 'color')"
														 al-style.font-family="appData.fn.getLayerStyle(appData, layer, 'font-family')"
														 al-style.font-size="appData.fn.getLayerStyle(appData, layer, 'font-size')"
														 al-style.line-height="appData.fn.getLayerStyle(appData, layer, 'line-height')"
														 al-style.text-align="appData.fn.getLayerStyle(appData, layer, 'text-align')"
														 al-style.letter-spacing="appData.fn.getLayerStyle(appData, layer, 'letter-spacing')"
														 al-init="appData.fn.initLayerInner(appData, layer, $element)"
													>
													</div>
													<div class="vision-layer-resizer">
														<div class="vision-layer-coord">X: {{appData.fn.getLayerCoord(appData, layer, 'x')}} <br>Y: {{appData.fn.getLayerCoord(appData, layer, 'y')}} <br>L: {{appData.fn.getLayerCoord(appData, layer, 'angle')}}°</div>
														<div class="vision-layer-rotator" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'rotate', $event)">
															<div class="vision-layer-line"></div>
														</div>
														<div class="vision-layer-dragger-tl" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tl', $event)"></div>
														<div class="vision-layer-dragger-tm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tm', $event)"></div>
														<div class="vision-layer-dragger-tr" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'tr', $event)"></div>
														<div class="vision-layer-dragger-rm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'rm', $event)"></div>
														<div class="vision-layer-dragger-br" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'br', $event)"></div>
														<div class="vision-layer-dragger-bm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'bm', $event)"></div>
														<div class="vision-layer-dragger-bl" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'bl', $event)"></div>
														<div class="vision-layer-dragger-lm" al-on.mousedown="appData.fn.onEditLayerStart(appData, layer, 'lm', $event)"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="vision-sidebar-panel" al-attr.class.vision-hidden="!appData.ui.sidebar" al-style.width="appData.ui.sidebarWidth">
								<div class="vision-sidebar-resizer" al-on.mousedown="appData.fn.onSidebarResizeStart(appData, $event)">
									<div class="vision-sidebar-hide" al-on.click="appData.fn.toggleSidebarPanel(appData)">
										<i class="vision-icon vision-icon-next" al-if="appData.ui.sidebar"></i>
										<i class="vision-icon vision-icon-prev" al-if="!appData.ui.sidebar"></i>
									</div>
								</div>
								<div class="vision-tabs vision-clear-fix">
									<div class="vision-tab" al-attr.class.vision-active="appData.ui.layersTabs.layers" al-on.click="appData.fn.onLayersTab(appData, 'layers')"><?php _e('Layers', VISION_PLUGIN_NAME); ?></div>
									<div class="vision-tab" al-attr.class.vision-active="appData.ui.layersTabs.layer" al-on.click="appData.fn.onLayersTab(appData, 'layer')"><?php _e('Layer', VISION_PLUGIN_NAME); ?></div>
									<div class="vision-tab" al-attr.class.vision-active="appData.ui.layersTabs.tooltip" al-on.click="appData.fn.onLayersTab(appData, 'tooltip')"><?php _e('Tooltip', VISION_PLUGIN_NAME); ?><div class="vision-status" al-if="appData.ui.activeLayer != null && appData.ui.activeLayer.tooltip.active"></div></div>
									<div class="vision-tab" al-attr.class.vision-active="appData.ui.layersTabs.popover" al-on.click="appData.fn.onLayersTab(appData, 'popover')"><?php _e('Popover', VISION_PLUGIN_NAME); ?><div class="vision-status" al-if="appData.ui.activeLayer != null && appData.ui.activeLayer.popover.active"></div></div>
								</div>
								<div class="vision-data" al-attr.class.vision-active="appData.ui.layersTabs.layers">
									<div class="vision-layers-wrap">
										<div class="vision-layers-toolbar">
											<div class="vision-left-panel">
												<i class="vision-icon vision-icon-link" al-on.click="appData.fn.addLayerLink(appData)" title="<?php _e('add link', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon vision-icon-text" al-on.click="appData.fn.addLayerText(appData)" title="<?php _e('add text', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon vision-icon-image" al-on.click="appData.fn.addLayerImage(appData)" title="<?php _e('add image', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon vision-icon-svg" al-on.click="appData.fn.addLayerSVG(appData)" title="<?php _e('add svg', VISION_PLUGIN_NAME); ?>"></i>
												<span al-if="appData.ui.activeLayer != null">
												<i class="vision-separator"></i>
												<i class="vision-icon vision-icon-copy" al-on.click="appData.fn.copyLayer(appData)" title="<?php _e('copy', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon vision-icon-arrow-up" al-on.click="appData.fn.updownLayer(appData, 'up')" title="<?php _e('move up', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon vision-icon-arrow-down" al-on.click="appData.fn.updownLayer(appData, 'down')" title="<?php _e('move down', VISION_PLUGIN_NAME); ?>"></i>
												</span>
											</div>
											<div class="vision-right-panel">
												<i class="vision-icon vision-icon-trash vision-icon-red" al-if="appData.ui.activeLayer != null" al-on.click="appData.fn.deleteLayer(appData)" title="<?php _e('delete', VISION_PLUGIN_NAME); ?>"></i>
											</div>
										</div>
										<div class="vision-layer"
										 al-attr.class.vision-active="appData.fn.isLayerActive(appData, layer)"
										 al-on.click="appData.fn.onLayerItemClick(appData, layer)"
										 al-repeat="layer in appData.config.layers"
										 >
											<i class="vision-icon vision-icon-link" al-if="layer.type == 'link'"></i>
											<i class="vision-icon vision-icon-text" al-if="layer.type == 'text'"></i>
											<i class="vision-icon vision-icon-image" al-if="layer.type == 'image'"></i>
											<i class="vision-icon vision-icon-svg" al-if="layer.type == 'svg'"></i>
											<div class="vision-label">{{layer.title ? layer.title : layer.type}}</div>
											<div class="vision-actions">
												<i class="vision-icon vision-icon-tooltip" al-attr.class.vision-inactive="!layer.tooltip.active" al-on.click="appData.fn.toggleLayerTooltip(appData, layer)" title="<?php _e('enable/disable tooltip', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon vision-icon-popup" al-attr.class.vision-inactive="!layer.popover.active" al-on.click="appData.fn.toggleLayerPopover(appData, layer)" title="<?php _e('enable/disable popover', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon" al-attr.class.vision-icon-eye="layer.visible" al-attr.class.vision-icon-eye-off="!layer.visible" al-on.click="appData.fn.toggleLayerVisible(appData, layer)" title="<?php _e('show/hide', VISION_PLUGIN_NAME); ?>"></i>
												<i class="vision-icon" al-attr.class.vision-icon-lock-open="!layer.lock" al-attr.class.vision-icon-lock="layer.lock" al-on.click="appData.fn.toggleLayerLock(appData, layer)" title="<?php _e('lock/unlock', VISION_PLUGIN_NAME); ?>"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="vision-data" al-attr.class.vision-active="appData.ui.layersTabs.layer">
									<div al-if="appData.ui.activeLayer == null">
										<div class="vision-info"><?php _e('Please, select a layer to view settings', VISION_PLUGIN_NAME); ?></div>
									</div>
									<div al-if="appData.ui.activeLayer != null">
										<div class="vision-block vision-block-flat" al-attr.class.vision-block-folded="appData.ui.layerTab.general">
											<div class="vision-block-header" al-on.click="appData.fn.onLayerTab(appData,'general')">
												<div class="vision-block-title"><?php _e('General', VISION_PLUGIN_NAME); ?></div>
												<div class="vision-block-state"></div>
											</div>
											<div class="vision-block-data">
												<div class="vision-control">
													<div class="vision-helper" title="<?php _e('Set layer title', VISION_PLUGIN_NAME); ?>"></div>
													<div class="vision-label"><?php _e('Title', VISION_PLUGIN_NAME); ?></div>
													<input class="vision-text vision-long" type="text" al-text="appData.ui.activeLayer.title">
												</div>
												
												<div class="vision-control">
													<div class="vision-helper" title="<?php _e('Set layer position', VISION_PLUGIN_NAME); ?>"></div>
													<div class="vision-input-group vision-long">
														<div class="vision-input-group-cell vision-rgap">
															<div class="vision-label"><?php _e('X [px]', VISION_PLUGIN_NAME); ?></div>
															<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.x">
														</div>
														<div class="vision-input-group-cell vision-lgap">
															<div class="vision-label"><?php _e('Y [px]', VISION_PLUGIN_NAME); ?></div>
															<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.y">
														</div>
													</div>
												</div>
												
												<div class="vision-control">
													<div class="vision-helper" title="<?php _e('Set layer size', VISION_PLUGIN_NAME); ?>"></div>
													<div class="vision-input-group vision-long">
														<div class="vision-input-group-cell vision-rgap">
															<div class="vision-label"><?php _e('Width [px]', VISION_PLUGIN_NAME); ?></div>
															<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.width">
														</div>
														<div class="vision-input-group-cell vision-lgap">
															<div class="vision-label"><?php _e('Height [px]', VISION_PLUGIN_NAME); ?></div>
															<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.height">
														</div>
													</div>
												</div>
												
												<div class="vision-control">
													<div class="vision-helper" title="<?php _e('Set layer angle', VISION_PLUGIN_NAME); ?>"></div>
													<div class="vision-label"><?php _e('Angle [deg]', VISION_PLUGIN_NAME); ?></div>
													<input class="vision-number vision-long" al-float="appData.ui.activeLayer.angle">
												</div>
											</div>
										</div>
										
										<div class="vision-block vision-block-flat" al-attr.class.vision-block-folded="appData.ui.layerTab.data">
											<div class="vision-block-header" al-on.click="appData.fn.onLayerTab(appData,'data')">
												<div class="vision-block-title"><?php _e('Data', VISION_PLUGIN_NAME); ?></div>
												<div class="vision-block-state"></div>
											</div>
											<div class="vision-block-data">
												<div class="vision-control">
													<div class="vision-helper" title="<?php _e('Adds a specific url to the layer', VISION_PLUGIN_NAME); ?>"></div>
													<div class="vision-label"><?php _e('URL', VISION_PLUGIN_NAME); ?></div>
													<div class="vision-input-group vision-long">
														<input class="vision-text vision-long" type="text" al-text="appData.ui.activeLayer.url" placeholder="<?php _e('URL', VISION_PLUGIN_NAME); ?>">
													</div>
													<div class="vision-input-group vision-long">
														<div class="vision-input-group-cell vision-pinch">
															<div al-checkbox="appData.ui.activeLayer.urlNewWindow"></div>
														</div>
														<div class="vision-input-group-cell">
															<?php _e('Open url in a new window', VISION_PLUGIN_NAME); ?>
														</div>
													</div>
												</div>
												<div class="vision-control">
													<div class="vision-helper" title="<?php _e('Adds a specific string data to the layer, if we want to use it in custom code later', VISION_PLUGIN_NAME); ?>"></div>
													<div class="vision-label"><?php _e('User data', VISION_PLUGIN_NAME); ?></div>
													<textarea class="vision-long" al-textarea="appData.ui.activeLayer.userData"></textarea>
												</div>
											</div>
										</div>
										
										<div class="vision-block vision-block-flat" al-attr.class.vision-block-folded="appData.ui.layerTab.appearance">
											<div class="vision-block-header" al-on.click="appData.fn.onLayerTab(appData,'appearance')">
												<div class="vision-block-title"><?php _e('Appearance', VISION_PLUGIN_NAME); ?></div>
												<div class="vision-block-state"></div>
											</div>
											<div class="vision-block-data">
												<div class="vision-control">
													<div class="vision-input-group vision-long">
														<div class="vision-input-group-cell vision-rgap">
															<div class="vision-helper" title="<?php _e('The layer size depends on the image size', VISION_PLUGIN_NAME); ?>"></div>
															<div class="vision-label"><?php _e('Responsive', VISION_PLUGIN_NAME); ?></div>
															<div al-toggle="appData.ui.activeLayer.responsive"></div>
														</div>
														<div class="vision-input-group-cell vision-lgap">
															<div class="vision-helper" title="<?php _e('The layer is never the target of mouse events', VISION_PLUGIN_NAME); ?>"></div>
															<div class="vision-label"><?php _e('No events', VISION_PLUGIN_NAME); ?></div>
															<div al-toggle="appData.ui.activeLayer.noevents"></div>
														</div>
													</div>
												</div>
												
												<div al-if="appData.ui.activeLayer.type == 'link'">
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Normal color in hexadecimal format (#fff or #555555)', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Normal color', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-color vision-long" al-color="appData.ui.activeLayer.link.normalColor"></div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Hover color in hexadecimal format (#fff or #555555)', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Hover color', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-color vision-long" al-color="appData.ui.activeLayer.link.hoverColor"></div>
													</div>
													
													<!--
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Click color in hexadecimal format (#fff or #555555)', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Click color', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-color vision-long" al-color="appData.ui.activeLayer.link.clickColor"></div>
													</div>
													-->
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Sets a radius (5px or 50%)', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Radius', VISION_PLUGIN_NAME); ?></div>
														<input class="vision-number vision-long" type="text" al-text="appData.ui.activeLayer.link.radius" placeholder="<?php _e('Example: 10px', VISION_PLUGIN_NAME); ?>">
													</div>
												</div>
												
												<div al-if="appData.ui.activeLayer.type == 'text'">
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Specifies a font of the text', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Font', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-select vision-capitalize vision-long" al-textfont="appData.ui.activeLayer.text.font" data-fonts="appData.fonts"></div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Text color in hexadecimal format (#fff or #555555)', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Text color', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-color vision-long" al-color="appData.ui.activeLayer.text.color"></div>
													</div>
													
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Sets the text size in px', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Text size [px]', VISION_PLUGIN_NAME); ?></div>
																<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.text.size" placeholder="<?php _e('Example: 18', VISION_PLUGIN_NAME); ?>">
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('Sets the text line height in px', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Line height [px]', VISION_PLUGIN_NAME); ?></div>
																<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.text.lineHeight" placeholder="<?php _e('Example: 18', VISION_PLUGIN_NAME); ?>">
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Specifies the horizontal alignment of the text', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Text align', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-select vision-long" al-textalign="appData.ui.activeLayer.text.align"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('Specifies the spacing behavior between text characters', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Letter spacing [px]', VISION_PLUGIN_NAME); ?></div>
																<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.text.letterSpacing" placeholder="<?php _e('Example: 1', VISION_PLUGIN_NAME); ?>">
															</div>
														</div>
													</div>
												</div>
												
												<div al-if="appData.ui.activeLayer.type == 'image'">
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Sets a background image (jpeg or png format)', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Background image', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell">
																<input class="vision-text vision-long" type="text" al-text="appData.ui.activeLayer.image.background.file.url" placeholder="<?php _e('Select an image', VISION_PLUGIN_NAME); ?>">
															</div>
															<div class="vision-input-group-cell vision-pinch">
																<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.ui.activeLayer.image.background.file)"><span><i class="vision-icon vision-icon-select"></i></span></div>
															</div>
														</div>
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-pinch">
																<div al-checkbox="appData.ui.activeLayer.image.background.file.relative"></div>
															</div>
															<div class="vision-input-group-cell">
																<?php _e('Use relative path', VISION_PLUGIN_NAME); ?>
															</div>
														</div>
													</div>
													
													<!-- background color & repeat -->
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Sets a background color', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Background color', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-color vision-long" al-color="appData.ui.activeLayer.image.background.color"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('How the background image will be repeated', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Background repeat', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-select vision-long" al-backgroundrepeat="appData.ui.activeLayer.image.background.repeat"></div>
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Specifies a size of the background image', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Background size', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-select vision-long" al-backgroundsize="appData.ui.activeLayer.image.background.size"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('Sets a starting position of the background image', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Background position', VISION_PLUGIN_NAME); ?></div>
																<input class="vision-text vision-long" type="text" al-text="appData.ui.activeLayer.image.background.position" placeholder="<?php _e('Example: 50% 50%', VISION_PLUGIN_NAME); ?>">
															</div>
														</div>
													</div>
												</div>
												
												<div al-if="appData.ui.activeLayer.type == 'svg'">
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Set svg file', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('File', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell">
																<input class="vision-text vision-long" type="text" al-text="appData.ui.activeLayer.svg.file.url" placeholder="<?php _e('Select a file', VISION_PLUGIN_NAME); ?>">
															</div>
															<div class="vision-input-group-cell vision-pinch">
																<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.selectImage(appData, appData.rootScope, appData.ui.activeLayer.svg.file)"><span><i class="vision-icon vision-icon-select"></i></span></div>
															</div>
														</div>
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-pinch">
																<div al-checkbox="appData.ui.activeLayer.svg.file.relative"></div>
															</div>
															<div class="vision-input-group-cell">
																<?php _e('Use relative path', VISION_PLUGIN_NAME); ?>
															</div>
														</div>
													</div>
												</div>
												
												<div class="vision-control">
													<div class="vision-helper" title="<?php _e('Set additional css classes to the layer', VISION_PLUGIN_NAME); ?>"></div>
													<div class="vision-label"><?php _e('Additional CSS classes', VISION_PLUGIN_NAME); ?></div>
													<input class="vision-number vision-long" type="text" al-text="appData.ui.activeLayer.className">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="vision-data" al-attr.class.vision-active="appData.ui.layersTabs.tooltip">
									<div class="vision-data-block" al-attr.class.vision-active="appData.ui.activeLayer == null">
										<div class="vision-info"><?php _e('Please, select a layer to view settings', VISION_PLUGIN_NAME); ?></div>
									</div>
									<div class="vision-data-block" al-attr.class.vision-active="appData.ui.activeLayer != null">
										<div class="vision-block vision-block-flat" al-attr.class.vision-block-folded="appData.ui.tooltipTab.data">
											<div class="vision-block-header" al-on.click="appData.fn.onTooltipTab(appData,'data')">
												<div class="vision-block-title"><?php _e('Data', VISION_PLUGIN_NAME); ?></div>
												<div class="vision-block-state"></div>
											</div>
											<div class="vision-block-data">
												<div al-if="appData.ui.activeLayer != null">
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Enable/disable tooltip for the selected layer', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Enable tooltip', VISION_PLUGIN_NAME); ?></div>
														<div al-toggle="appData.ui.activeLayer.tooltip.active"></div>
													</div>
												</div>
												
												<div class="vision-control">
													<?php
														$settings = array(
															'tinymce' => true,
															'textarea_name' => 'vision-tooltip-text',
															'wpautop' => false,
															'editor_height' => 200, // In pixels, takes precedence and has no default value
															'drag_drop_upload' => true,
															'media_buttons' => true,
															'teeny' => true,
															'quicktags' => true
														);
														wp_editor('','vision-tooltip-editor', $settings);
													?>
												</div>
											</div>
										</div>
										
										<div class="vision-block vision-block-flat" al-attr.class.vision-block-folded="appData.ui.tooltipTab.appearance">
											<div class="vision-block-header" al-on.click="appData.fn.onTooltipTab(appData,'appearance')">
												<div class="vision-block-title"><?php _e('Appearance', VISION_PLUGIN_NAME); ?></div>
												<div class="vision-block-state"></div>
											</div>
											<div class="vision-block-data">
												<div al-if="appData.ui.activeLayer != null">
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Specifies a tooltip event trigger', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Trigger', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-select vision-long" al-tooltiptrigger="appData.ui.activeLayer.tooltip.trigger"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('Specifies a tooltip placement', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Placement', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-select vision-long" al-tooltipplacement="appData.ui.activeLayer.tooltip.placement"></div>
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Set tooltip offset', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-label"><?php _e('Offset X [px]', VISION_PLUGIN_NAME); ?></div>
																<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.tooltip.offset.x">
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-label"><?php _e('Offset Y [px]', VISION_PLUGIN_NAME); ?></div>
																<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.tooltip.offset.y">
															</div>
														</div>
													</div>
													
													<div class="vision-control" al-if="appData.ui.activeLayer.tooltip.trigger == 'hover'">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Enable/disable tooltip follow the cursor as you hover over the layer', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Follow the cursor', VISION_PLUGIN_NAME); ?></div>
																<div al-toggle="appData.ui.activeLayer.tooltip.followCursor"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('The tooltip won\'t hide when you hover over or click on them', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Interactive', VISION_PLUGIN_NAME); ?></div>
																<div al-toggle="appData.ui.activeLayer.tooltip.interactive"></div>
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('The tooltip size depends on the image size', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Responsive', VISION_PLUGIN_NAME); ?></div>
																<div al-toggle="appData.ui.activeLayer.tooltip.responsive"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('Determines if the tooltip is placed within the viewport as best it can be if there is not enough space', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Smart', VISION_PLUGIN_NAME); ?></div>
																<div al-toggle="appData.ui.activeLayer.tooltip.smart"></div>
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap" al-attr.class.vision-nogap="appData.ui.activeLayer.tooltip.widthFromCSS">
																<div class="vision-helper" title="<?php _e('If true, the tooltip width will be taken from CSS rules, dont forget to define them', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Width from CSS', VISION_PLUGIN_NAME); ?></div>
																<div al-toggle="appData.ui.activeLayer.tooltip.widthFromCSS"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap" al-if="!appData.ui.activeLayer.tooltip.widthFromCSS">
																<div class="vision-helper" title="<?php _e('Specifies a tooltip width', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Width [px]', VISION_PLUGIN_NAME); ?></div>
																<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.tooltip.width" placeholder="<?php _e('auto', VISION_PLUGIN_NAME); ?>">
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('The tooltip will be shown immediately once the instance is created', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Show on init', VISION_PLUGIN_NAME); ?></div>
														<div al-toggle="appData.ui.activeLayer.tooltip.showOnInit"></div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Set additional css classes to the tooltip', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Additional CSS classes', VISION_PLUGIN_NAME); ?></div>
														<input class="vision-number vision-long" type="text" al-text="appData.ui.activeLayer.tooltip.className">
													</div>
													
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Select a show animation effect for the tooltip from the list or write your own', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Show animation', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-input-group vision-long">
																	<div class="vision-input-group-cell">
																		<input class="vision-text vision-long" type="text" al-text="appData.ui.activeLayer.tooltip.showAnimation">
																	</div>
																	<div class="vision-input-group-cell vision-pinch">
																		<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.selectShowAnimation(appData, appData.ui.activeLayer.tooltip)" title="<?php _e('Select an effect', VISION_PLUGIN_NAME); ?>"><span><i class="vision-icon vision-icon-select"></i></span></div>
																	</div>
																</div>
																</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('Select a hide animation effect for the tooltip from the list or write your own', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Hide animation', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-input-group vision-long">
																	<div class="vision-input-group-cell">
																		<input class="vision-text vision-long" type="text" al-text="appData.ui.activeLayer.tooltip.hideAnimation">
																	</div>
																	<div class="vision-input-group-cell vision-pinch">
																		<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.selectHideAnimation(appData, appData.ui.activeLayer.tooltip)" title="<?php _e('Select an effect', VISION_PLUGIN_NAME); ?>"><span><i class="vision-icon vision-icon-select"></i></span></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Set animation duration for show and hide effects', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Duration [ms]', VISION_PLUGIN_NAME); ?></div>
														<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.tooltip.duration">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="vision-data" al-attr.class.vision-active="appData.ui.layersTabs.popover">
									<div class="vision-data-block" al-attr.class.vision-active="appData.ui.activeLayer == null">
										<div class="vision-info"><?php _e('Please, select a layer to view settings', VISION_PLUGIN_NAME); ?></div>
									</div>
									<div class="vision-data-block" al-attr.class.vision-active="appData.ui.activeLayer != null">
										<div class="vision-block vision-block-flat" al-attr.class.vision-block-folded="appData.ui.popoverTab.data">
											<div class="vision-block-header" al-on.click="appData.fn.onPopoverTab(appData,'data')">
												<div class="vision-block-title"><?php _e('Data', VISION_PLUGIN_NAME); ?></div>
												<div class="vision-block-state"></div>
											</div>
											<div class="vision-block-data">
												<div al-if="appData.ui.activeLayer != null">
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Enable/disable popover for the selected layer', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Enable popover', VISION_PLUGIN_NAME); ?></div>
														<div al-toggle="appData.ui.activeLayer.popover.active"></div>
													</div>
												</div>
												
												<div class="vision-control">
													<?php
														$settings = array(
															'tinymce' => true,
															'textarea_name' => 'vision-popover-text',
															'wpautop' => false,
															'editor_height' => 200, // In pixels, takes precedence and has no default value
															'drag_drop_upload' => true,
															'media_buttons' => true,
															'teeny' => true,
															'quicktags' => true
														);
														wp_editor('','vision-popover-editor', $settings);
													?>
												</div>
											</div>
										</div>
										
										<div class="vision-block vision-block-flat" al-attr.class.vision-block-folded="appData.ui.popoverTab.appearance">
											<div class="vision-block-header" al-on.click="appData.fn.onPopoverTab(appData,'appearance')">
												<div class="vision-block-title"><?php _e('Appearance', VISION_PLUGIN_NAME); ?></div>
												<div class="vision-block-state"></div>
											</div>
											<div class="vision-block-data">
												<div al-if="appData.ui.activeLayer != null">
													<div class="vision-control">
														<div class="vision-input-group vision-long">
															<div class="vision-input-group-cell vision-rgap">
																<div class="vision-helper" title="<?php _e('Specifies a popover desktop type', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Desktop type', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-select vision-long" al-popovertype="appData.ui.activeLayer.popover.type"></div>
															</div>
															<div class="vision-input-group-cell vision-lgap">
																<div class="vision-helper" title="<?php _e('Specifies a popover mobile type', VISION_PLUGIN_NAME); ?>"></div>
																<div class="vision-label"><?php _e('Mobile type', VISION_PLUGIN_NAME); ?></div>
																<div class="vision-select vision-long" al-popovertype="appData.ui.activeLayer.popover.mobileType"></div>
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Specifies the event trigger of the popover', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Trigger', VISION_PLUGIN_NAME); ?></div>
														<div class="vision-select vision-long" al-popovertrigger="appData.ui.activeLayer.popover.trigger"></div>
													</div>
													
													<div al-if="appData.ui.activeLayer.popover.type == 'tooltip' || appData.ui.activeLayer.popover.mobileType == 'tooltip'">
														<div class="vision-control">
															<div class="vision-helper" title="<?php _e('Specifies the placement of the popover', VISION_PLUGIN_NAME); ?>"></div>
															<div class="vision-label"><?php _e('Placement', VISION_PLUGIN_NAME); ?></div>
															<div class="vision-select vision-long" al-popoverplacement="appData.ui.activeLayer.popover.placement"></div>
														</div>
														
														<div class="vision-control">
															<div class="vision-helper" title="<?php _e('Set popover offset', VISION_PLUGIN_NAME); ?>"></div>
															<div class="vision-input-group vision-long">
																<div class="vision-input-group-cell vision-rgap">
																	<div class="vision-label"><?php _e('Offset X [px]', VISION_PLUGIN_NAME); ?></div>
																	<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.popover.offset.x">
																</div>
																<div class="vision-input-group-cell vision-lgap">
																	<div class="vision-label"><?php _e('Offset Y [px]', VISION_PLUGIN_NAME); ?></div>
																	<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.popover.offset.y">
																</div>
															</div>
														</div>
														
														<div class="vision-control">
															<div class="vision-input-group vision-long">
																<div class="vision-input-group-cell vision-rgap">
																	<div class="vision-helper" title="<?php _e('The popover size depends on the image size', VISION_PLUGIN_NAME); ?>"></div>
																	<div class="vision-label"><?php _e('Responsive', VISION_PLUGIN_NAME); ?></div>
																	<div al-toggle="appData.ui.activeLayer.popover.responsive"></div>
																</div>
																<div class="vision-input-group-cell vision-lgap">
																	<div class="vision-helper" title="<?php _e('Determines if the popover is placed within the viewport as best it can be if there is not enough space', VISION_PLUGIN_NAME); ?>"></div>
																	<div class="vision-label"><?php _e('Smart', VISION_PLUGIN_NAME); ?></div>
																	<div al-toggle="appData.ui.activeLayer.popover.smart"></div>
																</div>
															</div>
														</div>
														
														<div class="vision-control">
															<div class="vision-input-group vision-long">
																<div class="vision-input-group-cell vision-rgap" al-attr.class.vision-nogap="appData.ui.activeLayer.popover.widthFromCSS">
																	<div class="vision-helper" title="<?php _e('If true, the tooltip width will be taken from CSS rules, dont forget to define them', VISION_PLUGIN_NAME); ?>"></div>
																	<div class="vision-label"><?php _e('Width from CSS', VISION_PLUGIN_NAME); ?></div>
																	<div al-toggle="appData.ui.activeLayer.popover.widthFromCSS"></div>
																</div>
																<div class="vision-input-group-cell vision-lgap" al-if="!appData.ui.activeLayer.popover.widthFromCSS">
																	<div class="vision-helper" title="<?php _e('Specifies the width of the popover', VISION_PLUGIN_NAME); ?>"></div>
																	<div class="vision-label"><?php _e('Width [px]', VISION_PLUGIN_NAME); ?></div>
																	<input class="vision-number vision-long" al-integer="appData.ui.activeLayer.popover.width" placeholder="<?php _e('auto', VISION_PLUGIN_NAME); ?>">
																</div>
															</div>
														</div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('The popover will be shown immediately once the instance is created', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Show on init', VISION_PLUGIN_NAME); ?></div>
														<div al-toggle="appData.ui.activeLayer.popover.showOnInit"></div>
													</div>
													
													<div class="vision-control">
														<div class="vision-helper" title="<?php _e('Set additional css classes to the popover', VISION_PLUGIN_NAME); ?>"></div>
														<div class="vision-label"><?php _e('Additional CSS classes', VISION_PLUGIN_NAME); ?></div>
														<input class="vision-number vision-long" type="text" al-text="appData.ui.activeLayer.popover.className">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vision-section" al-attr.class.vision-active="appData.ui.tabs.customCSS" al-if="appData.ui.tabs.customCSS">
						<div class="vision-stage">
							<div class="vision-main-panel">
								<div class="vision-data">
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Enable/disable custom styles', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-input-group">
											<div class="vision-input-group-cell vision-pinch">
												<div al-toggle="appData.config.customCSS.active"></div>
											</div>
											<div class="vision-input-group-cell">
												<div class="vision-label"><?php _e('Enable styles', VISION_PLUGIN_NAME); ?></div>
											</div>
										</div>
									</div>
									<div class="vision-control">
										<pre id="vision-notepad-css" class="vision-notepad"></pre>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vision-section" al-attr.class.vision-active="appData.ui.tabs.customJS" al-if="appData.ui.tabs.customJS">
						<div class="vision-stage">
							<div class="vision-main-panel">
								<div class="vision-data">
									<div class="vision-control">
										<div class="vision-helper" title="<?php _e('Enable/disable custom javascript code', VISION_PLUGIN_NAME); ?>"></div>
										<div class="vision-input-group">
											<div class="vision-input-group-cell vision-pinch">
												<div al-toggle="appData.config.customJS.active"></div>
											</div>
											<div class="vision-input-group-cell">
												<div class="vision-label"><?php _e('Enable javascript code', VISION_PLUGIN_NAME); ?></div>
											</div>
										</div>
									</div>
									<div class="vision-control">
										<pre id="vision-notepad-js" class="vision-notepad"></pre>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vision-section" al-attr.class.vision-active="appData.ui.tabs.shortcode" al-if="appData.wp_item_id">
						<div class="vision-main-panel">
							<div class="vision-data">
								<h3><?php _e('Use a shortcode like the one below, simply copy and paste it into a post or page.', VISION_PLUGIN_NAME); ?></h3>
								
								<div class="vision-control">
									<div class="vision-label"><?php _e('Standard shortcode', VISION_PLUGIN_NAME); ?></div>
									<div class="vision-input-group">
										<div class="vision-input-group-cell">
											<input id="vision-shortcode-1" class="vision-text vision-long" type="text" value='[vision id="{{appData.wp_item_id}}"]' readonly="readonly">
										</div>
										<div class="vision-input-group-cell vision-pinch">
											<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.copyToClipboard(appData, '#vision-shortcode-1')" title="<?php _e('Copy to clipboard', VISION_PLUGIN_NAME); ?>"><span><i class="vision-icon vision-icon-copy"></i></span></div>
										</div>
									</div>
								</div>
								
								<div class="vision-control ">
									<div class="vision-label"><?php _e('Shortcode with custom CSS classes', VISION_PLUGIN_NAME); ?></div>
									<div class="vision-input-group">
										<div class="vision-input-group-cell">
											<input id="vision-shortcode-2" class="vision-text vision-long" type="text" value='[vision id="{{appData.wp_item_id}}" class="your-css-custom-class"]' readonly="readonly">
										</div>
										<div class="vision-input-group-cell vision-pinch">
											<div class="vision-btn vision-default vision-no-bl" al-on.click="appData.fn.copyToClipboard(appData, '#vision-shortcode-2')" title="<?php _e('Copy to clipboard', VISION_PLUGIN_NAME); ?>"><span><i class="vision-icon vision-icon-copy"></i></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="vision-modals" class="vision-modals">
		</div>
	</div>
	<!-- /end vision app -->
</div>