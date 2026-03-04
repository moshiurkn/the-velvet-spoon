<!-- Navbar -->
<nav x-data="{ open: false }" class="fixed w-full z-50 glass-nav transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 bg-red-600 text-white rounded-xl flex items-center justify-center font-bold text-2xl heading-font shadow-lg">
                        VS</div>
                    <span class="heading-font font-bold text-2xl text-slate-800">The Velvet Spoon</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:space-x-8">
                <a href="#home" class="text-slate-600 hover:text-red-600 font-medium transition duration-200">Home</a>
                <a href="#about" class="text-slate-600 hover:text-red-600 font-medium transition duration-200">About</a>
                <a href="#gallary"
                    class="text-slate-600 hover:text-red-600 font-medium transition duration-200">Gallery</a>
                <a href="#book-table" class="text-slate-600 hover:text-red-600 font-medium transition duration-200">Book
                    Table</a>
                <a href="#blog" class="text-slate-600 hover:text-red-600 font-medium transition duration-200">Menu</a>
                <a href="#contact"
                    class="text-slate-600 hover:text-red-600 font-medium transition duration-200">Contact</a>

            </div>

            <!-- Auth/Cart Buttons -->
            <div class="hidden lg:flex items-center space-x-4">
                @if (Route::has('login'))
                @auth
                {{-- Cart Icon --}}
                <a href="{{ url('my_cart') }}"
                    class="relative text-slate-700 hover:text-red-600 transition duration-200">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    @php $cartCount = \App\Http\Controllers\HomeController::getCartCount(); @endphp
                    @if($cartCount > 0)
                    <span
                        class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">{{
                        $cartCount }}</span>
                    @endif
                </a>
                {{-- User Dropdown --}}
                <div class="relative" x-data="{ userOpen: false }">
                    <button @click="userOpen = !userOpen" @click.away="userOpen = false"
                        class="flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-full font-medium transition duration-300 shadow-md">
                        <div class="w-7 h-7 bg-red-600 rounded-full flex items-center justify-center text-sm font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="max-w-[100px] truncate text-sm">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-xs text-slate-400 transition-transform"
                            :class="userOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="userOpen" x-transition
                        class="absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50"
                        style="display:none;">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-xs text-gray-400">Signed in as</p>
                            <p class="text-sm font-semibold text-slate-800 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('user.profile') }}"
                            class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-red-50 hover:text-red-600 transition text-sm">
                            <i class="fas fa-user-circle w-4"></i> My Profile
                        </a>
                        <a href="{{ route('user.profile') }}?tab=orders"
                            class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-red-50 hover:text-red-600 transition text-sm">
                            <i class="fas fa-receipt w-4"></i> My Orders
                        </a>
                        <a href="{{ route('user.profile') }}?tab=reservations"
                            class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-red-50 hover:text-red-600 transition text-sm">
                            <i class="fas fa-calendar-alt w-4"></i> My Reservations
                        </a>
                        <div class="border-t border-gray-100">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-red-50 hover:text-red-600 transition text-sm">
                                    <i class="fas fa-sign-out-alt w-4"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}"
                    class="text-slate-600 hover:text-red-600 font-medium transition duration-200">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full font-medium shadow-lg hover:shadow-xl transition duration-300">Register</a>
                @endauth
                @endif
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <button @click="open = !open" type="button"
                    class="text-slate-600 hover:text-red-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" @click.away="open = false"
        class="lg:hidden bg-white shadow-xl absolute w-full left-0 border-t border-gray-100" style="display: none;">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="#home"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Home</a>
            <a href="#about"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">About</a>
            <a href="#gallary"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Gallery</a>
            <a href="#book-table"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Book
                Table</a>
            <a href="#blog"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Menu</a>
            <a href="#contact"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Contact</a>

            @auth
            <a href="{{ url('my_cart') }}"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">My Cart
                ({{ \App\Http\Controllers\HomeController::getCartCount() }})</a>
            <a href="{{ route('user.profile') }}"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Profile</a>
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="block w-full text-left px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Logout</button>
            </form>
            @else
            <a href="{{ route('login') }}"
                class="block px-3 py-2 text-slate-700 font-medium hover:bg-red-50 hover:text-red-600 rounded-md">Login</a>
            <a href="{{ route('register') }}"
                class="block px-3 py-2 text-red-600 font-medium hover:bg-red-50 rounded-md">Register</a>
            @endauth
        </div>
    </div>
</nav>
