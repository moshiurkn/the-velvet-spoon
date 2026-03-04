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

                @auth
                <a href="{{ route('profile.show') }}"
                    class="text-slate-600 hover:text-red-600 font-medium transition duration-200">Profile</a>
                @endauth
            </div>

            <!-- Auth/Cart Buttons -->
            <div class="hidden lg:flex items-center space-x-4">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('my_cart') }}"
                    class="relative text-slate-700 hover:text-red-600 transition duration-200">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    @php
                    $cartCount = \App\Http\Controllers\HomeController::getCartCount();
                    @endphp
                    @if($cartCount > 0)
                    <span
                        class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">{{
                        $cartCount }}</span>
                    @endif
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-slate-800 hover:bg-slate-700 text-white px-5 py-2 rounded-full font-medium transition duration-300 shadow-md">Logout</button>
                </form>
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
            <a href="{{ route('profile.show') }}"
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

<!-- Hero Section -->
<header id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-slate-900">
    <div class="absolute inset-0 opacity-40 mix-blend-multiply">
        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=2000&auto=format&fit=crop"
            alt="Restaurant Interior" class="w-full h-full object-cover" />
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span
            class="inline-block py-1 px-3 rounded-full bg-red-600/20 text-red-400 font-semibold text-sm tracking-wider uppercase mb-4 border border-red-500/30 backdrop-blur-sm">Welcome
            to our restaurant</span>

        <h1 class="heading-font text-5xl md:text-7xl font-bold text-white mb-6 drop-shadow-lg">
            The Velvet Spoon
        </h1>

        <p class="mt-4 text-xl md:text-2xl text-slate-200 max-w-3xl mx-auto font-light mb-10 drop-shadow-md">
            Always Fresh & Delightful. Experience the finest culinary journey featuring exquisite flavors and remarkable
            ambiance.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#blog"
                class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition duration-300 shadow-[0_0_20px_rgba(220,38,38,0.4)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)] transform hover:-translate-y-1">
                Explore Menu
            </a>
            <a href="#book-table"
                class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-semibold text-lg transition duration-300 transform hover:-translate-y-1">
                Book a Table
            </a>
        </div>
    </div>

    <!-- Decorative bottom wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-12 md:h-24" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118,130.85,133.56,203.4,129.21,241.67,126.92,280.4,116.14,321.39,56.44Z"
                class="fill-slate-50"></path>
        </svg>
    </div>
</header>