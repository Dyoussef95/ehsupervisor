@props(['value'])

<label {{ $attributes->merge(['for' => '']) }}>
    {{ $value ?? $slot }}
</label>
