@extends('master.layout')

@section('title', 'Sales')
@section('header_title', 'Sales')

@push('css')
    <link href="{{ asset('template/assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid" x-data="{ tab: 'AllSales' }">
    <div class="sm:flex block justify-between items-center mb-6">
        <div class="card-action coin-tabs sm:mt-0 mt-4">
            <ul class="flex flex-wrap items-center p-1 rounded-lg text-gray bg-card" role="tablist">
                <li class="nav-item">
                    <a class="py-2 px-[1.125rem] block rounded-lg duration-500 bg-primary text-white"
                    @click.prevent="tab = 'AllSales'"
                    :class="{ 'bg-primary text-white' : tab == 'AllSales' }"
                    href="javascript:void(0);">All Sales</a>
                </li>
                <li class="nav-item">
                    <a class="py-2 px-[1.125rem] block rounded-lg duration-500 bg-primary text-white"
                    @click.prevent="tab = 'Completed'"
                    :class="{ 'bg-primary text-white' : tab == 'Completed' }"
                    href="javascript:void(0);">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="py-2 px-[1.125rem] block rounded-lg duration-500 bg-primary text-white"
                    @click.prevent="tab = 'Pending'"
                    :class="{ 'bg-primary text-white' : tab == 'Pending' }"
                    href="javascript:void(0);">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="py-2 px-[1.125rem] block rounded-lg duration-500 bg-primary text-white"
                    @click.prevent="tab = 'Refunded'"
                    :class="{ 'bg-primary text-white' : tab == 'Refunded' }"
                    href="javascript:void(0);">Refunded</a>
                </li>
            </ul>
        </div>
        <div class="flex sm:mt-0 mt-4">
            <select class="nice-select py-[0.65rem] px-5 rounded-lg bg-primary-light text-primary border-primary-light text-[15px] inline-block">
              <option data-display="Newest">Newest</option>
              <option value="2">oldest</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="w-full">
            <div>
                <!-- All Sales -->
                <div x-show=" tab == 'AllSales'"
                 x-transition:enter="transition-all duration-700 ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100">	
                    <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-0">All Sales</h4>
                            <div class="relative" style="width: 200px; position: relative;">
                                <input type="text" id="search-application-tbl1" class="w-full py-2 px-4 pr-10 rounded-lg bg-transparent transition-colors text-sm focus:outline-none" placeholder="Search sales..." style="border: 1px solid #f5e2dd; padding-right: 2.5rem; box-shadow: none; outline: none;">
                                <i class="fas fa-search absolute text-gray-400" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-gray ItemsCheckboxSec" id="application-tbl1">
                            <thead>
                                <tr>
                                    <th class="align-middle pl-3.5 py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input checkAll" type="checkbox" value="" id="checkAll4">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="checkAll4">
                                          </label>
                                        </div>  
                                    </th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Sale ID</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Date</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Customer</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Items</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Total</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Staff</th>
                                    <th class="align-middle text-left sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Status</th>
                                    <th class="align-middle sm:px-[15px] px-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td class="align-middle sm:py-[.85rem] sm:pr-[15px] py-2 pr-[5px] pl-3.5 border-b border-border tbl-bx">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input" type="checkbox" value="" id="customCheckBox{{ $i }}">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="customCheckBox{{ $i }}">
                                          </label>
                                        </div>
                                    </td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">#SALE-00{{ $i }}</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">Dec {{ 20 + $i }}th 2020</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2">
                                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="53" height="53" viewBox="0 0 53 53">
                                                    <g  transform="translate(0.243)">
                                                        <rect  width="53" height="53" rx="12" transform="translate(-0.243)" fill="#c5c5c5"/>
                                                        <g  transform="translate(-0.243)">
                                                            <rect  data-name="placeholder" width="53" height="53" rx="12" fill="#2769ee"/>
                                                            <ellipse  data-name="Ellipse 12" cx="13.243" cy="13.43" rx="13.243" ry="13.43" transform="translate(11.152 14.922)" fill="#fff"/>
                                                            <ellipse  data-name="Ellipse 11" cx="8.016" cy="8.207" rx="8.016" ry="8.207" transform="translate(27.183 11.191)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <h6>Customer {{ $i }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">3 Items</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border font-bold text-dark">$1{{ $i }}0.00</td>
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center text-secondary">
                                            <i class="fas fa-user ltr:mr-2 rtl:ml-2"></i>
                                            Staff {{ $i }}
                                        </div>
                                    </td>
                                
                                    <td class="align-middle text-left sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">
                                        @if($i % 3 == 0)
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-success bg-success-light">Completed</span>
                                        @elseif($i % 3 == 1)
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-warning bg-warning-light">Pending</span>
                                        @else
                                            <span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-danger bg-danger-light">Refunded</span>
                                        @endif
                                    </td>
                                    <td class="align-middle sm:py-[.85rem] px-[1.875rem] py-2 max-sm:pl-[15px] border-b border-border ltr:text-right rtl:text-left">
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
                                            <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 top-full ltr:right-0 rtl:left-0 translate-y-1 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-eye ltr:mr-1 rtl:ml-1 text-success"></i>View</a>
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="fas fa-print ltr:mr-1 rtl:ml-1 text-primary"></i>Print</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Completed -->
                <div x-show=" tab == 'Completed'"
                 x-transition:enter="transition-all duration-700 ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100">	
                    <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-0">Completed Sales</h4>
                            <div class="relative" style="width: 200px; position: relative;">
                                <input type="text" id="search-application-tbl2" class="w-full py-2 px-4 pr-10 rounded-lg bg-transparent transition-colors text-sm focus:outline-none" placeholder="Search completed..." style="border: 1px solid #f5e2dd; padding-right: 2.5rem; box-shadow: none; outline: none;">
                                <i class="fas fa-search absolute text-gray-400" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-gray ItemsCheckboxSec" id="application-tbl2">
                                <thead>
                                <tr>
                                    <th class="pl-3.5 py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input checkAll" type="checkbox" value="" id="checkAllCompleted">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="checkAllCompleted">
                                          </label>
                                        </div>  
                                    </th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Sale ID</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Date</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Customer</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Items</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Total</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Staff</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Status</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td class="sm:py-[.85rem] sm:pr-[15px] py-2 pr-[5px] pl-3.5 border-b border-border tbl-bx">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input" type="checkbox" value="" id="customCheckBoxC{{ $i }}">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="customCheckBoxC{{ $i }}">
                                          </label>
                                        </div>
                                    </td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">#SALE-00{{ $i }}</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">Dec {{ 10 + $i }}th 2020</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2">
                                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="53" height="53" viewBox="0 0 53 53">
                                                    <g  transform="translate(0.243)">
                                                        <rect  width="53" height="53" rx="12" transform="translate(-0.243)" fill="#c5c5c5"/>
                                                        <g  transform="translate(-0.243)">
                                                            <rect  data-name="placeholder" width="53" height="53" rx="12" fill="#2769ee"/>
                                                            <ellipse  data-name="Ellipse 12" cx="13.243" cy="13.43" rx="13.243" ry="13.43" transform="translate(11.152 14.922)" fill="#fff"/>
                                                            <ellipse  data-name="Ellipse 11" cx="8.016" cy="8.207" rx="8.016" ry="8.207" transform="translate(27.183 11.191)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <h6>Customer {{ $i }}</h6>
                                        </div>
                                    </td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">2 Items</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border font-bold text-dark">$150.00</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center text-secondary">
                                            <i class="fas fa-user ltr:mr-2 rtl:ml-2"></i>
                                            Staff {{ $i }}
                                        </div>
                                    </td>
                                
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border"><span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-success bg-success-light">Completed</span></td>
                                    <td class="sm:py-[.85rem] px-[1.875rem] py-2 max-sm:pl-[15px] border-b border-border ltr:text-right rtl:text-left">
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
                                            <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 top-full ltr:right-0 rtl:left-0 translate-y-1 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-eye ltr:mr-1 rtl:ml-1 text-success"></i>View</a>
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="fas fa-print ltr:mr-1 rtl:ml-1 text-primary"></i>Print</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Pending -->
                <div x-show=" tab == 'Pending'"
                 x-transition:enter="transition-all duration-700 ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100">	
                    <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-0">Pending Sales</h4>
                            <div class="relative" style="width: 200px; position: relative;">
                                <input type="text" id="search-application-tbl3" class="w-full py-2 px-4 pr-10 rounded-lg bg-transparent transition-colors text-sm focus:outline-none" placeholder="Search pending..." style="border: 1px solid #f5e2dd; padding-right: 2.5rem; box-shadow: none; outline: none;">
                                <i class="fas fa-search absolute text-gray-400" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-gray ItemsCheckboxSec" id="application-tbl3">
                                <thead>
                                <tr>
                                    <th class="pl-3.5 py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input checkAll" type="checkbox" value="" id="checkAllPending">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="checkAllPending">
                                          </label>
                                        </div>  
                                    </th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Sale ID</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Date</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Customer</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Items</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Total</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Staff</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Status</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td class="sm:py-[.85rem] sm:pr-[15px] py-2 pr-[5px] pl-3.5 border-b border-border tbl-bx">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input" type="checkbox" value="" id="customCheckBoxP{{ $i }}">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="customCheckBoxP{{ $i }}">
                                          </label>
                                        </div>
                                    </td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">#SALE-00{{ $i + 5 }}</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">Jan {{ 5 + $i }}th 2021</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2">
                                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="53" height="53" viewBox="0 0 53 53">
                                                    <g  transform="translate(0.243)">
                                                        <rect  width="53" height="53" rx="12" transform="translate(-0.243)" fill="#c5c5c5"/>
                                                        <g  transform="translate(-0.243)">
                                                            <rect  data-name="placeholder" width="53" height="53" rx="12" fill="#2769ee"/>
                                                            <ellipse  data-name="Ellipse 12" cx="13.243" cy="13.43" rx="13.243" ry="13.43" transform="translate(11.152 14.922)" fill="#fff"/>
                                                            <ellipse  data-name="Ellipse 11" cx="8.016" cy="8.207" rx="8.016" ry="8.207" transform="translate(27.183 11.191)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <h6>Customer {{ $i }}</h6>
                                        </div>
                                    </td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">5 Items</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border font-bold text-dark">$300.00</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center text-secondary">
                                            <i class="fas fa-user ltr:mr-2 rtl:ml-2"></i>
                                            Staff {{ $i }}
                                        </div>
                                    </td>
                                
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border"><span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-warning bg-warning-light">Pending</span></td>
                                    <td class="sm:py-[.85rem] px-[1.875rem] py-2 max-sm:pl-[15px] border-b border-border ltr:text-right rtl:text-left">
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
                                            <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 top-full ltr:right-0 rtl:left-0 translate-y-1 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-eye ltr:mr-1 rtl:ml-1 text-success"></i>View</a>
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="fas fa-print ltr:mr-1 rtl:ml-1 text-primary"></i>Print</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Refunded -->
                <div x-show=" tab == 'Refunded'"
                 x-transition:enter="transition-all duration-700 ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100">	
                    <div class="bg-card rounded-lg mb-6">
                        <div class="p-4 flex justify-between items-center border-b border-border">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-0">Refunded Sales</h4>
                            <div class="relative" style="width: 200px; position: relative;">
                                <input type="text" id="search-application-tbl4" class="w-full py-2 px-4 pr-10 rounded-lg bg-transparent transition-colors text-sm focus:outline-none" placeholder="Search refunded..." style="border: 1px solid #f5e2dd; padding-right: 2.5rem; box-shadow: none; outline: none;">
                                <i class="fas fa-search absolute text-gray-400" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%);"></i>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-gray ItemsCheckboxSec" id="application-tbl4">
                                <thead>
                                <tr>
                                    <th class="pl-3.5 py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input checkAll" type="checkbox" value="" id="checkAllRefunded">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="checkAllRefunded">
                                          </label>
                                        </div>  
                                    </th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Sale ID</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Date</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Customer</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Items</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Total</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Staff</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px]">Status</th>
                                    <th class="sm:pl-[15px] pl-[5px] py-4 whitespace-nowrap font-medium text-dark border-border tracking-[0.5px] ltr:text-right rtl:text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td class="sm:py-[.85rem] sm:pr-[15px] py-2 pr-[5px] pl-3.5 border-b border-border tbl-bx">
                                        <div class="form-check ltr:pl-6 rtl:pr-6 ltr:ml-2 rtl:mr-2">
                                          <input class="form-check-input" type="checkbox" value="" id="customCheckBoxR{{ $i }}">
                                          <label class="ltr:ml-[0.313rem] rtl:mr-[0.313rem] mt-[0.113rem]" for="customCheckBoxR{{ $i }}">
                                          </label>
                                        </div>
                                    </td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">#SALE-00{{ $i + 10 }}</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">Feb {{ 12 + $i }}th 2021</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="size-[2.4rem] ltr:mr-2 rtl:ml-2">
                                                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="53" height="53" viewBox="0 0 53 53">
                                                    <g  transform="translate(0.243)">
                                                        <rect  width="53" height="53" rx="12" transform="translate(-0.243)" fill="#c5c5c5"/>
                                                        <g  transform="translate(-0.243)">
                                                            <rect  data-name="placeholder" width="53" height="53" rx="12" fill="#2769ee"/>
                                                            <ellipse  data-name="Ellipse 12" cx="13.243" cy="13.43" rx="13.243" ry="13.43" transform="translate(11.152 14.922)" fill="#fff"/>
                                                            <ellipse  data-name="Ellipse 11" cx="8.016" cy="8.207" rx="8.016" ry="8.207" transform="translate(27.183 11.191)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <h6>Customer {{ $i }}</h6>
                                        </div>
                                    </td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border">1 Item</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border font-bold text-dark">$50.00</td>
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border whitespace-nowrap">
                                        <div class="flex items-center text-secondary">
                                            <i class="fas fa-user ltr:mr-2 rtl:ml-2"></i>
                                            Staff {{ $i }}
                                        </div>
                                    </td>
                                
                                    <td class="sm:py-[.85rem] sm:px-[15px] py-2 px-[5px] border-b border-border"><span class="py-[0.1875rem] px-[0.8125rem] text-[11px] font-semibold border border-transparent rounded-2xl text-danger bg-danger-light">Refunded</span></td>
                                    <td class="sm:py-[.85rem] px-[1.875rem] py-2 max-sm:pl-[15px] border-b border-border ltr:text-right rtl:text-left">
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
                                            <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 top-full ltr:right-0 rtl:left-0 translate-y-1 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="far fa-eye ltr:mr-1 rtl:ml-1 text-success"></i>View</a>
                                                <a class="dropdown-item block text-left w-full py-2 px-6 text-dark duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);"><i class="fas fa-print ltr:mr-1 rtl:ml-1 text-primary"></i>Print</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
    </div>

            </div>
        </div>	
    </div>
</div>
@endsection

@push('scripts')
    <!-- Datatable -->
	<script src="{{ asset('template/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script>
        (function($) {
            "use strict"
            // Initialize DataTables with search enabled
            ['#application-tbl1', '#application-tbl2', '#application-tbl3', '#application-tbl4'].forEach(function(selector) {
                var table = $(selector).DataTable({
                    searching: true,
                    lengthChange: false,
                    dom: 'rtip', // Show only table, info, and pagination
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
                $('#search-' + selector.substring(1)).on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        })(jQuery);
    </script>
@endpush
