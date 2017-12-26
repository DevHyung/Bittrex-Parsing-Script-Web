<?
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>Bittrex Parsing</title>

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body{
        color:#fff;
      }
      .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
        background-color: aqua;
      }
 
    </style>
    <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
    <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color: #000;">
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
            <th>1m</th>
            <th>3m</th>
            <th>5m</th>
            <th>10m</th>
            <th>30m</th>
            <th>60m</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
        <?
          $sql="SELECT * FROM lsy_bitcoin group by stock order by buy + sell DESC";
          $resultnow = mysqli_query($db,$sql);
          while($row=mysqli_fetch_array($resultnow))
          {
            $sql1m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time <= date_add('$lasttime',interval + 1 minute ) 
            AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result1m = mysqli_query($db,$sql1m);
            $row1m=mysqli_fetch_array($result1m);
             if($row1m['sum(buy)']+$row1m['sum(sell)'] > 0) {
	            $value1m = round((100*$row1m['sum(buy)'])/($row1m['sum(buy)']+$row1m['sum(sell)']),2);
	        } else{
	            $value1m = 0;
	        }
            
            //
            $sql3m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time <= date_add('$lasttime',interval + 3 minute ) 
            AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result3m = mysqli_query($db,$sql3m);
            $row3m=mysqli_fetch_array($result3m);
            if($row3m['sum(buy)']+$row3m['sum(sell)'] > 0) {
	            $value3m = round((100*$row3m['sum(buy)'])/($row3m['sum(buy)']+$row3m['sum(sell)']),2);
	        } else{
	            $value3m = 0;
	        }
	         //
            $sql5m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time <= date_add('$lasttime',interval + 5 minute ) 
            AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result5m = mysqli_query($db,$sql5m);
            $row5m=mysqli_fetch_array($result5m);
            if($row5m['sum(buy)']+$row5m['sum(sell)'] > 0) {
	            $value5m = round((100*$row5m['sum(buy)'])/($row5m['sum(buy)']+$row5m['sum(sell)']),2);
	        } else{
	            $value5m = 0;
	        }
            //
            $sql10m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time <= date_add('$lasttime',interval + 10 minute ) 
            AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result10m = mysqli_query($db,$sql10m);
            $row10m=mysqli_fetch_array($result10m);
            if($row10m['sum(buy)']+$row10m['sum(sell)'] > 0) {
	            $value10m = round((100*$row10m['sum(buy)'])/($row10m['sum(buy)']+$row10m['sum(sell)']),2);
	        } else{
	            $value10m = 0;
	        }
	        //
            $sql30m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time <= date_add('$lasttime',interval + 30 minute ) 
            AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
            $result30m = mysqli_query($db,$sql30m);
            $row30m=mysqli_fetch_array($result30m);
            if($row30m['sum(buy)']+$row30m['sum(sell)'] > 0) {
	            $value30m = round((100*$row30m['sum(buy)'])/($row30m['sum(buy)']+$row30m['sum(sell)']),2);
	        } else{
	            $value30m = 0;
	        }
	        //
            $sql60m = "SELECT stock, sum(buy),sum(sell) FROM   lsy_bitcoin WHERE time <= date_add('$lasttime',interval + 60 minute ) 
            AND time >= '$lasttime' AND stock = '".$row['stock']."' group by stock";
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
      window.setTimeout('window.location.reload()',2000); //60초마다 새로고침
    </script>
    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>