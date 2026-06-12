<x-layout :title="'Candidatures — ' . $offreEmploi->titre">

    <div class="mb-6">
        <a href="{{ route('admin.offres.index') }}"
           class="inline-flex items-center gap-2 text-sm text-bleu-doux hover:text-bleu-texte transition">
            ← Retour aux offres
        </a>
    </div>

    <x-page-header
        :title="'Candidatures : ' . $offreEmploi->titre"
        :description="$offreEmploi->entreprise . ' · ' . $offreEmploi->ville"
    />

    @if($candidatures->isEmpty())
        <x-panel class="text-center py-16">
            <p class="text-4xl mb-4">📭</p>
            <p class="text-bleu-texte font-semibold text-lg">Aucune candidature reçue</p>
            <p class="text-bleu-doux text-sm mt-1">Les candidatures apparaîtront ici dès qu'elles seront soumises.</p>
        </x-panel>
    @else
        <x-panel>
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-bleu-clair text-left">
                        <th class="pb-3 text-bleu-texte font-semibold">Candidat</th>
                        <th class="pb-3 text-bleu-texte font-semibold">Contact</th>
                        <th class="pb-3 text-bleu-texte font-semibold">Message</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-center">Statut</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-center">CV</th>
                        <th class="pb-3 text-bleu-texte font-semibold text-right">Reçu le</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-bleu-clair">
                    @foreach($candidatures as $candidature)
                        <tr class="hover:bg-bleu-pale transition">

                            {{-- Nom --}}
                            <td class="py-4 pr-4">
                                <span class="font-medium text-bleu-texte">
                                    {{ $candidature->prenom }} {{ $candidature->nom }}
                                </span>
                            </td>

                            {{-- Contact --}}
                            <td class="py-4 pr-4">
                                <a href="mailto:{{ $candidature->courriel }}"
                                   class="text-bleu-doux hover:text-bleu-texte transition block">
                                    {{ $candidature->courriel }}
                                </a>
                                @if($candidature->telephone)
                                    <span class="text-xs text-bleu-doux">
                                        {{ $candidature->telephone }}
                                    </span>
                                @endif
                            </td>

                            {{-- Message --}}
                            <td class="py-4 pr-4 max-w-xs">
                                @if($candidature->message)
                                    <p class="text-bleu-doux text-xs line-clamp-2">
                                        {{ $candidature->message }}
                                    </p>
                                @else
                                    <span class="text-xs text-gray-400 italic">Aucun message</span>
                                @endif
                            </td>

                            {{-- Statut --}}
                            <td class="py-4 pr-4 text-center">
                                <x-badge variant="type">{{ $candidature->statut }}</x-badge>
                            </td>

                            {{-- CV --}}
                            <td class="py-4 pr-4 text-center">
                                <a href="{{ route('admin.candidatures.cv', $candidature) }}"
                                   class="inline-flex items-center gap-1 text-xs font-medium text-bleu-doux hover:text-bleu-texte bg-bleu-clair hover:bg-bleu-moyen px-3 py-1.5 rounded-lg transition">
                                    📄 {{ $candidature->cv_nom_original }}
                                </a>
                            </td>

                            {{-- Date --}}
                            <td class="py-4 text-right text-xs text-bleu-doux">
                                {{ $candidature->created_at->format('d/m/Y') }}
                                <span class="block">{{ $candidature->created_at->format('H:i') }}</span>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-panel>
    @endif

</x-layout>
