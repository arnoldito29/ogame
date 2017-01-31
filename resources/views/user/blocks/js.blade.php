    <script src="/js/jquery.min.js"></script>
    <script src="/js/user.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js" type="text/javascript"></script>
    <script type="text/javascript">
    var APP_URL = {!! json_encode(url('/', ['lang' => Lang::getLocale()])) !!};
    </script>
    <!-- Scripts -->
    <script>
        $('div.alert').not('.alert-danger').delay(2000).slideUp(300);
    </script>
    @if ( !empty( $search_rides ) )
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&language={{LANG}}&key=AIzaSyAmhoh8V0yCvCOdA5xLUyskoYVQcUZn0x8"  async defer></script>
        <script src="/js/ride.js"></script>
    @endif
    
    