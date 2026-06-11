@props(['href' => '#', 'active' => false])

<a href="{{ $href }}"
   @class([
       'text-sm px-3 py-1.5 rounded-lg transition font-medium',
       'bg-bleu-moyen text-bleu-texte'         => $active,
       'text-bleu-doux hover:bg-bleu-moyen hover:text-bleu-texte' => ! $active,
   ])>
    {{ $slot }}
</a>
