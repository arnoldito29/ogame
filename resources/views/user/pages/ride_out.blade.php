@extends('layouts.pages')

@section('content')

<section class="find-a-ride">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form id="ride_search" method="post" onsubmit="rideSearchSubmit( this ); return false;">
                    <div class="find__container find__container-left">
                        <div class="find__row">
                            <div class="find__title">Find a ride</div>
                        </div>
                        <div class="find__row">
                            <div class="input__container find__input-container find__input-from">
                                <span class="input__addon-left"></span>
                                <input type="text" name="from" id="ride_from" class="input" placeholder="Leaving from">
                                <input type="hidden" name="from_latitude" id="from_latitude" value="sasd" />
                                <input type="hidden" name="from_longitude" id="from_longitude" value="asdad" />
                                <input type="hidden" name="from_place" id="from_place" value="" />
                                <span class="input__addon-right"></span>
                            </div>
                        </div>
                        <div class="find__row">
                            <div class="input__container find__input-container find__input-to">
                                <span class="input__addon-left"></span>
                                <input type="text" name="to" id="ride_to" class="input" placeholder="Going to">
                                <input type="hidden" name="to_latitude" id="to_latitude" value="" />
                                <input type="hidden" name="to_longitude" id="to_longitude" value="" />
                                <input type="hidden" name="to_place" id="to_place" value="" />
                            </div>
                        </div>
                        <div class="find__row">
                            <div class="input__container find__input-container find__input-calendar">
                                <span class="input__addon-left">From:</span>
                                <input  type="text" name="date" id="ride_date" class="input">
                                <span class="input__addon-right"><span class="caret"></span></span>
                            </div>
                        </div>
                        <div class="find__row">
                            <div class="find__btn-container">
                                <button type="button" class="btn btn__green find__btn-search">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="find__leave-request-container">
                        <div class="find__leave-request-container-title">Can't find a ride?</div>
                        <div class="find__leave-request-container-img">
                            <img src="/images/find-a-ride/request.png" alt="">
                        </div>
                        <div class="find__leave-request-container-info">
                            <div class="find__leave-request-container-text">
                                Leave your request and you will be instantly informed via sms and apps if we got a match
                                for
                                you!
                            </div>
                            <div class="find__leave-request-container-btn">
                                <buttton class="btn btn__empty-green find__btn-leave"
                                         data-toggle="modal" data-target="#modalRequest-of-a-ride">Leave request</buttton>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="find__container find__container-right find__container-grey">
                    <div class="find__noresults-container">
                        <div class="noresults__title">{{trans( 'ride.no result title') }}</div>
                        <div class="noresults__img"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection