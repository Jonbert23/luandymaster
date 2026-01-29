@extends('master.layout')

@section('title', 'Orders Management')
@section('header_title', 'Orders')

@section('content')
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="mt-4 flex justify-between items-center flex-wrap mb-3 px-6">
        <div class="mb-6">
            <h4 class="mb-2">Showing all Orders</h4>
            <p>Track and manage your laundry orders with ease</p>
        </div>
        
    </div>
</div>

<div class="container-fluid !p-0 h-[calc(100vh-180px)] flex flex-col">
    
    <!-- Kanban Board Scroll Container -->
    <div class="flex-1 overflow-x-auto overflow-y-hidden px-6 pb-4">
        <div class="flex h-full min-w-full" style="gap: 30px;">
            
            <!-- PENDING Column -->
            <div class="flex-1 min-w-[300px] flex flex-col rounded-xl h-full shadow-md" style="background-color: #feebe6;">
                <!-- Header -->
                <div class="p-3 flex justify-between items-center flex-shrink-0 border-b dark:border-white/10" style="border-bottom-color: rgba(0,0,0,0.1);">
                    <h4 class="text-sm font-bold text-gray-700 dark:text-gray-200 mb-0 uppercase tracking-wide">
                        Pending <span class="bg-primary/10 text-primary rounded-full px-2 py-0.5 text-xs ml-1 align-middle">8</span>
                    </h4>
                    <a href="javascript:void(0);" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 p-1"><i class="fas fa-ellipsis-h"></i></a>
                </div>
                <!-- Content -->
                <div class="p-3 overflow-y-auto flex-1 custom-scrollbar flex flex-col gap-5">
                    <!-- Order Card 1 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-primary cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">2 hours ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-primary transition-colors">#ORD-4920</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">John Doe</h6>
                        <p class="text-xs text-gray-500 mb-2">4 Items • Wash & Fold</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-primary font-bold text-sm">$24.00</span>
                        </div>
                    </div>
                    <!-- Order Card 2 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-danger cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">30 mins ago</span>
                            <span class="badge badge-xs light badge-danger">RUSH</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Hotel Metro</h6>
                        <p class="text-xs text-gray-500 mb-2">20kg Bulk Linen</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-danger font-bold text-sm">$140.00</span>
                        </div>
                    </div>
                    <!-- Order Card 3 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-primary cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">45 mins ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-primary transition-colors">#ORD-4921</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Emily Clark</h6>
                        <p class="text-xs text-gray-500 mb-2">3 Items • Dry Clean</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-primary font-bold text-sm">$45.00</span>
                        </div>
                    </div>
                    <!-- Order Card 4 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-primary cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">1 hour ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-primary transition-colors">#ORD-4922</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Mark Wilson</h6>
                        <p class="text-xs text-gray-500 mb-2">10kg • Wash & Fold</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-primary font-bold text-sm">$30.00</span>
                        </div>
                    </div>
                    <!-- Order Card 5 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-primary cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">1.5 hours ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-primary transition-colors">#ORD-4923</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Sarah Jenkins</h6>
                        <p class="text-xs text-gray-500 mb-2">2 Items • Pressing</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-primary font-bold text-sm">$15.00</span>
                        </div>
                    </div>
                    <!-- Order Card 6 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-danger cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">2 hours ago</span>
                            <span class="badge badge-xs light badge-danger">RUSH</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">City Gym</h6>
                        <p class="text-xs text-gray-500 mb-2">50 Towels • Wash & Fold</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-danger font-bold text-sm">$85.00</span>
                        </div>
                    </div>
                    <!-- Order Card 7 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-primary cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">3 hours ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-primary transition-colors">#ORD-4924</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Robert Brown</h6>
                        <p class="text-xs text-gray-500 mb-2">1 Suit • Dry Clean</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-primary font-bold text-sm">$20.00</span>
                                </div>
                            </div>
                    <!-- Order Card 8 -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-primary cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-500 font-medium">4 hours ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-primary transition-colors">#ORD-4925</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Lisa Wang</h6>
                        <p class="text-xs text-gray-500 mb-2">5 Items • Wash & Iron</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-primary font-bold text-sm">$55.00</span>
                        </div>
                            </div>
                        </div>
                    </div>

            <!-- WASHING Column -->
            <div class="flex-1 min-w-[300px] flex flex-col rounded-xl h-full shadow-md" style="background-color: #e0e8f0;">
                <div class="p-3 flex justify-between items-center flex-shrink-0 border-b dark:border-white/10" style="border-bottom-color: rgba(0,0,0,0.1);">
                    <h4 class="text-sm font-bold text-gray-700 dark:text-gray-200 mb-0 uppercase tracking-wide">
                        Washing <span class="bg-info/10 text-info rounded-full px-2 py-0.5 text-xs ml-1 align-middle">8</span>
                    </h4>
                    <a href="javascript:void(0);" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 p-1"><i class="fas fa-ellipsis-h"></i></a>
                </div>
                <div class="p-3 overflow-y-auto flex-1 custom-scrollbar flex flex-col gap-5">
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 20m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4918</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Sarah Connor</h6>
                        <p class="text-xs text-gray-500 mb-2">Delicates • Machine 4</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$35.00</span>
                        </div>
                    </div>
                    <!-- Added Cards -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 35m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4926</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">James Bond</h6>
                        <p class="text-xs text-gray-500 mb-2">Tuxedo • Machine 1</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$25.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 45m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4927</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Bruce Wayne</h6>
                        <p class="text-xs text-gray-500 mb-2">Cape • Machine 2</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$100.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 15m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4928</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Peter Parker</h6>
                        <p class="text-xs text-gray-500 mb-2">Spandex • Machine 3</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$15.00</span>
                        </div>
                        </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 55m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4929</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Clark Kent</h6>
                        <p class="text-xs text-gray-500 mb-2">Cape & Suit • Machine 5</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$40.00</span>
                            </div>
                        </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 10m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4930</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Tony Stark</h6>
                        <p class="text-xs text-gray-500 mb-2">Lab Coat • Machine 6</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$20.00</span>
                    </div>
                </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 25m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4931</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Steve Rogers</h6>
                        <p class="text-xs text-gray-500 mb-2">Uniform • Machine 7</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$30.00</span>
            </div>
                </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-info cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-info font-medium flex items-center gap-1"><i class="far fa-clock"></i> 40m left</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-info transition-colors">#ORD-4932</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Natasha Romanoff</h6>
                        <p class="text-xs text-gray-500 mb-2">Tactical Gear • Machine 8</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-info font-bold text-sm">$60.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DRYING Column -->
            <div class="flex-1 min-w-[300px] flex flex-col rounded-xl h-full shadow-md" style="background-color: #fff5e6;">
                <div class="p-3 flex justify-between items-center flex-shrink-0 border-b dark:border-white/10" style="border-bottom-color: rgba(0,0,0,0.1);">
                    <h4 class="text-sm font-bold text-gray-700 dark:text-gray-200 mb-0 uppercase tracking-wide">
                        Drying <span class="bg-warning/10 text-warning rounded-full px-2 py-0.5 text-xs ml-1 align-middle">8</span>
                    </h4>
                    <a href="javascript:void(0);" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 p-1"><i class="fas fa-ellipsis-h"></i></a>
                </div>
                <div class="p-3 overflow-y-auto flex-1 custom-scrollbar flex flex-col gap-5">
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4915</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Mike Ross</h6>
                        <p class="text-xs text-gray-500 mb-2">Standard • Dryer 2</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$28.00</span>
                        </div>
                    </div>
                    <!-- Added Cards -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4933</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Harvey Specter</h6>
                        <p class="text-xs text-gray-500 mb-2">Suits • Dryer 1</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$120.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4934</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Louis Litt</h6>
                        <p class="text-xs text-gray-500 mb-2">Mud Bath Robes • Dryer 3</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$50.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4935</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Rachel Zane</h6>
                        <p class="text-xs text-gray-500 mb-2">Blouses • Dryer 4</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$45.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4936</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Donna Paulsen</h6>
                        <p class="text-xs text-gray-500 mb-2">Dresses • Dryer 5</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$80.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4937</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Jessica Pearson</h6>
                        <p class="text-xs text-gray-500 mb-2">Power Suits • Dryer 6</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$150.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4938</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Alex Williams</h6>
                        <p class="text-xs text-gray-500 mb-2">Shirts • Dryer 7</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$35.00</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-warning cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-warning font-medium">Processing</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-warning transition-colors">#ORD-4939</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Samantha Wheeler</h6>
                        <p class="text-xs text-gray-500 mb-2">Gym Gear • Dryer 8</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-warning font-bold text-sm">$25.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- READY Column -->
            <div class="flex-1 min-w-[300px] flex flex-col rounded-xl h-full shadow-md" style="background-color: #e6fffa;">
                <div class="p-3 flex justify-between items-center flex-shrink-0 border-b dark:border-white/10" style="border-bottom-color: rgba(0,0,0,0.1);">
                    <h4 class="text-sm font-bold text-gray-700 dark:text-gray-200 mb-0 uppercase tracking-wide">
                        Ready <span class="bg-success/10 text-success rounded-full px-2 py-0.5 text-xs ml-1 align-middle">8</span>
                    </h4>
                    <a href="javascript:void(0);" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 p-1"><i class="fas fa-ellipsis-h"></i></a>
                </div>
                <div class="p-3 overflow-y-auto flex-1 custom-scrollbar flex flex-col gap-5">
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">Just now</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4901</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Alice Wonderland</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack A-12</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$52.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                    <!-- Added Cards -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">5 mins ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4940</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Mad Hatter</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack B-01</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$15.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">15 mins ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4941</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Queen Hearts</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack K-10</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$200.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">30 mins ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4942</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">White Rabbit</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack C-05</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$25.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">45 mins ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4943</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Cheshire Cat</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack D-02</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$10.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">1 hour ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4944</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Dormouse</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack E-09</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$30.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">1.5 hours ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4945</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">March Hare</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack F-11</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$12.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-success cursor-pointer hover:shadow-md transition-shadow group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-success font-medium">2 hours ago</span>
                            <span class="text-xs font-mono text-gray-400 group-hover:text-success transition-colors">#ORD-4946</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-800 dark:text-white">Caterpillar</h6>
                        <p class="text-xs text-gray-500 mb-2">Rack G-04</p>
                        <div class="flex justify-between items-center pt-2 border-t dark:border-gray-700" style="border-top-color: rgba(0,0,0,0.1);">
                            <span class="text-success font-bold text-sm">$40.00</span>
                            <button class="px-2 py-1 text-xs font-medium text-success border border-success/30 rounded hover:bg-success hover:text-white transition-colors">Notify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COMPLETED Column -->
            <div class="flex-1 min-w-[300px] flex flex-col rounded-xl h-full shadow-md" style="background-color: #e9d5ff;">
                <div class="p-3 flex justify-between items-center flex-shrink-0 border-b dark:border-white/10" style="border-bottom-color: rgba(0,0,0,0.1);">
                    <h4 class="text-sm font-bold text-gray-700 dark:text-gray-200 mb-0 uppercase tracking-wide">
                        Completed
                    </h4>
                    <a href="javascript:void(0);" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 p-1"><i class="fas fa-ellipsis-h"></i></a>
                </div>
                <div class="p-3 overflow-y-auto flex-1 custom-scrollbar flex flex-col gap-5">
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">Yesterday</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4890</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Tom Holland</h6>
                        <p class="text-xs text-gray-400 mb-2">Completed</p>
                    </div>
                    <!-- Added Cards -->
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">Yesterday</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4889</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Chris Evans</h6>
                        <p class="text-xs text-gray-400 mb-2">Shield Polish</p>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">Yesterday</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4888</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Chris Hemsworth</h6>
                        <p class="text-xs text-gray-400 mb-2">Cape Wash</p>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">2 days ago</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4887</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Scarlett Johansson</h6>
                        <p class="text-xs text-gray-400 mb-2">Suit Clean</p>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">2 days ago</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4886</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Mark Ruffalo</h6>
                        <p class="text-xs text-gray-400 mb-2">Shorts Repair</p>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">3 days ago</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4885</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Jeremy Renner</h6>
                        <p class="text-xs text-gray-400 mb-2">Vest Wash</p>
                    </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">3 days ago</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4884</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Paul Rudd</h6>
                        <p class="text-xs text-gray-400 mb-2">Tiny Suit Clean</p>
                </div>
                    <div style="margin-bottom: 10px;" class="bg-white dark:bg-[#2c2c2c] rounded-lg shadow-sm p-3 border-l-4 border-gray-400 opacity-75 cursor-pointer hover:opacity-100 hover:shadow-md transition-all group">
                        <div class="flex justify-between mb-2">
                            <span class="text-xs text-gray-400">4 days ago</span>
                            <span class="text-xs font-mono text-gray-400">#ORD-4883</span>
                        </div>
                        <h6 class="text-sm font-semibold mb-1 text-gray-500 dark:text-gray-400 line-through">Benedict Cumberbatch</h6>
                        <p class="text-xs text-gray-400 mb-2">Cloak Steam</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
