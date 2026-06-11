@props(['name', 'type' => 'text', 'value' => null])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ $value ?? old($name) }}"
    {{ $attributes->merge(['class' => 'w-full rounded-xl border border-bleu-moyen bg-white px-4 py-2.5 text-sm
     text-bleu-texte placeholder-bleu-doux focus:outline-none focus:ring-2 focus:ring-bleu-vif focus:border-bleu-vif transition']) }}
>
