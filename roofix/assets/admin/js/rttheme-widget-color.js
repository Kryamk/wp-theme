jQuery( document ).ready( function( $ ) {
	$( '.colorpicker' ).wpColorPicker();	
	
	$('.color-picker').wpColorPicker({
		change: function (event, ui) {
			var _self = $(this),
				parent = _self.parents('form'),
				targetBtn = $('input[name="savewidget"]', parent);
				targetBtn.prop('disabled', false).val('Save');
		}
	});
} ); 
