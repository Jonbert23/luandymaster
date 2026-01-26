@extends('master.layout')

@section('title', 'Inventory')
@section('header_title', 'Inventory')

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
            <h4 class="mb-2">Showing all Inventory Items</h4>
            <p>Track and manage your stock levels</p>
        </div>
        <div class="mb-6">
            <button onclick="openAddInventoryModal()" 
                    class="inline-flex items-center px-6 py-3 bg-primary hover:bg-hover-primary text-white rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Add Inventory
            </button>
        </div>
    </div>
    <div class="row">
        <div class="w-full">
            <div>
                <!-- Inventory Table -->
                <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                                <option>Added By</option>
                                <option>John Smith</option>
                                <option>Mary Johnson</option>
                                <option>Robert Lee</option>
                                <option>Sarah Wilson</option>
                            </select>
                        </div>
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <div style="position: relative; width: 100%;">
                                <input type="text" 
                                       id="restock_date_filter" 
                                       placeholder="Restock Date (Date Range)" 
                                       class="py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full cursor-pointer restock-date-input"
                                       readonly
                                       style="background-color: transparent; padding-right: 40px;">
                                <i class="far fa-calendar-alt text-primary" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                            </div>
                        </div>
                        <div class="xl:w-2/3 col-xxl-6 lg:w-1/2 w-full md:flex max-lg:pt-2 max-lg:border-t border-border pe-0">
                            <div class="ltr:ml-4 rtl:mr-4 ltr:max-lg:ml-0 rtl:max-lg:mr-0 relative flex flex-wrap items-stretch w-full">
                                <input type="text" class="py-[5px] px-5 h-[2.85rem] inline-block text-dark outline-none w-[1%] flex-auto" placeholder="Search inventory...">
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
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Restocked Date</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Quantity</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Added By</th>
                                    <th class="align-middle sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $inventory = [
                                    ['name' => 'Laundry Detergent', 'sku' => 'LD-001', 'price' => '$12.99', 'restocked_date' => '2024-01-10', 'quantity' => '150', 'added_by' => 'John Smith', 'stock_level' => 'In Stock', 'min_stock' => 10, 'category' => 'Detergents', 'image' => 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=100&h=100&fit=crop'],
                                    ['name' => 'Fabric Softener', 'sku' => 'FS-002', 'price' => '$9.99', 'restocked_date' => '2024-01-12', 'quantity' => '120', 'added_by' => 'Mary Johnson', 'stock_level' => 'In Stock', 'min_stock' => 15, 'category' => 'Softeners', 'image' => 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=100&h=100&fit=crop'],
                                    ['name' => 'Stain Remover', 'sku' => 'SR-003', 'price' => '$15.50', 'restocked_date' => '2024-01-15', 'quantity' => '15', 'added_by' => 'Robert Lee', 'stock_level' => 'Low Stock', 'min_stock' => 20, 'category' => 'Stain Care', 'image' => 'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?w=100&h=100&fit=crop'],
                                    ['name' => 'Bleach', 'sku' => 'BL-004', 'price' => '$8.99', 'restocked_date' => '2024-01-08', 'quantity' => '200', 'added_by' => 'John Smith', 'stock_level' => 'In Stock', 'min_stock' => 25, 'category' => 'Whitening', 'image' => 'https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=100&h=100&fit=crop'],
                                    ['name' => 'Dryer Sheets', 'sku' => 'DS-005', 'price' => '$6.49', 'restocked_date' => '2023-12-28', 'quantity' => '0', 'added_by' => 'Sarah Wilson', 'stock_level' => 'Out of Stock', 'min_stock' => 5, 'category' => 'Dryer Care', 'image' => 'https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?w=100&h=100&fit=crop'],
                                    ['name' => 'Washing Powder', 'sku' => 'WP-006', 'price' => '$18.99', 'restocked_date' => '2024-01-18', 'quantity' => '8', 'added_by' => 'Robert Lee', 'stock_level' => 'Low Stock', 'min_stock' => 10, 'category' => 'Detergents', 'image' => 'https://images.unsplash.com/photo-1604335399105-a0c585fd81a1?w=100&h=100&fit=crop'],
                                    ['name' => 'Color Safe Bleach', 'sku' => 'CB-007', 'price' => '$11.99', 'restocked_date' => '2024-01-11', 'quantity' => '95', 'added_by' => 'Mary Johnson', 'stock_level' => 'In Stock', 'min_stock' => 12, 'category' => 'Whitening', 'image' => 'https://images.unsplash.com/photo-1583947215259-38e31be8751f?w=100&h=100&fit=crop'],
                                    ['name' => 'Delicate Wash', 'sku' => 'DW-008', 'price' => '$14.99', 'restocked_date' => '2023-12-20', 'quantity' => '0', 'added_by' => 'Sarah Wilson', 'stock_level' => 'Out of Stock', 'min_stock' => 8, 'category' => 'Specialty', 'image' => 'https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?w=100&h=100&fit=crop'],
                                    ['name' => 'Sports Detergent', 'sku' => 'SD-009', 'price' => '$16.99', 'restocked_date' => '2024-01-16', 'quantity' => '12', 'added_by' => 'John Smith', 'stock_level' => 'Low Stock', 'min_stock' => 15, 'category' => 'Specialty', 'image' => 'https://images.unsplash.com/photo-1585421514738-01798e348b17?w=100&h=100&fit=crop'],
                                    ['name' => 'Baby Laundry Detergent', 'sku' => 'BD-010', 'price' => '$19.99', 'restocked_date' => '2024-01-14', 'quantity' => '110', 'added_by' => 'Mary Johnson', 'stock_level' => 'In Stock', 'min_stock' => 20, 'category' => 'Specialty', 'image' => 'https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?w=100&h=100&fit=crop'],
                                ];
                                @endphp
                                @foreach($inventory as $item)
                                <tr>
                                    <td class="align-middle text-left sm:py-[.85rem] pl-3.5 sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2 overflow-hidden rounded-lg bg-primary-light flex items-center justify-center">
                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover" loading="lazy">
                                            </div>
                                            <h6>{{ $item['name'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $item['sku'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ date('M d, Y', strtotime($item['restocked_date'])) }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border font-bold text-dark">{{ $item['quantity'] }} Units</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $item['added_by'] }}</td>
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
                                                   onclick="openEditInventoryModal('{{ $item['sku'] }}', '{{ $item['name'] }}', '{{ $item['price'] }}', '{{ $item['category'] }}', '{{ $item['quantity'] }}', '{{ $item['min_stock'] }}')" 
                                                   class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-gray-100 cursor-pointer">
                                                    <i class="far fa-edit ltr:mr-1 rtl:ml-1 text-success"></i>Edit
                                                </a>
                                                <a href="javascript:void(0);" 
                                                   onclick="if(confirm('Are you sure you want to delete this inventory item?')) { alert('Delete functionality will be implemented with backend'); }" 
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
@include('business.inventory.modals.add-inventory')
@include('business.inventory.modals.edit-inventory')

@endsection

@push('scripts')
    <!-- Custom CSS for Date Picker -->
    <style>
        .restock-date-input::placeholder {
            color: var(--primary) !important;
            opacity: 1;
        }
        .restock-date-input::-webkit-input-placeholder {
            color: var(--primary) !important;
            opacity: 1;
        }
        .restock-date-input::-moz-placeholder {
            color: var(--primary) !important;
            opacity: 1;
        }
        .restock-date-input:-ms-input-placeholder {
            color: var(--primary) !important;
            opacity: 1;
        }
        .restock-date-input::-ms-input-placeholder {
            color: var(--primary) !important;
            opacity: 1;
        }
    </style>
    
    <!-- Flatpickr for Date Range -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <!-- Nice Select -->
    <script src="{{ asset('template/assets/vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
    
    <!-- Datatable -->
	<script src="{{ asset('template/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script>
        (function($) {
            "use strict"
            
            console.log('✅ Initializing Inventory Page with jQuery...');
            
            // Initialize Flatpickr Date Range Picker
            flatpickr("#restock_date_filter", {
                mode: "range",
                dateFormat: "M d, Y",
                placeholder: "Restock Date (Date Range)",
                onChange: function(selectedDates, dateStr, instance) {
                    console.log('📅 Date range selected:', dateStr);
                    // You can add filtering logic here
                }
            });
            console.log('✅ Date range picker initialized');
            
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
            
            console.log('✅ Inventory page initialized successfully!');
        })(jQuery);
        
        // ============================================
        // MODAL FUNCTIONS (Pure JavaScript)
        // ============================================
        
        // Open Add Inventory Modal
        function openAddInventoryModal() {
            console.log('🚀 OPENING Add Inventory Modal...');
            
            // Reset form fields
            document.getElementById('add_inv_product_id').value = '';
            document.getElementById('add_inv_product_name').value = '';
            document.getElementById('add_inv_price').value = '';
            document.getElementById('add_inv_category').value = '';
            document.getElementById('add_inv_quantity').value = '';
            document.getElementById('add_inv_min_stock').value = '';
            
            // Reset product dropdown display
            document.getElementById('add_inv_product_display').textContent = 'Choose a product...';
            document.getElementById('add_inv_product_display').style.color = '#9ca3af';
            document.getElementById('add_inv_product_display').style.fontWeight = 'normal';
            
            var modal = document.getElementById('addInventoryModal');
            if (modal) {
                modal.style.display = 'flex';
                console.log('✅ Modal opened successfully! (Date and user will be auto-set by system)');
            } else {
                console.error('❌ ERROR: Modal element not found!');
            }
        }
        
        // Close Add Inventory Modal
        function closeAddInventoryModal() {
            console.log('🚀 CLOSING Add Inventory Modal...');
            var modal = document.getElementById('addInventoryModal');
            if (modal) {
                modal.style.display = 'none';
                console.log('✅ Modal closed successfully!');
            }
        }
        
        // Open Edit Inventory Modal
        function openEditInventoryModal(id, name, price, category, quantity, minStock) {
            console.log('🚀 OPENING Edit Inventory Modal with data:', {id, name, price, category, quantity, minStock});
            
            // Populate hidden fields
            document.getElementById('edit_inv_id').value = id;
            document.getElementById('edit_inv_product_name').value = name;
            document.getElementById('edit_inv_price').value = price;
            document.getElementById('edit_inv_category').value = category;
            document.getElementById('edit_inv_min_stock').value = minStock || 10;
            document.getElementById('edit_inv_quantity').value = quantity;
            
            // Populate display fields in header
            document.getElementById('edit_inv_product_display').textContent = name;
            document.getElementById('edit_inv_product_details').textContent = 'Price: ' + price + ' | Category: ' + category;
            
            // Populate display fields in form
            document.getElementById('edit_inv_product_name_display').value = name;
            document.getElementById('edit_inv_price_display').value = price;
            document.getElementById('edit_inv_category_display').value = category;
            document.getElementById('edit_inv_min_stock_display').value = minStock || 10;
            
            // Show modal
            var modal = document.getElementById('editInventoryModal');
            if (modal) {
                modal.style.display = 'flex';
                console.log('✅ Edit modal opened successfully!');
            } else {
                console.error('❌ ERROR: Edit modal element not found!');
            }
        }
        
        // Close Edit Inventory Modal
        function closeEditInventoryModal() {
            console.log('🚀 CLOSING Edit Inventory Modal...');
            var modal = document.getElementById('editInventoryModal');
            if (modal) {
                modal.style.display = 'none';
                console.log('✅ Edit modal closed successfully!');
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
        
        // Select Inventory Category
        function selectInventoryCategory(type, value) {
            document.getElementById(type + '_category_value').value = value;
            document.getElementById(type + '_category_display').textContent = value;
            document.getElementById(type + '_category_display').style.color = '#111827';
            document.getElementById(type + '_category_dropdown').style.display = 'none';
            console.log('✅ Category selected:', value);
        }
        
        // Select Inventory Product (Auto-fill product details)
        function selectInventoryProduct(sku, name, category, price, minStock) {
            console.log('🎯 Product selected:', {sku, name, category, price, minStock});
            
            // Fill product details
            document.getElementById('add_inv_product_id').value = sku;
            document.getElementById('add_inv_product_name').value = name;
            document.getElementById('add_inv_price').value = price;
            document.getElementById('add_inv_category').value = category;
            document.getElementById('add_inv_min_stock').value = minStock;
            
            // Update dropdown display
            document.getElementById('add_inv_product_display').textContent = name + ' (' + price + ')';
            document.getElementById('add_inv_product_display').style.color = '#111827';
            document.getElementById('add_inv_product_display').style.fontWeight = '500';
            
            // Close dropdown
            document.getElementById('add_inv_product_dropdown').style.display = 'none';
            
            // Focus on quantity field
            setTimeout(function() {
                document.getElementById('add_inv_quantity').focus();
            }, 100);
            
            console.log('✅ Product details auto-filled successfully!');
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-dropdown')) {
                document.querySelectorAll('.custom-dropdown-menu').forEach(dd => {
                    dd.style.display = 'none';
                });
            }
        });
        
        // Close modals on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddInventoryModal();
                closeEditInventoryModal();
            }
        });
        
        // Verify modals exist on page load
        $(document).ready(function() {
            console.log('🔍 Checking if modals exist...');
            var addModal = document.getElementById('addInventoryModal');
            var editModal = document.getElementById('editInventoryModal');
            
            if (addModal) {
                console.log('✅ Add Inventory Modal found!');
            } else {
                console.error('❌ Add Inventory Modal NOT found!');
            }
            
            if (editModal) {
                console.log('✅ Edit Inventory Modal found!');
            } else {
                console.error('❌ Edit Inventory Modal NOT found!');
            }
        });
        
        console.log('✅ All modal functions loaded - NO Alpine.js needed!');
    </script>
@endpush
