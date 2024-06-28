document.addEventListener('DOMContentLoaded', function () {
    var reglements = {}; // Créez un objet pour stocker les règlements

    var formulaire = document.getElementById('reglement_scolarite_form');

    formulaire.addEventListener('submit', function (e) {
        e.preventDefault(); // Empêche la soumission normale du formulaire

        var montant = parseInt(document.getElementById('frais_scolarites_montant').value);
        var versement = parseInt(document.getElementById('frais_scolarites_versement').value);
        var montantInit = montant;

        var champs = ['arrieres', 'inscription', 'carnet', 'transfert', 'septembre', 'octobre', 'novembre', 'decembre', 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'autre'];

        champs.forEach(function (champ) {
            var valeur = parseInt(document.getElementById('frais_scolarites_' + champ).value) * 1000;

            if (valeur > 0 && montant > 0 && valeur <= montant && versement >= montant) {
                var regleValeur = valeur;
                montant -= regleValeur;
                document.getElementById('frais_scolarites_' + champ + '_Reglement').value = (regleValeur);
                document.getElementById('frais_scolarites_' + champ).value = (valeur - regleValeur);
                reglements[champ] = regleValeur;
            } else if (valeur > 0 && montant > 0 && valeur > montant && versement >= montant) {
                var regleValeur = montant;
                montant -= regleValeur;
                document.getElementById('frais_scolarites_' + champ + '_Reglement').value = (regleValeur);
                document.getElementById('frais_scolarites_' + champ).value = (valeur - regleValeur);
                reglements[champ] = regleValeur;
            }
        });
        var sommeReglements = Object.values(reglements).reduce(function (acc, val) {
            return acc + val;
        }, 0);

        if (versement >= montantInit) {
            var reliquat = versement - sommeReglements;
            document.getElementById('frais_scolarites_montant').value = sommeReglements;
            document.getElementById('frais_scolarites_reliquat').value = reliquat;
        } else {
            alert('Une erreur s\'est produite. Vérifiez vos valeurs (Versement et /ou Règlement).');
            var reliquat = 0;
            document.getElementById('frais_scolarites_versement').value = 0;
            document.getElementById('frais_scolarites_montant').value = 0;
            document.getElementById('frais_scolarites_reliquat').value = reliquat;
        }


        console.log("Somme des règlements:", sommeReglements);
    });
});






document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('reglement_scolarite_form');

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Désactivez le bouton submit pendant 3 secondes
            form.querySelector('button[type="submit"]').disabled = true;

            // Soumettez le formulaire après un délai de 3 secondes
            setTimeout(function () {
                form.submit();
            }, 1500);
        });
    }
});
