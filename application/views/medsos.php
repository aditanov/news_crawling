<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Nasional</title>
    <!-- Bootstrap Core CSS -->
    <link rel="icon" href="<?php echo base_url().'assets/images/logo_kominfo.png'?>" type="image/gif">
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Custom CSS -->

 <link href="<?php echo base_url().'assets/css/dashboard_twitter.css'?>" rel="stylesheet">

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.11.1.min.js'?>"></script>
    <script type="text/javascript" src="http://www.chartjs.org/assets/Chart.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url().'assets/js/Chart.HorizontalBar.js'?>"></script>

	  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
	  <script src="<?php echo base_url().'assets/js/highcharts.js'?>"></script>


</head>
<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->

<!-- ********************************* DATA GRAFIK 10 TOP ISSUE ****************************************************-->
<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->

<!-- *********************************   DATA SEBARAN BERITA    ***************************************************-->

<body style="background-image: url("<?php echo base_url().'assets/images/background.png';?>")">
<!-- **************************************** MENU ***************************************************** -->
    <nav id=menu class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url().'assets/images/logo_kominfo.png'?>" alt="">
                </a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->

            <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><b>HOME</b></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'index.php/Data/sosmed'?>"><b>SOSMED</b></a>
                    </li>
                    <li>
                        <a href="#"><b>SEARCH</b></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'index.php/Data/sosmed'?>"><b>login</b></a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

!-- **************************************** graphic balok ***************************************************** -->
<div class="tampung">
<br>
<br>
<div class ="tw">
	     	<?php
		 for($i=0;$i<5;$i++) { ?>
 		<blockquote class="twitter-tweet">
      <img alt="foto profil" src="http://assets.kompas.com/data/photo/2016/11/28/1714452IMG-20161128-WA0001780x390.jpg" height="42" width="42"><b>Fadli zon</b>
       <div class="w3-opacity">Sat Dec 10 07:31:20 </div>
        <b><p>Komentari Hari HAM Sedunia, Fadli Zon Singgung Masalah Penggusuran dan Demokrasi https://t.co/TH0BtwCvTl</p></b>

			</blockquote>
			<?php }
		?>

   </div>

 <div class="graph">
		    <canvas id="canvas" height="200" width="630"></canvas>

	         <script>
		 var barChartData = {
			labels : ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
			datasets : [
				{
					fillColor : "rgba(255, 137, 167, 0.78)",
					strokeColor : "rgba(255, 163, 186, 0.93)",
					data : [28,48,40,19,17,27,19]
				}
			]
		}
	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);

	</script>



<div class="graphpie">
		 	<canvas id="pie" height="200" width="200"></canvas>
		<div class="legend">
			<div id="os-Win-lbl">Penistaan <span>100%</span></div>
			<div id="os-Mac-lbl">Sentimen <span> 50%</span></div>
			<div id="os-Other-lbl">Makar<span>30%</span></div>
		  </div>
	<script>

		var pieData = [
				{
					value: 30,
					color:"#FFA3BA"
				},
				{
					value : 50,
					color : "#1d365f"
				},
				{
					value : 100,
					color : "#f9e03b"
				}

			];

	var myPie = new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);

	</script>
		 </div>


   </div>
<!-- **************************************** graphic balok ***************************************************** -->
<!-- **************************************** graphic ombak ***************************************************** -->
				<div class="month-graph">
						<canvas id="line"></canvas>
						<script>
							var lineChartData = {
								labels : ["08:00","14:00","20:00","-02:00"],
								datasets : [
									{
										fillColor : "rgba(9, 35, 78, 0.91)",
										strokeColor : "rgb(255, 137, 167)",
										pointColor : "rgba(220,220,220,1)",
										pointStrokeColor : "#fff",
										data : [65,59,90,81]
									}
								]
							}
						var myLine = new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
						</script>


<table cellpadding="0">
            <tr>
                <td align="center">
                <ul class="pertama">
   							 	<li>satu</li>
    							<li>dua</li>
    							<li>tiga</li>
    							<li>empat</li>
    							<li>lima</li>

</ul>
</td>
            </tr>
            <tr>
                <td align="center">
									<ul class="kedua">
   							 	<li>satu</li>
    							<li>dua</li>
    							<li>tiga</li>
    							<li>empat</li>
    							<li>lima</li>
                  </td>
            </tr>
            <tr>
                <td align="center">
									<ul class="ketiga">
   							 	<li>satu</li>
    							<li>dua</li>
    							<li>tiga</li>
    							<li>empat</li>
    							<li></li>
                  </td>
            </tr>

                <tr>
                <td align="center">
									<ul class="keempat">
   							 	<li>satu</li>
    							<li>dua</li>
    							<li>tiga</li>
    							<li>empat</li>
    							<li>lima</li>
                  </td>
            </tr>
                <tr>
                <td align="center">
									<ul class="kelima">
   							 	<li>satu</li>
    							<li>dua</li>
    							<li>tiga</li>
    							<li>empat</li>
    							<li>lima</li>
                  </td>
            </tr>
        </table>


				</div>

<!-- **************************************** graphic ombak ***************************************************** -->
<div class="kanan">
<div class="foto">
				<table>
            <tr>
                <td>
                    <img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                </td>
            </tr>
            <tr>
                <td>
                    <img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg"height="42" width="42"/>
                    <img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg"height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                 		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                 </td>
            </tr>
        </table>
</div>
<div style="width: 300px">
            <canvas id="miring" class="chart-base" chart-type="type"
                    chart-data="data" chart-labels="labels" chart-legend="true">
            </canvas>
        </div>
        <script>
        var isi = {
            labels : ["Facebook Inc Class A","Amazon.com Inc","Allergan PLC","Allergan PLC","Allergan PLC","Allergan PLC","Allergan PLC"],
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data : [9,8,7,7,7,7]
                }
            ]
        };
var ctx = new Chart(document.getElementById("miring").getContext("2d")).HorizontalBar(isi);
      </script>

      <div class="foto">
				<table>
            <tr>
                <td>
                    <img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                </td>
            </tr>
            <tr>
                <td>
                    <img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg"height="42" width="42"/>
                    <img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg"height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                 		<img alt="" title="" src="http://assets.kompas.com/data/photo/2016/09/29/1709262eko10780x390.jpg" height="42" width="42"/>
                 </td>
            </tr>
        </table>

        <div style="width: 300px">
            <canvas id="miring2" class="chart-base" chart-type="type"
                    chart-data="data" chart-labels="labels" chart-legend="true">
            </canvas>
        </div>
        <script>
        var isi = {
            labels : ["Facebook Inc Class A","Amazon.com Inc","Allergan PLC","Allergan PLC","Allergan PLC","Allergan PLC","Allergan PLC"],
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data : [9,8,7,7,7,7]
                }
            ]
        };
var ctx = new Chart(document.getElementById("miring2").getContext("2d")).HorizontalBar(isi);
      </script>


<div id="garis" style="width: 400px; height: 200px"></div>

		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'garis',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },

            xAxis: {
                categories: ['1', '2007', '2008','2009','2010','2011']
            },
            yAxis: {

                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
			          formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
			      series: [{
                data: [1660, 1946,2271,2590,3004,3550]
            }]
        });
    });
});
		</script>

</div>


</div>




		</div>


</body>
<footer>
  <h5>&copy; kemenkominfo 2016</h5>
</footer>
</html>
