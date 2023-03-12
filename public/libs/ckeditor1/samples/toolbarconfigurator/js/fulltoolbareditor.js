"use strict";var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t};window.ToolbarConfigurator={},function(){function a(){this.instanceid="fte"+CKEDITOR.tools.getNextId(),this.textarea=new CKEDITOR.dom.element("textarea"),this.textarea.setAttributes({id:this.instanceid,name:this.instanceid,contentEditable:!0}),this.editorInstance=this.buttons=null}(ToolbarConfigurator.FullToolbarEditor=a).prototype.init=function(e){var n=this;document.body.appendChild(this.textarea.$),CKEDITOR.replace(this.instanceid),this.editorInstance=CKEDITOR.instances[this.instanceid],this.editorInstance.once("configLoaded",function(t){var o=t.editor.config;delete o.removeButtons,delete o.toolbarGroups,delete o.toolbar,ToolbarConfigurator.AbstractToolbarModifier.extendPluginsConfig(o),t.editor.once("loaded",function(){n.buttons=a.toolbarToButtons(n.editorInstance.toolbar),n.buttonsByGroup=a.groupButtons(n.buttons),n.buttonNamesByGroup=n.groupButtonNamesByGroup(n.buttons),t.editor.container.hide(),"function"==typeof e&&e(n.buttons)})})},a.prototype.groupButtonNamesByGroup=function(t){var o=this;for(var e in t=a.groupButtons(t))t[e]=a.map(t[e],function(t){return o.getCamelCasedButtonName(t.name)});return t},a.prototype.getGroupByName=function(t){for(var o=this.editorInstance.config.toolbarGroups||this.getFullToolbarGroupsConfig(),e=o.length,n=0;n<e;n+=1)if(o[n].name===t)return o[n];return null},a.prototype.getCamelCasedButtonName=function(t){var o,e=this.editorInstance.ui.items;for(o in e)if(e[o].name==t)return o;return null},a.prototype.getFullToolbarGroupsConfig=function(t){t=!0===t;for(var o=[],e=this.editorInstance.toolbar,n=e.length,r=0;r<n;r+=1){var a=e[r],i={};"string"!=typeof a.name?t&&o.push("/"):(i.name=a.name,a.groups&&(i.groups=Array.prototype.slice.call(a.groups)),o.push(i))}return o},a.filter=function(t,o){for(var e=t&&t.length?t.length:0,n=[],r=0;r<e;r+=1)o(t[r])&&n.push(t[r]);return n},a.map=function(t,o){var e;if(CKEDITOR.tools.isArray(t)){e=[];for(var n=t.length,r=0;r<n;r+=1)e.push(o(t[r]))}else for(n in e={},t)e[n]=o(t[n]);return e},a.groupButtons=function(t){for(var o={},e=t.length,n=0;n<e;n+=1){var r=t[n],a=r.toolbar.split(",")[0];o[a]=o[a]||[],o[a].push(r)}return o},a.toolbarToButtons=function(t){for(var o=[],e=t.length,n=0;n<e;n+=1)"object"==_typeof(t[n])&&(o=o.concat(a.groupToButtons(t[n])));return o},a.createToolbarButton=function(t){var o=new CKEDITOR.dom.element("a"),e=a.createIcon(t.name,t.icon,t.command);if(o.setStyle("float","none"),o.addClass("cke_"+("rtl"==CKEDITOR.lang.dir?"rtl":"ltr")),t instanceof CKEDITOR.ui.button)o.addClass("cke_button"),o.addClass("cke_toolgroup"),o.append(e);else if(CKEDITOR.ui.richCombo&&t instanceof CKEDITOR.ui.richCombo){e=new CKEDITOR.dom.element("span");var n=new CKEDITOR.dom.element("span"),r=new CKEDITOR.dom.element("span");o.addClass("cke_combo_button"),e.addClass("cke_combo_text"),e.addClass("cke_combo_inlinelabel"),e.setText(t.label),n.addClass("cke_combo_open"),r.addClass("cke_combo_arrow"),n.append(r),o.append(e),o.append(n)}return o},a.createIcon=function(t,o,e){var n=(n=(n=CKEDITOR.skin.getIconStyle(t,"rtl"==CKEDITOR.lang.dir))||CKEDITOR.skin.getIconStyle(o,"rtl"==CKEDITOR.lang.dir))||CKEDITOR.skin.getIconStyle(e,"rtl"==CKEDITOR.lang.dir);return(o=new CKEDITOR.dom.element("span")).addClass("cke_button_icon"),o.addClass("cke_button__"+t+"_icon"),o.setAttribute("style",n),o.setStyle("float","none"),o},a.createButton=function(t,o){var e=new CKEDITOR.dom.element("button");if(e.addClass("button-a"),e.setAttribute("type","button"),"string"==typeof o)for(var n=(o=o.split(" ")).length;n--;)e.addClass(o[n]);return e.setHtml(t),e},a.groupToButtons=function(t){for(var o=[],e=(t=t.items)?t.length:0,n=0;n<e;n+=1){var r=t[n];(r instanceof CKEDITOR.ui.button||CKEDITOR.ui.richCombo&&r instanceof CKEDITOR.ui.richCombo)&&(r.$=a.createToolbarButton(r),o.push(r))}return o}}();