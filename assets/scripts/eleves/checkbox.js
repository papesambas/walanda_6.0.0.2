$(document).ready(function () {
    // Fonction pour gérer la logique des cases à cocher
    function handleCheckboxLogic() {
        let checkboxActif = $('#eleves_isActif');
        let checkboxAdmis = $('#eleves_isAdmis');

        if (checkboxActif.prop('checked') && !checkboxAdmis.prop('checked')) {
            checkboxActif.prop('checked', false);
            alert("Vous ne pouvez pas être Actif sans être Admis");
        }

        // Si les deux cases sont cochées, effectuer la requête AJAX
        if (checkboxActif.prop('checked') && checkboxAdmis.prop('checked')) {
            // Effectuer la requête AJAX ici
            $.ajax({
                url: '/frais/scolarites/new', // Remplacez par l'URL de votre endpoint
                method: 'GET', // ou 'POST' selon votre besoin
                success: function (response) {
                    // Traitement à effectuer en cas de succès
                    console.log(response);
                },
                error: function (error) {
                    // Gérer les erreurs de la requête AJAX
                    console.error(error);
                }
            });
        }
    }

    // Gérer les changements sur la case à cocher "Actif"
    $(document).on('change', '#eleves_isActif', function () {
        handleCheckboxLogic();
    });

    // Gérer les changements sur la case à cocher "Admis"
    $(document).on('change', '#eleves_isAdmis', function () {
        handleCheckboxLogic();
    });

    // Vérifier les cases à cocher lors du chargement de la page
    handleCheckboxLogic();
});
