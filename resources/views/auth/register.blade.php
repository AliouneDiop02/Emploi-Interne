<x-layout title="Créer un compte">

    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="w-full max-w-md">

            <x-page-header
                title="Créer un compte"
                description="Rejoignez notre portail d'emploi interne."
            />

            <x-panel>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-col gap-4">

                        <x-form.field name="name" label="Nom complet *">
                            <x-form.input
                                name="name"
                                placeholder="Marie Tremblay"
                                :value="old('name')"
                                autocomplete="name"
                            />
                        </x-form.field>

                        <x-form.field name="email" label="Adresse courriel *">
                            <x-form.input
                                name="email"
                                type="email"
                                placeholder="marie@example.com"
                                :value="old('email')"
                                autocomplete="email"
                            />
                        </x-form.field>

                        <x-form.field name="password" label="Mot de passe *">
                            <x-form.input
                                name="password"
                                type="password"
                                placeholder="Minimum 8 caractères"
                                autocomplete="new-password"
                            />
                        </x-form.field>

                        <x-form.field name="password_confirmation" label="Confirmer le mot de passe *">
                            <x-form.input
                                name="password_confirmation"
                                type="password"
                                placeholder="Répétez le mot de passe"
                                autocomplete="new-password"
                            />
                        </x-form.field>

                        <x-button variant="primary" type="submit" class="w-full mt-2">
                            Créer mon compte
                        </x-button>

                    </div>
                </form>

                <div class="mt-4 pt-4 border-t border-bleu-clair text-center">
                    <p class="text-sm text-bleu-doux">
                        Déjà un compte ?
                        <a href="{{ route('login') }}"
                           class="text-bleu-texte font-medium hover:underline">
                            Se connecter
                        </a>
                    </p>
                </div>
            </x-panel>

        </div>
    </div>

</x-layout>
