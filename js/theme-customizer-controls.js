(function(a){a(function(){a(document).on("click","#caweb-icon-menu.autoUpdate li,.caweb-icon-menu.autoUpdate li",function(b){cawebIconSelected(this,true)});a(document).on("click","#caweb-icon-menu.noUpdate li,.caweb-icon-menu.noUpdate li",function(b){cawebIconSelected(this,false)})})})(jQuery);function cawebIconSelected(c,a){var b=c.parentNode.getElementsByTagName("LI");for(o=0;o<b.length-1;o++){b[o].classList.remove("selected")}c.classList.add("selected");if(a){c.parentNode.lastElementChild.value=c.title;$(c.parentNode.lastElementChild).change()}}function resetIconSelect(c,a){var b=c.getElementsByTagName("LI");for(o=0;o<b.length-1;o++){b[o].classList.remove("selected")}if(a){c.lastElementChild.value="";$(c.lastElementChild).change()}};
(function(){$(document).ready(function(){var a=wp.customize;b();$('select[data-customize-setting-link="ca_site_version"]').on("change",b);$("span.resetGoogleIcon").on("click",function(d){var c=$(this).parent().parent().find("#caweb-icon-menu");resetIconSelect(c[0],true)});function b(){var c=4>=a._value.ca_site_version._value?colorschemes.original:colorschemes.all;$('select[data-customize-setting-link="ca_site_color_scheme"]').find("option").remove();Object.keys(c).forEach(function(d){$('select[data-customize-setting-link="ca_site_color_scheme"]').append($("<option>",{value:d,text:c[d]}))});if(a._value.ca_site_color_scheme._value in c){$('select[data-customize-setting-link="ca_site_color_scheme"] option[value="'+a._value.ca_site_color_scheme._value+'"]')[0].selected=true}else{a._value.ca_site_color_scheme._value="oceanside";$('select[data-customize-setting-link="ca_site_color_scheme"] option[value="oceanside"]')[0].selected=true}}})})(jQuery);