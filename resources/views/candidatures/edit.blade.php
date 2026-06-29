<x-layout title="Modifier ma candidature">

    <div class="mb-6">
        <a href="{{ route('mes-candidatures') }}"
           class="inline-flex items-center gap-2 text-sm text-bleu-doux hover:text-bleu-texte transition">
            ← Retour à mes candidatures
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">
            <x-panel>
                <x-page-header
                    title="Modifier ma candidature"
                    description="Vous pouvez modifier votre message, téléphone ou CV."
                />

                <form method="POST"
                      action="{{ route('mes-candidatures.update', $candidature->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col gap-4">

                        <x-form.field name="telephone" label="Téléphone (optionnel)">
                            <x-form.input
                                name="telephone"
                                type="tel"
                                placeholder="418-555-0101"
                                :value="old('telephone', $candidature->telephone)"
                            />
                        </x-form.field>

                        <x-form.field name="message" label="Message de motivation (optionnel)">
                            <x-form.textarea name="message" rows="5">{{ old('message', $candidature->message) }}</x-form.textarea>
                        </x-form.field>

                        <x-form.field name="cv" label="Nouveau CV (optionnel — laissez vide pour garder l'actuel)">
                            <input
                                type="file"
                                name="cv"
                                id="cv"
                                accept=".pdf,.doc,.docx,.txt,.rtf,.odt"
                                class="w-full rounded-xl border border-bleu-moyen bg-white px-4 py-2.5 text-sm text-bleu-texte file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-bleu-clair file:text-bleu-texte file:text-sm file:font-medium hover:file:bg-bleu-moyen transition cursor-pointer"
                            >
                            <p class="text-xs text-bleu-doux mt-1">
                                CV actuel : 📄 {{ $candidature->cv_nom_original }}
                            </p>
                        </x-form.field>

                        <div class="flex items-center justify-between pt-4 border-t border-bleu-clair">
                            <a href="{{ route('mes-candidatures') }}">
                                <x-button variant="outline" type="button">Annuler</x-button>
                            </a>
                            <x-button variant="primary" type="submit">Sauvegarder</x-button>
                        </div>

                    </div>
                </form>
            </x-panel>
        </div>

        <div>
            <x-panel>
                <h3 class="text-sm font-semibold text-bleu-texte mb-4 uppercase tracking-wide">
                    Offre concernée
                </h3>
                <p class="text-bleu-texte font-bold text-lg mb-1">
                    {{ $candidature->offreEmploi->titre }}
                </p>
                <p class="text-bleu-doux text-sm">
                    {{ $candidature->offreEmploi->entreprise }}
                </p>
            </x-panel>
        </div>

    </div>

</x-layout>
