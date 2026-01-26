@extends('master.layout')

@section('title', 'Expenses')
@section('header_title', 'Expenses')

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
            <h4 class="mb-2">Showing all Expenses</h4>
            <p>Track and manage your business expenses</p>
        </div>
        <div class="mb-6">
            <button onclick="openAddExpenseModal()" 
                    class="inline-flex items-center px-6 py-3 bg-primary hover:bg-hover-primary text-white rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Add Expense
            </button>
        </div>
    </div>
    <div class="row">
        <div class="w-full">
            <div>
                <!-- Expenses Table -->
                <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                                <option>Expense Category</option>
                                <option>Utilities</option>
                                <option>Maintenance</option>
                                <option>Supplies</option>
                                <option>Payroll</option>
                                <option>Marketing</option>
                                <option>Rent</option>
                                <option>Insurance</option>
                                <option>Equipment</option>
                                <option>Transportation</option>
                            </select>
                        </div>
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                                <option>Expense Status</option>
                                <option>Pending</option>
                                <option>Approved</option>
                                <option>Rejected</option>
                            </select>
                        </div>
                        <div class="xl:w-2/3 col-xxl-6 lg:w-1/2 w-full md:flex max-lg:pt-2 max-lg:border-t border-border pe-0">
                            <div class="ltr:ml-4 rtl:mr-4 ltr:max-lg:ml-0 rtl:max-lg:mr-0 relative flex flex-wrap items-stretch w-full">
                                <input type="text" class="py-[5px] px-5 h-[2.85rem] inline-block text-dark outline-none w-[1%] flex-auto" placeholder="Search expenses...">
                                <a href="javascript:void(0)" class="py-[0.65rem] px-5 rounded-full bg-primary text-white border border-primary duration-500 hover:bg-hover-primary xl:text-[15px] font-medium cursor-pointer inline-block">Search<i class="flaticon-381-search-2 ltr:ml-2 rtl:mr-2 inline-block"></i></a>
                            </div>
                        </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-gray ItemsCheckboxSec" id="application-tbl1">
                            <thead>
                                <tr>
                                    <th class="align-middle text-left pl-3.5 sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Expense Name</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Date</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Category</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Amount</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Approved By</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Status</th>
                                    <th class="align-middle sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $expenses = [
                                    ['id' => 'EXP-001', 'date' => '2024-01-15', 'description' => 'Water & Sewage', 'category' => 'Utilities', 'amount' => '450.00', 'approved_by' => 'John Admin', 'status' => 'Approved', 'icon' => 'fa-tint'],
                                    ['id' => 'EXP-002', 'date' => '2024-01-16', 'description' => 'Electricity Bill', 'category' => 'Utilities', 'amount' => '890.50', 'approved_by' => 'John Admin', 'status' => 'Approved', 'icon' => 'fa-bolt'],
                                    ['id' => 'EXP-003', 'date' => '2024-01-17', 'description' => 'Washing Machine Repair', 'category' => 'Maintenance', 'amount' => '250.00', 'approved_by' => '-', 'status' => 'Pending', 'icon' => 'fa-tools'],
                                    ['id' => 'EXP-004', 'date' => '2024-01-18', 'description' => 'Detergent Supplies', 'category' => 'Supplies', 'amount' => '350.00', 'approved_by' => 'John Admin', 'status' => 'Approved', 'icon' => 'fa-box'],
                                    ['id' => 'EXP-005', 'date' => '2024-01-19', 'description' => 'Staff Salaries', 'category' => 'Payroll', 'amount' => '3500.00', 'approved_by' => 'John Admin', 'status' => 'Approved', 'icon' => 'fa-users'],
                                    ['id' => 'EXP-006', 'date' => '2024-01-20', 'description' => 'Marketing Campaign', 'category' => 'Marketing', 'amount' => '600.00', 'approved_by' => '-', 'status' => 'Pending', 'icon' => 'fa-bullhorn'],
                                    ['id' => 'EXP-007', 'date' => '2024-01-21', 'description' => 'Office Rent', 'category' => 'Rent', 'amount' => '1200.00', 'approved_by' => 'John Admin', 'status' => 'Approved', 'icon' => 'fa-building'],
                                    ['id' => 'EXP-008', 'date' => '2024-01-22', 'description' => 'Insurance Premium', 'category' => 'Insurance', 'amount' => '500.00', 'approved_by' => '-', 'status' => 'Rejected', 'icon' => 'fa-shield-alt'],
                                    ['id' => 'EXP-009', 'date' => '2024-01-23', 'description' => 'Equipment Lease', 'category' => 'Equipment', 'amount' => '750.00', 'approved_by' => 'John Admin', 'status' => 'Approved', 'icon' => 'fa-cogs'],
                                    ['id' => 'EXP-010', 'date' => '2024-01-24', 'description' => 'Delivery Van Fuel', 'category' => 'Transportation', 'amount' => '180.00', 'approved_by' => '-', 'status' => 'Pending', 'icon' => 'fa-gas-pump'],
                                ];
                                @endphp
                                @foreach($expenses as $expense)
                                <tr>
                                    <td class="align-middle text-left sm:py-[.85rem] pl-3.5 sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                                                <i class="fas {{ $expense['icon'] }}"></i>
                                            </div>
                                            <h6>{{ $expense['description'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">{{ date('M d, Y', strtotime($expense['date'])) }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $expense['category'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border font-bold text-dark">${{ $expense['amount'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $expense['approved_by'] }}</td>
                                
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">
                                        @if($expense['status'] == 'Rejected')
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-danger bg-[#ffc0cb26]">Rejected</span>
                                        @elseif($expense['status'] == 'Pending')
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-[#F6AD2E] bg-[#fff3cd]">Pending</span>
                                        @else
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-success bg-success-light">Approved</span>
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
                                                   onclick="openEditExpenseModal('{{ $expense['id'] }}', '{{ $expense['id'] }}', '{{ $expense['date'] }}', '{{ $expense['description'] }}', '{{ $expense['category'] }}', '{{ $expense['amount'] }}', '{{ $expense['approved_by'] }}', '{{ $expense['status'] }}')" 
                                                   class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-gray-100 cursor-pointer">
                                                    <i class="far fa-edit ltr:mr-1 rtl:ml-1 text-success"></i>Edit
                                                </a>
                                                <a href="javascript:void(0);" 
                                                   onclick="if(confirm('Are you sure you want to delete this expense?')) { alert('Delete functionality will be implemented with backend'); }" 
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
@include('business.expenses.modals.add-expense')
@include('business.expenses.modals.edit-expense')

@endsection

@push('scripts')
    <!-- Nice Select -->
    <script src="{{ asset('template/assets/vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
    
    <!-- Datatable -->
	<script src="{{ asset('template/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script>
        (function($) {
            "use strict"
            
            console.log('✅ Initializing Expenses Page with jQuery...');
            
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
                    targets: [-1]
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
            
            console.log('✅ Expenses page initialized successfully!');
        })(jQuery);
        
        // ============================================
        // MODAL FUNCTIONS (Pure JavaScript)
        // ============================================
        
        // Open Add Expense Modal
        function openAddExpenseModal() {
            console.log('🚀 OPENING Add Expense Modal...');
            var modal = document.getElementById('addExpenseModal');
            if (modal) {
                modal.style.display = 'flex';
                console.log('✅ Modal opened successfully!');
            } else {
                console.error('❌ ERROR: Modal element not found!');
            }
        }
        
        // Close Add Expense Modal
        function closeAddExpenseModal() {
            console.log('🚀 CLOSING Add Expense Modal...');
            var modal = document.getElementById('addExpenseModal');
            if (modal) {
                modal.style.display = 'none';
                console.log('✅ Modal closed successfully!');
            }
        }
        
        // Open Edit Expense Modal
        function openEditExpenseModal(id, expenseId, date, description, category, amount, approvedBy, status) {
            console.log('🚀 OPENING Edit Expense Modal with data:', {id, expenseId, date, description, category, amount, approvedBy, status});
            
            // Populate form fields
            document.getElementById('edit_exp_id').value = id;
            document.getElementById('edit_exp_expense_id').value = expenseId;
            document.getElementById('edit_exp_date').value = date;
            document.getElementById('edit_exp_description').value = description;
            document.getElementById('edit_exp_amount').value = amount;
            document.getElementById('edit_exp_approved_by').value = approvedBy;
            
            // Set category dropdown
            document.getElementById('edit_exp_category_value').value = category;
            document.getElementById('edit_exp_category_display').textContent = category;
            document.getElementById('edit_exp_category_display').style.color = '#111827';
            
            // Set status dropdown
            document.getElementById('edit_exp_status_value').value = status;
            document.getElementById('edit_exp_status_display').textContent = status;
            document.getElementById('edit_exp_status_display').style.color = '#111827';
            
            // Show modal
            var modal = document.getElementById('editExpenseModal');
            if (modal) {
                modal.style.display = 'flex';
                console.log('✅ Edit modal opened successfully!');
            } else {
                console.error('❌ ERROR: Edit modal element not found!');
            }
        }
        
        // Close Edit Expense Modal
        function closeEditExpenseModal() {
            console.log('🚀 CLOSING Edit Expense Modal...');
            var modal = document.getElementById('editExpenseModal');
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
        
        // Select Expense Category
        function selectExpenseCategory(type, value) {
            document.getElementById(type + '_category_value').value = value;
            document.getElementById(type + '_category_display').textContent = value;
            document.getElementById(type + '_category_display').style.color = '#111827';
            document.getElementById(type + '_category_dropdown').style.display = 'none';
            console.log('✅ Category selected:', value);
        }
        
        // Select Expense Status
        function selectExpenseStatus(type, value) {
            document.getElementById(type + '_status_value').value = value;
            document.getElementById(type + '_status_display').textContent = value;
            document.getElementById(type + '_status_display').style.color = '#111827';
            document.getElementById(type + '_status_dropdown').style.display = 'none';
            console.log('✅ Status selected:', value);
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
                closeAddExpenseModal();
                closeEditExpenseModal();
            }
        });
        
        // Verify modals exist on page load
        $(document).ready(function() {
            console.log('🔍 Checking if modals exist...');
            var addModal = document.getElementById('addExpenseModal');
            var editModal = document.getElementById('editExpenseModal');
            
            if (addModal) {
                console.log('✅ Add Expense Modal found!');
            } else {
                console.error('❌ Add Expense Modal NOT found!');
            }
            
            if (editModal) {
                console.log('✅ Edit Expense Modal found!');
            } else {
                console.error('❌ Edit Expense Modal NOT found!');
            }
        });
        
        console.log('✅ All modal functions loaded - NO Alpine.js needed!');
    </script>
@endpush
