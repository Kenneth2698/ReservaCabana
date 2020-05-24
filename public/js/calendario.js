let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];

let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);


function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    let turnos = document.getElementById("selectorDeTurno");
    turnos.style.display = "none";
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    let turnos = document.getElementById("selectorDeTurno");
    turnos.style.display = "none";
    showCalendar(currentMonth, currentYear);
}


function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("td");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
                
            }
            else if (date > daysInMonth) {
                break;
            }

            else {
                let cell = document.createElement("td");
                let cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                } // color today's date
                cell.appendChild(cellText);
                row.appendChild(cell);

                //Obtiene el dia seleccionado
                cell.addEventListener("click",function(){

                    let div = document.getElementById("diaSeleccionado");
                    console.log(cellText.nodeValue);

                    div.innerHTML = 'Dia seleccionado: '+cellText.nodeValue;
                    let turnos = document.getElementById("selectorDeTurno");
                    turnos.style.display = "block";
                });
                date++;
            }


        }

        tbl.appendChild(row); // appending each row into calendar body.
        
    }

}

let turno1 = document.getElementById("turno1");
let turno2 = document.getElementById("turno2");
let turno3 = document.getElementById("turno3");

turno1.addEventListener("click",function(){
    turno1.classList.add('bg-success');
});
turno2.addEventListener("click",function(){
    turno2.classList.add('bg-danger');
});
turno3.addEventListener("click",function(){
    turno3.classList.add('bg-warning');
});