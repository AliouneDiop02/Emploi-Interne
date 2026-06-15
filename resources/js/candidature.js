const TAILLE_MAX = 2 * 1024 * 1024; // 2 Mo en octets
const EXTENSIONS_OK = ['pdf', 'doc', 'docx', 'txt', 'rtf', 'odt'];

function validerCV(input) {
    const erreur = document.getElementById('cv-erreur');
    const bouton = document.getElementById('btn-soumettre');

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

    if (fichier.size > TAILLE_MAX) {
        const tailleMo = (fichier.size / 1024 / 1024).toFixed(2);
        erreur.textContent = `Fichier trop volumineux (${tailleMo} Mo). Maximum autorisé : 2 Mo.`;
        erreur.classList.remove('hidden');
        bouton.disabled = true;
        input.value = '';
        return;
    }

    erreur.classList.add('hidden');
    bouton.disabled = false;
}
window.validerCV = validerCV;
