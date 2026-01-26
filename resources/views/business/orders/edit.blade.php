@extends('master.layout')

@section('title', 'Edit Order')
@section('header_title', 'Orders')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <a href="{{ route('business.orders.index') }}" class="hover:text-gray-900">Orders</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-900 font-medium">Edit Order #{{ $id }}</span>
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Edit Order #ORD-{{ $id }}</h2>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Customer Information -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Customer Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Customer Name *</label>
                    <input type="text" name="customer_name" value="John Doe" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Phone Number *</label>
                    <input type="tel" name="phone" value="(555) 123-4567" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Email Address</label>
                    <input type="email" name="email" value="john@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Order Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Service Type *</label>
                    <select name="service_type" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                        <option>Wash & Fold</option>
                        <option>Dry Cleaning</option>
                        <option>Ironing</option>
                        <option>Premium Care</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Status *</label>
                    <select name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                        <option>Pending</option>
                        <option>Washing</option>
                        <option>Drying</option>
                        <option>Ready</option>
                        <option>Completed</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Weight (kg) *</label>
                    <input type="number" name="weight" value="4.5" required step="0.1" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Priority</label>
                    <select name="priority" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                        <option>Normal</option>
                        <option>Urgent</option>
                        <option>Express</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-between pt-4">
            <button type="button" class="px-6 py-2.5 bg-red-50 border border-red-200 text-red-700 rounded-md text-sm font-medium hover:bg-red-100 transition-colors">
                Delete Order
            </button>
            <div class="flex gap-3">
                <a href="{{ route('business.orders.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-gray-900 text-white rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                    Save Changes
                </button>
            </div>
        </div>

    </form>

</div>
@endsection

