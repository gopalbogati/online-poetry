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
$('#mainProduct').change(function () {
    $('#show_variant').prop("disabled", true);
});
$('#variantProduct').change(function () {
    $('#show_variant').prop("disabled", false);
});

$("body :file").filestyle({buttonBefore: true});

$('.select2').select2();
