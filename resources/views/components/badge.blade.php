@props(['variant' => 'default'])

@php
$classes = match($variant) {
    'active'   => 'bg-bleu-vif text-bleu-texte',
    'inactive' => 'bg-gray-100 text-gray-500',
    'type'     => 'bg-bleu-clair text-bleu-doux',
    default    => 'bg-bleu-clair text-bleu-doux',
};
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium $classes"]) }}>
    {{ $slot }}
</span>
