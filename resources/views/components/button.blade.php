@props(['variant' => 'primary', 'type' => 'button'])

@php
$classes = match($variant) {
    'primary' => 'bg-bleu-vif text-bleu-texte hover:bg-bleu-moyen',
    'outline' => 'border border-bleu-moyen text-bleu-doux hover:bg-bleu-clair',
    'danger'  => 'bg-red-100 text-red-700 hover:bg-red-200',
    default   => 'bg-bleu-vif text-bleu-texte hover:bg-bleu-moyen',
};
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => "inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium transition cursor-pointer $classes"]) }}>
    {{ $slot }}
</button>
