function submitKomputeryUsun(button) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "komputery/script.php";

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

function submitKomputeryEdytuj(button) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "komputery/edytuj.php";

    var input_id_edit = document.createElement("input");
    input_id_edit.type = "hidden";
    input_id_edit.name = "id_edit";
    //dodanie do value wartości z pierwszej kolumny dla wiersza w ktorym wciśnięto button (ID komputera)
    var row = button.closest("tr");
    var firstColumnValue = row.querySelector("td:first-child").textContent;
    input_id_edit.value = firstColumnValue;

    var input_procesor = document.createElement("input");
    input_procesor.type = "hidden";
    input_procesor.name = "procesor";
    var row = button.closest("tr");
    var secondColumnValue = row.querySelector("td:nth-child(2)").textContent;
    input_procesor.value = secondColumnValue;

    var input_ram = document.createElement("input");
    input_ram.type = "hidden";
    input_ram.name = "ram";
    var row = button.closest("tr");
    var thirdColumnValue = row.querySelector("td:nth-child(3)").textContent;
    input_ram.value = thirdColumnValue;

    var input_karta = document.createElement("input");
    input_karta.type = "hidden";
    input_karta.name = "karta";
    var row = button.closest("tr");
    var fourthColumnValue = row.querySelector("td:nth-child(4)").textContent;
    input_karta.value = fourthColumnValue;

    var input_hdd = document.createElement("input");
    input_hdd.type = "hidden";
    input_hdd.name = "hdd";
    var row = button.closest("tr");
    var fifthColumnValue = row.querySelector("td:nth-child(5)").textContent;
    input_hdd.value = fifthColumnValue;

    form.appendChild(input_id_edit);
    form.appendChild(input_procesor);
    form.appendChild(input_ram);
    form.appendChild(input_karta);
    form.appendChild(input_hdd);

    document.body.appendChild(form);
    form.submit();
}
