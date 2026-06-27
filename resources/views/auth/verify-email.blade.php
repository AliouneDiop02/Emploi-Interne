<x-layout title="Vérification courriel">

    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="w-full max-w-md">

            <x-panel class="text-center">
                <div class="text-5xl mb-4">📧</div>

                <h1 class="text-2xl font-bold text-bleu-texte mb-2">
                    Vérifiez votre courriel
                </h1>

                <p class="text-bleu-doux text-sm mb-6">
                    Un lien de vérification a été envoyé à votre adresse courriel.
                    Cliquez sur le lien pour activer votre compte.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-button variant="primary" type="submit" class="w-full">
                        Renvoyer le courriel de vérification
                    </x-button>
                </form>

                <div class="mt-4 pt-4 border-t border-bleu-clair">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-sm text-bleu-doux hover:text-bleu-texte transition">
                            Se déconnecter
                        </button>
                    </form>
                </div>
            </x-panel>

        </div>
    </div>

</x-layout>
