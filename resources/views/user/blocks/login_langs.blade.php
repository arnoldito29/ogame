<div class="header__btn-block">
    @if (Auth::guest())
        <button type="button" class="btn" data-toggle="modal"
                data-target="#modalRegistration">{{trans( 'auth.Sign in' ) }}</button>
    @else
        @include('user.blocks.messages')
        <div class="dropdown header__dropdown">
            <button class="btn header__btn-dropdown dropdown-toggle header__btn header__btn-name"
                    type="button" data-toggle="dropdown">
                <span class="header__btn-img"></span>
            </button>
            <div class="dropdown-menu header__dropdown-profile">
                <div class="dropdown-profile__container">
                    <div class="dropdown-profile__user">
                        <div class="dropdown-profile__user-img">
                            <a href="{{ URL::route('user/edit') }}"><img src="/images/users/user-test.png" alt=""></a>
                        </div>
                        <div class="dropdown-profile__user-name">
                            <a href="{{ URL::route('user/edit') }}">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
                        </div>
                    </div>
                    <ul class="dropdown-profile__btn-container">
                        <li>
                            <a href="{{trans( 'travel.Find a ride url') }}" class="btn dropdown-profile__btn dropdown-profile__btn-find btn__green">{{trans( 'travel.Find a ride') }}</a>
                        </li>
                        <li>
                            <a href="{{trans( 'travel.Offer a ride url') }}" class="btn dropdown-profile__btn dropdown-profile__btn-offer btn__green">{{trans( 'travel.Offer a ride') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('user/gifts') }}" class="btn dropdown-profile__btn dropdown-profile__btn-gifts btn__empty-grey">{{trans( 'user.Gifts') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('user/wallet') }}" class="btn dropdown-profile__btn dropdown-profile__btn-wallet btn__empty-grey">{{trans( 'user.My wallet') }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('logout') }}" class="btn dropdown-profile__btn dropdown-profile__btn-signout btn__empty-grey">{{trans( 'user.Logout') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="dropdown header__dropdown header__dropdown-lang">
        <button class="btn header__btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">
            <img src="/images/flags/{{$langs["active"]}}.png" alt="">
            {{trans( 'langs.'. $langs["active"] ) }}
            <span class="caret"></span>
        </button>
        @if ( !empty( $langs["list"] ) )
            <ul class="dropdown-menu dropdown-lang__menu" role="menu">
                @foreach ($langs["list"] as $lang)
                    <li>
                        <a href="{{ url( $lang["url"] ) }}" class="dropdown-lang__link">
                            <img src="/images/flags/{{$lang["name"]}}.png" alt="">
                            {{trans( 'langs.'. $lang["name"] ) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>