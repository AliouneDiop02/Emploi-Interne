<x-layout title="Connexion">

    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="w-full max-w-md">

            <x-page-header
                title="Connexion"
                description="Accédez à votre espace personnel."
            />

            <x-panel>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="flex flex-col gap-4">

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
                                placeholder="Votre mot de passe"
                                autocomplete="current-password"
                            />
                        </x-form.field>

                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                class="w-4 h-4 rounded border-bleu-moyen text-bleu-vif"
                            >
                            <label for="remember" class="text-sm text-bleu-doux">
                                Se souvenir de moi
                            </label>
                        </div>

                        <x-button variant="primary" type="submit" class="w-full mt-2">
                            Se connecter
                        </x-button>

                    </div>
                </form>

                <div class="mt-4 pt-4 border-t border-bleu-clair text-center">
                    <p class="text-sm text-bleu-doux">
                        Pas encore de compte ?
                        <a href="{{ route('register') }}"
                           class="text-bleu-texte font-medium hover:underline">
                            S'inscrire
                        </a>
                    </p>
                </div>
            </x-panel>

        </div>
    </div>

</x-layout>
