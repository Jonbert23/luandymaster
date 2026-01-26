@extends('master.layout')

@section('title', 'Products')
@section('header_title', 'Products')

@push('css')
    <link href="{{ asset('template/assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">
    <style>
        /* Dropdown Styles */
        .dropdown-container {
            position: relative;
        }
        .dropdown-menu {
            position: absolute !important;
            z-index: 9999 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            min-width: 10rem;
            padding: 0.5rem 0;
            top: 100%;
            right: 0;
            margin-top: 0.25rem;
            border-radius: 0.5rem;
            background: white;
            border: 1px solid #e5e7eb;
        }
        .dropdown-toggle {
            cursor: pointer !important;
            display: inline-block;
        }
        .dropdown-toggle:hover svg path {
            stroke: #3b82f6;
        }
        .dropdown-item:hover {
            background-color: #f3f4f6 !important;
        }
        
        /* DataTables pagination */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 0.375rem !important;
            margin: 0 2px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #f5e2dd !important;
            border-color: #f5e2dd !important;
        }
        
        /* Status badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .status-in-stock {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-low-stock {
            background-color: #fed7aa;
            color: #92400e;
        }
        .status-out-of-stock {
            background-color: #fecaca;
            color: #991b1b;
        }
        
        /* Custom Dropdown Styles */
        .custom-dropdown-item:hover {
            background-color: #f3f4f6 !important;
        }
        .custom-dropdown-menu {
            animation: slideDown 0.2s ease-out;
        }
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
<div class="container-fluid">

    <div class="mt-4 flex justify-between items-center flex-wrap mb-6">
        <div class="mb-6">
            <h4 class="mb-2">Showing all Available Products </h4>
            <p>Manage your products with ease</p>
        </div>
        <div class="mb-6">
            <button onclick="openAddProductModal()" 
                    class="inline-flex items-center px-6 py-3 bg-primary hover:bg-hover-primary text-white rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Add Product
            </button>
        </div>
    </div>
    <div class="row">
        <div class="w-full">
            <div>
                <!-- Products Table -->
                <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                                <option>Product Category</option>
                                <option>Detergents</option>
                                <option>Softeners</option>
                                <option>Stain Care</option>
                                <option>Whitening</option>
                                <option>Dryer Care</option>
                                <option>Specialty</option>
                                <option>Accessories</option>
                            </select>
                        </div>
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                                <option>Stock Status</option>
                                <option>In Stock</option>
                                <option>Low Stock</option>
                                <option>Out of Stock</option>
                            </select>
                        </div>
                        <div class="xl:w-2/3 col-xxl-6 lg:w-1/2 w-full md:flex max-lg:pt-2 max-lg:border-t border-border pe-0">
                            <div class="ltr:ml-4 rtl:mr-4 ltr:max-lg:ml-0 rtl:max-lg:mr-0 relative flex flex-wrap items-stretch w-full">
                                <input type="text" class="py-[5px] px-5 h-[2.85rem] inline-block text-dark outline-none w-[1%] flex-auto" placeholder="Search products here...">
                                <a href="javascript:void(0)" class="py-[0.65rem] px-5 rounded-full bg-primary text-white border border-primary duration-500 hover:bg-hover-primary xl:text-[15px] font-medium cursor-pointer inline-block">Search<i class="flaticon-381-search-2 ltr:ml-2 rtl:mr-2 inline-block"></i></a>
                            </div>
                        </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-gray ItemsCheckboxSec" id="application-tbl1">
                            <thead>
                                <tr>
                                    <th class="align-middle text-left pl-3.5 sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Product</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">SKU</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Category</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Price</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Stock</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Status</th>
                                    <th class="align-middle sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $products = [
                                    ['name' => 'Laundry Detergent', 'sku' => 'LD-001', 'category' => 'Detergents', 'price' => '12.99', 'stock' => '150', 'status' => 'In Stock', 'min_stock_alert' => '10', 'image' => 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=100&h=100&fit=crop'],
                                    ['name' => 'Fabric Softener', 'sku' => 'FS-002', 'category' => 'Softeners', 'price' => '8.99', 'stock' => '120', 'status' => 'In Stock', 'min_stock_alert' => '15', 'image' => 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=100&h=100&fit=crop'],
                                    ['name' => 'Stain Remover', 'sku' => 'SR-003', 'category' => 'Stain Care', 'price' => '6.99', 'stock' => '15', 'status' => 'Low Stock', 'min_stock_alert' => '20', 'image' => 'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?w=100&h=100&fit=crop'],
                                    ['name' => 'Bleach', 'sku' => 'BL-004', 'category' => 'Whitening', 'price' => '5.49', 'stock' => '200', 'status' => 'In Stock', 'min_stock_alert' => '25', 'image' => 'https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=100&h=100&fit=crop'],
                                    ['name' => 'Dryer Sheets', 'sku' => 'DS-005', 'category' => 'Dryer Care', 'price' => '4.99', 'stock' => '0', 'status' => 'Out of Stock', 'min_stock_alert' => '5', 'image' => 'https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?w=100&h=100&fit=crop'],
                                    ['name' => 'Washing Powder', 'sku' => 'WP-006', 'category' => 'Detergents', 'price' => '15.99', 'stock' => '8', 'status' => 'Low Stock', 'min_stock_alert' => '10', 'image' => 'https://images.unsplash.com/photo-1604335399105-a0c585fd81a1?w=100&h=100&fit=crop'],
                                    ['name' => 'Color Safe Bleach', 'sku' => 'CB-007', 'category' => 'Whitening', 'price' => '7.49', 'stock' => '95', 'status' => 'In Stock', 'min_stock_alert' => '12', 'image' => 'https://images.unsplash.com/photo-1583947215259-38e31be8751f?w=100&h=100&fit=crop'],
                                    ['name' => 'Delicate Wash', 'sku' => 'DW-008', 'category' => 'Specialty', 'price' => '10.99', 'stock' => '0', 'status' => 'Out of Stock', 'min_stock_alert' => '8', 'image' => 'https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?w=100&h=100&fit=crop'],
                                    ['name' => 'Sports Detergent', 'sku' => 'SD-009', 'category' => 'Specialty', 'price' => '13.99', 'stock' => '12', 'status' => 'Low Stock', 'min_stock_alert' => '15', 'image' => 'https://images.unsplash.com/photo-1585421514738-01798e348b17?w=100&h=100&fit=crop'],
                                    ['name' => 'Baby Laundry Detergent', 'sku' => 'BD-010', 'category' => 'Specialty', 'price' => '14.99', 'stock' => '110', 'status' => 'In Stock', 'min_stock_alert' => '20', 'image' => 'https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?w=100&h=100&fit=crop'],
                                ];
                                @endphp
                                @foreach($products as $product)
                                <tr>
                                    <td class="align-middle text-left sm:py-[.85rem] pl-3.5 sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2 overflow-hidden rounded-lg bg-primary-light flex items-center justify-center">
                                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover" loading="lazy">
                                            </div>
                                            <h6>{{ $product['name'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $product['sku'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $product['category'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border font-bold text-dark">${{ $product['price'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $product['stock'] }} Units</td>
                                
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">
                                        @if($product['status'] == 'Out of Stock')
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-danger bg-[#ffc0cb26]">Out of Stock</span>
                                        @elseif($product['status'] == 'Low Stock')
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-[#F6AD2E] bg-[#fff3cd]">Low Stock</span>
                                        @else
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-success bg-success-light">In Stock</span>
                                        @endif
                                    </td>
                                    <td class="align-middle sm:py-[.85rem] px-[1.875rem] py-2 max-sm:pl-[15px] border-b border-border ltr:text-right rtl:text-left">
                                        <div class="relative dropdown-container">
                                            <a href="javascript:void(0);" class="dropdown-toggle">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu" style="display: none;">
                                                <a href="javascript:void(0);" 
                                                   onclick="openEditProductModal('{{ $product['sku'] }}', '{{ $product['name'] }}', '{{ $product['sku'] }}', '{{ $product['category'] }}', '{{ $product['price'] }}', '{{ $product['stock'] }}', '{{ $product['min_stock_alert'] }}')" 
                                                   class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-gray-100 cursor-pointer">
                                                    <i class="far fa-edit ltr:mr-1 rtl:ml-1 text-success"></i>Edit
                                                </a>
                                                <a href="javascript:void(0);" 
                                                   onclick="if(confirm('Are you sure you want to delete this product?')) { alert('Delete functionality will be implemented with backend'); }" 
                                                   class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-gray-100 cursor-pointer">
                                                    <i class="far fa-trash-alt ltr:mr-1 rtl:ml-1 text-danger"></i>Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>

<!-- Include Modals -->
@include('business.products.modals.add-product')
@include('business.products.modals.edit-product')

@endsection

@push('scripts')
    <!-- Nice Select -->
    <script src="{{ asset('template/assets/vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
    
    <!-- Datatable -->
	<script src="{{ asset('template/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script>
        (function($) {
            "use strict"
            
            console.log('✅ Initializing Products Page with jQuery...');
            
            // Initialize Nice Select
            if($('.nice-select').length){
                $('.nice-select').niceSelect();
                console.log('✅ Nice Select initialized');
            }
            
            // Initialize DataTables
            var table = $('#application-tbl1').DataTable({
                searching: true,
                lengthChange: false,
                dom: 'rtip',
                language: {
                    paginate: {
                        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                    }
                },
                columnDefs: [{
                    orderable: false,
                    targets: [0, -1]
                }]
            });

            // Bind custom search input
            $('#search-application-tbl1').on('keyup', function() {
                table.search(this.value).draw();
            });
            
            // Dropdown Toggle
            $('.dropdown-toggle').on('click', function(e) {
                e.stopPropagation();
                var $dropdown = $(this).siblings('.dropdown-menu');
                
                // Close all other dropdowns
                $('.dropdown-menu').not($dropdown).hide();
                
                // Toggle this dropdown
                $dropdown.toggle();
                console.log('✅ Dropdown toggled');
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.dropdown-container').length) {
                    $('.dropdown-menu').hide();
                }
            });
            
            // Close dropdown when clicking menu items
            $('.dropdown-item').on('click', function() {
                $(this).closest('.dropdown-menu').hide();
            });
            
            console.log('✅ Products page initialized successfully!');
        })(jQuery);
        
        // ============================================
        // MODAL FUNCTIONS (Pure JavaScript - No Alpine.js!)
        // ============================================
        
        // Open Add Product Modal
        function openAddProductModal() {
            console.log('🚀 OPENING Add Product Modal...');
            var modal = document.getElementById('addProductModal');
            if (modal) {
                modal.style.display = 'flex';
                console.log('✅ Modal opened successfully!');
            } else {
                console.error('❌ ERROR: Modal element not found!');
            }
        }
        
        // Close Add Product Modal
        function closeAddProductModal() {
            console.log('🚀 CLOSING Add Product Modal...');
            var modal = document.getElementById('addProductModal');
            if (modal) {
                modal.style.display = 'none';
                console.log('✅ Modal closed successfully!');
            }
        }
        
        // Open Edit Product Modal
        function openEditProductModal(id, name, sku, category, price, stock, minStockAlert) {
            console.log('🚀 OPENING Edit Product Modal with data:', {id, name, sku, category, price, stock, minStockAlert});
            
            // Populate form fields
            document.getElementById('edit_product_id').value = id;
            document.getElementById('edit_product_name').value = name;
            document.getElementById('edit_product_sku').value = sku;
            document.getElementById('edit_product_price').value = price;
            document.getElementById('edit_product_stock').value = stock;
            document.getElementById('edit_product_min_stock').value = minStockAlert || 10;
            
            // Set category dropdown
            document.getElementById('edit_category_value').value = category;
            document.getElementById('edit_category_display').textContent = category;
            document.getElementById('edit_category_display').style.color = '#111827';
            
            // Show modal
            var modal = document.getElementById('editProductModal');
            if (modal) {
                modal.style.display = 'flex';
                console.log('✅ Edit modal opened successfully!');
            } else {
                console.error('❌ ERROR: Edit modal element not found!');
            }
        }
        
        // Toggle Dropdown
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const allDropdowns = document.querySelectorAll('.custom-dropdown-menu');
            
            // Close all other dropdowns
            allDropdowns.forEach(dd => {
                if (dd.id !== dropdownId) {
                    dd.style.display = 'none';
                }
            });
            
            // Toggle current dropdown
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }
        
        // Select Category
        function selectCategory(type, value) {
            document.getElementById(type + '_category_value').value = value;
            document.getElementById(type + '_category_display').textContent = value;
            document.getElementById(type + '_category_display').style.color = '#111827';
            document.getElementById(type + '_category_dropdown').style.display = 'none';
            console.log('✅ Category selected:', value);
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-dropdown')) {
                document.querySelectorAll('.custom-dropdown-menu').forEach(dd => {
                    dd.style.display = 'none';
                });
            }
        });
        
        // Close Edit Product Modal
        function closeEditProductModal() {
            console.log('🚀 CLOSING Edit Product Modal...');
            var modal = document.getElementById('editProductModal');
            if (modal) {
                modal.style.display = 'none';
                console.log('✅ Edit modal closed successfully!');
            }
        }
        
        // Verify modals exist on page load
        $(document).ready(function() {
            console.log('🔍 Checking if modals exist...');
            var addModal = document.getElementById('addProductModal');
            var editModal = document.getElementById('editProductModal');
            
            if (addModal) {
                console.log('✅ Add Product Modal found!');
            } else {
                console.error('❌ Add Product Modal NOT found!');
            }
            
            if (editModal) {
                console.log('✅ Edit Product Modal found!');
            } else {
                console.error('❌ Edit Product Modal NOT found!');
            }
        });
        
        // Close modals on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddProductModal();
                closeEditProductModal();
            }
        });
        
        console.log('✅ All modal functions loaded - NO Alpine.js needed!');
    </script>
@endpush
