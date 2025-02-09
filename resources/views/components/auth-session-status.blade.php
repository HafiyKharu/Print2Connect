@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-info font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif
