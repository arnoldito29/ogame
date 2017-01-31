<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>BananaCar</title>
    <meta name="viewport" content="width=device-width">

    <!--Bootstrap-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/app.css">

</head>

<body>
<header class="header header__sticky">
    <div class="container">
        <div class="row">
            <div class="header__top-menu">
                <div class="logo">
                    <img src="/images/header/logo-small-header.png" alt="logo banana car" class="logo-img">
                </div>
                <div class="header__btn-block">
                    <button type="button" class="btn" data-toggle="modal" data-target="#modalRegistration">
                        Sign In
                    </button>

                    <div class="dropdown header__dropdown header__dropdown-lang">
                        <button class="btn header__btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">
                            <span>
                                <img src="/images/flags/en.png" alt="" class="header__img-flag">
                                English
                            </span>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-lang__menu">
                            <li>
                                <a href="#" class="dropdown-lang__link">
                                    <img src="/images/flags/en.png" alt="">
                                    English
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="find-a-ride">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="">
                    <div class="find__container find__container-left">
                        <div class="find__row">
                            <div class="find__title">Find a ride</div>
                        </div>
                        <div class="find__row">
                            <div class="input__container find__input-container find__input-from">
                                <span class="input__addon-left"></span>
                                <input type="text" class="input" placeholder="Leaving from">
                                <span class="input__addon-right"></span>
                            </div>
                        </div>
                        <div class="find__row">
                            <div class="input__container find__input-container find__input-to">
                                <span class="input__addon-left"></span>
                                <input type="text" class="input" placeholder="Going to">
                            </div>
                        </div>
                        <div class="find__row">
                            <div class="input__container find__input-container find__input-calendar">
                                <span class="input__addon-left">From:</span>
                                <input type="text" class="input">
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
                        <div class="noresults__title">No search results yet.</div>
                        <div class="noresults__img"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<div id="modalRegistration" class="modal fade" role="dialog">
    <div class="modal-dialog modal-registration">
        <!-- Modal content-->
        <div class="modal-content modal-registration__content">
            <ul class="nav nav-tabs modal-registration__nav">
                <li class="active"><a data-toggle="tab" href="#signin">Sign In</a></li>
                <li><a data-toggle="tab" href="#signup">Sign Up</a></li>
            </ul>
            <button type="button" class="close btn-modal__close" data-dismiss="modal">
                <img src="/images/ui/x.png" alt="">
            </button>
            <div class="tab-content modal-registration__tab-content">
                <form id="signin" class="tab-pane fade in active modal-registration__form">
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-fb">Sign in with Facebook</a>
                    </div>
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-g">Sign in with Google</a>
                    </div>

                    <div class="divider__container">
                        <span class="divider divider-left"></span>
                        <span class="divider-center">or</span>
                        <span class="divider divider-right "></span>
                    </div>

                    <div class="modal-registration__form-row">
                        <div class="modal-registration__title">
                            Sign in to your BananaCar account
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="email" placeholder="Email" class="input">
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="password" placeholder="Password" class="input">
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="modal-registration__btn-container">
                            <a href="" class="btn btn__modals btn__modals-forgot">Forgot password?</a>
                            <a href="" class="btn btn__modals btn__modals-sign-in btn__green">Sign In</a>
                        </div>
                    </div>
                </form>
                <form id="signup" class="tab-pane fade modal-registration__form">
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-fb">Sign in with Facebook</a>
                    </div>
                    <div class="modal-registration__form-row">
                        <a href="" class="btn__social btn__social-g">Sign in with Google</a>
                    </div>
                    <div class="divider__container">
                        <span class="divider divider-left"></span>
                        <span class="divider-center">or</span>
                        <span class="divider divider-right "></span>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="modal-registration__title">
                            Create your BananaCar account
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <label class="radio-container">
                            <input type="radio" name="radio-1" value="1" checked>
                            <span class="radio">Male</span>
                        </label>
                        <label class="radio-container">
                            <input type="radio" name="radio-1" value="1">
                            <span class="radio">Female</span>
                        </label>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="input__group">
                            <input type="text" placeholder="First name" class="input">
                            <input type="text" placeholder="Last name" class="input">
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="email" placeholder="Email" class="input">
                        <div class="input__error">
                            <img src="/images/ui/error.png" alt="" class="input__img">
                            <div class="input__error-msg">
                                The email address must be in xxx@yyy.zzz format and no more than 80 characters.
                            </div>
                        </div>
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="password" placeholder="Password (min. 8 characters)" class="input">
                    </div>
                    <div class="modal-registration__form-row">
                        <input type="password" placeholder="Confirm password" class="input">
                    </div>
                    <div class="modal-registration__form-row">
                        <select class="select">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="modal-registration__form-row">
                        <a href="" class="btn btn__modals btn__modals-sign-up btn__green">Sign Up</a>
                    </div>
                    <div class="modal-registration__form-row">
                        <div class="modal-registration__text">By signing up you accept the <a href="">T&Cs and Privacy
                                Policy</a>.
                        </div>
                    </div>
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
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="footer__nav">
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">About</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">F.A.Q.</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Partners</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Privacy Policy</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Contact</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-lg-6">

                <!--I don't now why it does not work, so I add script and img inside it-->

                <div class="fb-page" data-href="https://www.facebook.com/bananacarLT/" data-width="495"
                     data-small-header="true" data-adapt-container-width="true" data-hide-cover="true"
                     data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/bananacarLT/" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/bananacarLT/">
                            <img src="/images/landing/fb.png" alt="">
                        </a></blockquote>
                </div>
            </div>
            <div class="col-lg-12 footer__bottom">
                © 2016 BananaCar. All rights reserved.
            </div>
        </div>
    </div>
</footer>


<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js" type="text/javascript"></script>

<div id="fb-root"></div>

<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/lt_LT/sdk.js#xfbml=1&version=v2.8&appId=615960481822236";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</body>

</html>