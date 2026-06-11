@props(['name', 'label'])

<div class="flex flex-col gap-1">
    <label for="{{ $name }}"
           class="text-sm font-medium text-bleu-texte">
        {{ $label }}
    </label>

    {{ $slot }}

    @error($name)
        <p class="text-xs text-red-600 mt-0.5">{{ $message }}</p>
    @enderror
</div>
