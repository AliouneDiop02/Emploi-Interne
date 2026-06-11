@props(['title', 'description' => null])

<div class="mb-8">
    <h1 class="text-3xl font-bold text-bleu-texte tracking-tight">
        {{ $title }}
    </h1>
    @if($description)
        <p class="mt-2 text-bleu-doux text-base">
            {{ $description }}
        </p>
    @endif
</div>
