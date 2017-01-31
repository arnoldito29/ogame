@if ( empty( $rides ) )
    <div class="find__container find__container-right find__container-grey">
        <div class="find__noresults-container">
            <div class="noresults__title">{{trans( 'ride.no result title') }}</div>
            <div class="noresults__img"></div>
        </div>
    </div>
@else
    <div class="find__container find__container-right">
        <div class="find__title">
            <button class="btn find__btn-left" type="button"></button>
            <div class="find__location-container">
                <div class="find__location">Vilnus<img src="/images/ui/arrow-short.png" alt="">Kaunus</div>
                <div class="find__date">December 28</div>
            </div>
            <button class="btn find__btn-right" type="button"></button>
        </div>
        <ul class="fade__container">
            <li>
                <div class="fade__item" data-toggle="modal" data-target="#modalBooking">
                    <div class="fade__img">
                        <a href=""><img src="/images/landing/man.png" alt=""></a>
                    </div>
                    <div class="fade__col fade__col-1">
                        <div class="fade__name">
                            <a href="" class="fade__name-link">
                                Aivaras Kalinauskas 1
                            </a>
                        </div>
                        <div class="fade__rating">
                            <img src="/images/ui/star.png" alt="">
                            <span class="fade__rating-text">5/5</span>
                            <span>(8)</span>
                        </div>
                        <div class="fade__social">
                            <a href=""><img src="/images/social/social-fb-small.png" alt=""></a>
                            <span>308</span>
                            <span>friends</span>
                        </div>
                    </div>
                    <div class="fade__col fade__col-2">
                        <div class="fade__time">
                            Today 17:00
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
                        <div class="fade__cost">
                            4,5 €
                        </div>
                        <div class="fade__free-seats">free seats: <span>2</span></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="fade__item" data-toggle="modal" data-target="#modalBooking-check-number">
                    <div class="fade__img">
                        <a href=""><img src="/images/landing/man.png" alt=""></a>
                    </div>
                    <div class="fade__col fade__col-1">
                        <div class="fade__name">
                            <a href="" class="fade__name-link">
                                Aivaras Kalinauskas 2
                            </a>
                        </div>
                        <div class="fade__rating">
                            <img src="/images/ui/star.png" alt="">
                            <span class="fade__rating-text">5/5</span>
                            <span>(8)</span>
                        </div>
                        <div class="fade__social">
                            <a href=""><img src="/images/social/social-fb-small.png" alt=""></a>
                            <span>308</span>
                            <span>friends</span>
                        </div>
                    </div>
                    <div class="fade__col fade__col-2">
                        <div class="fade__time">
                            Today 17:00
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
                        <div class="fade__cost">
                            4,5 €
                        </div>
                        <div class="fade__free-seats">free seats: <span>2</span></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="fade__item" data-toggle="modal" data-target="#modalBooking-trip-info">
                    <div class="fade__img">
                        <a href=""><img src="/images/landing/man.png" alt=""></a>
                    </div>
                    <div class="fade__col fade__col-1">
                        <div class="fade__name">
                            <a href="" class="fade__name-link">
                                Aivaras Kalinauskas 3
                            </a>
                        </div>
                        <div class="fade__rating">
                            <img src="/images/ui/star.png" alt="">
                            <span class="fade__rating-text">5/5</span>
                            <span>(8)</span>
                        </div>
                        <div class="fade__social">
                            <a href=""><img src="/images/social/social-fb-small.png" alt=""></a>
                            <span>308</span>
                            <span>friends</span>
                        </div>
                    </div>
                    <div class="fade__col fade__col-2">
                        <div class="fade__time">
                            Today 17:00
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
                        <div class="fade__cost">
                            4,5 €
                        </div>
                        <div class="fade__free-seats">free seats: <span>2</span></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="fade__item">
                    <div class="fade__img">
                        <a href=""><img src="/images/landing/man.png" alt=""></a>
                    </div>
                    <div class="fade__col fade__col-1">
                        <div class="fade__name">
                            <a href="" class="fade__name-link">
                                Aivaras Kalinauskas
                            </a>
                        </div>
                        <div class="fade__rating">
                            <img src="/images/ui/star.png" alt="">
                            <span class="fade__rating-text">5/5</span>
                            <span>(8)</span>
                        </div>
                        <div class="fade__social">
                            <a href=""><img src="/images/social/social-fb-small.png" alt=""></a>
                            <span>308</span>
                            <span>friends</span>
                        </div>
                    </div>
                    <div class="fade__col fade__col-2">
                        <div class="fade__time">
                            Today 17:00
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
                        <div class="fade__cost">
                            4,5 €
                        </div>
                        <div class="fade__free-seats">free seats: <span>2</span></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="fade__item">
                    <div class="fade__img">
                        <a href=""><img src="/images/landing/man.png" alt=""></a>
                    </div>
                    <div class="fade__col fade__col-1">
                        <div class="fade__name">
                            <a href="" class="fade__name-link">
                                Aivaras Kalinauskas
                            </a>
                        </div>
                        <div class="fade__rating">
                            <img src="/images/ui/star.png" alt="">
                            <span class="fade__rating-text">5/5</span>
                            <span>(8)</span>
                        </div>
                        <div class="fade__social">
                            <a href=""><img src="/images/social/social-fb-small.png" alt=""></a>
                            <span>308</span>
                            <span>friends</span>
                        </div>
                    </div>
                    <div class="fade__col fade__col-2">
                        <div class="fade__time">
                            Today 17:00
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
                        <div class="fade__cost">
                            4,5 €
                        </div>
                        <div class="fade__free-seats">free seats: <span>2</span></div>
                    </div>
                </div>
            </li>
            <li>
                <div class="fade__item">
                    <div class="fade__img">
                        <a href=""><img src="/images/landing/man.png" alt=""></a>
                    </div>
                    <div class="fade__col fade__col-1">
                        <div class="fade__name">
                            <a href="" class="fade__name-link">
                                Aivaras Kalinauskas
                            </a>
                        </div>
                        <div class="fade__rating">
                            <img src="/images/ui/star.png" alt="">
                            <span class="fade__rating-text">5/5</span>
                            <span>(8)</span>
                        </div>
                        <div class="fade__social">
                            <a href=""><img src="/images/social/social-fb-small.png" alt=""></a>
                            <span>308</span>
                            <span>friends</span>
                        </div>
                    </div>
                    <div class="fade__col fade__col-2">
                        <div class="fade__time">
                            Today 17:00
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
                        <div class="fade__cost">
                            4,5 €
                        </div>
                        <div class="fade__free-seats">free seats: <span>2</span></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endif