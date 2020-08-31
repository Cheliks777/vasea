<?php
define("INDEX", "yes");
@set_time_limit(0);
require_once 'config.php';
$start = microtime(true);
$trans = parse_ini_file('template/language/'.$language.'.ini', true);
require_once 'template/function.php';
require_once 'template/login.php';
require_once 'template/code.php';
require_once 'template/log.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>zTDS <?php echo $version; ?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="template/img/favicon.ico">
<link rel="stylesheet" type="text/css" href="template/codemirror/codemirror.css">
<link rel="stylesheet" type="text/css" href="template/datatables/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="template/style.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="template/codemirror/codemirror.js"></script>
<script type="text/javascript" src="template/codemirror/javascript.js"></script>
<script type="text/javascript" src="template/js/jquery-latest.min.js"></script>
<script type="text/javascript" src="template/datatables/datatables.min.js"></script>
<script type="text/javascript" src="template/datatables/datatables.responsive.min.js"></script>
<script type="text/javascript" src="template/js/top.js"></script>
<script type="text/javascript" src="template/js/jquery.responsiveTabs.js"></script>
</head>
<body>
<div class="header">
<div class="logo align_left">zTDS <?php echo $version; ?></div>
<div class="hamburger" id="pull_main">
<div class="h_el"></div>
<div class="h_el"></div>
<div class="h_el"></div>
</div>
</div>
<div class="content">
<div id="left">
<div class="left_block">
<?php require_once 'template/menu.php'; ?>
</div>
</div>
<div id="center">
<div class="center_block align_left">
<?php
require_once 'template/group.php';
require_once 'template/stream.php';
require_once 'template/editor.php';
require_once 'template/sources.php';
require_once 'template/countries.php';
require_once 'template/apiset.php';
?>
</div>
</div>
<div id="right">
<div class="right_block align_left">
<?php require_once 'template/stats.php'; ?>
</div>
</div>
</div>
<div style="clear:both;"></div>
<div class="bottom">&copy; root</div>
<?php
if(empty($dg)){
	$dg = '[0,0,0,0,0]';
}
if(empty($dg_se)){
	$dg_se = '[0,0,0,0,0,0]';
}
?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(init);
	  function init () {drawChart();<?php if(empty($s) && $se == 1){echo 'drawChart_se();';} ?>}
      function drawChart(){
        var data = google.visualization.arrayToDataTable([['Day', '<?php echo $trans['chart']['ch1']; ?>', '<?php echo $trans['chart']['ch2']; ?>', '<?php echo $trans['chart']['ch3']; ?>', '<?php echo $trans['chart']['ch4']; ?>'], <?php echo $dg; ?>]);
        var options = {
          title:'Statistics',
          curveType:'none',
          legend:{position:'bottom'},
		  chartArea:{left:60, right:20, top:20, bottom:40, width:'100%', height:'100%'},
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }
	  function drawChart_se(){
        var data = google.visualization.arrayToDataTable([['Day', 'Google', 'Yandex', 'Mail.ru', 'Yahoo', 'Bing'], <?php echo $dg_se; ?>]);
        var options = {
          title:'Search engines',
          curveType:'none',
          legend:{position:'bottom'},
		  chartArea:{left:60, right:20, top:20, bottom:40, width:'100%', height:'100%'},
       };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_se'));
        chart.draw(data, options);
      }
</script>
<?php
if($debug == 1){
	echo '<div class="debug">'.(microtime(true) - $start).' s.</div>';
}
?>
<script type="text/javascript" src="template/js/bottom.js"></script>
</body>
</html>