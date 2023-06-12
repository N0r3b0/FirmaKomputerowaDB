function submitPracownicyUsun(button) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "pracownicy/script.php";

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

function submitPracownicyEdytuj(button) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "pracownicy/edytuj.php";

    var input_id_edit = document.createElement("input");
    input_id_edit.type = "hidden";
    input_id_edit.name = "id_edit";
    //dodanie do value wartości z pierwszej kolumny dla wiersza w ktorym wciśnięto button (ID pracownika)
    var row = button.closest("tr");
    var firstColumnValue = row.querySelector("td:first-child").textContent;
    input_id_edit.value = firstColumnValue;

    var input_imie = document.createElement("input");
    input_imie.type = "hidden";
    input_imie.name = "imie";
    var row = button.closest("tr");
    var secondColumnValue = row.querySelector("td:nth-child(2)").textContent;
    input_imie.value = secondColumnValue;

    var input_nazwisko = document.createElement("input");
    input_nazwisko.type = "hidden";
    input_nazwisko.name = "nazwisko";
    var row = button.closest("tr");
    var thirdColumnValue = row.querySelector("td:nth-child(3)").textContent;
    input_nazwisko.value = thirdColumnValue;

    form.appendChild(input_id_edit);
    form.appendChild(input_imie);
    form.appendChild(input_nazwisko);

    document.body.appendChild(form);
    form.submit();
}
