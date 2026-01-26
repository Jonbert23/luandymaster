@extends('master.layout')

@section('title', 'Create New Order')
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
            <span class="text-gray-900 font-medium">Create New Order</span>
        </div>
        <h2 class="text-2xl font-bold text-gray-900">Create New Order</h2>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        
        <!-- Customer Information -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Customer Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Customer Name *</label>
                    <input type="text" name="customer_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="Enter customer name">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Phone Number *</label>
                    <input type="tel" name="phone" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="(555) 123-4567">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Email Address</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="customer@example.com">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Pickup Address</label>
                    <textarea name="address" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="Enter pickup address"></textarea>
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
                        <option value="">Select service</option>
                        <option>Wash & Fold</option>
                        <option>Dry Cleaning</option>
                        <option>Ironing</option>
                        <option>Premium Care</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Weight (kg) *</label>
                    <input type="number" name="weight" required step="0.1" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="0.0">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Pickup Date *</label>
                    <input type="date" name="pickup_date" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Delivery Date *</label>
                    <input type="date" name="delivery_date" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Priority</label>
                    <select name="priority" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                        <option>Normal</option>
                        <option>Urgent</option>
                        <option>Express</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Assigned Staff</label>
                    <select name="staff_id" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                        <option value="">Auto-assign</option>
                        <option>Sarah Johnson</option>
                        <option>Michael Chen</option>
                        <option>Emma Rodriguez</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Add-ons -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Add-ons (Optional)</h3>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-md hover:bg-gray-50 cursor-pointer">
                    <input type="checkbox" name="addons[]" value="fabric_softener" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Fabric Softener</p>
                        <p class="text-xs text-gray-500">Extra softness for fabrics</p>
                    </div>
                    <span class="text-sm font-semibold text-gray-900">+$3.00</span>
                </label>
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-md hover:bg-gray-50 cursor-pointer">
                    <input type="checkbox" name="addons[]" value="stain_removal" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Stain Removal</p>
                        <p class="text-xs text-gray-500">Deep stain treatment</p>
                    </div>
                    <span class="text-sm font-semibold text-gray-900">+$5.00</span>
                </label>
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-md hover:bg-gray-50 cursor-pointer">
                    <input type="checkbox" name="addons[]" value="eco_friendly" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Eco-Friendly Detergent</p>
                        <p class="text-xs text-gray-500">Biodegradable cleaning agents</p>
                    </div>
                    <span class="text-sm font-semibold text-gray-900">+$4.00</span>
                </label>
            </div>
        </div>

        <!-- Special Instructions -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Special Instructions</h3>
            <textarea name="instructions" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" placeholder="Add any special instructions for handling this order..."></textarea>
        </div>

        <!-- Payment Information -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Payment</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Payment Method *</label>
                    <select name="payment_method" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                        <option value="">Select method</option>
                        <option>Cash</option>
                        <option>Credit Card</option>
                        <option>Debit Card</option>
                        <option>Online Transfer</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1.5">Payment Status *</label>
                    <select name="payment_status" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                        <option>Pending</option>
                        <option>Paid</option>
                        <option>Partial</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('business.orders.index') }}" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-gray-900 text-white rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                Create Order
            </button>
        </div>

    </form>

</div>
@endsection

