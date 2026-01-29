<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POS System - LaundryMaster</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.png') }}">
    
    <!-- CSS -->
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .pos-container {
            display: flex;
            height: 100vh;
            background: #f5f5f5;
        }
        .pos-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: white;
            overflow: hidden;
        }
        .pos-right {
            width: 420px;
            display: flex;
            flex-direction: column;
            background: white;
            border-left: 1px solid #e5e7eb;
            box-shadow: -2px 0 10px rgba(0,0,0,0.05);
        }
        .pos-header {
            padding: 1rem 1.5rem;
            border-bottom: 2px solid #f3f4f6;
            background: white;
            z-index: 10;
        }
        .pos-search {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
        }
        .pos-items {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
        }
        .item-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }
        .item-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }
        .item-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            border-color: #2769ee;
        }
        .item-card.out-of-stock {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .item-card.out-of-stock:hover {
            transform: none;
            box-shadow: none;
        }
        .item-image {
            width: 80px;
            height: 80px;
            margin: 0 auto 0.75rem;
            border-radius: 10px;
            overflow: hidden;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .item-icon {
            font-size: 2rem;
        }
        .cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
        }
        .cart-item {
            background: #f9fafb;
            border-radius: 8px;
            margin-bottom: 0.75rem;
        }
        .cart-totals {
            padding: 1rem 1.5rem;
            border-top: 2px solid #f3f4f6;
            background: #f9fafb;
        }
        .cart-actions {
            padding: 1rem 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        .qty-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .qty-btn {
            width: 24px;
            height: 24px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
        }
        .qty-btn:hover {
            background: #f3f4f6;
        }
        .qty-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f3f4f6;
        }
        .tab-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            border: none;
            background: #f3f4f6;
            color: #6b7280;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        .tab-btn.active {
            background: #2769ee;
            color: white;
        }
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }
        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }
        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }
        .btn-primary {
            background: #2769ee;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-primary:hover {
            background: #1e40af;
        }
        .btn-primary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-secondary:hover {
            background: #e5e7eb;
        }
        .empty-cart {
            text-align: center;
            padding: 3rem 1rem;
            color: #9ca3af;
        }
        .empty-cart i {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: block;
            opacity: 0.3;
        }
        
        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .modal-body {
            padding: 1.5rem;
        }
        .modal-footer {
            padding: 1.5rem;
            border-top: 1px solid #e5e7eb;
            display: flex;
            gap: 0.75rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.3s;
        }
        .form-input:focus {
            outline: none;
            border-color: #2769ee;
            box-shadow: 0 0 0 3px rgba(39, 105, 238, 0.1);
        }
        .payment-options {
            display: grid;
            gap: 0.75rem;
        }
        .payment-option {
            padding: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .payment-option:hover {
            border-color: #2769ee;
            background: #f0f7ff;
        }
        .payment-option.selected {
            border-color: #2769ee;
            background: #2769ee;
            color: white;
        }
        .payment-option input[type="radio"] {
            width: 20px;
            height: 20px;
        }
        
        /* Receipt Styles */
        .receipt-container {
            background: white;
            max-width: 400px;
            margin: 0 auto;
        }
        .receipt-header {
            text-align: center;
            padding: 2rem 1.5rem 1rem;
            border-bottom: 2px dashed #d1d5db;
        }
        .receipt-body {
            padding: 1.5rem;
        }
        .receipt-footer {
            padding: 1rem 1.5rem 2rem;
            text-align: center;
            border-top: 2px dashed #d1d5db;
        }
        .receipt-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            font-size: 0.875rem;
        }
        .receipt-row.total {
            font-weight: bold;
            font-size: 1.125rem;
            padding-top: 1rem;
            border-top: 2px solid #d1d5db;
            margin-top: 0.5rem;
        }
        .qr-code {
            display: flex;
            justify-content: center;
            margin: 1rem 0;
        }
        .receipt-items {
            margin: 1rem 0;
        }
        .receipt-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            font-size: 0.875rem;
            border-bottom: 1px solid #f3f4f6;
        }
        .receipt-info {
            margin-bottom: 1rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 8px;
        }
        .receipt-info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.25rem 0;
            font-size: 0.875rem;
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            .receipt-container, .receipt-container * {
                visibility: visible;
            }
            .receipt-container {
                position: absolute;
                left: 0;
                top: 0;
            }
            .modal-footer {
                display: none;
            }
        }
        
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body>
    <div class="pos-container" x-data="posSystem()">
        <!-- Left Side - Items -->
        <div class="pos-left">
            <!-- Header -->
            <div class="pos-header">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('business.dashboard') }}" class="flex items-center gap-2 text-gray-600 hover:text-gray-900">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        <div class="h-6 w-px bg-gray-300"></div>
                        <h1 class="text-2xl font-bold text-gray-900">Point of Sale</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-600">Cashier: <strong>{{ Auth::user()->name }}</strong></span>
                        <span class="text-sm text-gray-600">|</span>
                        <span class="text-sm text-gray-600" x-text="currentTime"></span>
                    </div>
                </div>
            </div>

            <!-- Category Tabs -->
            <div class="pos-search">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex gap-2">
                        <button class="tab-btn" :class="{'active': category === 'all'}" @click="category = 'all'">
                            All Items
                        </button>
                        <button class="tab-btn" :class="{'active': category === 'products'}" @click="category = 'products'">
                            Products
                        </button>
                        <button class="tab-btn" :class="{'active': category === 'services'}" @click="category = 'services'">
                            Services
                        </button>
                    </div>
                    <div class="relative" style="width: 300px;">
                        <input 
                            type="text" 
                            x-model="searchQuery"
                            class="w-full py-2 px-4 pr-10 rounded-lg border border-gray-300 focus:border-primary focus:outline-none" 
                            placeholder="Search items...">
                        <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Items Grid -->
            <div class="pos-items">
                <div class="item-grid">
                    <template x-for="item in filteredItems" :key="item.id">
                        <div class="item-card" 
                             :class="{'out-of-stock': item.type === 'product' && item.stock === 0}"
                             @click="addToCart(item)">
                            <div class="item-image" x-show="item.image">
                                <img :src="item.image" :alt="item.name" loading="lazy">
                            </div>
                            <div class="item-image" x-show="!item.image && item.icon" :style="`background: ${item.iconBg || '#2769ee'}`">
                                <i class="item-icon text-white" :class="item.icon"></i>
                            </div>
                            <h6 class="text-sm font-semibold text-gray-900 mb-1" x-text="item.name"></h6>
                            <p class="text-xs text-gray-500 mb-2" x-show="item.type === 'service'" x-text="item.unit"></p>
                            <p class="text-base font-bold text-primary" x-text="'$' + (parseFloat(item.price) || 0).toFixed(2)"></p>
                            <template x-if="item.type === 'product'">
                                <span class="badge mt-2" 
                                      :class="item.stock > 50 ? 'badge-success' : item.stock > 0 ? 'badge-warning' : 'badge-danger'"
                                      x-text="item.stock > 0 ? `Stock: ${item.stock}` : 'Out of Stock'">
                                </span>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Right Side - Cart -->
        <div class="pos-right">
            <!-- Cart Header -->
            <div class="pos-header">
                <h2 class="text-lg font-bold text-gray-900">Current Order</h2>
                <p class="text-sm text-gray-600 mt-1">Order #<span x-text="orderNumber"></span></p>
            </div>

            <!-- Cart Items -->
            <div class="cart-items">
                <div x-show="cartItems.length === 0" class="empty-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <p class="text-base font-medium">Cart is empty</p>
                    <p class="text-sm mt-2">Add items to start a transaction</p>
                </div>

                <template x-for="(item, index) in cartItems" :key="index">
                    <div class="cart-item" style="display: block; padding: 0.75rem;">
                        <!-- Product Name (Truncated) -->
                        <div class="mb-2">
                            <h6 class="text-sm font-semibold text-gray-900 truncate" x-text="item.name" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"></h6>
                        </div>
                        
                        <!-- Quantity, Price, Delete (All Horizontal) -->
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem;">
                            <!-- Quantity Controls -->
                            <div class="qty-control">
                                <button class="qty-btn" @click="decreaseQuantity(index)">
                                    <i class="fas fa-minus" style="font-size: 10px;"></i>
                                </button>
                                <span class="text-sm font-medium w-8 text-center" x-text="item.quantity"></span>
                                <button class="qty-btn" @click="increaseQuantity(index)" :disabled="item.type === 'product' && item.quantity >= item.stock">
                                    <i class="fas fa-plus" style="font-size: 10px;"></i>
                                </button>
    </div>

                            <!-- Price and Delete -->
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <p class="text-sm font-bold text-gray-900" style="min-width: 55px; text-align: right;" x-text="'$' + ((parseFloat(item.price) || 0) * item.quantity).toFixed(2)"></p>
                                <button @click="removeFromCart(index)" class="text-red-500 hover:text-red-700" style="padding: 4px; line-height: 1;">
                                    <i class="fas fa-trash" style="font-size: 14px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Totals -->
            <div class="cart-totals">
                <div class="flex justify-between pt-3">
                    <span class="text-lg font-bold text-gray-900">Total</span>
                    <span class="text-lg font-bold text-primary" x-text="'$' + (subtotal || 0).toFixed(2)"></span>
                </div>
            </div>

            <!-- Actions -->
            <div class="cart-actions space-y-2">
                <button class="btn-primary" :disabled="cartItems.length === 0" @click="showCheckoutModal = true">
                    Process Payment
                </button>
                <div class="grid grid-cols-2 gap-2">
                   
                    <button class="btn-secondary" :disabled="cartItems.length === 0" @click="clearCart()">
                        Clear
                    </button>
                </div>
            </div>
        </div>

        <!-- Checkout Modal -->
        <div x-show="showCheckoutModal" class="modal-overlay" @click.self="showCheckoutModal = false" style="display: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-xl font-bold text-gray-900">Customer & Payment Details</h3>
                    <button @click="showCheckoutModal = false" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="processPayment()">
                        <div class="form-group">
                            <label class="form-label">Customer Name *</label>
                            <input type="text" x-model="checkoutForm.customerName" class="form-input" placeholder="Enter customer name" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Contact Number *</label>
                            <input type="tel" x-model="checkoutForm.customerContact" class="form-input" placeholder="Enter contact number" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email (Optional)</label>
                            <input type="email" x-model="checkoutForm.customerEmail" class="form-input" placeholder="Enter email address">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Payment Method *</label>
                            <div class="payment-options">
                                <label class="payment-option" :class="{'selected': checkoutForm.paymentMethod === 'full'}">
                                    <input type="radio" name="payment" value="full" x-model="checkoutForm.paymentMethod" required>
                                    <div class="flex-1">
                                        <div class="font-semibold">Fully Paid</div>
                                        <div class="text-sm" x-text="'Pay $' + (total || 0).toFixed(2) + ' now'"></div>
                                    </div>
                                    <i class="fas fa-check-circle text-xl"></i>
                                </label>

                                <label class="payment-option" :class="{'selected': checkoutForm.paymentMethod === 'partial'}">
                                    <input type="radio" name="payment" value="partial" x-model="checkoutForm.paymentMethod" required>
                                    <div class="flex-1">
                                        <div class="font-semibold">Partial Payment</div>
                                        <div class="text-sm">Pay partial amount now</div>
                                    </div>
                                    <i class="fas fa-wallet text-xl"></i>
                                </label>

                                <label class="payment-option" :class="{'selected': checkoutForm.paymentMethod === 'pickup'}">
                                    <input type="radio" name="payment" value="pickup" x-model="checkoutForm.paymentMethod" required>
                                    <div class="flex-1">
                                        <div class="font-semibold">Pay on Pickup</div>
                                        <div class="text-sm">Pay when collecting items</div>
                                    </div>
                                    <i class="fas fa-hand-holding-usd text-xl"></i>
                                </label>
                            </div>
                        </div>

                        <div x-show="checkoutForm.paymentMethod === 'partial'" class="form-group">
                            <label class="form-label">Partial Payment Amount *</label>
                            <input type="number" step="0.01" x-model="checkoutForm.partialAmount" class="form-input" placeholder="Enter amount" :max="total">
                            <p class="text-xs text-gray-500 mt-1">Remaining: $<span x-text="((total || 0) - (parseFloat(checkoutForm.partialAmount) || 0)).toFixed(2)"></span></p>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pickup Date</label>
                            <input type="date" x-model="checkoutForm.pickupDate" class="form-input" :min="new Date().toISOString().split('T')[0]">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Notes (Optional)</label>
                            <textarea x-model="checkoutForm.notes" class="form-input" rows="3" placeholder="Add any special instructions..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary" @click="showCheckoutModal = false" style="width: auto; flex: 1;">
                        Cancel
                    </button>
                    <button type="button" class="btn-primary" @click="processPayment()" style="width: auto; flex: 1;">
                        <i class="fas fa-check mr-2"></i>Complete Order
                    </button>
                </div>
            </div>
        </div>

        <!-- Receipt Modal -->
        <div x-show="showReceiptModal" class="modal-overlay" @click.self="showReceiptModal = false" style="display: none;">
            <div class="modal-content" style="max-width: 500px;">
                <div class="receipt-container">
                    <div class="receipt-header">
                        <img src="{{ asset('template/assets/images/logo-full.png') }}" alt="Logo" style="width: 150px; margin: 0 auto 1rem;">
                        <h2 class="text-2xl font-bold text-gray-900">LAUNDRY RECEIPT</h2>
                        <p class="text-sm text-gray-600 mt-2">Thank you for your business!</p>
                    </div>

                    <div class="receipt-body">
                        <div class="receipt-info">
                            <div class="receipt-info-row">
                                <span class="text-gray-600">Receipt #:</span>
                                <span class="font-semibold" x-text="receiptData.orderNumber"></span>
                            </div>
                            <div class="receipt-info-row">
                                <span class="text-gray-600">Date:</span>
                                <span class="font-semibold" x-text="receiptData.date"></span>
                            </div>
                            <div class="receipt-info-row">
                                <span class="text-gray-600">Customer:</span>
                                <span class="font-semibold" x-text="receiptData.customerName"></span>
                            </div>
                            <div class="receipt-info-row">
                                <span class="text-gray-600">Contact:</span>
                                <span class="font-semibold" x-text="receiptData.customerContact"></span>
                            </div>
                            <div class="receipt-info-row" x-show="receiptData.pickupDate">
                                <span class="text-gray-600">Pickup Date:</span>
                                <span class="font-semibold" x-text="receiptData.pickupDate"></span>
                            </div>
                            <div class="receipt-info-row">
                                <span class="text-gray-600">Cashier:</span>
                                <span class="font-semibold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>

                        <div class="receipt-items">
                            <h4 class="font-bold text-gray-900 mb-2">Items</h4>
                            <template x-for="item in receiptData.items" :key="item.id">
                                <div class="receipt-item">
                                    <div>
                                        <div class="font-medium" x-text="item.name"></div>
                                        <div class="text-xs text-gray-500" x-text="'$' + (parseFloat(item.price) || 0).toFixed(2) + ' × ' + item.quantity"></div>
                                    </div>
                                    <div class="font-semibold" x-text="'$' + ((parseFloat(item.price) || 0) * item.quantity).toFixed(2)"></div>
                                </div>
                            </template>
                        </div>

                        <div style="margin-top: 1rem;">
                            <div class="receipt-row total">
                                <span>Total:</span>
                                <span x-text="'$' + (receiptData.total || 0).toFixed(2)"></span>
                            </div>

                            <template x-if="receiptData.paymentMethod === 'partial'">
                                <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #d1d5db;">
                                    <div class="receipt-row">
                                        <span class="text-gray-600">Paid Amount:</span>
                                        <span class="text-green-600 font-semibold" x-text="'$' + (receiptData.paidAmount || 0).toFixed(2)"></span>
                                    </div>
                                    <div class="receipt-row">
                                        <span class="text-gray-600">Balance Due:</span>
                                        <span class="text-red-600 font-semibold" x-text="'$' + (receiptData.balanceDue || 0).toFixed(2)"></span>
                                    </div>
                                </div>
                            </template>

                            <div style="margin-top: 1rem; padding: 1rem; background: #fef3c7; border-radius: 8px; text-align: center;">
                                <div class="font-semibold text-gray-900 mb-1">Payment Status</div>
                                <div class="text-lg font-bold" x-text="receiptData.paymentStatus" 
                                     :class="{
                                         'text-green-600': receiptData.paymentMethod === 'full',
                                         'text-yellow-600': receiptData.paymentMethod === 'partial',
                                         'text-blue-600': receiptData.paymentMethod === 'pickup'
                                     }"></div>
                            </div>
                        </div>

                        <div class="qr-code">
                            <div id="qrcode" style="display: inline-block;"></div>
                        </div>

                        <div class="text-center text-xs text-gray-500" x-show="receiptData.notes">
                            <p class="font-semibold">Notes:</p>
                            <p x-text="receiptData.notes"></p>
                        </div>
                    </div>

                    <div class="receipt-footer">
                        <p class="text-sm text-gray-600 mb-2">Please keep this receipt for pickup</p>
                        <p class="text-xs text-gray-500">Scan QR code to track your order</p>
                        <p class="text-xs text-gray-400 mt-4">LaundryMaster POS System</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-secondary" @click="printReceipt()" style="width: auto; flex: 1;">
                        <i class="fas fa-print mr-2"></i>Print Receipt
                    </button>
                    <button type="button" class="btn-primary" @click="closeReceipt()" style="width: auto; flex: 1;">
                        <i class="fas fa-check mr-2"></i>Done
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('template/assets/vendor/global/global.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    
    <script>
        function posSystem() {
            return {
                category: 'all',
                searchQuery: '',
                cartItems: [],
                orderNumber: String(Math.floor(Math.random() * 10000)).padStart(4, '0'),
                currentTime: '',
                showCheckoutModal: false,
                showReceiptModal: false,
                checkoutForm: {
                    customerName: '',
                    customerContact: '',
                    customerEmail: '',
                    paymentMethod: 'full',
                    partialAmount: 0,
                    pickupDate: '',
                    notes: ''
                },
                receiptData: {
                    orderNumber: '',
                    date: '',
                    customerName: '',
                    customerContact: '',
                    customerEmail: '',
                    pickupDate: '',
                    items: [],
                    total: 0,
                    paymentMethod: '',
                    paymentStatus: '',
                    paidAmount: 0,
                    balanceDue: 0,
                    notes: ''
                },
                
                // All available items (products + services)
                items: [
                    // Products - Detergents & Cleaning Agents
                    { id: 1, type: 'product', name: 'Premium Laundry Detergent', sku: 'LD-001', price: '12.99', stock: 150, image: 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=150&h=150&fit=crop' },
                    { id: 2, type: 'product', name: 'Eco-Friendly Detergent', sku: 'LD-002', price: '16.99', stock: 85, image: 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=150&h=150&fit=crop' },
                    { id: 3, type: 'product', name: 'Concentrated Liquid Detergent', sku: 'LD-003', price: '18.99', stock: 120, image: 'https://images.unsplash.com/photo-1563453392212-326f5e854473?w=150&h=150&fit=crop' },
                    { id: 4, type: 'product', name: 'Washing Powder 5kg', sku: 'WP-006', price: '15.99', stock: 65, image: 'https://images.unsplash.com/photo-1604335399105-a0c585fd81a1?w=150&h=150&fit=crop' },
                    { id: 5, type: 'product', name: 'Heavy Duty Detergent', sku: 'LD-004', price: '19.99', stock: 45, image: 'https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?w=150&h=150&fit=crop' },
                    
                    // Fabric Care Products
                    { id: 6, type: 'product', name: 'Lavender Fabric Softener', sku: 'FS-002', price: '8.99', stock: 120, image: 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=150&h=150&fit=crop' },
                    { id: 7, type: 'product', name: 'Fresh Linen Fabric Softener', sku: 'FS-003', price: '9.49', stock: 95, image: 'https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?w=150&h=150&fit=crop' },
                    { id: 8, type: 'product', name: 'Delicate Fabric Wash', sku: 'DW-008', price: '10.99', stock: 78, image: 'https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?w=150&h=150&fit=crop' },
                    { id: 9, type: 'product', name: 'Wool & Silk Wash', sku: 'DW-009', price: '13.99', stock: 42, image: 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=150&h=150&fit=crop' },
                    { id: 10, type: 'product', name: 'Dryer Sheets (100ct)', sku: 'DS-005', price: '4.99', stock: 200, image: 'https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?w=150&h=150&fit=crop' },
                    { id: 11, type: 'product', name: 'Dryer Balls Set', sku: 'DB-011', price: '12.99', stock: 35, image: 'https://images.unsplash.com/photo-1631889993959-41b4e9c6e3c5?w=150&h=150&fit=crop' },
                    
                    // Stain Removers & Bleach
                    { id: 12, type: 'product', name: 'Advanced Stain Remover', sku: 'SR-003', price: '6.99', stock: 88, image: 'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?w=150&h=150&fit=crop' },
                    { id: 13, type: 'product', name: 'Oxygen Bleach', sku: 'BL-004', price: '5.49', stock: 140, image: 'https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=150&h=150&fit=crop' },
                    { id: 14, type: 'product', name: 'Color Safe Bleach', sku: 'CB-007', price: '7.49', stock: 95, image: 'https://images.unsplash.com/photo-1583947215259-38e31be8751f?w=150&h=150&fit=crop' },
                    { id: 15, type: 'product', name: 'Pre-Treatment Spray', sku: 'SR-012', price: '8.99', stock: 62, image: 'https://images.unsplash.com/photo-1585421514738-01798e348b17?w=150&h=150&fit=crop' },
                    { id: 16, type: 'product', name: 'Enzyme Stain Remover', sku: 'SR-013', price: '11.99', stock: 54, image: 'https://images.unsplash.com/photo-1563453392212-326f5e854473?w=150&h=150&fit=crop' },
                    
                    // Specialty Products
                    { id: 17, type: 'product', name: 'Baby Laundry Detergent', sku: 'BD-010', price: '14.99', stock: 110, image: 'https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?w=150&h=150&fit=crop' },
                    { id: 18, type: 'product', name: 'Sports Wash Detergent', sku: 'SD-009', price: '13.99', stock: 48, image: 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=150&h=150&fit=crop' },
                    { id: 19, type: 'product', name: 'Activewear Detergent', sku: 'AW-014', price: '15.99', stock: 36, image: 'https://images.unsplash.com/photo-1556906781-9a412961c28c?w=150&h=150&fit=crop' },
                    { id: 20, type: 'product', name: 'Pet Hair Remover Spray', sku: 'PH-015', price: '9.99', stock: 72, image: 'https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?w=150&h=150&fit=crop' },
                    
                    // Accessories
                    { id: 21, type: 'product', name: 'Mesh Laundry Bags (3pk)', sku: 'LB-016', price: '7.99', stock: 125, image: 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=150&h=150&fit=crop' },
                    { id: 22, type: 'product', name: 'Lint Roller', sku: 'LR-017', price: '3.99', stock: 180, image: 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=150&h=150&fit=crop' },
                    { id: 23, type: 'product', name: 'Clothes Hangers (20pk)', sku: 'CH-018', price: '12.99', stock: 90, image: 'https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?w=150&h=150&fit=crop' },
                    { id: 24, type: 'product', name: 'Laundry Hamper Bag', sku: 'LH-019', price: '18.99', stock: 42, image: 'https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?w=150&h=150&fit=crop' },
                    { id: 25, type: 'product', name: 'Drying Rack Folding', sku: 'DR-020', price: '24.99', stock: 28, image: 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=150&h=150&fit=crop' },
                    
                    // Fresheners & Scents
                    { id: 26, type: 'product', name: 'Lavender Linen Spray', sku: 'LS-021', price: '6.49', stock: 95, image: 'https://images.unsplash.com/photo-1585421514738-01798e348b17?w=150&h=150&fit=crop' },
                    { id: 27, type: 'product', name: 'Fresh Cotton Scent Booster', sku: 'SB-022', price: '8.99', stock: 110, image: 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=150&h=150&fit=crop' },
                    { id: 28, type: 'product', name: 'Cedar Sachet Set', sku: 'CS-023', price: '11.99', stock: 65, image: 'https://images.unsplash.com/photo-1563453392212-326f5e854473?w=150&h=150&fit=crop' },
                    { id: 29, type: 'product', name: 'Laundry Detergent Pods', sku: 'LP-024', price: '16.99', stock: 88, image: 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=150&h=150&fit=crop' },
                    { id: 30, type: 'product', name: 'Ironing Water Spray', sku: 'IW-025', price: '5.99', stock: 74, image: 'https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?w=150&h=150&fit=crop' },
                    
                    // Services - Basic Laundry
                    { id: 101, type: 'service', name: 'Wash & Fold', unit: 'Per Kilo', price: '15.99', icon: 'fas fa-tshirt', iconBg: '#2769ee' },
                    { id: 102, type: 'service', name: 'Wash, Dry & Fold', unit: 'Per Kilo', price: '18.99', icon: 'fas fa-tshirt', iconBg: '#1e40af' },
                    { id: 103, type: 'service', name: 'Express Wash (6hrs)', unit: 'Per Kilo', price: '29.99', icon: 'fas fa-bolt', iconBg: '#e1b746' },
                    { id: 104, type: 'service', name: 'Same Day Service', unit: 'Per Load', price: '24.99', icon: 'fas fa-clock', iconBg: '#f59e0b' },
                    { id: 105, type: 'service', name: 'Eco-Friendly Wash', unit: 'Per Kilo', price: '19.99', icon: 'fas fa-leaf', iconBg: '#10b981' },
                    
                    // Services - Dry Cleaning
                    { id: 106, type: 'service', name: 'Dry Cleaning - Suit', unit: 'Per Piece', price: '25.00', icon: 'fas fa-user-tie', iconBg: '#47ae3b' },
                    { id: 107, type: 'service', name: 'Dry Cleaning - Dress', unit: 'Per Piece', price: '22.00', icon: 'fas fa-female', iconBg: '#ec4899' },
                    { id: 108, type: 'service', name: 'Dry Cleaning - Coat', unit: 'Per Piece', price: '28.00', icon: 'fas fa-vest', iconBg: '#8b5cf6' },
                    { id: 109, type: 'service', name: 'Dry Cleaning - Pants', unit: 'Per Piece', price: '12.00', icon: 'fas fa-male', iconBg: '#3b82f6' },
                    
                    // Services - Pressing & Ironing
                    { id: 110, type: 'service', name: 'Ironing Service', unit: 'Per Piece', price: '12.99', icon: 'fas fa-fire', iconBg: '#8030d0' },
                    { id: 111, type: 'service', name: 'Steam Press', unit: 'Per Piece', price: '15.99', icon: 'fas fa-burn', iconBg: '#dc2626' },
                    { id: 112, type: 'service', name: 'Express Ironing', unit: 'Per Piece', price: '19.99', icon: 'fas fa-bolt', iconBg: '#ea580c' },
                    
                    // Services - Specialty Items
                    { id: 113, type: 'service', name: 'Bedding Service', unit: 'Per Set', price: '35.00', icon: 'fas fa-bed', iconBg: '#314c82' },
                    { id: 114, type: 'service', name: 'Comforter Cleaning', unit: 'Per Piece', price: '42.00', icon: 'fas fa-bed', iconBg: '#0369a1' },
                    { id: 115, type: 'service', name: 'Curtain Cleaning', unit: 'Per Panel', price: '40.00', icon: 'fas fa-home', iconBg: '#27beee' },
                    { id: 116, type: 'service', name: 'Carpet Cleaning', unit: 'Per Sqm', price: '55.00', icon: 'fas fa-rug', iconBg: '#7b25d1' },
                    { id: 117, type: 'service', name: 'Pillow Cleaning', unit: 'Per Piece', price: '15.00', icon: 'fas fa-bed', iconBg: '#4f46e5' },
                    
                    // Services - Special Care
                    { id: 118, type: 'service', name: 'Wedding Dress Cleaning', unit: 'Per Piece', price: '75.00', icon: 'fas fa-ring', iconBg: '#ee27c0' },
                    { id: 119, type: 'service', name: 'Wedding Dress Preservation', unit: 'Per Piece', price: '150.00', icon: 'fas fa-gem', iconBg: '#db2777' },
                    { id: 120, type: 'service', name: 'Leather Cleaning', unit: 'Per Item', price: '45.00', icon: 'fas fa-briefcase', iconBg: '#ee9827' },
                    { id: 121, type: 'service', name: 'Leather Conditioning', unit: 'Per Item', price: '35.00', icon: 'fas fa-shield-alt', iconBg: '#d97706' },
                    { id: 122, type: 'service', name: 'Suede Cleaning', unit: 'Per Item', price: '50.00', icon: 'fas fa-shopping-bag', iconBg: '#c2410c' },
                    
                    // Services - Repairs & Alterations
                    { id: 123, type: 'service', name: 'Basic Alterations', unit: 'Per Item', price: '20.00', icon: 'fas fa-cut', iconBg: '#676767' },
                    { id: 124, type: 'service', name: 'Hemming', unit: 'Per Item', price: '12.00', icon: 'fas fa-ruler', iconBg: '#6b7280' },
                    { id: 125, type: 'service', name: 'Zipper Replacement', unit: 'Per Item', price: '18.00', icon: 'fas fa-tools', iconBg: '#374151' },
                    { id: 126, type: 'service', name: 'Button Replacement', unit: 'Per Button', price: '8.00', icon: 'fas fa-circle', iconBg: '#9ca3af' },
                    
                    // Services - Stain Treatment
                    { id: 127, type: 'service', name: 'Stain Removal', unit: 'Per Item', price: '18.50', icon: 'fas fa-spray-can', iconBg: '#f94a4a' },
                    { id: 128, type: 'service', name: 'Heavy Stain Treatment', unit: 'Per Item', price: '28.00', icon: 'fas fa-exclamation-triangle', iconBg: '#ef4444' },
                    { id: 129, type: 'service', name: 'Odor Removal', unit: 'Per Item', price: '16.00', icon: 'fas fa-wind', iconBg: '#14b8a6' },
                    
                    // Services - Additional
                    { id: 130, type: 'service', name: 'Shoe Cleaning', unit: 'Per Pair', price: '22.00', icon: 'fas fa-shoe-prints', iconBg: '#bec747' },
                    { id: 131, type: 'service', name: 'Shoe Shine', unit: 'Per Pair', price: '15.00', icon: 'fas fa-star', iconBg: '#eab308' },
                    { id: 132, type: 'service', name: 'Bag Cleaning', unit: 'Per Piece', price: '30.00', icon: 'fas fa-shopping-bag', iconBg: '#a855f7' },
                ],

                init() {
                    this.updateTime();
                    setInterval(() => this.updateTime(), 1000);
                },

                updateTime() {
                    const now = new Date();
                    this.currentTime = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                },

                get filteredItems() {
                    let filtered = this.items;
                    
                    // Filter by category
                    if (this.category !== 'all') {
                        filtered = filtered.filter(item => item.type === this.category.slice(0, -1));
                    }
                    
                    // Filter by search query
                    if (this.searchQuery) {
                        const query = this.searchQuery.toLowerCase();
                        filtered = filtered.filter(item => 
                            item.name.toLowerCase().includes(query) ||
                            (item.sku && item.sku.toLowerCase().includes(query))
                        );
                    }
                    
                    return filtered;
                },

                get subtotal() {
                    return this.cartItems.reduce((sum, item) => {
                        const price = parseFloat(item.price) || 0;
                        const quantity = parseInt(item.quantity) || 0;
                        return sum + (price * quantity);
                    }, 0);
                },

                get total() {
                    return this.subtotal;
                },

                addToCart(item) {
                    // Check if product is out of stock
                    if (item.type === 'product' && item.stock === 0) {
                        alert('This product is out of stock!');
                        return;
                    }

                    // Check if item already exists in cart
                    const existingIndex = this.cartItems.findIndex(cartItem => cartItem.id === item.id);
                    
                    if (existingIndex !== -1) {
                        // Increase quantity if item exists
                        if (item.type === 'product') {
                            if (this.cartItems[existingIndex].quantity < item.stock) {
                                this.cartItems[existingIndex].quantity++;
                            } else {
                                alert('Cannot add more. Stock limit reached!');
                            }
                        } else {
                            this.cartItems[existingIndex].quantity++;
                        }
                    } else {
                        // Add new item to cart
                        this.cartItems.push({
                            ...item,
                            quantity: 1
                        });
                    }
                },

                increaseQuantity(index) {
                    const item = this.cartItems[index];
                    if (item.type === 'product') {
                        if (item.quantity < item.stock) {
                            item.quantity++;
                        }
                    } else {
                        item.quantity++;
                    }
                },

                decreaseQuantity(index) {
                    if (this.cartItems[index].quantity > 1) {
                        this.cartItems[index].quantity--;
                    } else {
                        this.removeFromCart(index);
                    }
                },

                removeFromCart(index) {
                    this.cartItems.splice(index, 1);
                },

                clearCart() {
                    if (confirm('Are you sure you want to clear the cart?')) {
                        this.cartItems = [];
                    }
                },

                processPayment() {
                    if (this.cartItems.length === 0) {
                        alert('Cart is empty!');
                        return;
                    }

                    // Validate form
                    if (!this.checkoutForm.customerName || !this.checkoutForm.customerContact || !this.checkoutForm.paymentMethod) {
                        alert('Please fill in all required fields');
                        return;
                    }

                    // Validate partial payment amount
                    if (this.checkoutForm.paymentMethod === 'partial') {
                        if (!this.checkoutForm.partialAmount || this.checkoutForm.partialAmount <= 0) {
                            alert('Please enter a valid partial payment amount');
                            return;
                        }
                        if (this.checkoutForm.partialAmount > this.total) {
                            alert('Partial payment cannot exceed total amount');
                            return;
                        }
                    }

                    // Prepare receipt data
                    const paymentStatus = {
                        'full': 'FULLY PAID',
                        'partial': 'PARTIALLY PAID',
                        'pickup': 'PAY ON PICKUP'
                    };

                    const paidAmount = this.checkoutForm.paymentMethod === 'full' ? this.total :
                                      this.checkoutForm.paymentMethod === 'partial' ? parseFloat(this.checkoutForm.partialAmount) : 0;

                    this.receiptData = {
                        orderNumber: this.orderNumber,
                        date: new Date().toLocaleString('en-US', { 
                            year: 'numeric', 
                            month: 'short', 
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        }),
                        customerName: this.checkoutForm.customerName,
                        customerContact: this.checkoutForm.customerContact,
                        customerEmail: this.checkoutForm.customerEmail,
                        pickupDate: this.checkoutForm.pickupDate ? new Date(this.checkoutForm.pickupDate).toLocaleDateString('en-US', { 
                            year: 'numeric', 
                            month: 'short', 
                            day: 'numeric'
                        }) : '',
                        items: [...this.cartItems],
                        total: this.total,
                        paymentMethod: this.checkoutForm.paymentMethod,
                        paymentStatus: paymentStatus[this.checkoutForm.paymentMethod],
                        paidAmount: paidAmount,
                        balanceDue: this.total - paidAmount,
                        notes: this.checkoutForm.notes
                    };

                    // Close checkout modal and show receipt
                    this.showCheckoutModal = false;
                    this.showReceiptModal = true;

                    // Generate QR code after modal is shown
                    setTimeout(() => {
                        this.generateQRCode();
                    }, 100);

                    // Here you would typically send the order to the server
                    // axios.post('/api/orders', this.receiptData).then(response => { ... });
                },

                generateQRCode() {
                    // Clear previous QR code
                    document.getElementById('qrcode').innerHTML = '';
                    
                    // Generate new QR code with order information
                    const qrData = JSON.stringify({
                        orderNumber: this.receiptData.orderNumber,
                        customer: this.receiptData.customerName,
                        total: this.receiptData.total,
                        date: this.receiptData.date
                    });

                    new QRCode(document.getElementById('qrcode'), {
                        text: qrData,
                        width: 150,
                        height: 150,
                        colorDark: '#000000',
                        colorLight: '#ffffff',
                        correctLevel: QRCode.CorrectLevel.H
                    });
                },

                printReceipt() {
                    window.print();
                },

                closeReceipt() {
                    this.showReceiptModal = false;
                    
                    // Reset everything
                    this.cartItems = [];
                    this.checkoutForm = {
                        customerName: '',
                        customerContact: '',
                        customerEmail: '',
                        paymentMethod: 'full',
                        partialAmount: 0,
                        pickupDate: '',
                        notes: ''
                    };
                    this.orderNumber = String(Math.floor(Math.random() * 10000)).padStart(4, '0');
                },

                holdOrder() {
                    const customerName = prompt('Enter customer name to hold this order:');
                    if (customerName) {
                        // Here you would typically save the order to the server
                        alert('Order #' + this.orderNumber + ' has been held for ' + customerName);
                        
                        // Reset cart and generate new order number
                        this.cartItems = [];
                        this.checkoutForm = {
                            customerName: '',
                            customerContact: '',
                            customerEmail: '',
                            paymentMethod: 'full',
                            partialAmount: 0,
                            pickupDate: '',
                            notes: ''
                        };
                        this.orderNumber = String(Math.floor(Math.random() * 10000)).padStart(4, '0');
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js - Load after posSystem function is defined -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</body>
</html>
