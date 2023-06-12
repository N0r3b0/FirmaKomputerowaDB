function submitSerweryUsun(button) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "serwery/script.php";

    var input = document.createElement("input");
    input.type = "hidden";
    input.name = "id_remove";
    var row = button.closest("tr");
    var firstColumnValue = row.querySelector("td:first-child").textContent;
    input.value = firstColumnValue;

    form.appendChild(input);

    document.body.appendChild(form);
    form.submit();
}

function submitSerweryEdytuj(button) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "serwery/edytuj.php";

    var input = document.createElement("input");
    input.type = "hidden";
    input.name = "id_edit";
    //dodanie do value wartości z pierwszej kolumny dla wiersza w ktorym wciśnięto button (ID komputera)
    var row = button.closest("tr");
    var firstColumnValue = row.querySelector("td:first-child").textContent;
    input.value = firstColumnValue;

    form.appendChild(input);

    document.body.appendChild(form);
    form.submit();
}
