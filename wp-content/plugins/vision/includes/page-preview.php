<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

$id = filter_input(INPUT_GET, 'vision', FILTER_SANITIZE_NUMBER_INT);
$class = NULL;

global $wpdb;
$table = $wpdb->prefix . VISION_PLUGIN_NAME;
$upload_dir = wp_upload_dir();

$query = $wpdb->prepare('SELECT * FROM ' . $table . ' WHERE id=%s', $id);
$item = $wpdb->get_row($query, OBJECT);
if($item) {
	$version = strtotime(mysql2date('d M Y H:i:s', $item->modified));
	$itemData = unserialize($item->data);
	$id = $item->id;
	$id_postfix = strtolower(wp_generate_password(5, false)); // generate unique postfix for $id to avoid clashes with multiple same shortcode use
	$id_element = 'vision-' . $id . '-' . $id_postfix;
	$plugin_url = plugin_dir_url(dirname(__FILE__));
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="Vision Preview">
<title>Vision Preview</title>
<script type="text/javascript">
/* <![CDATA[ */
var vision_globals = {
	"plan":"<?php echo VISION_PLUGIN_PLAN; ?>",
	"version":"<?php echo $version; ?>",
	"effects_url":"<?php echo $plugin_url . 'assets/css/vision-effects.min.css'; ?>",
	"theme_base_url":"<?php echo $plugin_url . 'assets/themes/'; ?>",
	"plugin_base_url":"<?php echo $plugin_url . 'assets/js/lib/vision/'; ?>",
	"plugin_upload_base_url":"<?php echo VISION_PLUGIN_UPLOAD_URL; ?>"
};
/* ]]> */
</script>
<script type="text/javascript" src="<?php echo $plugin_url . 'assets/js/lib/jquery/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo $plugin_url . 'assets/js/loader.min.js'?>"></script>
<style>
body,
html {
	margin:0;
	padding:0;
}
body {
	background:#fbfbfb;
	background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAC1JREFUeNpiPHPmDAM2YGxsjFWciYFEMKqBGMD4//9/rBJnz54dDSX6aQAIMABCtQiAsDRF+wAAAABJRU5ErkJggg==');
	overflow:hidden;
}
.vision-map-wrap {
	position:absolute;
	top:30%;
	left:30%;
	right:30%;
	bottom:30%;
	display:flex;
	align-items:center;
	justify-content:center;
	box-sizing:border-box;
}
.vision-map-wrap .vision-map {
	width:100%;
}
@media screen and (max-width: 782px) {
	.vision-map-wrap {
		top:5%;
		left:5%;
		right:5%;
		bottom:5%;
	}
}
</style>
</head>
<body>
<div class="vision-map-wrap">
<?php
	ob_start(); // turn on buffering
	
	echo '<!-- vision begin -->' . PHP_EOL;
	
	echo '<div ';
	echo 'id="' . $id_element . '" ';
	echo 'class="vision-map vision-map-' . $id . ($class ? ' ' . $class : '') . '"';
	echo 'data-json-src="'. VISION_PLUGIN_UPLOAD_URL . $item->id . '/config.json?ver=' . $version . '" ';
	echo 'data-item-id="' . $item->id . '" ';
	echo 'tabindex="1" ';
	echo 'style="display:none;" ';
	echo '>' . PHP_EOL;
		
		//=============================================
		// STORE BEGIN
		echo '<div class="vision-store">' . PHP_EOL;
		
		$layerId = 0;
		foreach($itemData->layers as $layerKey => $layer) {
			if(!$layer->visible) {
				continue;
			}
			
			$layerId++;
			//=============================================
			// LAYER BEGIN
			echo '<div class="vision-lr vision-lr-' . $layerId . ' vision-lr-type-' . $layer->type . '" ';
			echo 'data-id="' . $layerId . '" ';
			echo ($this->IsNullOrEmptyString($layer->title) ? '' : 'data-title="' . $layer->title . '" ');
			echo '>';
			
			if($layer->type == 'text') {
				echo $layer->text->data;
			}
			
			if($layer->type == 'svg') {
				if(!$this->IsNullOrEmptyString($layer->svg->file->url)) {
					$svgUrl = ($layer->svg->file->url ? ($layer->svg->file->relative ? $upload_dir['baseurl'] : '') . $layer->svg->file->url : '');
					echo file_get_contents($svgUrl, FILE_USE_INCLUDE_PATH);
				}
			}
			
			echo '</div>' . PHP_EOL;
			// LAYER END
			//=============================================
		}
		
		$layerId = 0;
		foreach($itemData->layers as $layerKey => $layer) {
			if(!$layer->visible) {
				continue;
			}
			
			$layerId++;
			//=============================================
			// TOOLTIP BEGIN
			echo '<div ';
			echo 'class="vision-tt vision-tt-' . $layerId . '" ';
			echo 'data-id="' . $layerId . '" ';
			echo '>';
			echo do_shortcode($layer->tooltip->data);
			echo '</div>' . PHP_EOL;
			// TOOLTIP END
			//=============================================
		}
		
		$layerId = 0;
		foreach($itemData->layers as $layerKey => $layer) {
			if(!$layer->visible) {
				continue;
			}
			
			$layerId++;
			//=============================================
			// POPOVER BEGIN
			echo '<div ';
			echo 'class="vision-pp vision-pp-' . $layerId . '" ';
			echo 'data-id="' . $layerId . '" ';
			echo '>';
			echo do_shortcode($layer->popover->data);
			echo '</div>' . PHP_EOL;
			// POPOVER END
			//=============================================
		}
		echo '</div>' . PHP_EOL;
		// STORE END
		//=============================================
		
	echo '</div>' . PHP_EOL;
	echo '<!-- vision end -->' . PHP_EOL;
	
	$output = ob_get_contents(); // get the buffered content into a var
	ob_end_clean(); // clean buffer
	
	echo $output;
?>
</div>
</body>
</html>
<?php
} else {
	echo '<p>' . __('Error: invalid vision database record', VISION_PLUGIN_NAME) . '</p>';
	die;
}
?>
