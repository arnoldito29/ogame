<div class="dropdown header__dropdown @if ( !empty( $notifications_count ) ) header__dropdown-active @endif">
    <button class="btn header__btn-dropdown dropdown-toggle header__btn header__btn-notif"
            type="button" data-toggle="dropdown">
        <span class="header__btn-img"></span>
        <span class="badge">{{$notifications_count}}</span>
    </button>
    <div class="dropdown-menu header__infomsg-container header__infomsg-container-notif">
        @if ( !empty( $notifications_list ) )
            @foreach ( $notifications_list as $notification )
                <div class="header__infomsg ">
                    <div class="header__infomsg-img ">
                    </div>
                    <div class="header__infomsg-info ">
                        <div class="header__infomsg-title ">
                            <a href="{{$notification['url']}}" class="link">{{$notification['title']}}</a>
                        </div>
                        <div class="header__infomsg-date ">{{$notification['created_at']}}</div>
                        <div class="header__infomsg-text ">{{$notification['text']}}</div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>