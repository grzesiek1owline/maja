function dtwpb_options_remove(element){
	var $this = jQuery(element);
	$this.closest('tr').remove();
	return false;
}
function dtwpb_options_add(element){
	var $this = jQuery(element);
	var option_list = $this.closest('.dtwpb_options-list'),
		option_table = option_list.find('table tbody');
	var tmpl = jQuery(dtwpb_L10n.dtwpb_options_tmpl);
	option_table.append(tmpl);
	return false;
}

;(function ($) {
	"use strict";
	if(_.isUndefined(window.vc))
		return;
	
	vc.edit_form_callbacks.push(function() {
		var model = this.$el;
		var dtwpb_options = model.find('.dtwpb_options-list');
		if(dtwpb_options.length){
			var options = [];
			dtwpb_options.find('table tbody tr').each(function(){
				var $this = $(this);
				var option = {};
				option['label'] = $this.find('#content').find('input[name="label"]').val();
				option['value'] = $this.find('#content').find('input[name="value"]').val();
//				option['content'] = $this.find('#content').html();
				options.push(option);
			});
			if(_.isEmpty(options)){
				this.params.extra_options='';
			}else{
				var options_json = JSON.stringify(options);
				this.params.extra_options = base64_encode(options_json);
				console.log(this.params.extra_options);
			}
		}
	});
})(window.jQuery);