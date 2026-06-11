<x-layout :title="$offreEmploi->titre">

    {{-- Bouton retour --}}
    <div class="mb-6">
        <a href="{{ route('emplois.index') }}"
           class="inline-flex items-center gap-2 text-sm text-bleu-doux hover:text-bleu-texte transition">
            ← Retour aux offres
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Colonne principale --}}
        <div class="lg:col-span-2 flex flex-col gap-6">

            {{-- En-tête de l'offre --}}
            <x-panel>
                <div class="flex items-start justify-between mb-4">
                    <x-badge variant="type">{{ $offreEmploi->type_emploi }}</x-badge>
                    @if($offreEmploi->date_publication)
                        <span class="text-xs text-bleu-doux">
                            Publié le {{ $offreEmploi->date_publication->format('d/m/Y') }}
                        </span>
                    @endif
                </div>

                <h1 class="text-3xl font-bold text-bleu-texte mb-2">
                    {{ $offreEmploi->titre }}
                </h1>
                <p class="text-bleu-doux text-lg mb-4">{{ $offreEmploi->entreprise }}</p>

                <div class="flex flex-wrap gap-4 text-sm text-bleu-doux">
                    @if($offreEmploi->ville)
                        <span class="flex items-center gap-1">
                            📍 {{ $offreEmploi->ville }}
                        </span>
                    @endif
                    @if($offreEmploi->salaire)
                        <span class="flex items-center gap-1">
                            💰 {{ $offreEmploi->salaire }}
                        </span>
                    @endif
                </div>
            </x-panel>

            {{-- Description --}}
            @if($offreEmploi->description)
                <x-panel>
                    <h2 class="text-lg font-semibold text-bleu-texte mb-3">
                        À propos du poste
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $offreEmploi->description }}
                    </p>
                </x-panel>
            @endif

            {{-- Responsabilités --}}
            @if($offreEmploi->responsabilites)
                <x-panel>
                    <h2 class="text-lg font-semibold text-bleu-texte mb-3">
                        Responsabilités
                    </h2>
                    <ul class="flex flex-col gap-2">
                        @foreach(explode("\n", $offreEmploi->responsabilites) as $ligne)
                            @if(trim($ligne))
                                <li class="flex items-start gap-2 text-gray-700 text-sm">
                                    <span class="text-bleu-vif mt-0.5">✦</span>
                                    {{ trim($ligne) }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </x-panel>
            @endif

            {{-- Exigences --}}
            @if($offreEmploi->exigences)
                <x-panel>
                    <h2 class="text-lg font-semibold text-bleu-texte mb-3">
                        Exigences
                    </h2>
                    <ul class="flex flex-col gap-2">
                        @foreach(explode("\n", $offreEmploi->exigences) as $ligne)
                            @if(trim($ligne))
                                <li class="flex items-start gap-2 text-gray-700 text-sm">
                                    <span class="text-bleu-vif mt-0.5">✦</span>
                                    {{ trim($ligne) }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </x-panel>
            @endif

        </div>

        {{-- Colonne latérale --}}
        <div class="flex flex-col gap-4">

            {{-- Carte postuler --}}
            <x-panel class="text-center">
                <p class="text-bleu-texte font-semibold text-lg mb-1">
                    Intéressé par ce poste ?
                </p>
                <p class="text-bleu-doux text-sm mb-4">
                    Envoyez votre candidature maintenant
                </p>
                <a href="{{ route('candidatures.create', $offreEmploi) }}" class="block">
                    <x-button variant="primary" class="w-full justify-center">
                        Postuler maintenant
                    </x-button>
                </a>
            </x-panel>

            {{-- Résumé de l'offre --}}
            <x-panel>
                <h3 class="text-sm font-semibold text-bleu-texte mb-3 uppercase tracking-wide">
                    Résumé
                </h3>
                <ul class="flex flex-col gap-3 text-sm">
                    <li class="flex justify-between">
                        <span class="text-bleu-doux">Entreprise</span>
                        <span class="text-bleu-texte font-medium">{{ $offreEmploi->entreprise }}</span>
                    </li>
                    @if($offreEmploi->ville)
                        <li class="flex justify-between">
                            <span class="text-bleu-doux">Lieu</span>
                            <span class="text-bleu-texte font-medium">{{ $offreEmploi->ville }}</span>
                        </li>
                    @endif
                    <li class="flex justify-between">
                        <span class="text-bleu-doux">Type</span>
                        <span class="text-bleu-texte font-medium">{{ $offreEmploi->type_emploi }}</span>
                    </li>
                    @if($offreEmploi->salaire)
                        <li class="flex justify-between">
                            <span class="text-bleu-doux">Salaire</span>
                            <span class="text-bleu-texte font-medium">{{ $offreEmploi->salaire }}</span>
                        </li>
                    @endif
                </ul>
            </x-panel>

        </div>
    </div>

</x-layout>
