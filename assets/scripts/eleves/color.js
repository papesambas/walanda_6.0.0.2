// app.js

document.addEventListener('DOMContentLoaded', function () {
    const tauxElement = document.getElementById('taux');
    const tauxValue = parseFloat(tauxElement.textContent);
    const colAutoElement = document.querySelector('.col-auto');
    const appreciationElement = document.getElementById('appreciation');

    if (tauxValue < 40) {
        tauxElement.style.color = 'red';
        appreciationElement.textContent = 'Mauvais';
        appreciationElement.style.color = 'primary';
    } else if (tauxValue >= 40 && tauxValue < 60) {
        tauxElement.style.color = 'orange';
        appreciationElement.textContent = 'A améliorer';
        appreciationElement.style.color = 'orange';;
    } else if (tauxValue >= 60 && tauxValue < 80) {
        tauxElement.style.color = 'yellow';
        appreciationElement.textContent = 'Moyen';
        appreciationElement.style.color = 'yellow';;
    } else if (tauxValue >= 80 && tauxValue < 90) {
        tauxElement.style.color = 'lightgreen';
        appreciationElement.textContent = 'Bon';
        appreciationElement.style.color = 'lightgreen';;
    } else if (tauxValue >= 90 && tauxValue < 97) {
        tauxElement.style.color = 'azure';
        appreciationElement.textContent = 'Très bon';
        appreciationElement.style.color = 'azure';;
    } else {
        tauxElement.style.color = 'blue';
        appreciationElement.textContent = 'Excellent';
        appreciationElement.style.color = 'blue';;
    }
});
