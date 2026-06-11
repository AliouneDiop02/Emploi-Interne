@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'bg-white border border-bleu-moyen rounded-2xl shadow-sm p-6 ' . $class]) }}>
    {{ $slot }}
</div>
