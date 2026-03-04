<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden flex">

  @include('admin.sidebar')

  <!-- Main Content Wrapper -->
  <div class="flex-1 flex flex-col min-h-screen ml-64 transition-all duration-300">
    @include('admin.header')

    <main class="flex-1 p-6 lg:p-8">
      <div class="max-w-7xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
          <div>
            <h2 class="text-2xl font-bold text-slate-800 heading-font">Reservations</h2>
            <p class="text-sm text-slate-500 mt-1">Manage table bookings and incoming reservations.</p>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr
                  class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                  <th class="px-6 py-4">Contact Phone</th>
                  <th class="px-6 py-4">Details</th>
                  <th class="px-6 py-4">Schedule</th>
                  <th class="px-6 py-4 text-center">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100 text-sm">
                @foreach($data as $item)
                <tr class="hover:bg-slate-50 transition group">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center gap-3">
                      <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                        <i class="fa fa-phone-alt"></i>
                      </div>
                      <span class="font-medium text-slate-800">{{ $item->phone }}</span>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center gap-2 text-slate-600">
                      <i class="fa fa-users text-slate-400"></i>
                      <span>{{ $item->guest }} Guests</span>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="font-medium text-slate-800">{{ $item->date }}</div>
                    <div class="text-slate-500 text-xs mt-0.5"><i class="fa fa-clock mr-1"></i>{{ $item->time }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-center">
                    <span
                      class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Confirmed
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          @if(count($data) == 0)
          <div class="px-6 py-12 text-center">
            <div
              class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-4">
              <i class="fa fa-calendar-alt text-2xl"></i>
            </div>
            <h3 class="text-base font-medium text-slate-900">No Reservations Yet</h3>
            <p class="mt-1 text-sm text-slate-500">Upcoming table bookings will be listed here.</p>
          </div>
          @endif
        </div>
      </div>
    </main>
  </div>

  @include('admin.js')
</body>

</html>