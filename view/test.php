<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Calendario</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>

<body>
  <div class="container col-lg-12">
    <br><br>
    <div class="card">
      <h3 class="card-header" id="monthAndYear"></h3>
      <table class="table table-bordered" id="calendar">
        <thead>
          <tr>
            <th>Dom</th>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mie</th>
            <th>Jue</th>
            <th>Vie</th>
            <th>Sab</th>
          </tr>
        </thead>

        <tbody id="calendar-body">

        </tbody>
      </table>

      <div class="form-inline">

        <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Mes anterior</button>

        <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Mes siguiente</button>
      </div>
      <br />
      
      <form class="form-inline">
        
        <label class="lead mr-2 ml-2" for="month">Ir a: </label>
        <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
          <option value=0>Enero</option>
          <option value=1>Febrero</option>
          <option value=2>Marzo</option>
          <option value=3>Abril</option>
          <option value=4>Mayo</option>
          <option value=5>Junio</option>
          <option value=6>Julio</option>
          <option value=7>Agosto</option>
          <option value=8>Setiembre</option>
          <option value=9>Octubre</option>
          <option value=10>Noviembre</option>
          <option value=11>Diciembre</option>
        </select>


        <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
          <option value=1990>1990</option>
          <option value=1991>1991</option>
          <option value=1992>1992</option>
          <option value=1993>1993</option>
          <option value=1994>1994</option>
          <option value=1995>1995</option>
          <option value=1996>1996</option>
          <option value=1997>1997</option>
          <option value=1998>1998</option>
          <option value=1999>1999</option>
          <option value=2000>2000</option>
          <option value=2001>2001</option>
          <option value=2002>2002</option>
          <option value=2003>2003</option>
          <option value=2004>2004</option>
          <option value=2005>2005</option>
          <option value=2006>2006</option>
          <option value=2007>2007</option>
          <option value=2008>2008</option>
          <option value=2009>2009</option>
          <option value=2010>2010</option>
          <option value=2011>2011</option>
          <option value=2012>2012</option>
          <option value=2013>2013</option>
          <option value=2014>2014</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>
          <option value=2022>2022</option>
          <option value=2023>2023</option>
          <option value=2024>2024</option>
          <option value=2025>2025</option>
          <option value=2026>2026</option>
          <option value=2027>2027</option>
          <option value=2028>2028</option>
          <option value=2029>2029</option>
          <option value=2030>2030</option>
        </select>
      </form>
      
    </div>
  </div>
  <br><br>
  <div class="container" id="selectorDeTurno" style="display: none;">
    <div id="diaSeleccionado">

    </div>
    <br>
    <center>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Turno</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td id="turno1">Manana</td>

          </tr>
          <tr>
            <td id="turno2">Tarde</td>

          </tr>
          <tr>
            <td id="turno3">Noche</td>
          </tr>

        </tbody>
      </table>
    </center>
    <br>
    <button class="btn btn-success">Avanzar</button>
    <br>
    <br>
  </div>



  <script src="public/js/calendario.js"></script>
  <script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>
  <!-- Optional JavaScript for bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


  <!-- Jquery JS-->
  <script src="public/vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="public/vendor/select2/select2.min.js"></script>
  <script src="public/vendor/datepicker/moment.min.js"></script>
  <script src="public/vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="public/js/global.js"></script>

</body>

</html>