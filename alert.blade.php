@php
    $styles = [
        'success' => 'border-green-500/30 bg-green-500/10 text-green-400',
        'error'   => 'border-red-500/30 bg-red-500/10 text-red-400',
        'warning' => 'border-yellow-500/30 bg-yellow-500/10 text-yellow-400',
    ];
    $icons = [
        'success' => '✓',
        'error'   => '✕',
        'warning' => '⚠',
    ];
    $style = $styles[$type] ?? $styles['success'];
    $icon  = $icons[$type]  ?? $icons['success'];
@endphp

<div class="flex items-center gap-3 border rounded-lg px-4 py-3 mb-4 text-sm {{ $style }}">
    <span class="font-bold">{{ $icon }}</span>
    <span>{{ $message }}</span>
</div>
