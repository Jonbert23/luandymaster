@extends('master.layout')

@section('title', 'Statistics')
@section('header_title', 'Statistics')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-2xl font-semibold">Dashboard Overview</h4>
        <div class="w-64 relative flex items-center">
            <input type="text" class="form-control flatpickr-range bg-white border border-border rounded-lg py-2 w-full outline-none" placeholder="Select Date Range" style="padding-left: 1rem; padding-right: 3rem; text-align: center;">
            <i class="fas fa-calendar absolute text-primary pointer-events-none" style="right: 1rem;"></i>
        </div>
    </div>
    <div class="row">
        <div class="w-full">
            <div class="card">
                <div class="sm:p-[1.875rem] p-4 flex-auto">
                    <div class="row shapreter-row">
                        <div class="lg:w-1/6 sm:w-2/6 w-1/2 ltr:border-r max-lg:border-b border-border">
                            <div class="max-lg:mb-6 text-center">
                                <span>
                                    <i class="fas fa-coins size-[3.813rem] bg-primary-light text-center leading-[3.813rem] text-primary rounded-full text-[1.7rem] max-sm:text-[1.3rem] mb-4"></i>
                                </span>
                                <h3 class="font-bold text-2xl">$12,450</h3>
                                <p>Total Sales</p>
                            </div>
                        </div>
                        <div class="lg:w-1/6 sm:w-2/6 w-1/2 border-r max-lg:border-b ltr:max-sm:border-r-0 border-border">
                            <div class="max-lg:mb-6 text-center">
                                <span>
                                    <i class="fas fa-spinner size-[3.813rem] bg-primary-light text-center leading-[3.813rem] text-primary rounded-full text-[1.7rem] max-sm:text-[1.3rem] mb-4"></i>
                                </span>
                                <h3 class="count">45</h3>
                                <p>Orders in Process</p>
                            </div>
                        </div>
                        <div class="lg:w-1/6 sm:w-2/6 w-1/2 max-sm:pt-6 border-border lg:border-r max-lg:border-b ltr:max-sm:border-r rtl:sm:border-r">
                            <div class="max-lg:mb-6 text-center">
                                <span>
                                    <i class="fas fa-shopping-bag size-[3.813rem] bg-primary-light text-center leading-[3.813rem] text-primary rounded-full text-[1.7rem] max-sm:text-[1.3rem] mb-4"></i>
                                </span>
                                <h3 class="count">12</h3>
                                <p>Ready for Pickup</p>
                            </div>
                        </div>
                        <div class="lg:w-1/6 sm:w-2/6 w-1/2 max-lg:pt-6 ltr:border-r ltr:max-sm:border-r-0 max-sm:border-b border-border rtl:lg:border-r rtl:max-sm:border-r">
                            <div class="max-lg:mb-6 text-center">
                                <span>
                                    <i class="fas fa-user-plus size-[3.813rem] bg-primary-light text-center leading-[3.813rem] text-primary rounded-full text-[1.7rem] max-sm:text-[1.3rem] mb-4"></i>
                                </span>
                                <h3 class="count">32</h3>
                                <p>New Customers</p>
                            </div>
                        </div>
                        <div class="lg:w-1/6 sm:w-2/6 w-1/2 max-lg:pt-6 border-r border-border rtl:max-sm:border-r-0">
                            <div class="max-lg:mb-6 text-center">
                                <span>
                                    <i class="fas fa-user-check size-[3.813rem] bg-primary-light text-center leading-[3.813rem] text-primary rounded-full text-[1.7rem] max-sm:text-[1.3rem] mb-4"></i>
                                </span>
                                <h3 class="count">18</h3>
                                <p>Returning Customers</p>
                            </div>
                        </div>
                        <div class="lg:w-1/6 sm:w-2/6 w-1/2 max-lg:pt-6 border-border rtl:border-r">
                            <div class="max-lg:mb-6 text-center">
                                <span>
                                    <i class="fas fa-chart-line size-[3.813rem] bg-primary-light text-center leading-[3.813rem] text-primary rounded-full text-[1.7rem] max-sm:text-[1.3rem] mb-4"></i>
                                </span>
                                <h3 class="font-bold text-2xl">$35.00</h3>
                                <p>Avg Order Value</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-1/2">
            <div class="card">
                <div class="relative sm:flex block justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
                    <h4 class="text-xl capitalize">Order Status</h4>
                </div>
                <div class="sm:p-[1.875rem] p-4 flex-auto sm:pt-4 pt-4">
                    <div class="row items-center">
                        <div class="sm:w-1/2">
                            <div class="h-2 bg-body overflow-hidden rounded-xl">
                                <div class="progress-bar bg-[#F6AD2E] rounded-lg duration-500 animate-myanimation" style="width: 30%; height:8px;" role="progressbar">
                                    <span class="sr-only">30% Complete</span>
                                </div>
                            </div>
                            <div class="flex items-end mt-2 pb-6 justify-between">
                                <span class="font-medium text-sm text-body-text">Pending</span>
                                <h6>30%</h6>
                            </div>
                            <div class="h-2 bg-body overflow-hidden rounded-xl">
                                <div class="progress-bar bg-primary rounded-lg duration-500 animate-myanimation" style="width: 45%; height:8px;" role="progressbar">
                                    <span class="sr-only">45% Complete</span>
                                </div>
                            </div>
                            <div class="flex items-end mt-2 pb-6 justify-between">
                                <span class="font-medium text-sm text-body-text">Washing</span>
                                <h6>45%</h6>
                            </div>
                            <div class="h-2 bg-body overflow-hidden rounded-xl">
                                <div class="progress-bar bg-[#412EFF] rounded-lg duration-500 animate-myanimation" style="width: 25%; height:8px;" role="progressbar">
                                    <span class="sr-only">25% Complete</span>
                                </div>
                            </div>
                            <div class="flex items-end mt-2 justify-between">
                                <span class="font-medium text-sm text-body-text">Drying</span>
                                <h6>25%</h6>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div id="pieChart3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-1/2">
            <div class="card">
                <div class="relative sm:flex block justify-between items-start sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
                    <h4 class="text-xl capitalize mb-2">Customer Overview</h4>
                    <div class="w-40">
                        <div class="flex items-center">
                            <span class="text-body-text">
                                <svg class="ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                    <rect width="13" height="13" fill="var(--primary)"/>
                                </svg>
                                New
                            </span>
                            <h5 class="ltr:ml-auto rtl:mr-auto">450</h5>
                        </div>
                        <div class="mt-1 flex items-center">
                            <span class="text-body-text">
                                <svg class="ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                    <rect width="13" height="13" fill="#01111c"/>
                                </svg>
                                Returning
                            </span>
                            <h5 class="ltr:ml-auto rtl:mr-auto">1,250</h5>
                        </div>
                    </div>
                </div>
                <div class="sm:pr-[1.875rem] pr-4 sm:pl-4 pl-0">
                    <div id="chartBar" class="chartBar"></div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <div class="card " id="user-activity" x-data="{ tab: 'Daily' }">
                <div class="relative sm:flex block justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
                    <h4 class="text-xl capitalize">Sales Overview</h4>
                    <div class="mt-4 sm:mt-0">
                        <ul class="nav nav-tabs vacany-tabs flex flex-wrap items-center p-1 rounded-lg text-gray bg-body" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Daily'" 
                                :class="{'bg-primary text-white' : tab == 'Daily'}"
                                data-series="Daily" href="javascript:void(0);">Daily</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Weekly'" 
                                :class="{'bg-primary text-white' : tab == 'Weekly'}"
                                data-series="Weekly" href="javascript:void(0);" >Weekly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Monthly'" 
                                :class="{'bg-primary text-white' : tab == 'Monthly'}"
                                data-series="Monthly" href="javascript:void(0);" >Monthly</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pt-4 sm:px-4 px-0 pb-1">
                    <div class="sm:pb-6 mb-4 flex flex-wrap px-4">
                        <div class="flex items-center">
                            <svg class="ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                <rect width="13" height="13" rx="6.5" fill="#35c556"/>
                            </svg>
                            <span class="text-dark text-[13px] font-medium">Total Revenue</span>	
                        </div>
                        <div class="ltr:sm:ml-8 ltr:ml-[.8rem] rtl:sm:mr-8 rtl:mr-[.8rem] flex items-center">
                            <svg class="ltr:mr-1 rtl:ml-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                <rect width="13" height="13" rx="6.5" fill="#3f4cfe"/>
                            </svg>
                            <span class="text-dark text-[13px] font-medium">Orders Completed</span>
                        </div>
                    </div>
                    <div>
                        <div id="vacancyChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-1/2">
            <div class="card" x-data="{ tab: 'Daily' }" id="user-activity1">
                <div class="relative flex justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
                    <h4 class="text-xl capitalize mb-0">Completed Orders</h4>
                    <ul class="nav nav-tabs chart-tab flex flex-wrap items-center p-1 rounded-lg text-gray bg-body" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Daily'" 
                            :class="{'bg-primary text-white' : tab == 'Daily'}"
                            data-series="Daily" href="javascript:void(0);">Daily</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Weekly'" 
                            :class="{'bg-primary text-white' : tab == 'Weekly'}"
                            data-series="Weekly" href="javascript:void(0);" >Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Monthly'" 
                            :class="{'bg-primary text-white' : tab == 'Monthly'}"
                            data-series="Monthly" href="javascript:void(0);" >Monthly</a>
                        </li>
                    </ul>
                </div>
                <div class="sm:p-[1.875rem] p-4 flex-auto sm:pl-4 pl-0 pb-2">
                    <div class="sm:flex block mb-4 mx-4">
                        <div class="flex items-center ltr:mr-12 rtl:ml-12 sm:mb-0 mb-2">
                            <svg class="ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                <rect width="13" height="13" fill="var(--primary)"/>
                            </svg>
                            <label class="mb-0 ltr:mr-6 rtl:ml-6 text-dark">Completed</label>
                            <h6 class="mb-0 ltr:mr-1 rtl:ml-1">239</h6>
                            <span class="text-success text-[13px] font-medium">+0.4%</span>
                        </div>
                    </div>
                    <div>
                        <div id="activity1" class="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-1/2">
            <div class="card">
                <div class="relative sm:flex block justify-between items-center sm:py-6 py-5 sm:px-[1.875rem] px-4 flex-wrap">
                    <h4 class="text-xl capitalize mb-1">Recent Orders</h4>
                    <div class="relative cursor-pointer inline-block" x-data="{ open: false }">
                        <a href="javascript:void(0);" class="btn-link" @click="open = true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 mt-2 top-full ltr:right-0 rtl:left-0 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                            <a class="dropdown-item block text-left w-full py-2 px-6 text-[#828690] duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Delete</a>
                            <a class="dropdown-item block text-left w-full py-2 px-6 text-[#828690] duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="sm:p-[1.875rem] p-4 flex-auto sm:pt-0 pt-0 loadmore-content relative overflow-y-scroll dlab-scroll h-[23.125rem]" id="scroll-y">
                    <div class="row list-grid-area" id="FeaturedCompaniesContent">
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #2769ee;">
                                    JD
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">John Doe</h5>
                                    <span class="text-body-text">Wash & Fold</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #7630d2;">
                                    MS
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">Mary Smith</h5>
                                    <span class="text-body-text">Dry Cleaning</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #b848ef;">
                                    RJ
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">Robert Johnson</h5>
                                    <span class="text-body-text">Ironing Service</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #7e1d74;">
                                    LB
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">Linda Brown</h5>
                                    <span class="text-body-text">Express Wash</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #0411c2;">
                                    DW
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">David Wilson</h5>
                                    <span class="text-body-text">Bedding Service</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #378a82;">
                                    SM
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">Sarah Martinez</h5>
                                    <span class="text-body-text">Alterations</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #175baa;">
                                    JT
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">James Taylor</h5>
                                    <span class="text-body-text">Wash & Fold</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-1/2">
                            <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                                <div class="size-14 flex items-center justify-center rounded-xl text-white font-bold text-xl" style="background-color: #eeb927;">
                                    EA
                                </div>
                                <div class="ltr:ml-4 rtl:mr-4 featured">
                                    <h5 class="mb-1">Emma Anderson</h5>
                                    <span class="text-body-text">Stain Removal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:py-6 py-5 sm:px-[1.875rem] px-4 m-auto pt-4">
                    <a href="{{ route('business.orders.index') }}" class="py-[0.65rem] px-5 rounded-lg text-primary border border-primary duration-500 hover:text-white hover:bg-primary xl:text-[15px] font-medium inline-block m-auto">View all orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var counters = $(".count");
        var countersQuantity = counters.length;
        var counter = [];

        for (i = 0; i < countersQuantity; i++) {
            counter[i] = parseInt(counters[i].innerHTML);
        }

        var count = function(start, value, id) {
            var localStart = start;
            setInterval(function() {
                if (localStart < value) {
                    localStart++;
                    counters[id].innerHTML = localStart;
                }
            }, 40);
        }

        for (j = 0; j < countersQuantity; j++) {
            count(0, counter[j], j);
        }

        // Initialize Flatpickr for date range
        $(".flatpickr-range").flatpickr({
            mode: "range",
            dateFormat: "Y-m-d",
            defaultDate: [new Date(new Date().setDate(new Date().getDate() - 30)), new Date()], // Default to last 30 days
        });
    });
</script>
@endpush