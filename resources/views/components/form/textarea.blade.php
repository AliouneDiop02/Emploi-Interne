@props(['name', 'rows' => 4])

<textarea
    name="{{ $name }}"
    id="{{ $name }}"
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'w-full rounded-xl border border-bleu-moyen bg-white px-4 py-2.5 text-sm text-bleu-texte placeholder-bleu-doux focus:outline-none focus:ring-2 focus:ring-bleu-vif focus:border-bleu-vif transition resize-none']) }}
>{{ $slot }}</textarea>
