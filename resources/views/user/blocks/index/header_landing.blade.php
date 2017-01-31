<header class="header header__sticky-landing" id="header__sticky">
    <div class="container">
        <div class="row">
            <div class="header__top-menu">
                <div class="logo">
                    <img src="/images/header/logo-small-header.png" alt="logo banana car" class="logo-img">
                </div>
                @include('user.blocks.login_langs')
            </div>
        </div>
    </div>
</header>
<div class="header header-landing">
    <div class="container">
        <div class="row">
            <div class="header__top-menu">
                @include('user.blocks.logo')
                @include('user.blocks.login_langs')
            </div>
            <div class="col-lg-12">
                @include('user.blocks.index.intro')
            </div>
        </div>
    </div>
</div>