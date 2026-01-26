@extends('master.layout')

@section('title', 'Staff')
@section('header_title', 'Staff Management')

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
            <h4 class="mb-2">Showing all Staff Members</h4>
            <p>Manage your team members and their details</p>
        </div>
        <div class="mb-6">
            <button onclick="openAddStaffModal()" 
                    class="inline-flex items-center px-6 py-3 bg-primary hover:bg-hover-primary text-white rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-user-plus mr-2"></i>
                Add Staff Member
            </button>
        </div>
    </div>
    <div class="row">
        <div class="w-full">
            <div>
                <!-- Staff Table -->
                <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                                <option>Department</option>
                                <option>Operations</option>
                                <option>Customer Service</option>
                                <option>Logistics</option>
                                <option>Maintenance</option>
                                <option>Finance</option>
                            </select>
                        </div>
                        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
                            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                                <option>Staff Status</option>
                                <option>Active</option>
                                <option>On Leave</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                        <div class="xl:w-2/3 col-xxl-6 lg:w-1/2 w-full md:flex max-lg:pt-2 max-lg:border-t border-border pe-0">
                            <div class="ltr:ml-4 rtl:mr-4 ltr:max-lg:ml-0 rtl:max-lg:mr-0 relative flex flex-wrap items-stretch w-full">
                                <input type="text" class="py-[5px] px-5 h-[2.85rem] inline-block text-dark outline-none w-[1%] flex-auto" placeholder="Search staff...">
                                <a href="javascript:void(0)" class="py-[0.65rem] px-5 rounded-full bg-primary text-white border border-primary duration-500 hover:bg-hover-primary xl:text-[15px] font-medium cursor-pointer inline-block">Search<i class="flaticon-381-search-2 ltr:ml-2 rtl:mr-2 inline-block"></i></a>
                            </div>
                        </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-gray ItemsCheckboxSec" id="application-tbl1">
                            <thead>
                                <tr>
                                    <th class="align-middle text-left pl-3.5 sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Staff Name</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Employee ID</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Position</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Department</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Phone</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Status</th>
                                    <th class="align-middle sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $staff = [
                                    ['name' => 'John Anderson', 'employee_id' => 'EMP-001', 'position' => 'Laundry Supervisor', 'department' => 'Operations', 'phone' => '+1 234-567-8901', 'email' => 'john.anderson@email.com', 'hire_date' => '2020-03-15', 'status' => 'Active', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop'],
                                    ['name' => 'Sarah Martinez', 'employee_id' => 'EMP-002', 'position' => 'Washing Specialist', 'department' => 'Operations', 'phone' => '+1 234-567-8902', 'email' => 'sarah.martinez@email.com', 'hire_date' => '2021-06-20', 'status' => 'Active', 'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop'],
                                    ['name' => 'Michael Chen', 'employee_id' => 'EMP-003', 'position' => 'Dry Cleaning Expert', 'department' => 'Operations', 'phone' => '+1 234-567-8903', 'email' => 'michael.chen@email.com', 'hire_date' => '2019-11-10', 'status' => 'On Leave', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop'],
                                    ['name' => 'Emily Johnson', 'employee_id' => 'EMP-004', 'position' => 'Front Desk Manager', 'department' => 'Customer Service', 'phone' => '+1 234-567-8904', 'email' => 'emily.johnson@email.com', 'hire_date' => '2022-01-05', 'status' => 'Active', 'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop'],
                                    ['name' => 'David Wilson', 'employee_id' => 'EMP-005', 'position' => 'Delivery Driver', 'department' => 'Logistics', 'phone' => '+1 234-567-8905', 'email' => 'david.wilson@email.com', 'hire_date' => '2021-09-12', 'status' => 'Active', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop'],
                                    ['name' => 'Lisa Brown', 'employee_id' => 'EMP-006', 'position' => 'Quality Control', 'department' => 'Operations', 'phone' => '+1 234-567-8906', 'email' => 'lisa.brown@email.com', 'hire_date' => '2018-07-22', 'status' => 'Inactive', 'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop'],
                                    ['name' => 'Robert Taylor', 'employee_id' => 'EMP-007', 'position' => 'Maintenance Tech', 'department' => 'Maintenance', 'phone' => '+1 234-567-8907', 'email' => 'robert.taylor@email.com', 'hire_date' => '2020-04-18', 'status' => 'Active', 'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&h=100&fit=crop'],
                                    ['name' => 'Jennifer Lee', 'employee_id' => 'EMP-008', 'position' => 'Accountant', 'department' => 'Finance', 'phone' => '+1 234-567-8908', 'email' => 'jennifer.lee@email.com', 'hire_date' => '2021-02-28', 'status' => 'Active', 'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=100&h=100&fit=crop'],
                                    ['name' => 'James Davis', 'employee_id' => 'EMP-009', 'position' => 'Ironing Specialist', 'department' => 'Operations', 'phone' => '+1 234-567-8909', 'email' => 'james.davis@email.com', 'hire_date' => '2019-10-03', 'status' => 'On Leave', 'image' => 'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=100&h=100&fit=crop'],
                                    ['name' => 'Amanda White', 'employee_id' => 'EMP-010', 'position' => 'Customer Service Rep', 'department' => 'Customer Service', 'phone' => '+1 234-567-8910', 'email' => 'amanda.white@email.com', 'hire_date' => '2022-05-14', 'status' => 'Active', 'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop'],
                                ];
                                @endphp
                                @foreach($staff as $member)
                                <tr>
                                    <td class="align-middle text-left sm:py-[.85rem] pl-3.5 sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2 overflow-hidden rounded-full bg-primary-light flex items-center justify-center">
                                                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover" loading="lazy">
                                            </div>
                                            <h6>{{ $member['name'] }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $member['employee_id'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $member['position'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $member['department'] }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">{{ $member['phone'] }}</td>
                                
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">
                                        @if($member['status'] == 'Inactive')
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-[#6e6e6e] bg-[#6e6e6e26]">Inactive</span>
                                        @elseif($member['status'] == 'On Leave')
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-[#F6AD2E] bg-[#fff3cd]">On Leave</span>
                                        @else
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-success bg-success-light">Active</span>
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
                                                   onclick="openEditStaffModal('{{ $member['employee_id'] }}', '{{ $member['name'] }}', '{{ $member['employee_id'] }}', '{{ $member['position'] }}', '{{ $member['department'] }}', '{{ $member['phone'] }}', '{{ $member['email'] }}', '{{ $member['hire_date'] }}', '{{ $member['status'] }}')" 
                                                   class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-gray-100 cursor-pointer">
                                                    <i class="far fa-edit ltr:mr-1 rtl:ml-1 text-success"></i>Edit
                                                </a>
                                                <a href="javascript:void(0);" 
                                                   onclick="if(confirm('Are you sure you want to delete this staff member?')) { alert('Delete functionality will be implemented with backend'); }" 
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
@include('business.staff.modals.add-staff')
@include('business.staff.modals.edit-staff')

@endsection

@push('scripts')
    <!-- Nice Select -->
    <script src="{{ asset('template/assets/vendor/niceselect/js/jquery.nice-select.min.js') }}"></script>
    
    <!-- Datatable -->
	<script src="{{ asset('template/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script>
        (function($) {
            "use strict"
            
            console.log('✅ Initializing Staff Page with jQuery...');
            
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
            
            console.log('✅ Staff page initialized successfully!');
        })(jQuery);
        
        // ============================================
        // MODAL FUNCTIONS (Pure JavaScript)
        // ============================================
        
        // Multi-Step Wizard Variables
        let currentStep = 1;
        const totalSteps = 4;
        
        // Open Add Staff Modal
        function openAddStaffModal() {
            console.log('🚀 OPENING Add Staff Modal...');
            var modal = document.getElementById('addStaffModal');
            if (modal) {
                currentStep = 1;
                showStep(currentStep);
                modal.style.display = 'flex';
                console.log('✅ Modal opened successfully!');
            } else {
                console.error('❌ ERROR: Modal element not found!');
            }
        }
        
        // Close Add Staff Modal
        function closeAddStaffModal() {
            console.log('🚀 CLOSING Add Staff Modal...');
            var modal = document.getElementById('addStaffModal');
            if (modal) {
                modal.style.display = 'none';
                // Reset form and step
                document.getElementById('addStaffForm').reset();
                currentStep = 1;
                showStep(currentStep);
                console.log('✅ Modal closed successfully!');
            }
        }
        
        // Show specific step
        function showStep(step) {
            // Hide all steps
            for (let i = 1; i <= totalSteps; i++) {
                const stepContent = document.getElementById('step' + i + 'Content');
                if (stepContent) {
                    stepContent.style.display = 'none';
                }
            }
            
            // Show current step
            const currentStepContent = document.getElementById('step' + step + 'Content');
            if (currentStepContent) {
                currentStepContent.style.display = 'block';
            }
            
            // Update progress indicators
            updateProgressIndicator(step);
            
            // Update buttons
            updateButtons(step);
        }
        
        // Update progress indicator
        function updateProgressIndicator(step) {
            // Update progress line
            const progressLine = document.getElementById('progressLine');
            const progressPercent = ((step - 1) / (totalSteps - 1)) * 100;
            progressLine.style.width = progressPercent + '%';
            
            // Update step circles and text
            for (let i = 1; i <= totalSteps; i++) {
                const circle = document.getElementById('step' + i + 'Circle');
                const text = document.getElementById('step' + i + 'Text');
                
                if (i < step) {
                    // Completed steps
                    circle.style.background = 'var(--primary)';
                    circle.style.borderColor = 'white';
                    circle.style.color = 'white';
                    circle.innerHTML = '✓';
                    text.style.color = 'var(--primary)';
                    text.style.fontWeight = '600';
                } else if (i === step) {
                    // Current step
                    circle.style.background = 'var(--primary)';
                    circle.style.borderColor = 'white';
                    circle.style.color = 'white';
                    circle.innerHTML = i;
                    text.style.color = 'var(--primary)';
                    text.style.fontWeight = '600';
                } else {
                    // Upcoming steps
                    circle.style.background = 'white';
                    circle.style.borderColor = '#e5e7eb';
                    circle.style.color = '#9ca3af';
                    circle.innerHTML = i;
                    text.style.color = '#9ca3af';
                    text.style.fontWeight = '500';
                }
            }
        }
        
        // Update buttons based on step
        function updateButtons(step) {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            
            // Show/hide Previous button
            if (step === 1) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'block';
            }
            
            // Show/hide Next vs Submit button
            if (step === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'block';
            } else {
                nextBtn.style.display = 'block';
                submitBtn.style.display = 'none';
            }
        }
        
        // Change step
        function changeStep(direction) {
            const newStep = currentStep + direction;
            
            // Validate current step before moving forward
            if (direction === 1 && !validateStep(currentStep)) {
                return;
            }
            
            // Update confirmation page before showing it
            if (newStep === totalSteps) {
                updateConfirmationPage();
            }
            
            if (newStep >= 1 && newStep <= totalSteps) {
                currentStep = newStep;
                showStep(currentStep);
            }
        }
        
        // Validate step
        function validateStep(step) {
            if (step === 1) {
                // Validate Staff Info
                const name = document.getElementById('staff_name').value;
                const phone = document.getElementById('staff_phone').value;
                const email = document.getElementById('staff_email').value;
                const hireDate = document.getElementById('staff_hire_date').value;
                const status = document.getElementById('add_staff_status_value').value;
                
                if (!name || !phone || !email || !hireDate || !status) {
                    alert('Please fill in all required fields in Staff Information');
                    return false;
                }
            } else if (step === 3) {
                // Validate Credentials
                const username = document.getElementById('staff_username').value;
                const password = document.getElementById('staff_password').value;
                const passwordConfirm = document.getElementById('staff_password_confirm').value;
                
                if (!username || !password || !passwordConfirm) {
                    alert('Please fill in all credential fields');
                    return false;
                }
                
                if (password.length < 8) {
                    alert('Password must be at least 8 characters long');
                    return false;
                }
                
                if (password !== passwordConfirm) {
                    alert('Passwords do not match');
                    return false;
                }
            }
            
            return true;
        }
        
        // Update confirmation page
        function updateConfirmationPage() {
            // Staff Info
            document.getElementById('confirm_name').textContent = document.getElementById('staff_name').value || '-';
            document.getElementById('confirm_email').textContent = document.getElementById('staff_email').value || '-';
            document.getElementById('confirm_phone').textContent = document.getElementById('staff_phone').value || '-';
            document.getElementById('confirm_status').textContent = document.getElementById('add_staff_status_value').value || '-';
            
            // Module Access
            const modules = [];
            const moduleCheckboxes = document.querySelectorAll('input[name^="access_"]');
            moduleCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const moduleName = checkbox.name.replace('access_', '').replace('_', ' ');
                    modules.push(moduleName.charAt(0).toUpperCase() + moduleName.slice(1));
                }
            });
            
            const modulesContainer = document.getElementById('confirm_modules');
            if (modules.length > 0) {
                modulesContainer.innerHTML = modules.map(m => '<div>✓ ' + m + '</div>').join('');
            } else {
                modulesContainer.innerHTML = '<em>No modules selected</em>';
            }
            
            // Credentials
            document.getElementById('confirm_username').textContent = document.getElementById('staff_username').value || '-';
            
            // Email notification
            const sendEmail = document.getElementById('send_credentials').checked;
            const emailSendDiv = document.getElementById('confirm_email_send');
            if (sendEmail) {
                emailSendDiv.style.display = 'block';
            } else {
                emailSendDiv.style.display = 'none';
            }
        }
        
        // Generate username from name
        function generateUsername() {
            const name = document.getElementById('staff_name').value;
            if (!name) {
                alert('Please enter a full name first');
                return;
            }
            
            // Convert name to username format (lowercase, remove spaces, add random numbers)
            const username = name.toLowerCase()
                .replace(/\s+/g, '.')
                .replace(/[^a-z.]/g, '') + 
                Math.floor(Math.random() * 100);
            
            document.getElementById('staff_username').value = username;
        }
        
        // Open Edit Staff Modal
        function openEditStaffModal(id, name, employeeId, position, department, phone, email, hireDate, status) {
            console.log('🚀 OPENING Edit Staff Modal with data:', {id, name, employeeId, position, department, phone, email, hireDate, status});
            
            // Populate form fields
            document.getElementById('edit_staff_id').value = id;
            document.getElementById('edit_staff_name').value = name;
            document.getElementById('edit_staff_employee_id').value = employeeId;
            document.getElementById('edit_staff_phone').value = phone;
            document.getElementById('edit_staff_email').value = email;
            document.getElementById('edit_staff_hire_date').value = hireDate;
            
            // Set position dropdown
            document.getElementById('edit_staff_position_value').value = position;
            document.getElementById('edit_staff_position_display').textContent = position;
            document.getElementById('edit_staff_position_display').style.color = '#111827';
            
            // Set department dropdown
            document.getElementById('edit_staff_department_value').value = department;
            document.getElementById('edit_staff_department_display').textContent = department;
            document.getElementById('edit_staff_department_display').style.color = '#111827';
            
            // Set status dropdown
            document.getElementById('edit_staff_status_value').value = status;
            document.getElementById('edit_staff_status_display').textContent = status;
            document.getElementById('edit_staff_status_display').style.color = '#111827';
            
            // Show modal
            var modal = document.getElementById('editStaffModal');
            if (modal) {
                modal.style.display = 'flex';
                console.log('✅ Edit modal opened successfully!');
            } else {
                console.error('❌ ERROR: Edit modal element not found!');
            }
        }
        
        // Close Edit Staff Modal
        function closeEditStaffModal() {
            console.log('🚀 CLOSING Edit Staff Modal...');
            var modal = document.getElementById('editStaffModal');
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
        
        // Select Staff Position
        function selectStaffPosition(type, value) {
            document.getElementById(type + '_position_value').value = value;
            document.getElementById(type + '_position_display').textContent = value;
            document.getElementById(type + '_position_display').style.color = '#111827';
            document.getElementById(type + '_position_dropdown').style.display = 'none';
            console.log('✅ Position selected:', value);
        }
        
        // Select Staff Department
        function selectStaffDepartment(type, value) {
            document.getElementById(type + '_department_value').value = value;
            document.getElementById(type + '_department_display').textContent = value;
            document.getElementById(type + '_department_display').style.color = '#111827';
            document.getElementById(type + '_department_dropdown').style.display = 'none';
            console.log('✅ Department selected:', value);
        }
        
        // Select Staff Status
        function selectStaffStatus(type, value) {
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
                closeAddStaffModal();
                closeEditStaffModal();
            }
        });
        
        // Verify modals exist on page load
        $(document).ready(function() {
            console.log('🔍 Checking if modals exist...');
            var addModal = document.getElementById('addStaffModal');
            var editModal = document.getElementById('editStaffModal');
            
            if (addModal) {
                console.log('✅ Add Staff Modal found!');
            } else {
                console.error('❌ Add Staff Modal NOT found!');
            }
            
            if (editModal) {
                console.log('✅ Edit Staff Modal found!');
            } else {
                console.error('❌ Edit Staff Modal NOT found!');
            }
        });
        
        console.log('✅ All modal functions loaded - NO Alpine.js needed!');
    </script>
@endpush
