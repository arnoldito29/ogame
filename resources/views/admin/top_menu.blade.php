<ul class="dropdown-menu" role="menu">
    <li>
        <a href="{{ url('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            {{trans( 'admin.Logout') }}
        </a>

        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>