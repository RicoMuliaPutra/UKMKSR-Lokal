@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black dark:text-dark']) }}>
    {{ $value ?? $slot }}
</label>
