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
                        <h2 class="text-2xl font-bold text-slate-800 heading-font">Registered Users</h2>
                        <p class="text-sm text-slate-500 mt-1">Manage customer accounts and administrative access.</p>
                    </div>
                </div>

                <!-- Notifications -->
                @if(session()->has('message'))
                <div
                    class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fa fa-check-circle text-emerald-500 flex-shrink-0"></i>
                        <p class="ml-3 text-sm text-emerald-700">{{ session()->get('message') }}</p>
                    </div>
                </div>
                @endif

                @if(session()->has('error'))
                <div
                    class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fa fa-exclamation-circle text-red-500 flex-shrink-0"></i>
                        <p class="ml-3 text-sm text-red-700">{{ session()->get('error') }}</p>
                    </div>
                </div>
                @endif

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                                    <th class="px-6 py-4">User Details</th>
                                    <th class="px-6 py-4">Contact</th>
                                    <th class="px-6 py-4">Registered Date</th>
                                    <th class="px-6 py-4 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm">
                                @foreach($users as $user)
                                <tr class="hover:bg-slate-50 transition group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-lg">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="font-medium text-slate-800">{{ $user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-slate-600">
                                            <div class="flex items-center gap-2"><i
                                                    class="fa fa-envelope text-slate-400 w-4"></i> {{ $user->email }}
                                            </div>
                                            @if($user->phone)
                                            <div class="flex items-center gap-2 mt-1"><i
                                                    class="fa fa-phone text-slate-400 w-4"></i> {{ $user->phone }}</div>
                                            @else
                                            <div class="flex items-center gap-2 mt-1 text-slate-400 italic"><i
                                                    class="fa fa-phone w-4"></i> N/A</div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-600">
                                        <div class="flex items-center gap-2">
                                            <i class="fa fa-calendar-alt text-slate-400"></i>
                                            {{ $user->created_at->format('M d, Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <a href="{{ url('delete_user', $user->id) }}"
                                            onclick="return confirm('WARNING: Are you sure you want to completely delete this user? This action cannot be undone.')"
                                            class="inline-flex items-center justify-center px-3 py-1.5 rounded-md bg-red-50 hover:bg-red-100 text-red-600 transition text-xs font-medium border border-red-200 group-hover:shadow"
                                            title="Delete User">
                                            <i class="fa fa-trash-alt mr-1.5"></i> Remove
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if(count($users) == 0)
                    <div class="px-6 py-12 text-center">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-4">
                            <i class="fa fa-users text-2xl"></i>
                        </div>
                        <h3 class="text-base font-medium text-slate-900">No Users Found</h3>
                        <p class="mt-1 text-sm text-slate-500">There are currently no registered users in the system.
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    @include('admin.js')
</body>

</html>