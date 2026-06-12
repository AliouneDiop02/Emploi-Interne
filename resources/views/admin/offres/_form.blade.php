{{-- Informations principales --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
    <x-form.field name="titre" label="Titre du poste *">
        <x-form.input name="titre" placeholder="Ex: Développeur Laravel" :value="old('titre', $offre->titre ?? '')" />
    </x-form.field>

    <x-form.field name="entreprise" label="Entreprise *">
        <x-form.input name="entreprise" placeholder="Ex: Agence Numérik" :value="old('entreprise', $offre->entreprise ?? '')" />
    </x-form.field>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
    <x-form.field name="ville" label="Ville">
        <x-form.input name="ville" placeholder="Ex: Saguenay" :value="old('ville', $offre->ville ?? '')" />
    </x-form.field>

    <x-form.field name="type_emploi" label="Type d'emploi *">
        <select name="type_emploi" id="type_emploi"
                class="w-full rounded-xl border border-bleu-moyen bg-white px-4 py-2.5 text-sm text-bleu-texte focus:outline-none focus:ring-2 focus:ring-bleu-vif transition">
            @foreach(['Temps plein', 'Temps partiel', 'Contrat', 'Stage', 'Télétravail'] as $type)
                <option value="{{ $type }}" {{ old('type_emploi', $offre->type_emploi ?? '') === $type ? 'selected' : '' }}>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('type_emploi')
            <p class="text-xs text-red-600 mt-0.5">{{ $message }}</p>
        @enderror
    </x-form.field>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
    <x-form.field name="salaire" label="Salaire">
        <x-form.input name="salaire" placeholder="Ex: 60 000 $ – 72 000 $" :value="old('salaire', $offre->salaire ?? '')" />
    </x-form.field>

    <x-form.field name="date_publication" label="Date de publication">
        <x-form.input name="date_publication" type="date" :value="old('date_publication', isset($offre) ? $offre->date_publication?->format('Y-m-d') : '')" />
    </x-form.field>
</div>

{{-- Textes longs --}}
<div class="mb-4">
    <x-form.field name="description" label="Description du poste">
        <x-form.textarea name="description" rows="4" placeholder="Décrivez le poste en quelques phrases...">{{ old('description', $offre->description ?? '') }}</x-form.textarea>
    </x-form.field>
</div>

<div class="mb-4">
    <x-form.field name="responsabilites" label="Responsabilités">
        <x-form.textarea name="responsabilites" rows="4" placeholder="Une responsabilité par ligne...">{{ old('responsabilites', $offre->responsabilites ?? '') }}</x-form.textarea>
    </x-form.field>
</div>

<div class="mb-4">
    <x-form.field name="exigences" label="Exigences">
        <x-form.textarea name="exigences" rows="4" placeholder="Une exigence par ligne...">{{ old('exigences', $offre->exigences ?? '') }}</x-form.textarea>
    </x-form.field>
</div>

{{-- Statut actif --}}
<div class="mb-6 flex items-center gap-3">
    <input
        type="checkbox"
        name="est_active"
        id="est_active"
        value="1"
        {{ old('est_active', $offre->est_active ?? true) ? 'checked' : '' }}
        class="w-4 h-4 rounded border-bleu-moyen text-bleu-vif focus:ring-bleu-vif"
    >
    <label for="est_active" class="text-sm font-medium text-bleu-texte">
        Offre active (visible par les visiteurs)
    </label>
</div>
