"use strict";
function templateForCustomFont(icon) {
  var originalOption = icon.element;
  var $icon_block = '<span class="' + $(originalOption).data('icon') + '"></span>' + icon.text;
  var $html = $("<div></div>").html($icon_block).addClass('icon-wrapper');
  return $html;

}
(function ($) {
// option format function for select 2 icon
function onReadyScripts() {
  $('.select2_font_awesome').select2({
    width: "100%",
    templateResult: templateForCustomFont,
    templateSelection: templateForCustomFont,
  });
}
$(document).ready(function () {
 if ($('.select2_font_awesome').length) {
  onReadyScripts();
}

})
// jquery passing
})(jQuery);
