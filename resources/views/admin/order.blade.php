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
                        <h2 class="text-2xl font-bold text-slate-800 heading-font">Order Management</h2>
                        <p class="text-sm text-slate-500 mt-1">Review customer orders and update delivery statuses.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                                    <th class="px-5 py-4">Customer Details</th>
                                    <th class="px-5 py-4">Food Item</th>
                                    <th class="px-5 py-4">Status</th>
                                    <th class="px-5 py-4 text-center">Update Status Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm">
                                @foreach($data as $item)
                                <tr class="hover:bg-slate-50 transition group">
                                    <td class="px-5 py-4">
                                        <div class="font-medium text-slate-800">{{ $item->name }}</div>
                                        <div class="text-slate-500 text-xs mt-1"><i class="fa fa-phone mr-1"></i>{{
                                            $item->phone }}</div>
                                        <div class="text-slate-500 text-xs mt-1 truncate max-w-[150px]"><i
                                                class="fa fa-map-marker-alt mr-1"></i>{{ $item->address }}</div>
                                    </td>

                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">
                                            <img src="food_img/{{ $item->food_image }}" alt="{{ $item->titile }}"
                                                class="w-12 h-12 object-cover rounded shadow-sm">
                                            <div>
                                                <div class="font-medium text-slate-800">{{ $item->titile }}</div>
                                                <div class="text-slate-500 text-xs mt-0.5">Qty: {{ $item->quantity }}
                                                    <span class="mx-1">&bull;</span> <span
                                                        class="font-semibold text-emerald-600">${{ $item->price
                                                        }}</span></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-5 py-4 whitespace-nowrap">
                                        @if(strtolower($item->delivery_status) == 'delivered')
                                        <span
                                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Delivered
                                        </span>
                                        @elseif(strtolower($item->delivery_status) == 'on the way')
                                        <span
                                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 border border-indigo-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span> On the way
                                        </span>
                                        @elseif(strtolower($item->delivery_status) == 'canceled')
                                        <span
                                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Canceled
                                        </span>
                                        @else
                                        <span
                                            class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> {{
                                            $item->delivery_status }}
                                        </span>
                                        @endif
                                    </td>

                                    <td class="px-5 py-4 text-center">
                                        <div
                                            class="flex items-center justify-center gap-2 flex-wrap max-w-[200px] mx-auto">
                                            <a href="{{ url('on_the_way', $item->id) }}"
                                                class="inline-flex items-center justify-center px-3 py-1.5 rounded-md bg-indigo-50 hover:bg-indigo-100 text-indigo-600 transition text-xs font-medium border border-indigo-200"
                                                title="Mark On the way">
                                                <i class="fa fa-truck mr-1.5"></i> Transit
                                            </a>
                                            <a href="{{ url('delivered', $item->id) }}"
                                                class="inline-flex items-center justify-center px-3 py-1.5 rounded-md bg-emerald-50 hover:bg-emerald-100 text-emerald-600 transition text-xs font-medium border border-emerald-200"
                                                title="Mark Delivered">
                                                <i class="fa fa-check-circle mr-1.5"></i> Deliver
                                            </a>
                                            <a href="{{ url('canceled', $item->id) }}"
                                                onclick="return confirm('Confirm cancellation of this order?')"
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-md bg-red-50 hover:bg-red-100 text-red-600 transition border border-red-200"
                                                title="Cancel Order">
                                                <i class="fa fa-times text-xs"></i>
                                            </a>
                                        </div>
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
                            <i class="fa fa-receipt text-2xl"></i>
                        </div>
                        <h3 class="text-base font-medium text-slate-900">No Orders Present</h3>
                        <p class="mt-1 text-sm text-slate-500">When customers place orders, they will appear here.</p>
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    @include('admin.js')
</body>

</html>