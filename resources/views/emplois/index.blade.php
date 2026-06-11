<x-layout title="Offres d'emploi">

    {{-- Hero --}}
    <div class="bg-gradient-to-r from-bleu-clair via-bleu-moyen to-bleu-vif rounded-2xl px-8 py-12 mb-10 text-center">
        <p class="text-bleu-doux text-sm font-medium mb-2 uppercase tracking-widest">
            {{ $offres->count() }} offre{{ $offres->count() > 1 ? 's' : '' }} disponible{{ $offres->count() > 1 ? 's' : '' }}
        </p>
        <h1 class="text-4xl font-bold text-bleu-texte mb-3">
            Trouvez votre prochain défi
        </h1>
        <p class="text-bleu-doux text-lg">
            Parcourez nos offres d'emploi internes et postulez en quelques minutes
        </p>
    </div>

    {{-- Grille des offres --}}
    @if($offres->isEmpty())
        <x-panel class="text-center py-16">
            <p class="text-4xl mb-4">📭</p>
            <p class="text-bleu-texte font-semibold text-lg">Aucune offre disponible</p>
            <p class="text-bleu-doux text-sm mt-1">Revenez bientôt, de nouvelles offres arrivent régulièrement.</p>
        </x-panel>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($offres as $offre)
                <x-job-card :offre="$offre" />
            @endforeach
        </div>
    @endif

</x-layout>
