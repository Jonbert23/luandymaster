@extends('master.layout')

@section('title', 'Services')
@section('header_title', 'Services')

@push('css')
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
<div class="container-fluid" x-data="{ tab: 'List1' }">
    <div class="flex items-center flex-wrap bg-card rounded-[2rem] p-2 mb-6">
        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                <option>Service Type</option>
                <option>Washing</option>
                <option>Dry Cleaning</option>
                <option>Ironing</option>
                <option>Specialty</option>
            </select>
        </div>
        <div class="xl:w-1/6 col-xxl-3 lg:w-1/4 sm:w-1/2 w-full relative flex max-lg:mb-2.5 items-center after:content-[''] after:absolute after:bg-[#E2E2E2] dark:after:bg-[#2e2e42] ltr:after:right-0 rtl:after:left-0 after:h-8 after:w-[1px] after:top-[.375rem]">
            <select class="nice-select style-1 h-auto py-[.65rem] px-5 font-medium xl:text-[15px] text-primary border-0 lg:w-[235px] w-full after:absolute ltr:after:right-[20px] rtl:after:left-[20px]">
                <option>Price Range</option>
                <option>Under $10</option>
                <option>$10 - $30</option>
                <option>$30 - $50</option>
                <option>Above $50</option>
            </select>
        </div>
        <div class="xl:w-2/3 col-xxl-6 lg:w-1/2 w-full md:flex max-lg:pt-2 max-lg:border-t border-border pe-0">
            <div class="ltr:ml-4 rtl:mr-4 ltr:max-lg:ml-0 rtl:max-lg:mr-0 relative flex flex-wrap items-stretch w-full">
                <input type="text" class="py-[5px] px-5 h-[2.85rem] inline-block text-dark outline-none w-[1%] flex-auto" placeholder="Search service here...">
                <a href="javascript:void(0)" class="py-[0.65rem] px-5 rounded-full bg-primary text-white border border-primary duration-500 hover:bg-hover-primary xl:text-[15px] font-medium cursor-pointer inline-block">Search<i class="flaticon-381-search-2 ltr:ml-2 rtl:mr-2 inline-block"></i></a>
            </div>
        </div>
    </div>

    <div class="mt-4 flex justify-between items-center flex-wrap">
        <div class="mb-6">
            <h6 class="mb-2">Showing 12 Services Available</h6>
            <p>Based on your preferences</p>
        </div>	
        <div class="flex items-center mb-6">
            <div class="default-tab job-tabs">
                <ul class="flex" role="tablist">
                    <li class="nav-item">
                        <a class="py-[0.7rem] px-[.9rem] ltr:mr-2 rtl:ml-2.5 rounded-lg duration-500 text-primary"
                        style="background-color: var(--rgba-primary-1);" 
                        @click.prevent="tab = 'Boxed'"
                        :class="{'bg-primary text-white' : tab == 'Boxed'}"
                        href="javascript:void(0);">
                            <i class="fas fa-th-large scale-[1.3] dark:text-white"></i>
                        </a>	
                    </li>	
                    <li class="nav-item">
                        <a class="py-[0.7rem] px-[.9rem] ltr:mr-2 rtl:ml-2.5 rounded-lg duration-500 text-primary"
                        style="background-color: var(--rgba-primary-1);" 
                        @click.prevent="tab = 'List1'"
                        :class="{'bg-primary text-white' : tab == 'List1'}"
                        href="javascript:void(0);">
                            <i class="fas fa-list scale-[1.3] dark:text-white"></i>
                        </a>
                    </li>	
                </ul>	
            </div>	
            <div>
                <button onclick="openAddServiceModal()" 
                        class="inline-flex items-center px-6 py-3 bg-primary hover:bg-hover-primary text-white rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                    <i class="fas fa-plus mr-2"></i>
                    Add Service
                </button>
            </div>
        </div>
        
        @php
        $services = [
            ['name' => 'Wash & Fold', 'description' => 'Professional Washing Service', 'price' => '15.99', 'unit' => 'Per Kilo', 'icon_bg' => '#2769ee', 'icon' => 'fa-tshirt'],
            ['name' => 'Dry Cleaning', 'description' => 'Premium Dry Clean Service', 'price' => '25.00', 'unit' => 'Per Piece', 'icon_bg' => '#47ae3b', 'icon' => 'fa-user-tie'],
            ['name' => 'Ironing Service', 'description' => 'Professional Pressing & Ironing', 'price' => '12.99', 'unit' => 'Per Piece', 'icon_bg' => '#8030d0', 'icon' => 'fa-fire'],
            ['name' => 'Express Wash', 'description' => 'Same Day Washing Service', 'price' => '29.99', 'unit' => 'Per Kilo', 'icon_bg' => '#e1b746', 'icon' => 'fa-bolt'],
            ['name' => 'Bedding Service', 'description' => 'Blankets, Sheets & Comforters', 'price' => '35.00', 'unit' => 'Per Set', 'icon_bg' => '#314c82', 'icon' => 'fa-bed'],
            ['name' => 'Alterations', 'description' => 'Professional Tailoring Service', 'price' => '20.00', 'unit' => 'Per Item', 'icon_bg' => '#676767', 'icon' => 'fa-cut'],
            ['name' => 'Stain Removal', 'description' => 'Expert Stain Treatment', 'price' => '18.50', 'unit' => 'Per Item', 'icon_bg' => '#f94a4a', 'icon' => 'fa-spray-can'],
            ['name' => 'Leather Care', 'description' => 'Specialized Leather Cleaning', 'price' => '45.00', 'unit' => 'Per Item', 'icon_bg' => '#ee9827', 'icon' => 'fa-briefcase'],
            ['name' => 'Wedding Dress', 'description' => 'Delicate Bridal Gown Care', 'price' => '75.00', 'unit' => 'Per Piece', 'icon_bg' => '#ee27c0', 'icon' => 'fa-ring'],
            ['name' => 'Curtain Cleaning', 'description' => 'Home Curtains & Drapes', 'price' => '40.00', 'unit' => 'Per Panel', 'icon_bg' => '#27beee', 'icon' => 'fa-home'],
            ['name' => 'Shoe Cleaning', 'description' => 'Professional Shoe Care', 'price' => '22.00', 'unit' => 'Per Pair', 'icon_bg' => '#bec747', 'icon' => 'fa-shoe-prints'],
            ['name' => 'Carpet Cleaning', 'description' => 'Deep Carpet Wash & Treatment', 'price' => '55.00', 'unit' => 'Per Sqm', 'icon_bg' => '#7b25d1', 'icon' => 'fa-rug'],
        ];
        @endphp
        
        <div class="tab-contentt">
            <!-- Boxed View -->
            <div x-show=" tab == 'Boxed'"
            x-transition:enter="transition-all duration-700 ease-in-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100">
                <div class="row">
                    @foreach($services as $service)
                    <div class="xl:w-1/2">
                        <div class="card relative">
                            <div class="absolute z-10" style="top: 1rem; right: 1rem !important; left: auto !important;">
                                <div class="relative cursor-pointer" x-data="{ open: false }">
                                    <div @click="open = true">
                                        <a href="javascript:void(0);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        </a>
                                    </div>
                                    <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 top-full right-0 translate-y-1 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                                        <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-edit ltr:mr-1 rtl:ml-1 text-success"></i>Edit</a>
                                        <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-trash-alt ltr:mr-1 rtl:ml-1 text-danger"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:p-[1.875rem] p-4 flex-auto">
                                <div class="flex flex-wrap justify-between items-center">
                                    <div class="flex">
                                        <div class="size-20 ltr:mr-4 rtl:ml-4 rounded-xl flex items-center justify-center text-white text-2xl" style="background-color: {{ $service['icon_bg'] }};">
                                            <i class="fas {{ $service['icon'] }}"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">{{ $service['name'] }}</h4>
                                            <p class="mb-2">{{ $service['description'] }}</p>
                                            <p class="text-[13px]"><i class="fas fa-tag ltr:mr-2 rtl:ml-2 text-primary"></i>{{ $service['unit'] }}</p>
                                        </div>
                                    </div>
                                    <div class="job-available sm:mt-0 mt-4">
                                        <div class="text-center">
                                            <h4 class="text-primary mb-0">${{ $service['price'] }}</h4>
                                            <small class="text-body-text">Starting Price</small>
                                        </div>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- List/Grid View -->
            <div x-show=" tab == 'List1'"
            x-transition:enter="transition-all duration-700 ease-in-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100">
                <div class="row">
                    @foreach($services as $service)
                    <div class="xl:w-1/4 md:w-1/3 sm:w-1/2">
                        <div class="card hover:shadow-[0_15px_25px_rgba(0,0,0,0.1)] relative">
                            <div class="absolute z-10" style="top: 1rem; right: 1rem !important; left: auto !important;">
                                <div class="relative cursor-pointer" x-data="{ open: false }">
                                    <div @click="open = true">
                                        <a href="javascript:void(0);">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z" stroke="var(--text-gray)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        </a>
                                    </div>
                                    <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 top-full right-0 translate-y-1 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                                        <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-edit ltr:mr-1 rtl:ml-1 text-success"></i>Edit</a>
                                        <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-trash-alt ltr:mr-1 rtl:ml-1 text-danger"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:p-[1.875rem] p-4 flex-auto">
                                <div class="text-center">
                                    <div class="size-14 mx-auto mb-[15px] rounded-xl flex items-center justify-center text-white text-xl" style="background-color: {{ $service['icon_bg'] }};">
                                        <i class="fas {{ $service['icon'] }}"></i>
                                    </div>
                                    <h5 class="mb-1"><a href="javascript:void(0);">{{ $service['name'] }}</a></h5>
                                    <p class="text-primary mb-2 text-[13px] leading-[1.5]">{{ $service['description'] }}</p>
                                </div>
                                <div class="text-center pt-1">
                                    <p class="text-dark"><i class="fas fa-tag ltr:mr-2 rtl:ml-2 text-body-text"></i>{{ $service['unit'] }}</p>
                                    <p class="text-dark font-semibold text-lg text-primary">${{ $service['price'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="flex items-center justify-between flex-wrap w-full">
            <div class="sm:mb-0 mb-4">
                <p class="text-dark">Showing 12 of 12 Services</p>
            </div>
            <nav>
                <ul class="pagination flex mb-5">
                    <li class="ltr:mr-[7px] rtl:ml-[7px]"><a class="py-[.65rem] px-[.8rem] size-10 border border-primary-light rounded-full block text-primary duration-500 bg-primary-light bg-card hover:bg-primary hover:text-white text-sm active" href="javascript:void(0);"><i class="la la-angle-left"></i></a></li>
                    <li class="ltr:mr-[7px] rtl:ml-[7px]"><a class="py-[.65rem] px-[.8rem] size-10 border rounded-full flex justify-center items-center duration-500 bg-primary text-white text-sm border-primary shadow-[0_0.625rem_1.25rem_0rem_var(--rgba-primary-2)]" href="javascript:void(0);">1</a></li>
                    <li class="ltr:mr-[7px] rtl:ml-[7px]"><a class="py-[.65rem] px-[.8rem] size-10 border border-border rounded-full flex justify-center items-center text-body-text bg-card duration-500 hover:bg-primary hover:text-white text-sm hover:border-primary" href="javascript:void(0);">2</a></li>
                    <li class="ltr:mr-[7px] rtl:ml-[7px]"><a class="py-[.65rem] px-[.8rem] size-10 border border-border rounded-full flex justify-center items-center text-body-text bg-card duration-500 hover:bg-primary hover:text-white text-sm hover:border-primary" href="javascript:void(0);">3</a></li>
                    <li class="ltr:mr-[7px] rtl:ml-[7px]"><a class="py-[.65rem] px-[.8rem] size-10 border border-primary-light rounded-full block text-primary duration-500 bg-primary-light bg-card hover:bg-primary hover:text-white text-sm" href="javascript:void(0);"><i class="la la-angle-right"></i></a></li>
                </ul>
            </nav>
        </div>	
    </div>
</div>

<!-- Include Modal -->
@include('business.services.modals.add-service')

@endsection

@push('scripts')
    <script>
        // ============================================
        // MODAL FUNCTIONS
        // ============================================
        
        // Open Add Service Modal
        function openAddServiceModal() {
            var modal = document.getElementById('addServiceModal');
            if (modal) {
                modal.style.display = 'flex';
            }
        }
        
        // Close Add Service Modal
        function closeAddServiceModal() {
            var modal = document.getElementById('addServiceModal');
            if (modal) {
                modal.style.display = 'none';
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
        
        // Select Service Type
        function selectServiceType(type, value) {
            document.getElementById(type + '_service_type_value').value = value;
            document.getElementById(type + '_service_type_display').textContent = value;
            document.getElementById(type + '_service_type_display').style.color = '#111827';
            document.getElementById(type + '_service_type_dropdown').style.display = 'none';
        }

        // Select Service Unit
        function selectServiceUnit(type, value) {
            document.getElementById(type + '_service_unit_value').value = value;
            document.getElementById(type + '_service_unit_display').textContent = value;
            document.getElementById(type + '_service_unit_display').style.color = '#111827';
            document.getElementById(type + '_service_unit_dropdown').style.display = 'none';
        }

        // Select Service Icon
        function selectServiceIcon(type, value, label) {
            document.getElementById(type + '_service_icon_value').value = value;
            document.getElementById(type + '_service_icon_display').innerHTML = '<i class="fas ' + value + '" style="margin-right: 10px;"></i> ' + label;
            document.getElementById(type + '_service_icon_display').style.color = '#111827';
            document.getElementById(type + '_service_icon_dropdown').style.display = 'none';
        }

        // Select Service Color
        function selectServiceColor(type, value, label) {
            document.getElementById(type + '_service_icon_bg_value').value = value;
            document.getElementById(type + '_service_icon_bg_display').innerHTML = '<span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: ' + value + '; margin-right: 8px;"></span> ' + label;
            document.getElementById(type + '_service_icon_bg_dropdown').style.display = 'none';
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-dropdown')) {
                document.querySelectorAll('.custom-dropdown-menu').forEach(dd => {
                    dd.style.display = 'none';
                });
            }
        });
        
        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddServiceModal();
            }
        });
    </script>
@endpush