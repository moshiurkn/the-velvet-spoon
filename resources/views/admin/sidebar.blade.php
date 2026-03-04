<!-- Tailwind Sidebar -->
<aside class="w-64 bg-slate-900 text-slate-300 min-h-screen fixed left-0 top-0 flex flex-col shadow-xl z-20">
    <!-- Sidebar Header / Logo -->
    <div class="h-16 flex items-center justify-center bg-slate-950 border-b border-slate-800">
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <div
                class="w-8 h-8 flex items-center justify-center bg-red-600 font-bold text-white rounded-md heading-font">
                VS</div>
            <span class="text-white font-semibold text-lg hover:text-red-500 transition">Velvet Spoon Admin</span>
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 py-6 px-4 space-y-2 overflow-y-auto">
        <a href="{{ url('admin/dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition group {{ request()->is('admin/dashboard') ? 'bg-red-600 text-white hover:bg-red-700' : '' }}">
            <i
                class="fa fa-home w-5 text-center group-hover:text-red-400 {{ request()->is('admin/dashboard') ? 'text-white' : '' }}"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Food Dropdown -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition group">
                <div class="flex items-center gap-3">
                    <i class="fa fa-utensils w-5 text-center group-hover:text-red-400"></i>
                    <span class="font-medium">Food Menu</span>
                </div>
                <i class="fa fa-chevron-down text-xs transition-transform" :class="open ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="open" class="mt-2 ml-4 pl-4 border-l border-slate-700 space-y-1" x-transition>
                <a href="{{ url('add_food') }}"
                    class="block px-4 py-2 text-sm rounded-lg hover:bg-slate-800 hover:text-white transition">Add
                    Food</a>
                <a href="{{ url('view_food') }}"
                    class="block px-4 py-2 text-sm rounded-lg hover:bg-slate-800 hover:text-white transition">View
                    Food</a>
            </div>
        </div>

        <a href="{{ url('orders') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition group">
            <i class="fa fa-shopping-cart w-5 text-center group-hover:text-red-400"></i>
            <span class="font-medium">Orders</span>
        </a>

        <a href="{{ url('reservations') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition group">
            <i class="fa fa-calendar-check w-5 text-center group-hover:text-red-400"></i>
            <span class="font-medium">Reservations</span>
        </a>

        <a href="{{ url('users') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition group">
            <i class="fa fa-users w-5 text-center group-hover:text-red-400"></i>
            <span class="font-medium">Users</span>
        </a>
    </nav>
</aside>