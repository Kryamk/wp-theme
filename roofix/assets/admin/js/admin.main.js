"use strict";

(function ($) {
	
	function templateForCustomFont(icon) {
		var originalOption = icon.element;
		var $icon_block = '<span class="' + $(originalOption).data('icon') + '"></span>' + icon.text;
		var $html = $("<div></div>").html($icon_block).addClass('icon-wrapper');
		return $html;
	}

	// option format function for select 2 icon
	function onReadyScripts() {
		if ($.fn.select2) {
			$('.select2_font_awesome').select2({
			width: "100%",
			templateResult: templateForCustomFont,
			templateSelection: templateForCustomFont,
			});
		}
	}

	$(document).ready(function () {
		onReadyScripts();
	})

// jquery passing
})(jQuery);