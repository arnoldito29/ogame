<section class="travel-as">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="landing__h2">{{trans( 'travel.Index title') }}</h2>
            </div>
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
                    <div class="travel-as__container-fresh">
                        <div class="fresh__title">{{trans( 'travel.Index requests') }}</div>

                        <!--fresh-->
                        <div class="fade__item">
                            <div class="fade__img">
                                <img src="images/landing/man.png" alt="">
                            </div>
                            <div class="fade__col fade__col-1">
                                <div class="fade__name">
                                    <a href="" class="fade__name-link">
                                        Aivaras Kalinauskas
                                    </a>
                                </div>
                                <div class="fade__rating">
                                    <img src="images/ui/star.png" alt="">
                                    <span class="fade__rating-text">5/5</span>
                                    <span>(8)</span>
                                </div>
                                <div class="fade__social">
                                    <img src="images/social/social-fb-small.png" alt="">
                                    <span>308</span>
                                    <span>friends</span>
                                </div>
                            </div>
                            <div class="fade__col fade__col-2">
                                <div class="fade__time">
                                    Today 17:00 - 18:00
                                </div>
                                <div class="fade__place">
                                    <div class="fade__place-from">
                                        Kaunas
                                    </div>
                                    <div class="fade__place-to">
                                        Druskininkai
                                    </div>
                                </div>
                            </div>
                            <div class="fade__col fade__col-3">
                            </div>
                        </div>
                        <!--fresh-->
                        <div class="fade__item">
                            <div class="fade__img">
                                <img src="images/landing/man.png" alt="">
                            </div>
                            <div class="fade__col fade__col-1">
                                <div class="fade__name">
                                    <a href="" class="fade__name-link">
                                        Aivaras Kalinauskas
                                    </a>
                                </div>
                                <div class="fade__rating">
                                    <img src="images/ui/star.png" alt="">
                                    <span class="fade__rating-text">5/5</span>
                                    <span>(8)</span>
                                </div>
                                <div class="fade__social">
                                    <img src="images/social/social-fb-small.png" alt="">
                                    <span>308</span>
                                    <span>friends</span>
                                </div>
                            </div>
                            <div class="fade__col fade__col-2">
                                <div class="fade__time">
                                    Today 17:00 - 18:00
                                </div>
                                <div class="fade__place">
                                    <div class="fade__place-from">
                                        Kaunas
                                    </div>
                                    <div class="fade__place-to">
                                        Druskininkai
                                    </div>
                                </div>
                            </div>
                            <div class="fade__col fade__col-3">
                            </div>
                        </div>
                        <!--fresh-->
                        <div class="fade__item">
                            <div class="fade__img">
                                <img src="images/landing/man.png" alt="">
                            </div>
                            <div class="fade__col fade__col-1">
                                <div class="fade__name">
                                    <a href="" class="fade__name-link">
                                        Aivaras Kalinauskas
                                    </a>
                                </div>
                                <div class="fade__rating">
                                    <img src="images/ui/star.png" alt="">
                                    <span class="fade__rating-text">5/5</span>
                                    <span>(8)</span>
                                </div>
                                <div class="fade__social">
                                    <img src="images/social/social-fb-small.png" alt="">
                                    <span>308</span>
                                    <span>friends</span>
                                </div>
                            </div>
                            <div class="fade__col fade__col-2">
                                <div class="fade__time">
                                    Today 17:00 - 18:00
                                </div>
                                <div class="fade__place">
                                    <div class="fade__place-from">
                                        Kaunas
                                    </div>
                                    <div class="fade__place-to">
                                        Druskininkai
                                    </div>
                                </div>
                            </div>
                            <div class="fade__col fade__col-3">
                            </div>
                        </div>
                    </div><!--End travel-as__container-fresh-->
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
                    <div class="travel-as__container-fresh">
                        <div class="fresh__title">{{trans( 'travel.Index offers') }}</div>


                        <!--fresh-->
                        <div class="fade__item">
                            <div class="fade__img">
                                <img src="images/landing/man.png" alt="">
                            </div>
                            <div class="fade__col fade__col-1">
                                <div class="fade__name">
                                    <a href="" class="fade__name-link">
                                        Aivaras Kalinauskas
                                    </a>
                                </div>
                                <div class="fade__rating">
                                    <img src="images/ui/star.png" alt="">
                                    <span class="fade__rating-text">5/5</span>
                                    <span>(8)</span>
                                </div>
                                <div class="fade__social">
                                    <img src="images/social/social-fb-small.png" alt="">
                                    <span>308</span>
                                    <span>friends</span>
                                </div>
                            </div>
                            <div class="fade__col fade__col-2">
                                <div class="fade__time">
                                    Today 17:00 - 18:00
                                </div>
                                <div class="fade__place">
                                    <div class="fade__place-from">
                                        Kaunas
                                    </div>
                                    <div class="fade__place-to">
                                        Druskininkai
                                    </div>
                                </div>
                            </div>
                            <div class="fade__col fade__col-3">
                            </div>
                        </div>
                        <!--fresh-->
                        <div class="fade__item">
                            <div class="fade__img">
                                <img src="images/landing/man.png" alt="">
                            </div>
                            <div class="fade__col fade__col-1">
                                <div class="fade__name">
                                    <a href="" class="fade__name-link">
                                        Aivaras Kalinauskas
                                    </a>
                                </div>
                                <div class="fade__rating">
                                    <img src="images/ui/star.png" alt="">
                                    <span class="fade__rating-text">5/5</span>
                                    <span>(8)</span>
                                </div>
                                <div class="fade__social">
                                    <img src="images/social/social-fb-small.png" alt="">
                                    <span>308</span>
                                    <span>friends</span>
                                </div>
                            </div>
                            <div class="fade__col fade__col-2">
                                <div class="fade__time">
                                    Today 17:00 - 18:00
                                </div>
                                <div class="fade__place">
                                    <div class="fade__place-from">
                                        Kaunas
                                    </div>
                                    <div class="fade__place-to">
                                        Druskininkai
                                    </div>
                                </div>
                            </div>
                            <div class="fade__col fade__col-3">
                            </div>
                        </div>
                        <!--fresh-->
                        <div class="fade__item">
                            <div class="fade__img">
                                <img src="images/landing/man.png" alt="">
                            </div>
                            <div class="fade__col fade__col-1">
                                <div class="fade__name">
                                    <a href="" class="fade__name-link">
                                        Aivaras Kalinauskas
                                    </a>
                                </div>
                                <div class="fade__rating">
                                    <img src="images/ui/star.png" alt="">
                                    <span class="fade__rating-text">5/5</span>
                                    <span>(8)</span>
                                </div>
                                <div class="fade__social">
                                    <img src="images/social/social-fb-small.png" alt="">
                                    <span>308</span>
                                    <span>friends</span>
                                </div>
                            </div>
                            <div class="fade__col fade__col-2">
                                <div class="fade__time">
                                    Today 17:00 - 18:00
                                </div>
                                <div class="fade__place">
                                    <div class="fade__place-from">
                                        Kaunas
                                    </div>
                                    <div class="fade__place-to">
                                        Druskininkai
                                    </div>
                                </div>
                            </div>
                            <div class="fade__col fade__col-3">
                            </div>
                        </div>
                    </div><!--End travel-as__container-fresh-->
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