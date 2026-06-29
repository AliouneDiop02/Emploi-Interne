<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Emploi Interne' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-bleu-pale text-gray-900">

    {{-- Navigation --}}
    <nav class="bg-bleu-clair border-b border-bleu-moyen shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ route('emplois.index') }}"
                   class="text-xl font-semibold text-bleu-texte tracking-tight hover:text-bleu-doux transition">
                    ✦ Emploi Interne
                </a>

                {{-- Liens centre --}}
                <div class="hidden md:flex items-center gap-2">
                    <x-nav-link :href="route('emplois.index')" :active="request()->routeIs('emplois.*')">
                        Offres d'emploi
                    </x-nav-link>
                     @auth
                        @if(auth()->user()->isAdmin())
                            <x-nav-link :href="route('admin.offres.index')" :active="request()->routeIs('admin.*')">
                                Administration
                            </x-nav-link>
                        @endif

                        {{-- Lien Mes candidatures — visible pour les candidats --}}
                        @if(auth()->user()->isCandidat())
                            <x-nav-link :href="route('mes-candidatures')" :active="request()->routeIs('mes-candidatures*')">
                                Mes candidatures
                            </x-nav-link>
                        @endif
                    @endauth
                </div>

                {{-- Liens auth (prochain LAB) --}}
                <div class="flex items-center gap-2">
                    @guest
                        {{-- Visiteur non connecté --}}
                        <a href="{{ route('login') }}"
                           class="text-sm text-bleu-doux hover:text-bleu-texte px-3 py-1.5 rounded-lg hover:bg-bleu-moyen transition">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}"
                           class="text-sm font-medium bg-bleu-vif text-bleu-texte px-4 py-1.5 rounded-lg hover:bg-bleu-moyen transition">
                            S'inscrire
                        </a>
                    @endguest

                    @auth
                        {{-- Nom de l'utilisateur + badge rôle --}}
                        <div class="hidden md:flex items-center gap-2">
                            <span class="text-sm text-bleu-doux">
                                👤 {{ auth()->user()->name }}
                            </span>
                            @if(auth()->user()->isAdmin())
                                <span class="text-xs bg-bleu-vif text-bleu-texte px-2 py-0.5 rounded-full font-medium">
                                    Admin
                                </span>
                            @endif
                        </div>

                        {{-- Déconnexion --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="text-sm text-bleu-doux hover:text-bleu-texte px-3 py-1.5 rounded-lg hover:bg-bleu-moyen transition">
                                Déconnexion
                            </button>
                        </form>
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Message flash succès --}}
        @if(session('success'))
            <x-alert type="success" class="mb-6">
                {{ session('success') }}
            </x-alert>
        @endif

        {{-- Message flash erreur --}}
        @if(session('error'))
            <x-alert type="error" class="mb-6">
                {{ session('error') }}
            </x-alert>
        @endif

        {{ $slot }}
    </main>

    {{-- Pied de page --}}
    <footer class="mt-16 bg-bleu-clair border-t border-bleu-moyen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <span class="text-bleu-texte font-semibold">✦ Emploi Interne</span>
                <div class="flex gap-6 text-sm text-bleu-doux">
                    <a href="#" class="hover:text-bleu-texte transition">À propos</a>
                    <a href="#" class="hover:text-bleu-texte transition">Contact</a>
                    <a href="#" class="hover:text-bleu-texte transition">Politique de confidentialité</a>
                </div>
                <p class="text-sm text-bleu-doux">© {{ date('Y') }} Emploi Interne</p>
            </div>
        </div>
    </footer>

</body>
</html>
