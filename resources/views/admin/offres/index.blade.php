<x-layout title="Administration — Offres d'emploi">

    <div class="flex items-center justify-between mb-8">
        <x-page-header
            title="Gestion des offres"
            description="Créez, modifiez et gérez toutes les offres d'emploi."
        />
        <a href="{{ route('admin.offres.create') }}">
            <x-button variant="primary">+ Nouvelle offre</x-button>
        </a>
    </div>

    @if($offres->isEmpty())
        <x-panel class="text-center py-16">
            <p class="text-4xl mb-4">📋</p>
            <p class="text-bleu-texte font-semibold text-lg">Aucune offre créée</p>
            <p class="text-bleu-doux text-sm mt-1">Commencez par créer votre première offre.</p>
        </x-panel>
    @else
        <x-panel>
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-bleu-clair text-left">
                        <th class="pb-3 text-bleu-texte font-semibold">Titre</th>
                        <th class="pb-3 text-bleu-texte font-semibold">Entreprise</th>
                        <th class="pb-3 text-bleu-texte font-semibold">Type</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-center">Statut</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-center">Candidatures</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-bleu-clair">
                    @foreach($offres as $offre)
                        <tr class="hover:bg-bleu-pale transition">
                            <td class="py-4 pr-4">
                                <span class="font-medium text-bleu-texte">{{ $offre->titre }}</span>
                                @if($offre->ville)
                                    <span class="block text-xs text-bleu-doux mt-0.5">📍 {{ $offre->ville }}</span>
                                @endif
                            </td>
                            <td class="py-4 pr-4 text-bleu-doux">
                                {{ $offre->entreprise }}
                            </td>
                            <td class="py-4 pr-4">
                                <x-badge variant="type">{{ $offre->type_emploi }}</x-badge>
                            </td>
                            <td class="py-4 pr-4 text-center">
                                <x-badge :variant="$offre->est_active ? 'active' : 'inactive'">
                                    {{ $offre->est_active ? 'Active' : 'Inactive' }}
                                </x-badge>
                            </td>
                            <td class="py-4 pr-4 text-center">
                                @if($offre->candidatures_count > 0)
                                    <a href="{{ route('admin.offres.candidatures.index', $offre) }}"
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-bleu-vif text-bleu-texte font-bold text-xs hover:bg-bleu-moyen transition">
                                        {{ $offre->candidatures_count }}
                                    </a>
                                @else
                                    <span class="text-bleu-doux">0</span>
                                @endif
                            </td>
                            <td class="py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.offres.edit', $offre) }}">
                                        <x-button variant="outline">Modifier</x-button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.offres.destroy', $offre) }}"
                                          onsubmit="return confirm('Supprimer cette offre et toutes ses candidatures ?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-button variant="danger"  type="submit">Supprimer</x-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination admin --}}
            @if($offres->hasPages())
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-bleu-clair">

                    <div class="flex items-center gap-2 text-sm text-bleu-doux">
                        <span>Afficher</span>
                        <select
                            onchange="window.location='?par_page='+this.value"
                            class="rounded-lg border border-bleu-moyen bg-white px-3 py-1.5 text-sm text-bleu-texte focus:outline-none focus:ring-2 focus:ring-bleu-vif">
                            @foreach([10, 25, 50] as $option)
                                <option value="{{ $option }}" {{ $parPage == $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                        <span>par page — {{ $offres->total() }} offres au total</span>
                    </div>

                    <div>
                        {{ $offres->links() }}
                    </div>

                </div>
            @endif
        </x-panel>
    @endif

</x-layout>
