
<div id="modalRegistration" class="modal fade" role="dialog">
    <div class="modal-dialog modal-registration">
        <!-- Modal content-->
        <div class="modal-content modal-registration__content">
            <ul class="nav nav-tabs modal-registration__nav">
                <li class="active"><a data-toggle="tab" href="#signin">{{trans( 'modal.Sign In') }}</a></li>
                <li><a data-toggle="tab" href="#signup">{{trans( 'modal.Sign Up') }}</a></li>
            </ul>
            <button type="button" class="close btn-modal__close" data-dismiss="modal">
                <img src="/images/ui/x.png" alt="">
            </button>
            <div class="tab-content modal-registration__tab-content">
                <form id="signin" class="tab-pane fade in active modal-registration__form" method="post" onsubmit="submitLogin( this ); return false;">
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-fb">{{trans( 'modal.Sign in with Facebook') }}</a>
                    </div>
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-g">{{trans( 'modal.Sign in with Google') }}</a>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="divider__container">
                            <span class="divider divider-left"></span>
                            <span class="divider-center">{{trans( 'modal.or') }}</span>
                            <span class="divider divider-right "></span>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="modal-registration__title">
                            {{trans( 'modal.Sign in title') }}
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="email" id="login_email" name="email" placeholder="{{trans( 'modal.Email placeholder') }}" class="input">
                        <div class="input__error">
                            <img src="/images/ui/error.png" alt="" class="input__img">
                            <div class="input__error-msg"></div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="password" id="login_password" name="password" placeholder="{{trans( 'modal.Password login placeholder') }}" class="input">
                        <div class="input__error">
                            <img src="/images/ui/error.png" alt="" class="input__img">
                            <div class="input__error-msg"></div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="modal-registration__btn-container">
                            <a href="" class="btn btn__modals btn__modals-forgot">{{trans( 'modal.Forgot password') }}</a>
                            <button type="submit" class="btn btn__modals btn__modals-sign-in btn__green login_button">{{trans( 'modal.Sign in button') }}</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </form>
                <form id="signup" class="tab-pane fade modal-registration__form"  method="post" onsubmit="submitRegister( this ); return false;">
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-fb">{{trans( 'modal.Sign in with Facebook') }}</a>
                    </div>
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-g">{{trans( 'modal.Sign in with Google') }}</a>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="divider__container">
                            <span class="divider divider-left"></span>
                            <span class="divider-center">{{trans( 'modal.or') }}</span>
                            <span class="divider divider-right "></span>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="modal-registration__title">
                            {{trans( 'modal.Register title') }}
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <label class="radio-container">
                            <input type="radio" name="sex" value="m" checked>
                            <span class="radio">{{trans( 'modal.Male') }}</span>
                        </label>
                        <label class="radio-container">
                            <input type="radio" name="sex" value="w">
                            <span class="radio">{{trans( 'modal.Female') }}</span>
                        </label>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="input__group">
                            <input type="text" name="name" id="register_name" placeholder="{{trans( 'modal.Name placeholder') }}" class="input">
                            <div class="input__error">
                                <img src="/images/ui/error.png" alt="" class="input__img">
                                <div class="input__error-msg"></div>
                            </div>
                            <input type="text" name="surname" id="register_surname" placeholder="{{trans( 'modal.Surname placeholder') }}" class="input">
                            <div class="input__error">
                                <img src="/images/ui/error.png" alt="" class="input__img">
                                <div class="input__error-msg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="text" name="email" id="register_email" placeholder="{{trans( 'modal.Email placeholder') }}" class="input">
                        <div class="input__error">
                            <img src="/images/ui/error.png" alt="" class="input__img">
                            <div class="input__error-msg"></div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="password" name="password" id="register_password" placeholder="{{trans( 'modal.Password placeholder') }}" class="input">
                        <div class="input__error">
                            <img src="/images/ui/error.png" alt="" class="input__img">
                            <div class="input__error-msg"></div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="password" name="confirm_password" id="register_confirm_password" placeholder="{{trans( 'modal.Confirm placeholder') }}" class="input">
                        <div class="input__error">
                            <img src="/images/ui/error.png" alt="" class="input__img">
                            <div class="input__error-msg"></div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <select class="select" name="birth" id="register_birth" >
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        <div class="input__error">
                            <img src="/images/ui/error.png" alt="" class="input__img">
                            <div class="input__error-msg"></div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <button type="submit" class="btn btn__modals btn__modals-sign-up btn__green">{{trans( 'modal.Sign up button') }}</button>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="modal-registration__text">{{trans( 'modal.signing up you accept') }} <a href="{{trans( 'modal.Privacy Policy url') }}">{{trans( 'modal.Privacy Policy') }}</a>.</div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </form>
            </div>
        </div>

    </div>
</div>

<div id="modalRequest-of-a-ride" class="modal fade" role="dialog">
    <div class="modal-dialog modal-request-of-a-ride">
        <!-- Modal content-->
        <div class="modal-content modal-request-of-a-ride__content">
            <button type="button" class="close btn-modal__close" data-dismiss="modal">
                <img src="/images/ui/x.png" alt="">
            </button>
            <div class="modal__title">
                Request of a ride
            </div>
            <div class="modal__row">
                <div class="input__container input__container-from">
                    <span class="input__addon-left"></span>
                    <input type="text" class="input" placeholder="Leaving from">
                </div>
            </div>
            <div class="modal__row">
                <div class="input__container input__container-to">
                    <span class="input__addon-left"></span>
                    <input type="text" class="input" placeholder="Going to">
                </div>
            </div>
            <div class="modal__row">
                <div class="input__container input__container-calendar-from">
                    <span class="input__addon-left">From:</span>
                    <input type="text" class="input">
                    <span class="input__addon-right"><span class="caret"></span></span>
                </div>
                <div class="input__container input__container-time">
                    <span class="input__addon-left"></span>
                    <input type="text" class="input">
                    <span class="input__addon-right"><span class="caret"></span></span>
                </div>
            </div>
            <div class="modal__row">
                <div class="input__container input__container-calendar-to">
                    <span class="input__addon-left">To:</span>
                    <input type="text" class="input">
                    <span class="input__addon-right"><span class="caret"></span></span>
                </div>
                <div class="input__container input__container-time">
                    <span class="input__addon-left"></span>
                    <input type="text" class="input">
                    <span class="input__addon-right"><span class="caret"></span></span>
                </div>
            </div>
            <div class="modal__row">
                <div class="modal__btn-container modal__btn-container-end">
                    <button type="button" class="btn btn__green"
                            data-dismiss="modal"
                            data-toggle="modal"
                            data-target="#modalRequest-successfully-created">Leave request
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalRequest-successfully-created" class="modal fade" role="dialog">
    <div class="modal-dialog modal-successfully-created">
        <!-- Modal content-->
        <div class="modal-content modal-successfully-created__content">
            <button type="button" class="close btn-modal__close" data-dismiss="modal">
                <img src="/images/ui/x.png" alt="">
            </button>
            <div class="modal__title">
                Request successfully created
            </div>
            <div class="modal__row">
                <div class="modal-successfully-created__location-container">
                    <div class="modal-successfully-created__location">Vilnus<img src="/images/ui/arrow-short.png" alt="">Kaunus</div>
                    <div class="modal-successfully-created__date">Dec 28 16:00 - Dec 29 19:00</div>
                </div>
            </div>
            <div class="modal__row">
                <div class="modal-successfully-created__text">
                    We will inform you via sms and app if matching ride will appear.
                </div>
            </div>
            <div class="modal__row">
                <div class="modal__btn-container modal__btn-container-center">
                    <a href="" class="btn">
                        <img src="/images/social/google.png" alt="">
                    </a>
                    <a href="" class="btn">
                        <img src="/images/social/app.png" alt="">
                    </a>
                </div>
            </div>
            <div class="modal__row">
                <div class="modal__btn-container modal__btn-container-end">
                    <button type="button" class="btn btn__green" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalBooking" class="modal fade" role="dialog">
    <div class="modal-dialog modal-booking">
        <!-- Modal content-->
        <div class="modal-content modal-booking__content">
            <button type="button" class="close btn-modal__close" data-dismiss="modal">
                <img src="/images/ui/x.png" alt="">
            </button>
            <div class="modal__aside">
                <div class="modal__row">
                    <div class="aside__img">
                        <a href="" class="link">
                            <img src="/images/background-images/user.png" alt="ad">
                        </a>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="aside__user-name">
                        <a href="" class="link">Neringa Andriukaitytė</a>
                    </div>
                    <div class="aside__user-rating">

                        <div class="star-rating__container">
                            <div class="star-rating star-rating__2" ></div>
                        </div>
                        <div class="star-rating__count">
                            2.0
                        </div>
                        <div class="star-rating__reviews">
                            (0 reviews)
                        </div>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="aside__user-car">
                        <strong>Audi A4</strong> 1998
                    </div>
                    <div class="aside__user-phone link">
                        <div class="aside__user-phone-number">
                            +380503482073
                        </div>
                        <div class="aside__user-phone-reveal">
                            (Reveal phone number)
                        </div>
                    </div>
                    <div class="aside__user-social aside__user-social-fb">
                        486 friends on <a href="" class="link">Facebook</a>
                    </div>
                </div>

            </div>
            <div class="modal__main">
                <div class="modal__title">
                    Additional information (optional)
                </div>
                <div class="modal__row">
                    <div class="textarea__container modal__textarea-container">
                        <textarea class="textarea" name="additional-informaion" id="" rows="4"
                                  placeholder="Enter the name of the region or place from where you want the driver to pick you up or ask your question about trip"></textarea>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="modal__btn-container modal__btn-container-end">
                        <button type="button" class="btn btn__empty-white" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn__white" data-dismiss="modal">Confirm Booking</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="modalBooking-check-number" class="modal fade" role="dialog">
    <div class="modal-dialog modal-booking modal-booking__check-number">
        <!-- Modal content-->
        <div class="modal-content modal-booking__content">
            <button type="button" class="close btn-modal__close" data-dismiss="modal">
                <img src="/images/ui/x.png" alt="">
            </button>
            <div class="modal__aside">
                <div class="modal__row">
                    <div class="aside__img">
                        <a href="" class="link">
                            <img src="/images/background-images/user.png" alt="ad">
                        </a>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="aside__user-name">
                        <a href="" class="link">Neringa Andriukaitytė</a>
                    </div>
                    <div class="aside__user-rating">

                        <div class="star-rating__container">
                            <div class="star-rating star-rating__2" ></div>
                        </div>
                        <div class="star-rating__count">
                            2.0
                        </div>
                        <div class="star-rating__reviews">
                            (0 reviews)
                        </div>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="aside__user-car">
                        <strong>Audi A4</strong> 1998
                    </div>
                    <div class="aside__user-phone link">
                        <div class="aside__user-phone-number">
                            +380503482073
                        </div>
                        <div class="aside__user-phone-reveal">
                            (Reveal phone number)
                        </div>
                    </div>
                    <div class="aside__user-social aside__user-social-fb">
                        486 friends on <a href="" class="link">Facebook</a>
                    </div>
                </div>

            </div>
            <div class="modal__main">
                <div class="modal__title">
                    Why is it necessary to press the button to book
                </div>
                <div class="modal__row">
                    <div class="modal__info-block">
                        <div class="modal__info-img">
                            <img src="/images/ui/msg-big.png" alt="">
                        </div>
                        <div class="modal__info-text">
                            The driver will receive an SMS message with your reservation
                        </div>
                    </div>
                    <div class="modal__info-block">
                        <div class="modal__info-img">
                            <img src="/images/ui/gift-big.png" alt="">
                        </div>
                        <div class="modal__info-text">
                            You receive gifts from Statoil and ForumCinemas!
                        </div>
                    </div>
                    <div class="modal__info-block">
                        <div class="modal__info-img">
                            <img src="/images/ui/shield-check-big.png" alt="">
                        </div>
                        <div class="modal__info-text">
                            It is safer! <br>
                            The system will be stored all the information about the trip
                        </div>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="modal__btn-container modal__btn-container-end">
                        <button type="button" class="btn btn__empty-white" data-dismiss="modal">Check number</button>
                        <button type="button" class="btn btn__white" data-dismiss="modal">Book</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="modalBooking-trip-info" class="modal fade" role="dialog">
    <div class="modal-dialog modal-booking modal-booking__trip-info">
        <!-- Modal content-->
        <div class="modal-content modal-booking__content">
            <button type="button" class="close btn-modal__close" data-dismiss="modal">
                <img src="/images/ui/x.png" alt="">
            </button>
            <div class="modal__aside">
                <div class="modal__row">
                    <div class="aside__img">
                        <a href="" class="link">
                            <img src="/images/background-images/user.png" alt="ad">
                        </a>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="aside__user-name">
                        <a href="" class="link">Neringa Andriukaitytė</a>
                    </div>
                    <div class="aside__user-rating">

                        <div class="star-rating__container">
                            <div class="star-rating star-rating__2" ></div>
                        </div>
                        <div class="star-rating__count">
                            2.0
                        </div>
                        <div class="star-rating__reviews">
                            (0 reviews)
                        </div>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="aside__user-car">
                        <strong>Audi A4</strong> 1998
                    </div>
                    <div class="aside__user-phone link">
                        <div class="aside__user-phone-number">
                            +380503482073
                        </div>
                        <div class="aside__user-phone-reveal">
                            (Reveal phone number)
                        </div>
                    </div>
                    <div class="aside__user-social aside__user-social-fb">
                        486 friends on <a href="" class="link">Facebook</a>
                    </div>
                </div>

            </div>
            <div class="modal__main">
                <div class="modal__title">
                    <div class="trip-info__date">
                        December 28, 18:00
                    </div>
                    <div class="trip-info__title-description">
                        <div class="trip-info__habits">
                            <div class="habits__item habits__item-pets"></div>
                            <div class="habits__item habits__item-music"></div>
                            <div class="habits__item habits__item-smoke"></div>
                            <div class="habits__item habits__item-food"></div>
                            <div class="habits__item habits__item-people"></div>
                        </div>
                        <div class="trip-info__description-price">
                            100 &euro;
                        </div>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="trip-info__destination">
                        <div class="trip-info__destination-city">Vilnius</div>
                        <div class="trip-info__destination-img"></div>
                        <div class="trip-info__destination-city grey">Elektrėnai</div>
                        <div class="trip-info__destination-img"></div>
                        <div class="trip-info__destination-city">Kaunas</div>
                        <div class="trip-info__destination-img grey"></div>
                        <div class="trip-info__destination-city grey">Klaipėda</div>
                    </div>
                </div>
                <div class="modal__row">
                    <div class="trip-info__desription">
                        Laikas derinimas, geriausia jog susisiektumete nr.:860024018
                    </div>
                </div>

                <div class="modal__row">
                    <div class="gallery__container">
                        <div class="gallery__item">
                            <div class="gallery__text">bla bla</div>
                        </div>
                        <div class="gallery__item"></div>
                        <div class="gallery__item"></div>
                        <div class="gallery__item"></div>
                        <div class="gallery__item"></div>
                        <div class="gallery__item"></div>
                        <div class="gallery__item"></div>
                    </div>
                </div>

                <div class="modal__row">
                    <div class="modal__btn-container modal__btn-container-end">
                        <button type="button" class="btn btn__green" data-dismiss="modal">Book</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>