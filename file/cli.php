<style>
@-moz-document url-prefix() {
    .img-responsive{
        width:200px;
    }
}
.chart-legend{
  width:100%;
  height:100px;
}
.chart-legend li span{
    float:left;
    display: inline;
    width: 12px;
    height: 12px;
    margin-right: 5px;
    text-decoration: none;
}
.chart-legend li{
    list-style: none;
    text-align: left;
}
</style>
<?php
              include("file/conexao.php");

              $res = mysql_query("SELECT nome,color_user,TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(a.end, a.start)))), '%H:%i:%s') AS TotalHoras FROM events a, usuarios b WHERE a.usuarios_idusuarios = b.idusuarios GROUP BY b.idusuarios")or die(mysql_error());
              
             
              ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
     
<h1 class="page-header">Dashboard </h1>
        
          <div class="row placeholders">
              <div style="width:250px;height:400px;background: #ddd;box-shadow:1px 2px 2px #666;float:left;margin: 10px;">
                    <h3 style="width:100%;height:auto;padding:5px;background: #999;margin:0 auto;color:#444555;">Alocação de Horas</h3>
                    <canvas id="piechart" style="padding-top:5px;"  width="200" height="200"></canvas>
                    <div id="js-legend" class="chart-legend"></div>
                    <p>Resumo de horas alocadas em atividades por usuário</p>
               </div>
               <div style="width:250px;height:400px;background: #ddd;box-shadow:1px 2px 2px #666;float:left;margin:10px;">
                    <h3 style="width:100%;height:auto;padding:5px;background: #999;margin:0 auto;color:#444555;">Acessos ao sistema</h3>
                    <canvas id="myChart" style="padding-top:5px;"  width="200" height="200"></canvas>
                    <p></p>
                    <p>Resumo de acesso ao sistema</p>
               </div>
               <div class="dashright" style="width:49%;height:130px;float:left;margin-top:10px;background:#ddd;display:table;box-shadow:1px 2px 2px #666;">
                  <div class="totalUser" style="width:50%;height:100px;float:left;border-right:1px solid #f1f3f4;display:table;">
                    <h3 style="width:100%;height:auto;padding:5px;background: #999;margin:0 auto;color:#444555;margin-bottom:5px;">Total usuários</h3>
                     
                  <?php 
                      $resultado = mysql_query("SELECT COUNT(*) from usuarios")or die(mysql_error());
                      $show = mysql_result($resultado,0);
                    ?>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span><h1><?php echo $show; ?></h1>
                  </div>
                  <div class="totalEventos" style="width:50%;height:100px;float:left;display:table;">
                    <h3 style="width:100%;height:auto;padding:5px;background: #999;margin:0 auto;color:#444555;margin-bottom:5px;">Total de Eventos</h3>
                   

                    <?php 
                      $resultado = mysql_query("SELECT COUNT(*) from events")or die(mysql_error());
                      $show = mysql_result($resultado,0);
                    ?>
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><h1><?php echo $show ?></h1>
                  </div>

               </div>
              <div style="width:48.99%;height:270px;background: #ddd;box-shadow:1px 2px 2px #666;float:left;display: table;">
                    <h3 style="width:100%;height:auto;padding:5px;background: #999;margin:0 auto;color:#444555;">Atividades</h3>
                    <canvas id="myChartBar" style="padding-top:5px;"  width="450" height="170"></canvas>
                    
                    <p>Resumo de horas alocadas em atividades</p>
               </div>
               <iframe src="datatables.php" style="width:99%;height:400px;border:none;overflow: none;"></iframe> 
    <script type="text/javascript">
    
    // Get the context of the canvas element we want to select
    var ctx = document.getElementById("piechart").getContext("2d");
    
    var ctx2 = document.getElementById("myChart").getContext("2d");
    //var ctx3 = document.getElementById("myChartBar").getContext("2d");
    var data = [
      <?php 
         while($dado = mysql_fetch_assoc($res)):
                $tempo = $dado['TotalHoras'];
                $teste = explode(':',$tempo);
                $minutos = $teste[0];
                $minutos = $minutos*60;
                $minutos = $minutos+$teste[1];
                $minutos = $minutos/60;
                $nome = $dado['nome'];
                $cor = $dado['color_user'];
                //echo "Nome: ".$dado['nome']." Total Horas: ".$dado['TotalHoras']."</br>";
                //echo "</br>";
    ?>
    {
        value: "<?php echo $minutos; ?>",
        color:"<?php echo $cor; ?>",
        highlight: "#333",
        label: "<?php echo $nome; ?>",
        labels: 'teste'
    },
    <?php endwhile;  ?>
    ];   
    var options = {
       legend: {
            display: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        },
      text: 'Chart.js Doughnut Chart',
      animateScale: true,
      animateRotate: true,
      segmentShowStroke: false,
      responsive: false
    };
    
    var myNewChart = new Chart(ctx).Doughnut(data,options);
    document.getElementById('js-legend').innerHTML = myNewChart.generateLegend();
    var myNewChart2 = new Chart(ctx2).Pie(data,options);
   var barData = {

    labels: [
    <?php 
        $dados = mysql_query("select nome,acesso from usuarios")or die(mysql_error());
        while($most = mysql_fetch_assoc($dados)):
          $nome = $most['nome'];
          $acessos = $most['acesso'];
          
     ?>
     "<?php echo $nome?>",
      <?php
        endwhile;
    ?>
    ],
    datasets: [
        {
            label: 'Total de Acessos',
            fillColor: '#fa4647',
            data: [
                  <?php 
        $dados2 = mysql_query("select nome,acesso from usuarios")or die(mysql_error());
        while($most2 = mysql_fetch_assoc($dados2)):
          $nome = $most2['nome'];
          $acessos = $most2['acesso'];
          
     ?>
     "<?php echo $acessos?>",
     <?php
        endwhile;
    ?>
            ]
        },
        {
            label: 'Eventos Viagem',
            fillColor: '#4169E1',
            data: [14, 9, 8, 9, 9, 6]
        }
    ]
};
var context = document.getElementById('myChartBar').getContext('2d');
var clientsChart = new Chart(context).Bar(barData);

  </script>
  

    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
     
    </div>
  </div>
  <br><br>        