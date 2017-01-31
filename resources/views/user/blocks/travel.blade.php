<section class="get-started">
    <div class="container">
        <div class="row">
            @if ( !empty( $home_page ) )
            <div class="col-lg-12">
                <h2 class="landing__h2">{{trans( 'travel.Index title') }}</h2>
            </div>
            @endif
            <div class="col-lg-6">
                <div class="travel-as__container travel-as__container-left">
                    @if (count( $index_travel["passanger"] ) > 0)
                    <div class="travel-as__title">{{trans( 'travel.Index title passanger') }}</div>
                    <div class="travel-as__container-info">
                        <div class="container-info__img">
                            <img src="/images/landing/passanger.png" alt="">
                        </div>
                        <div class="container-info__block">
                            @foreach ( $index_travel["passanger"] as $key => $passanger )
                            <div class="container-info__block-text">{{$passanger->_text_}}</div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="fresh__btn-container">
                        <a href="{{trans( 'travel.Find a ride url') }}" class="btn btn__fresh btn__fresh-find">{{trans( 'travel.Find a ride') }}</a>
                    </div>
                </div>
            </div>

            <!--Driver-->

            <div class="col-lg-6">
                <div class="travel-as__container travel-as__container-right">
                    @if (count( $index_travel["driver"] ) > 0)
                    <div class="travel-as__title">{{trans( 'travel.Index title driver') }}</div>
                    <div class="travel-as__container-info">
                        <div class="container-info__img">
                            <img src="/images/landing/driver.png" alt="">
                        </div>
                        <div class="container-info__block">
                            @foreach ( $index_travel["driver"] as $key => $driver )
                            <div class="container-info__block-text">{{$driver->_text_}}</div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="fresh__btn-container">
                        @if (Auth::guest())
                           <a href="#" data-toggle="modal" data-target="#modalRegistration" class="btn btn__fresh btn__fresh-offer">{{trans( 'travel.Offer a ride') }}</a>
                        @else
                           <a href="{{trans( 'travel.Offer a ride url') }}" class="btn btn__fresh btn__fresh-offer">{{trans( 'travel.Offer a ride') }}</a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>