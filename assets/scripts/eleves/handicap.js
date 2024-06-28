window.onload = function () {
    function isHandicapFunction() {
        let timeout = null;
        let inputField = document.getElementById('eleves_natureHandicap');
        let checkbox = document.getElementById('eleves_isHandicap');
        let message = document.getElementById('eleves_natureHandicap');
        if (checkbox && message) { // Vérifier si les éléments existent
            $(document).on('change', '#eleves_isHandicap', function () {
                if (checkbox.checked) {
                    message.style.display = "block";
                    inputField.required = true;
                } else {
                    message.style.display = "none";
                    inputField.required = false;
                }
            });
        }
    }

    function natureHandicapFunction() {
        let checkbox = document.getElementById('eleves_isHandicap');
        let message = document.getElementById('eleves_natureHandicap');
        if (checkbox && message) { // Vérifier si les éléments existent
            $(document).ready(function () {
                if (checkbox.checked == true) {
                    message.style.display = "block";
                } else {
                    message.style.display = "none";
                }
            });
        }
    }

    // Appelez vos fonctions après que la page ait été chargée
    isHandicapFunction();
    natureHandicapFunction();
};