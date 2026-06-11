<x-layout :title="'Postuler — ' . $offreEmploi->titre">

    {{-- Bouton retour --}}
    <div class="mb-6">
        <a href="{{ route('emplois.show', $offreEmploi) }}"
           class="inline-flex items-center gap-2 text-sm text-bleu-doux hover:text-bleu-texte transition">
            ← Retour à l'offre
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Formulaire --}}
        <div class="lg:col-span-2">
            <x-panel>
                <x-page-header
                    title="Soumettre ma candidature"
                    description="Remplissez le formulaire ci-dessous pour postuler à ce poste."
                />

                <form
                    method="POST"
                    action="{{ route('candidatures.store', $offreEmploi) }}"
                    enctype="multipart/form-data"
                    id="form-candidature"
                >
                    @csrf

                    {{-- Nom et prénom --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <x-form.field name="prenom" label="Prénom *">
                            <x-form.input name="prenom" placeholder="Marie" />
                        </x-form.field>

                        <x-form.field name="nom" label="Nom *">
                            <x-form.input name="nom" placeholder="Tremblay" />
                        </x-form.field>
                    </div>

                    {{-- Courriel --}}
                    <div class="mb-4">
                        <x-form.field name="courriel" label="Adresse courriel *">
                            <x-form.input name="courriel" type="email" placeholder="marie.tremblay@email.com" />
                        </x-form.field>
                    </div>

                    {{-- Téléphone --}}
                    <div class="mb-4">
                        <x-form.field name="telephone" label="Téléphone (optionnel)">
                            <x-form.input name="telephone" type="tel" placeholder="418-555-0101" />
                        </x-form.field>
                    </div>

                    {{-- Message --}}
                    <div class="mb-4">
                        <x-form.field name="message" label="Message de motivation (optionnel)">
                            <x-form.textarea name="message" rows="5" placeholder="Parlez-nous de vous et de votre motivation pour ce poste..." />
                        </x-form.field>
                    </div>

                    {{-- CV --}}
                    <div class="mb-6">
                        <x-form.field name="cv" label="Curriculum vitae *">
                            <div class="relative">
                                <input
                                    type="file"
                                    name="cv"
                                    id="cv"
                                    accept=".pdf,.doc,.docx,.txt,.rtf,.odt"
                                    class="w-full rounded-xl border border-bleu-moyen bg-white px-4 py-2.5 text-sm text-bleu-texte file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-bleu-clair file:text-bleu-texte file:text-sm file:font-medium hover:file:bg-bleu-moyen transition cursor-pointer"
                                    onchange="validerCV(this)"
                                >
                            </div>
                            <p class="text-xs text-bleu-doux mt-1">
                                Formats acceptés : PDF, DOC, DOCX, TXT, RTF, ODT — Maximum 2 Mo
                            </p>
                            <p id="cv-erreur" class="text-xs text-red-600 mt-1 hidden"></p>
                            @error('cv')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </x-form.field>
                    </div>

                    {{-- Boutons --}}
                    <div class="flex items-center justify-between pt-4 border-t border-bleu-clair">
                        <a href="{{ route('emplois.show', $offreEmploi) }}">
                            <x-button variant="outline" type="button">
                                Annuler
                            </x-button>
                        </a>
                        <x-button variant="primary" type="submit" id="btn-soumettre">
                            Envoyer ma candidature
                        </x-button>
                    </div>

                </form>
            </x-panel>
        </div>

        {{-- Sidebar — résumé de l'offre --}}
        <div>
            <x-panel>
                <h3 class="text-sm font-semibold text-bleu-texte mb-4 uppercase tracking-wide">
                    Vous postulez pour
                </h3>
                <p class="text-bleu-texte font-bold text-lg mb-1">{{ $offreEmploi->titre }}</p>
                <p class="text-bleu-doux text-sm mb-4">{{ $offreEmploi->entreprise }}</p>

                <ul class="flex flex-col gap-2 text-sm border-t border-bleu-clair pt-4">
                    @if($offreEmploi->ville)
                        <li class="flex items-center gap-2 text-bleu-doux">
                            📍 {{ $offreEmploi->ville }}
                        </li>
                    @endif
                    <li class="flex items-center gap-2 text-bleu-doux">
                        🕐 {{ $offreEmploi->type_emploi }}
                    </li>
                    @if($offreEmploi->salaire)
                        <li class="flex items-center gap-2 text-bleu-doux">
                            💰 {{ $offreEmploi->salaire }}
                        </li>
                    @endif
                </ul>
            </x-panel>
        </div>

    </div>

</x-layout>

{{-- Validation JavaScript côté client --}}
<script>
const TAILLE_MAX = 2 * 1024 * 1024; // 2 Mo en octets
const EXTENSIONS_OK = ['pdf', 'doc', 'docx', 'txt', 'rtf', 'odt'];

function validerCV(input) {
    const erreur = document.getElementById('cv-erreur');
    const bouton = document.getElementById('btn-soumettre');

    // Réinitialise l'erreur
    erreur.textContent = '';
    erreur.classList.add('hidden');
    bouton.disabled = false;

    if (!input.files.length) return;

    const fichier = input.files[0];

    // Vérifie l'extension
    const extension = fichier.name.split('.').pop().toLowerCase();
    if (!EXTENSIONS_OK.includes(extension)) {
        erreur.textContent = `Extension non autorisée (.${extension}). Utilisez : PDF, DOC, DOCX, TXT, RTF ou ODT.`;
        erreur.classList.remove('hidden');
        bouton.disabled = true;
        input.value = '';
        return;
    }

    // Vérifie la taille
    if (fichier.size > TAILLE_MAX) {
        const tailleMo = (fichier.size / 1024 / 1024).toFixed(2);
        erreur.textContent = `Fichier trop volumineux (${tailleMo} Mo). Maximum autorisé : 2 Mo.`;
        erreur.classList.remove('hidden');
        bouton.disabled = true;
        input.value = '';
        return;
    }

    // Tout est bon
    erreur.classList.add('hidden');
    bouton.disabled = false;
}
</script>
