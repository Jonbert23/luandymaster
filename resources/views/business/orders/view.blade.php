@extends('master.layout')

@section('title', 'Order Details')
@section('header_title', 'Orders')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="{{ route('business.orders.index') }}" class="hover:text-gray-900">Orders</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">Order Details</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">#ORD-{{ $id }}</h2>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('business.orders.edit', $id) }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50 transition-colors">
                Edit Order
            </a>
            <button class="px-4 py-2 bg-gray-900 text-white rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                Print Receipt
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Status -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Order Status</h3>
                <div class="flex items-center gap-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        Pending
                    </span>
                    <span class="text-sm text-gray-600">Created 2 hours ago</span>
                </div>
                <div class="mt-4 flex items-center gap-2">
                    <button class="px-4 py-2 bg-blue-50 text-blue-700 rounded-md text-sm font-medium hover:bg-blue-100">
                        Mark as Washing
                    </button>
                    <button class="px-4 py-2 bg-green-50 text-green-700 rounded-md text-sm font-medium hover:bg-green-100">
                        Mark as Ready
                    </button>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Customer Information</h3>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold">
                            JD
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">John Doe</p>
                            <p class="text-xs text-gray-500">Regular Customer</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 pt-3 border-t border-gray-100">
                        <div>
                            <p class="text-xs font-medium text-gray-500">Phone</p>
                            <p class="text-sm text-gray-900">(555) 123-4567</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500">Email</p>
                            <p class="text-sm text-gray-900">john@example.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Order Items</h3>
                <div class="space-y-3">
                    <div class="flex justify-between py-2">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Wash & Fold Service</p>
                            <p class="text-xs text-gray-500">4.5 kg @ $5.00/kg</p>
                        </div>
                        <p class="text-sm font-semibold text-gray-900">$22.50</p>
                    </div>
                    <div class="flex justify-between py-2">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Fabric Softener</p>
                            <p class="text-xs text-gray-500">Add-on</p>
                        </div>
                        <p class="text-sm font-semibold text-gray-900">$3.00</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <div class="flex justify-between text-base font-bold text-gray-900">
                        <span>Total</span>
                        <span>$25.50</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Timeline -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Timeline</h3>
                <div class="space-y-4">
                    <div class="flex gap-3">
                        <div class="w-2 h-2 rounded-full bg-blue-500 mt-1.5"></div>
                        <div>
                            <p class="text-xs font-medium text-gray-900">Order Created</p>
                            <p class="text-xs text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-2 h-2 rounded-full bg-gray-300 mt-1.5"></div>
                        <div>
                            <p class="text-xs font-medium text-gray-500">Pending pickup</p>
                            <p class="text-xs text-gray-400">Not started</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Payment</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Method</span>
                        <span class="font-medium text-gray-900">Cash</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Status</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Pending
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

