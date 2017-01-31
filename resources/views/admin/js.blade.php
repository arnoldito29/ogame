    <script src="/js/app.js"></script>
    <script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!};
    </script>
    <!-- Scripts -->
    <script src="/js/admin.app.js"></script>
    <script>
        $('div.alert').not('.alert-danger').delay(2000).slideUp(300);
    </script>
    
@if ( !empty( $js["editor"] ) )
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckeditor/launcher_editor.js"></script>
    <script>
    @foreach ( $js["editor"] as $val )
    
        CKEDITOR.replace( '{{$val}}', {
            toolbar : 'basic'
        } );
        CKEDITOR.add
                 
    @endforeach
    </script>
@endif