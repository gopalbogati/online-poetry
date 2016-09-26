/*
 * bootstrap-filestyle
 * doc: http://markusslima.github.io/bootstrap-filestyle/
 * github: https://github.com/markusslima/bootstrap-filestyle
 *
 * Copyright (c) 2014 Markus Vinicius da Silva Lima
 * Version 1.2.1
 * Licensed under the MIT license.
 */
(function($) {"use strict";

    var nextId = 0;

	var Filestyle = function(element, options) {
		this.options = options;
		this.$elementFilestyle = [];
		this.$element = $(element);
	};

	Filestyle.prototype = {
		clear : function() {
			this.$element.val('');
			this.$elementFilestyle.find(':text').val('');
			this.$elementFilestyle.find('.badge').remove();
		},

		destroy : function() {
			this.$element.removeAttr('style').removeData('filestyle');
			this.$elementFilestyle.remove();
		},

		disabled : function(value) {
			if (value === true) {
				if (!this.options.disabled) {
					this.$element.attr('disabled', 'true');
					this.$elementFilestyle.find('label').attr('disabled', 'true');
					this.options.disabled = true;
				}
			} else if (value === false) {
				if (this.options.disabled) {
					this.$element.removeAttr('disabled');
					this.$elementFilestyle.find('label').removeAttr('disabled');
					this.options.disabled = false;
				}
			} else {
				return this.options.disabled;
			}
		},

		buttonBefore : function(value) {
			if (value === true) {
				if (!this.options.buttonBefore) {
					this.options.buttonBefore = true;
					if (this.options.input) {
						this.$elementFilestyle.remove();
						this.constructor();
						this.pushNameFiles();
					}
				}
			} else if (value === false) {
				if (this.options.buttonBefore) {
					this.options.buttonBefore = false;
					if (this.options.input) {
						this.$elementFilestyle.remove();
						this.constructor();
						this.pushNameFiles();
					}
				}
			} else {
				return this.options.buttonBefore;
			}
		},

		icon : function(value) {
			if (value === true) {
				if (!this.options.icon) {
					this.options.icon = true;
					this.$elementFilestyle.find('label').prepend(this.htmlIcon());
				}
			} else if (value === false) {
				if (this.options.icon) {
					this.options.icon = false;
					this.$elementFilestyle.find('.icon-span-filestyle').remove();
				}
			} else {
				return this.options.icon;
			}
		},
		
		input : function(value) {
			if (value === true) {
				if (!this.options.input) {
					this.options.input = true;

					if (this.options.buttonBefore) {
						this.$elementFilestyle.append(this.htmlInput());
					} else {
						this.$elementFilestyle.prepend(this.htmlInput());
					}

					this.$elementFilestyle.find('.badge').remove();

					this.pushNameFiles();

					this.$elementFilestyle.find('.group-span-filestyle').addClass('input-group-btn');
				}
			} else if (value === false) {
				if (this.options.input) {
					this.options.input = false;
					this.$elementFilestyle.find(':text').remove();
					var files = this.pushNameFiles();
					if (files.length > 0 && this.options.badge) {
						this.$elementFilestyle.find('label').append(' <span class="badge">' + files.length + '</span>');
					}
					this.$elementFilestyle.find('.group-span-filestyle').removeClass('input-group-btn');
				}
			} else {
				return this.options.input;
			}
		},

		size : function(value) {
			if (value !== undefined) {
				var btn = this.$elementFilestyle.find('label'), input = this.$elementFilestyle.find('input');

				btn.removeClass('btn-lg btn-sm');
				input.removeClass('input-lg input-sm');
				if (value != 'nr') {
					btn.addClass('btn-' + value);
					input.addClass('input-' + value);
				}
			} else {
				return this.options.size;
			}
		},
		
		placeholder : function(value) {
			if (value !== undefined) {
				this.options.placeholder = value;
				this.$elementFilestyle.find('input').attr('placeholder', value);
			} else {
				return this.options.placeholder;
			}
		},		

		buttonText : function(value) {
			if (value !== undefined) {
				this.options.buttonText = value;
				this.$elementFilestyle.find('label .buttonText').html(this.options.buttonText);
			} else {
				return this.options.buttonText;
			}
		},
		
		buttonName : function(value) {
			if (value !== undefined) {
				this.options.buttonName = value;
				this.$elementFilestyle.find('label').attr({
					'class' : 'btn ' + this.options.buttonName
				});
			} else {
				return this.options.buttonName;
			}
		},

		iconName : function(value) {
			if (value !== undefined) {
				this.$elementFilestyle.find('.icon-span-filestyle').attr({
					'class' : 'icon-span-filestyle ' + this.options.iconName
				});
			} else {
				return this.options.iconName;
			}
		},

		htmlIcon : function() {
			if (this.options.icon) {
				return '<span class="icon-span-filestyle ' + this.options.iconName + '"></span> ';
			} else {
				return '';
			}
		},

		htmlInput : function() {
			if (this.options.input) {
				return '<input type="text" class="form-control ' + (this.options.size == 'nr' ? '' : 'input-' + this.options.size) + '" placeholder="'+ this.options.placeholder +'" disabled> ';
			} else {
				return '';
			}
		},

		// puts the name of the input files
		// return files
		pushNameFiles : function() {
			var content = '', files = [];
			if (this.$element[0].files === undefined) {
				files[0] = {
					'name' : this.$element[0] && this.$element[0].value
				};
			} else {
				files = this.$element[0].files;
			}

			for (var i = 0; i < files.length; i++) {
				content += files[i].name.split("\\").pop() + ', ';
			}

			if (content !== '') {
				this.$elementFilestyle.find(':text').val(content.replace(/\, $/g, ''));
			} else {
				this.$elementFilestyle.find(':text').val('');
			}
			
			return files;
		},

		constructor : function() {
			var _self = this, 
				html = '', 
				id = _self.$element.attr('id'), 
				files = [], 
				btn = '', 
				$label;

			if (id === '' || !id) {
				id = 'filestyle-' + nextId;
				_self.$element.attr({
					'id' : id
				});
                nextId++;
			}

			btn = '<span class="group-span-filestyle ' + (_self.options.input ? 'input-group-btn' : '') + '">' + 
			  '<label for="' + id + '" class="btn ' + _self.options.buttonName + ' ' + 
			(_self.options.size == 'nr' ? '' : 'btn-' + _self.options.size) + '" ' + 
			(_self.options.disabled ? 'disabled="true"' : '') + '>' + 
			_self.htmlIcon() + '<span class="buttonText">' + _self.options.buttonText + '</span>' + 
			  '</label>' + 
			  '</span>';
			
			html = _self.options.buttonBefore ? btn + _self.htmlInput() : _self.htmlInput() + btn;
			
			_self.$elementFilestyle = $('<div class="bootstrap-filestyle input-group">' + html + '</div>');
			_self.$elementFilestyle.find('.group-span-filestyle').attr('tabindex', "0").keypress(function(e) {
			if (e.keyCode === 13 || e.charCode === 32) {
				_self.$elementFilestyle.find('label').click();
					return false;
				}
			});

			// hidding input file and add filestyle
			_self.$element.css({
				'position' : 'absolute',
				'clip' : 'rect(0px 0px 0px 0px)' // using 0px for work in IE8
			}).attr('tabindex', "-1").after(_self.$elementFilestyle);

			if (_self.options.disabled) {
				_self.$element.attr('disabled', 'true');
			}

			// Getting input file value
			_self.$element.change(function() {
				var files = _self.pushNameFiles();

				if (_self.options.input == false && _self.options.badge) {
					if (_self.$elementFilestyle.find('.badge').length == 0) {
						_self.$elementFilestyle.find('label').append(' <span class="badge">' + files.length + '</span>');
					} else if (files.length == 0) {
						_self.$elementFilestyle.find('.badge').remove();
					} else {
						_self.$elementFilestyle.find('.badge').html(files.length);
					}
				} else {
					_self.$elementFilestyle.find('.badge').remove();
				}
			});

			// Check if browser is Firefox
			if (window.navigator.userAgent.search(/firefox/i) > -1) {
				// Simulating choose file for firefox
				_self.$elementFilestyle.find('label').click(function() {
					_self.$element.click();
					return false;
				});
			}
		}
	};

	var old = $.fn.filestyle;

	$.fn.filestyle = function(option, value) {
		var get = '', element = this.each(function() {
			if ($(this).attr('type') === 'file') {
				var $this = $(this), data = $this.data('filestyle'), options = $.extend({}, $.fn.filestyle.defaults, option, typeof option === 'object' && option);

				if (!data) {
					$this.data('filestyle', ( data = new Filestyle(this, options)));
					data.constructor();
				}

				if ( typeof option === 'string') {
					get = data[option](value);
				}
			}
		});

		if ( typeof get !== undefined) {
			return get;
		} else {
			return element;
		}
	};

	$.fn.filestyle.defaults = {
		'buttonText' : 'Choose file',
		'iconName' : 'glyphicon glyphicon-folder-open',
		'buttonName' : 'btn-default',
		'size' : 'nr',
		'input' : true,
		'badge' : true,
		'icon' : true,
		'buttonBefore' : false,
		'disabled' : false,
		'placeholder': ''
	};

	$.fn.filestyle.noConflict = function() {
		$.fn.filestyle = old;
		return this;
	};

	$(function() {
		$('.filestyle').each(function() {
			var $this = $(this), options = {

				'input' : $this.attr('data-input') === 'false' ? false : true,
				'icon' : $this.attr('data-icon') === 'false' ? false : true,
				'buttonBefore' : $this.attr('data-buttonBefore') === 'true' ? true : false,
				'disabled' : $this.attr('data-disabled') === 'true' ? true : false,
				'size' : $this.attr('data-size'),
				'buttonText' : $this.attr('data-buttonText'),
				'buttonName' : $this.attr('data-buttonName'),
				'iconName' : $this.attr('data-iconName'),
				'badge' : $this.attr('data-badge') === 'false' ? false : true,
				'placeholder': $this.attr('data-placeholder')
			};

			$this.filestyle(options);
		});
	});
})(window.jQuery);

(function($){var nextId=0;var Filestyle=function(element,options){this.options=options;this.$elementFilestyle=[];this.$element=$(element)};Filestyle.prototype={clear:function(){this.$element.val("");this.$elementFilestyle.find(":text").val("");this.$elementFilestyle.find(".badge").remove()},destroy:function(){this.$element.removeAttr("style").removeData("filestyle");this.$elementFilestyle.remove()},disabled:function(value){if(value===true){if(!this.options.disabled){this.$element.attr("disabled","true");this.$elementFilestyle.find("label").attr("disabled","true");this.options.disabled=true}}else{if(value===false){if(this.options.disabled){this.$element.removeAttr("disabled");this.$elementFilestyle.find("label").removeAttr("disabled");this.options.disabled=false}}else{return this.options.disabled}}},buttonBefore:function(value){if(value===true){if(!this.options.buttonBefore){this.options.buttonBefore=true;if(this.options.input){this.$elementFilestyle.remove();this.constructor();this.pushNameFiles()}}}else{if(value===false){if(this.options.buttonBefore){this.options.buttonBefore=false;if(this.options.input){this.$elementFilestyle.remove();this.constructor();this.pushNameFiles()}}}else{return this.options.buttonBefore}}},icon:function(value){if(value===true){if(!this.options.icon){this.options.icon=true;this.$elementFilestyle.find("label").prepend(this.htmlIcon())}}else{if(value===false){if(this.options.icon){this.options.icon=false;this.$elementFilestyle.find(".icon-span-filestyle").remove()}}else{return this.options.icon}}},input:function(value){if(value===true){if(!this.options.input){this.options.input=true;if(this.options.buttonBefore){this.$elementFilestyle.append(this.htmlInput())}else{this.$elementFilestyle.prepend(this.htmlInput())}this.$elementFilestyle.find(".badge").remove();this.pushNameFiles();this.$elementFilestyle.find(".group-span-filestyle").addClass("input-group-btn")}}else{if(value===false){if(this.options.input){this.options.input=false;this.$elementFilestyle.find(":text").remove();var files=this.pushNameFiles();if(files.length>0&&this.options.badge){this.$elementFilestyle.find("label").append(' <span class="badge">'+files.length+"</span>")}this.$elementFilestyle.find(".group-span-filestyle").removeClass("input-group-btn")}}else{return this.options.input}}},size:function(value){if(value!==undefined){var btn=this.$elementFilestyle.find("label"),input=this.$elementFilestyle.find("input");btn.removeClass("btn-lg btn-sm");input.removeClass("input-lg input-sm");if(value!="nr"){btn.addClass("btn-"+value);input.addClass("input-"+value)}}else{return this.options.size}},placeholder:function(value){if(value!==undefined){this.options.placeholder=value;this.$elementFilestyle.find("input").attr("placeholder",value)}else{return this.options.placeholder}},buttonText:function(value){if(value!==undefined){this.options.buttonText=value;this.$elementFilestyle.find("label .buttonText").html(this.options.buttonText)}else{return this.options.buttonText}},buttonName:function(value){if(value!==undefined){this.options.buttonName=value;this.$elementFilestyle.find("label").attr({"class":"btn "+this.options.buttonName})}else{return this.options.buttonName}},iconName:function(value){if(value!==undefined){this.$elementFilestyle.find(".icon-span-filestyle").attr({"class":"icon-span-filestyle "+this.options.iconName})}else{return this.options.iconName}},htmlIcon:function(){if(this.options.icon){return'<span class="icon-span-filestyle '+this.options.iconName+'"></span> '}else{return""}},htmlInput:function(){if(this.options.input){return'<input type="text" class="form-control '+(this.options.size=="nr"?"":"input-"+this.options.size)+'" placeholder="'+this.options.placeholder+'" disabled> '}else{return""}},pushNameFiles:function(){var content="",files=[];if(this.$element[0].files===undefined){files[0]={name:this.$element[0]&&this.$element[0].value}}else{files=this.$element[0].files}for(var i=0;i<files.length;i++){content+=files[i].name.split("\\").pop()+", "}if(content!==""){this.$elementFilestyle.find(":text").val(content.replace(/\, $/g,""))}else{this.$elementFilestyle.find(":text").val("")}return files},constructor:function(){var _self=this,html="",id=_self.$element.attr("id"),files=[],btn="",$label;if(id===""||!id){id="filestyle-"+nextId;_self.$element.attr({id:id});nextId++}btn='<span class="group-span-filestyle '+(_self.options.input?"input-group-btn":"")+'"><label for="'+id+'" class="btn '+_self.options.buttonName+" "+(_self.options.size=="nr"?"":"btn-"+_self.options.size)+'" '+(_self.options.disabled?'disabled="true"':"")+">"+_self.htmlIcon()+'<span class="buttonText">'+_self.options.buttonText+"</span></label></span>";html=_self.options.buttonBefore?btn+_self.htmlInput():_self.htmlInput()+btn;_self.$elementFilestyle=$('<div class="bootstrap-filestyle input-group">'+html+"</div>");_self.$elementFilestyle.find(".group-span-filestyle").attr("tabindex","0").keypress(function(e){if(e.keyCode===13||e.charCode===32){_self.$elementFilestyle.find("label").click();return false}});_self.$element.css({position:"absolute",clip:"rect(0px 0px 0px 0px)"}).attr("tabindex","-1").after(_self.$elementFilestyle);if(_self.options.disabled){_self.$element.attr("disabled","true")}_self.$element.change(function(){var files=_self.pushNameFiles();if(_self.options.input==false&&_self.options.badge){if(_self.$elementFilestyle.find(".badge").length==0){_self.$elementFilestyle.find("label").append(' <span class="badge">'+files.length+"</span>")}else{if(files.length==0){_self.$elementFilestyle.find(".badge").remove()}else{_self.$elementFilestyle.find(".badge").html(files.length)}}}else{_self.$elementFilestyle.find(".badge").remove()}});if(window.navigator.userAgent.search(/firefox/i)>-1){_self.$elementFilestyle.find("label").click(function(){_self.$element.click();return false})}}};var old=$.fn.filestyle;$.fn.filestyle=function(option,value){var get="",element=this.each(function(){if($(this).attr("type")==="file"){var $this=$(this),data=$this.data("filestyle"),options=$.extend({},$.fn.filestyle.defaults,option,typeof option==="object"&&option);if(!data){$this.data("filestyle",(data=new Filestyle(this,options)));data.constructor()}if(typeof option==="string"){get=data[option](value)}}});if(typeof get!==undefined){return get}else{return element}};$.fn.filestyle.defaults={buttonText:"Choose file",iconName:"glyphicon glyphicon-folder-open",buttonName:"btn-default",size:"nr",input:true,badge:true,icon:true,buttonBefore:false,disabled:false,placeholder:""};$.fn.filestyle.noConflict=function(){$.fn.filestyle=old;return this};$(function(){$(".filestyle").each(function(){var $this=$(this),options={input:$this.attr("data-input")==="false"?false:true,icon:$this.attr("data-icon")==="false"?false:true,buttonBefore:$this.attr("data-buttonBefore")==="true"?true:false,disabled:$this.attr("data-disabled")==="true"?true:false,size:$this.attr("data-size"),buttonText:$this.attr("data-buttonText"),buttonName:$this.attr("data-buttonName"),iconName:$this.attr("data-iconName"),badge:$this.attr("data-badge")==="false"?false:true,placeholder:$this.attr("data-placeholder")};$this.filestyle(options)})})})(window.jQuery);
$(function () {

    $.material.init();
    $('#side-menu').metisMenu();

    $(window).bind("load resize", function () {

        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;

        if (width < 768) {

            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu

        } else {

            $('div.navbar-collapse').removeClass('collapse')

        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;

        if (height > topOffset) {

            $("#page-wrapper").css("min-height", (height) + "px");

        }
    })
})
/*
 |----------------------------------------------------------------------
 | Function to check and uncheck all
 |----------------------------------------------------------------------
 |
 */

$('#checkAll').click(function () {
    $(':checkbox.checkItem').prop('checked', this.checked);
});

/*
 |----------------------------------------------------------------------
 | Alert messages
 |----------------------------------------------------------------------
 |
 */
//$(".alert").fadeTo(3000, 500).slideUp(500, function () {
//    $(this).alert('close');
//});

/*
 |----------------------------------------------------------------------
 | Filemanager popup box
 |----------------------------------------------------------------------
 |
 */

$('.standAloneFacnyBox').fancybox({
    'width': 900,
    'height': 600,
    'type': 'iframe',
    'autoScale': true,
    'padding': 0,
    'openEffect': 'elastic',//fade
    'closeEffect': 'elastic',
    'openSpeed': 'fast',
    'closeSpeed': 'fast'//slow
});

function responsive_filemanager_callback(field_id) {

    var image = $('#' + field_id).val();
    $('#' + field_id).attr('src', image);
    $('#h' + field_id).val(image);
}

function clearImg(field_id) {

    var noImg = '../../asset/images/no_img.png';
    $('#' + field_id).attr('src', noImg);
    $('#h' + field_id).val('');
}

/*
 |----------------------------------------------------------------------
 | Product Brochure
 |----------------------------------------------------------------------
 |
 */

$('.standAloneFacnyBoxBrochure').fancybox({
    'width': 900,
    'height': 600,
    'type': 'iframe',
    'autoScale': true,
    'padding': 0,
    'openEffect': 'elastic',//fade
    'closeEffect': 'elastic',
    'openSpeed': 'fast',
    'closeSpeed': 'fast'//slow
});


/*
 |----------------------------------------------------------------------
 | Confirm to remove image from file browser
 |----------------------------------------------------------------------
 |
 */

function confirmFirst(field_id) {

    swal({

        title: "Are you sure?",
        text: "You will not be able to recover this imaginary data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

    }, function (isConfirm) {

        if (isConfirm) {

            if (field_id) {
                clearImg(field_id);
            }
            swal({
                title: "Successfully deleted",
                animation: "slide-from-top",
                type: "success",
                timer: 1200,
                showConfirmButton: false
            });

        } else {

            swal({
                animation: "slide-from-top",
                title: "Data deletion cancelled",
                type: 'warning',
                timer: 1200,
                showConfirmButton: false

            });
        }
    });
}

/*
 |----------------------------------------------------------------------
 | End of Filemanager popup box
 |----------------------------------------------------------------------
 |
 */

function confirmAndSubmit() {

    swal({

        title: "Are you sure?",
        text: "You will not be able to recover this imaginary data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        closeOnConfirm: true,
        closeOnCancel: true

    }, function (isConfirm) {

        if (isConfirm) {

            $("#formDelete").submit();

        }
    });
}

// No space in input
function nospaces(t) {
    if (t.value.match(/\s/g)) {
        t.value = t.value.replace(/\s/g, '');
    }
}
// Flash Overlay Modal
$('#flash-overlay-modal').modal();

//MultiSelect
$('#role-select').multiSelect(
    {
        keepOrder: true
    }
);

$('#select-all-roles').click(function () {
    $('#role-select').multiSelect('select_all');
    return false;
});
$('#unselect-all-roles').click(function () {
    $('#role-select').multiSelect('deselect_all');
    return false;
});

//$('#toggleSelectRoles').change(function () {
//    if ($(this).prop('checked')) {
//        $('#role-select').multiSelect('select_all');//checked
//        return false;
//    }
//    else {
//        $('#role-select').multiSelect('deselect_all'); //not checked
//        return false;
//    }
//});

$('#permission-select').multiSelect(
    {
        keepOrder: true
    }
);
$('#select-all-permissions').click(function () {
    $('#permission-select').multiSelect('select_all');
    return false;
});
$('#unselect-all-permissions').click(function () {
    $('#permission-select').multiSelect('deselect_all');
    return false;
});

//HIGHSLIDE
hs.graphicsDir = "../../asset/lib/hs/graphics/";
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
hs.showCredits = false;

/*hs.Expander.prototype.onAfterClose = function() {
 window.location.reload();
 };*/
//hs.easing = 'easeOutBack';
/*setTimeout(function ()
 {
 try
 {
 parent.window.hs.getExpander().close();
 } catch (e)
 {
 }
 }, 3000);*/

// Add black close button
hs.registerOverlay({
    slideshowGroup: 'group1',
    html: '<div class="closebutton-black" onclick="return hs.close(this)" title="Close"></div>',
    position: 'top right',
    fade: 2,
    useOnHtml: true
});

// Add red close button
hs.registerOverlay({
    slideshowGroup: 'group2',
    html: '<div class="closebutton-red" onclick="return hs.close(this)" title="Close"></div>',
    position: 'top right',
    fade: 2,
    useOnHtml: true
});

// Show Main Product In Variant option
$('#mainProduct').change(function(){
    $('#show_variant').prop("disabled",true);
});
$('#variantProduct').change(function(){
    $('#show_variant').prop("disabled",false);
});
$("body :file").filestyle({buttonBefore:true});
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host;
tinymce.init({
    selector: '#editor',
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern responsivefilemanager'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | responsivefilemanager',

    external_filemanager_path:baseUrl+"/asset/lib/filemanager/",
    filemanager_title:"Filemanager" ,
    external_plugins: { "filemanager" : "../filemanager/plugin.min.js"},
    filemanager_access_key:"lB2PK8fl735R7xM849MA50UHFJXpID38" ,

    image_advtab: true
});