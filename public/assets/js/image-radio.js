jQuery(document).ready((function(){wp.customize.controlConstructor["radio-image"]=wp.customize.Control.extend({ready:function(){var t=this,n=void 0!==t.setting._value?t.setting._value:"";this.container.on("change","input:radio",(function(){n=jQuery(this).val(),t.setting.set(n)}))}})}));