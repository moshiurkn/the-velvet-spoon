<!-- Tailwind Top Header -->
<header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 z-10 sticky top-0 ml-64">
  <div class="flex items-center gap-4">
    <!-- Optional Search Bar placeholder -->
    <h2 class="text-xl font-semibold text-slate-800 hidden sm:block">Admin Overview</h2>
  </div>

  <div class="flex items-center gap-6">
    <a href="{{ url('/') }}" target="_blank"
      class="text-slate-500 hover:text-red-600 transition text-sm font-medium flex items-center gap-2">
      <i class="fa fa-globe"></i> View Site
    </a>

    <!-- Logout Form -->
    <form method="POST" action="{{ route('logout') }}" class="m-0">
      @csrf
      <button type="submit"
        class="flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">
        <i class="fa fa-sign-out-alt"></i> Logout
      </button>
    </form>
  </div>
</header>