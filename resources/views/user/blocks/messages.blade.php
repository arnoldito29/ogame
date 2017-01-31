<div class="dropdown header__dropdown @if ( !empty( $messages_count ) ) header__dropdown-active @endif">
    <button class="btn header__btn-dropdown dropdown-toggle header__btn header__btn-msg"
            type="button" data-toggle="dropdown">
        <span class="header__btn-img"></span>
        <span class="badge">{{$messages_count}}</span>
    </button>
    @if ( !empty( $messages_list ) )
        <div class="dropdown-menu header__infomsg-container header__infomsg-container-msg">
            @foreach ( $messages_list as $message )
                <div class="header__infomsg ">
                    <div class="header__infomsg-img ">
                    </div>
                    <div class="header__infomsg-info ">
                        <div class="header__infomsg-title ">
                            <a href="{{ URL::route('message',[ $message->from_user_id ] ) }}" class="link">{{$message->name}} {{$message->surname}}</a>
                        </div>
                        <div class="header__infomsg-date ">{{$message->created_at}}</div>
                        <div class="header__infomsg-text ">{{$message->short_text}}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>