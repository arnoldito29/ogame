<header class="header header__sticky">
    <div class="container">
        <div class="row">
            <div class="header__top-menu">
                <div class="logo">
                    <a href="{{ URL::route('home') }}"><img src="/images/header/logo-small-header.png" alt="logo banana car" class="logo-img"></a>
                </div>
                @include('user.blocks.login_langs')
            </div>
        </div>
    </div>
</header>