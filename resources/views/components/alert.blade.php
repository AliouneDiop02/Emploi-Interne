@props(['type' => 'success'])

@php
$classes = match($type) {
    'success' => 'bg-bleu-clair border-bleu-moyen text-bleu-texte',
    'error'   => 'bg-red-50 border-red-300 text-red-800',
    default   => 'bg-bleu-clair border-bleu-moyen text-bleu-texte',
};

$icone = match($type) {
    'success' => '✓',
    'error'   => '✕',
    default   => 'ℹ',
};
@endphp

<div {{ $attributes->merge(['class' => "flex items-center gap-3 border rounded-xl px-4 py-3 text-sm font-medium $classes"]) }}>
    <span class="text-base">{{ $icone }}</span>
    <span>{{ $slot }}</span>
</div>
