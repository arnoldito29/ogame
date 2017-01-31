@if (count($menu_list) > 0)
    <ul>
        @foreach ($menu_list as $menu)
        <li><a href="{{ $menu->url }}"@if( !empty( $menu->new_window ) ) target="_blank" @endif>{{ $menu->name }}</a></li>
        @endforeach
    </ul>
@endif