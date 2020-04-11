<?php
    //simulando um retorno do banco de dados
    $totalClientes = array(
      array(
        'mes'=>"Janeiro", 
        'quantidade' => 100
            ),
      array(
        'mes'=>"Fevereiro", 
        'quantidade' => 50
      ),
      array(
        'mes'=>"Março", 
        'quantidade' => 110
      ),
      array(
        'mes'=>"Abril", 
        'quantidade' => 350
      )  
    );

    //simulando um retorno do banco de dados
    $totalVendas = array(
        array(
          'mes'=>"Janeiro", 
          'valor' => 1000.0
              ),
        array(
          'mes'=>"Fevereiro", 
          'valor' => 2500.0
        ),
        array(
          'mes'=>"Março", 
          'valor' => 1500.0
      ),
        array(
          'mes'=>"Abril", 
          'valor' => 500.0
      )  
      );
?>



<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Dashboard - PHP e Google Charts</title>

    <!-- GRAFICOS-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(desenharGrafico);

      function desenharGrafico() {

        // grafico de linha
        var tabela = google.visualization.arrayToDataTable([
        
          ['Mês', 'Quantidade'],

          <?php foreach ($totalClientes as $linha): ?>
            ['<?php echo $linha['mes'] ?>', <?php echo $linha['quantidade'] ?>     ],
          <?php endforeach ?>
        
        ]);

        var options = {
          title: '',
          legend: {position:'none'},
          height: 250,

        };

        var chart = new google.visualization.LineChart(document.getElementById('graficoLinha'));

        chart.draw(tabela, options);

        // grafico de pizza
        var tabela = google.visualization.arrayToDataTable([
        
        ['Mês', 'Valor'],

        <?php foreach ($totalVendas as $linha): ?>
          ['<?php echo $linha['mes'] ?>', <?php echo $linha['valor'] ?>     ],
        <?php endforeach ?>
      
        ]);

        var options = {
            title: '',
            pieHole: 0.5,
            height: 250,
         };

        var chart = new google.visualization.PieChart(document.getElementById('graficoPizza'));

        chart.draw(tabela, options);

      }
    </script>

  </head>
  <body style="background-color: #e9e9e9">

        <div class="container mt-4">
        <h3>Dashboard</h1>
        
        <div class="row mt-5">
            <div class="col-sm">
                <div class="card bg-success text-white mb-3" style="max-width: 18rem;">
                <div class="card-header">Faturamento / Ano</div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; font-size: 35px">R$ 9.150,00 <span style="font-size: 10px"> / BRL</span></h5>
                </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card bg-primary text-white mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Clientes / Ano</div>
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center; font-size: 35px">350 <span style="font-size: 10px"> / und</span></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card bg-danger text-white mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Vendas / Ano</div>
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center; font-size: 35px">1.500 <span style="font-size: 10px"> / qtd</span></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-8">
                <h4>Quantidade de clientes</h4>
                <div id="graficoLinha"></div>
            </div>

            <div class="col-sm-4">
                <h4>Quantidade de vendas</h4>
                <div id="graficoPizza"></div>
            </div>
        </div>


        </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>