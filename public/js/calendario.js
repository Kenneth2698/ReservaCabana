let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];

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

                //elementos para que marque el dia de hoy
                let internrow0 = document.createElement("tr");
                let dia = document.createElement("td");
                let diatxt = document.createTextNode(date);
                dia.appendChild(diatxt);
                internrow0.appendChild(dia);

                //elementos para que marque el turno de mañana
                let internrow = document.createElement("tr");
                let manana = document.createElement("td");
                let mananatxt = document.createTextNode("Manana");
                manana.appendChild(mananatxt);
                internrow.appendChild(manana);

                //elementos para que marque el turno de tarde
                let internrow2 = document.createElement("tr");
                let tarde = document.createElement("td");
                let tardetxt = document.createTextNode("Tarde");
                tarde.appendChild(tardetxt);
                internrow2.appendChild(tarde);

                //elementos para que marque el turno de noche
                let internrow3 = document.createElement("tr");
                let noche = document.createElement("td");
                let nochetxt = document.createTextNode("Noche");
                noche.appendChild(nochetxt);
                internrow3.appendChild(noche);


                var respuesta = { Manana: "1", Tarde: "1", Noche: "0" };//AQUI HAY QUE HACER LA LLAMADA CON AJAX , CONSULTANDO LA DISPONIBILIDAD DE LA FECHA ACTUAL DEL FOR
                                                                        //La funcion de ajax esta abajo
                if (respuesta.Manana == "1") {
                    manana.style.backgroundColor = 'green';
                } else {
                    manana.style.backgroundColor = 'red';

                }

                if (respuesta.Tarde == "1") {
                    tarde.style.backgroundColor = 'green';
                } else {
                    tarde.style.backgroundColor = 'red';

                }


                if (respuesta.Noche == "1") {
                    noche.style.backgroundColor = 'green';
                } else {
                    noche.style.backgroundColor = 'red';

                }
                manana.style.color = 'white';
                tarde.style.color = 'white';
                noche.style.color = 'white';


                cell.appendChild(internrow0);
                cell.appendChild(internrow);
                cell.appendChild(internrow2);
                cell.appendChild(internrow3);

                row.appendChild(cell);

                date++;
            }


        }

        tbl.appendChild(row); // appending each row into calendar body.

    }

}

/*
                cell.addEventListener("click", function () {

                    let div = document.getElementById("diaSeleccionado");


                    var parametros = {
                        'cabanaid': 1,
                        'day': cellText.nodeValue,
                        'month': month + 1,
                        'year': year,
                    };
                    var respuesta;
                    $.ajax(
                        {

                            data: parametros,
                            url: '?controlador=Reserva&accion=verificarFechaCalendario',
                            type: 'post',
                            async: false,

                            success: function (response) {

                                respuesta = JSON.parse(response);

                            },

                        }
                    );

                    div.innerHTML = 'Dia seleccionado: ' + cellText.nodeValue;
                    let turnos = document.getElementById("selectorDeTurno");
                    turnos.style.display = "block";

                    let manana = document.getElementById("turno1");
                    let tarde = document.getElementById("turno2");
                    let noche = document.getElementById("turno3");


                    if (respuesta.Manana == "1") {
                        manana.style.backgroundColor  = 'green';
                    } else {
                        manana.style.backgroundColor  = 'red';
                    }


                    if (respuesta.Tarde == "1") {
                        tarde.style.backgroundColor  = 'green';
                    } else {
                        tarde.style.backgroundColor  = 'red';
                    }


                    if (respuesta.Noche == "1") {
                        noche.style.backgroundColor  = 'green';
                    } else {
                        noche.style.backgroundColor  = 'red';
                    }


                }); */