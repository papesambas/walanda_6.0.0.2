document.addEventListener("DOMContentLoaded", function () {
    const tableRows = document.querySelectorAll(".table-link");
    tableRows.forEach(row => {
        row.addEventListener("click", function () {
            const link = row.getAttribute("data-href");
            if (link) {
                window.location.href = link;
            }
        });
    });
});
