document.addEventListener("DOMContentLoaded", function () {
    alert('ok');
    var elements = document.querySelectorAll('.format-number');
    elements.forEach(function (element) {
        var value = element.textContent.trim();
        var formattedValue = new Intl.NumberFormat('fr-FR').format(value);
        element.textContent = formattedValue;
    });
});
