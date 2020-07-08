<ul>
    @guest
            <li><a href="{{ route('register') }}">Sing Up</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
            @else
            
            <li>
                <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
    @endguest


<li><a href="{{ route('cart.index') }}">Cart
    <span class="cart-count">
        @if (Cart::instance('default')->count() > 0)
        <span>{{ Cart::instance('default')->count() }}</span></span>
        @endif
    </a>
</li>

</ul>















{{-- @foreach($items as $menu_item)
    <li>
        <a href="{{ $menu_item->link() }}">
            {{ $menu_item->title }}
            @if ($menu_item->title === 'Cart')
            <span class="cart-count">
                @if (Cart::instance('default')->count() > 0)
                <span>{{ Cart::instance('default')->count() }}</span></span>
                @endif
                @endif
            </a>
        </li>   
        @endforeach --}}
        