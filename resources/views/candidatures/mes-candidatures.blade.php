<x-layout title="Mes candidatures">

    <x-page-header
        title="Mes candidatures"
        description="Suivez l'état de toutes vos candidatures."
    />

    @if($candidatures->isEmpty())
        <x-panel class="text-center py-16">
            <p class="text-4xl mb-4">📭</p>
            <p class="text-bleu-texte font-semibold text-lg">Aucune candidature</p>
            <p class="text-bleu-doux text-sm mt-1 mb-6">
                Vous n'avez pas encore postulé à une offre.
            </p>
            <a href="{{ route('emplois.index') }}">
                <x-button variant="primary">Voir les offres disponibles</x-button>
            </a>
        </x-panel>
    @else
        <x-panel>
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-bleu-clair text-left">
                        <th class="pb-3 text-bleu-texte font-semibold">Offre</th>
                        <th class="pb-3 text-bleu-texte font-semibold">Entreprise</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-center">Statut</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-right">Soumise le</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-bleu-clair">
                    @foreach($candidatures as $candidature)
                        <tr class="hover:bg-bleu-pale transition">
                            <td class="py-4 pr-4">
                                <a href="{{ route('emplois.show', $candidature->offreEmploi) }}"
                                   class="font-medium text-bleu-texte hover:text-bleu-doux transition">
                                    {{ $candidature->offreEmploi->titre }}
                                </a>
                            </td>
                            <td class="py-4 pr-4 text-bleu-doux">
                                {{ $candidature->offreEmploi->entreprise }}
                            </td>
                            <td class="py-4 pr-4 text-center">
                                <x-badge :variant="match($candidature->statut) {
                                    'nouvelle'  => 'type',
                                    'vue'       => 'active',
                                    'retenue'   => 'active',
                                    'refusée'   => 'inactive',
                                    default     => 'type'
                                }">
                                    {{ ucfirst($candidature->statut) }}
                                </x-badge>
                            </td>
                            <td class="py-4 pr-4 text-right text-bleu-doux text-xs">
                                {{ $candidature->created_at->format('d/m/Y') }}
                            </td>
                            <td class="py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('mes-candidatures.show', $candidature->id) }}">
                                        <x-button variant="outline">Détails</x-button>
                                    </a>
                                    <a href="{{ route('mes-candidatures.edit', $candidature->id) }}">
                                        <x-button variant="outline">Modifier</x-button>
                                    </a>
                                    <form method="POST"
                                          action="{{ route('mes-candidatures.destroy', $candidature->id) }}"
                                          onsubmit="return confirm('Retirer cette candidature ?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-button variant="danger" type="submit">Retirer</x-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            @if($candidatures->hasPages())
                <div class="mt-4 pt-4 border-t border-bleu-clair">
                    {{ $candidatures->links() }}
                </div>
            @endif
        </x-panel>
    @endif

</x-layout>
