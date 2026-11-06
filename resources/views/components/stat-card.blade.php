@props(['label', 'value', 'color' => 'text-primary'])
<div class="card shadow-sm h-100">
    <div class="card-body">
        <div class="small text-muted text-uppercase">{{ $label }}</div>
        <div class="h2 font-weight-bold {{ $color }} mt-2 mb-0">{{ $value }}</div>
    </div>
</div>