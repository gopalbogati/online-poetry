<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<!-- jQuery -->
<script src="{{asset('/asset/vendor/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
{{--multiselect js--}}
<script src="{{ asset('/asset/vendor/multiselect/js/jquery.multi-select.js') }}" type="text/javascript"></script>



{{--Javascript for multiple delete--}}
<script src="{{ asset('/asset/js/custom-admin.js') }}" type="text/javascript"></script>
{{--conform sweet alert--}}
<script src="{{ asset('/asset/vendor/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/asset/vendor/sweetalert/sweetalert-dev.js') }}" type="text/javascript"></script>
{{--metis menu--}}
<script src="{{ asset('/asset/vendor/metisMenu/metisMenu.js') }}" type="text/javascript"></script>
{{--tiny mce init--}}
<script src="{{ asset('/asset/vendor/tinymce/tinymce.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('/asset/js/custom-admin.js') }}" type="text/javascript"></script>
{
<script type="text/javascript">

    tinymce.init({
        selector: "textarea",
        resize: "both",
        relative_urls: false,
        plugins: ["autoresize", "image", "code", "lists", "code","example", "link"],
        indentation : '20pt',
        file_browser_callback: function(field_name, url, type, win) {
            if (type == 'image') $('#my_form input').click();
        },
        image_list: "/imglist",
        toolbar: [
            "undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | preview | spellchecker"
        ]

    });

</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->