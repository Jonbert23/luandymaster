@props(['title', 'value', 'subtitle' => '', 'badge' => '', 'badgeType' => 'info'])

@php
    $badgeClasses = [
        'success' => 'bg-green-50 text-green-700',
        'info' => 'bg-blue-50 text-blue-700',
        'warning' => 'bg-yellow-50 text-yellow-700',
        'danger' => 'bg-red-50 text-red-700',
    ];
    $badgeClass = $badgeClasses[$badgeType] ?? $badgeClasses['info'];
@endphp

<div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between h-32 hover:border-gray-300 transition-colors stat-card">
    <div class="flex justify-between items-start">
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">{{ $title }}</p>
        @if($badge)
            <span class="{{ $badgeClass }} text-[10px] font-bold px-1.5 py-0.5 rounded-full flex items-center gap-1">
                {{ $badge }}
                {{ $slot }}
            </span>
        @endif
    </div>
    <div>
        <h3 class="text-2xl font-bold text-gray-900 tracking-tight">{{ $value }}</h3>
        @if($subtitle)
            <p class="text-xs text-gray-400 mt-1">{{ $subtitle }}</p>
        @endif
    </div>
</div>

