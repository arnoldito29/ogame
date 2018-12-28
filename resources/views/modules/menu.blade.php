<div class="col-md-offset-2">
    <div>
        Menu
    </div>
    <ul>
        @foreach($menu as $menuItem)
            <li>
                <a
                @if (!empty($menuItem->route))
                    href="{{route($menuItem->route)}}"
                @else
                    href="{{route($menuItem->url)}}"
                @endIf
                >{{$menuItem->name}}</a>
            </li>
        @endforeach
    </ul>
</div>