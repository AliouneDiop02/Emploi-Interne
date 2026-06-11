<x-layout title="Offres d'emploi">
    <x-page-header
        eyebrow="Carrières"
        title="Offres d'emploi disponibles"
        description="Consultez les offres actives et postulez directement en ligne." />

    <div class="grid gap-4 md:grid-cols-2">
        @forelse ($offres as $offre)
            <x-job-card :offre="$offre" />
        @empty
            <x-panel>Aucune offre active pour le moment.</x-panel>
        @endforelse
    </div>
</x-layout>
