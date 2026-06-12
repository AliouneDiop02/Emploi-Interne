<x-layout title="Nouvelle offre">

    <div class="mb-6">
        <a href="{{ route('admin.offres.index') }}"
           class="inline-flex items-center gap-2 text-sm text-bleu-doux hover:text-bleu-texte transition">
            ← Retour à la liste
        </a>
    </div>

    <x-panel>
        <x-page-header
            title="Créer une nouvelle offre"
            description="Remplissez les informations pour publier une offre d'emploi."
        />

        <form method="POST" action="{{ route('admin.offres.store') }}">
            @csrf
            @include('admin.offres._form')

            <div class="flex items-center justify-between pt-4 border-t border-bleu-clair">
                <a href="{{ route('admin.offres.index') }}">
                    <x-button variant="outline" type="button">Annuler</x-button>
                </a>
                <x-button variant="primary" type="submit">Créer l'offre</x-button>
            </div>
        </form>
    </x-panel>

</x-layout>
