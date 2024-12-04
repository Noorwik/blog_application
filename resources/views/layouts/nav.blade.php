<nav>
    @auth
    @if(Auth::user()->usertype == 'admin')

        <div class="grid-container">
            <a href="#" class="grid-item">BLOG APPLICATION</a>
            {{-- <a href="#" class="grid-item">Home</a>
            <a href="#" class="grid-item">About</a>
            <a href="#" class="grid-item">Contact</a>
            <a href="#" class="grid-item">Dashboard</a> --}}
            
            <form method="POST" action="{{ route('logout') }}" class="grid-item">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
            </form>
        </div>

    @else
        <div class="grid-container">
            <a href="#" class="grid-item">BLOG ME</a>
            <a href="#" class="grid-item">Home</a>
            <a href="#" class="grid-item">About</a>
            <a href="#" class="grid-item">Contact</a>
            <a href="#" class="grid-item">Dashboard</a>
            
            <form method="POST" action="{{ route('logout') }}" class="grid-item">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ Auth::user()->name }}
                    </x-dropdown-link>
            </form>
        </div>

    @endif
        
    @endauth
    
</nav>