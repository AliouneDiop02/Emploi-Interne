<?php

namespace Database\Seeders;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Création des offres d'emploi
        $offre1 = OffreEmploi::create([
            'titre'            => 'Développeur Laravel',
            'entreprise'       => 'Agence Numérik',
            'ville'            => 'Saguenay',
            'type_emploi'      => 'Temps plein',
            'salaire'          => '60 000 $ – 72 000 $',
            'description'      => 'Rejoignez notre équipe pour développer des applications web modernes avec Laravel.',
            'responsabilites'  => "Développer et maintenir des applications Laravel.\nCollaborer avec l'équipe design.\nParticiper aux revues de code.",
            'exigences'        => "2 ans d'expérience en PHP.\nConnaissance de Laravel.\nBonne maîtrise de Git.",
            'est_active'       => true,
            'date_publication' => '2026-06-01',
        ]);

        $offre2 = OffreEmploi::create([
            'titre'            => 'Analyste programmeur PHP',
            'entreprise'       => 'Solutions Nord',
            'ville'            => 'Québec',
            'type_emploi'      => 'Temps plein',
            'salaire'          => '65 000 $ – 78 000 $',
            'description'      => 'Analyser les besoins, produire des fonctionnalités et maintenir des applications internes.',
            'responsabilites'  => "Analyser les besoins des clients.\nProduire des spécifications techniques.\nDévelopper des fonctionnalités PHP.",
            'exigences'        => "DEC en informatique ou équivalent.\n3 ans d'expérience en PHP.\nExpérience avec MySQL.",
            'est_active'       => true,
            'date_publication' => '2026-06-03',
        ]);

        $offre3 = OffreEmploi::create([
            'titre'            => 'Intégrateur web',
            'entreprise'       => 'Studio Créatif Montréal',
            'ville'            => 'Montréal',
            'type_emploi'      => 'Temps partiel',
            'salaire'          => '45 000 $ – 52 000 $',
            'description'      => 'Intégrer des maquettes en HTML/CSS/JS et collaborer avec l\'équipe de design.',
            'responsabilites'  => "Intégrer des maquettes Figma.\nOptimiser les performances front-end.\nAssurer la compatibilité mobile.",
            'exigences'        => "Maîtrise de HTML, CSS, JavaScript.\nExpérience avec Tailwind CSS.\nSouci du détail.",
            'est_active'       => true,
            'date_publication' => '2026-06-05',
        ]);

        $offre4 = OffreEmploi::create([
            'titre'            => 'Technicien support TI',
            'entreprise'       => 'Cégep Régional',
            'ville'            => 'Chicoutimi',
            'type_emploi'      => 'Temps plein',
            'salaire'          => '48 000 $ – 55 000 $',
            'description'      => 'Assurer le support technique aux usagers et maintenir l\'infrastructure informatique.',
            'responsabilites'  => "Répondre aux tickets de support.\nInstaller et configurer les postes.\nDocumenter les procédures.",
            'exigences'        => "DEC en informatique.\nBonne communication.\nPatience et sens du service.",
            'est_active'       => true,
            'date_publication' => '2026-06-07',
        ]);

        $offre5 = OffreEmploi::create([
            'titre'            => 'Développeur fullstack junior',
            'entreprise'       => 'StartupTech',
            'ville'            => 'Télétravail',
            'type_emploi'      => 'Contrat',
            'salaire'          => '55 000 $ – 65 000 $',
            'description'      => 'Travailler sur une plateforme SaaS en croissance rapide avec une équipe dynamique.',
            'responsabilites'  => "Développer des fonctionnalités front et back.\nParticiper aux sprints Agile.\nÉcrire des tests unitaires.",
            'exigences'        => "Connaissance de Vue.js ou React.\nExpérience avec Laravel ou Node.js.\nCapacité à travailler en autonomie.",
            'est_active'       => true,
            'date_publication' => '2026-06-08',
        ]);

        // Offre inactive pour tester l'affichage admin
        OffreEmploi::create([
            'titre'            => 'Administrateur base de données',
            'entreprise'       => 'Groupe Financier Est',
            'ville'            => 'Jonquière',
            'type_emploi'      => 'Temps plein',
            'salaire'          => '70 000 $ – 85 000 $',
            'description'      => 'Gérer et optimiser les bases de données Oracle et SQL Server.',
            'responsabilites'  => "Administrer les bases de données.\nOptimiser les requêtes.\nAssurer les sauvegardes.",
            'exigences'        => "5 ans d'expérience en DBA.\nConnaissance Oracle et SQL Server.",
            'est_active'       => false,
            'date_publication' => '2026-05-15',
        ]);

        // Quelques candidatures de démonstration
        Candidature::create([
            'offre_emploi_id' => $offre1->id,
            'prenom'          => 'Marie',
            'nom'             => 'Tremblay',
            'courriel'        => 'marie.tremblay@email.com',
            'telephone'       => '418-555-0101',
            'message'         => 'Je suis très motivée par ce poste et j\'ai 3 ans d\'expérience Laravel.',
            'cv_chemin'       => 'cvs/demo-cv-1.pdf',
            'cv_nom_original' => 'CV-Marie-Tremblay.pdf',
            'cv_type_mime'    => 'application/pdf',
            'cv_taille'       => 145230,
            'statut'          => 'nouvelle',
        ]);

        Candidature::create([
            'offre_emploi_id' => $offre1->id,
            'prenom'          => 'Kevin',
            'nom'             => 'Bouchard',
            'courriel'        => 'kevin.bouchard@email.com',
            'telephone'       => '418-555-0202',
            'message'         => 'Passionné de développement web, je cherche à rejoindre une équipe dynamique.',
            'cv_chemin'       => 'cvs/demo-cv-2.pdf',
            'cv_nom_original' => 'CV-Kevin-Bouchard.pdf',
            'cv_type_mime'    => 'application/pdf',
            'cv_taille'       => 98450,
            'statut'          => 'nouvelle',
        ]);

        Candidature::create([
            'offre_emploi_id' => $offre2->id,
            'prenom'          => 'Sophie',
            'nom'             => 'Gagné',
            'courriel'        => 'sophie.gagne@email.com',
            'telephone'       => null,
            'message'         => 'Mon profil correspond exactement aux exigences du poste.',
            'cv_chemin'       => 'cvs/demo-cv-3.pdf',
            'cv_nom_original' => 'CV-Sophie-Gagne.pdf',
            'cv_type_mime'    => 'application/pdf',
            'cv_taille'       => 210000,
            'statut'          => 'nouvelle',
        ]);
    }
}
