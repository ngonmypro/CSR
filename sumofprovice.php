<?

	session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย

	//กำหนดวันที่ปัจจุบัน
	$date_today=date("Y-m-d");
	$time_today=date("H:i:s");
	$date_time=date("Y-m-d H:i:s");
	$yearnow =  date("Y");
	$monthnow = date("m");
	$daynow = date("d");
	$datenow = $yearnow .  $monthnow . $daynow;
	
	//รับค่าจาก ajax เพื่อมาค้นหา
	$slbrch = $_POST['slbrch'];
	$datepicker1 = $_POST['datepicker1'];
	$datepicker2 = $_POST['datepicker2'];
	
	//จัดรูปแบบวันที่
	$datepicker1f = explode("-", $datepicker1);
	$date1 = $datepicker1f[2] . $datepicker1f[1] . $datepicker1f[0]; 	
	$datepicker2f = explode("-", $datepicker2);
	$date2 = $datepicker2f[2] . $datepicker2f[1] . $datepicker2f[0]; 

	//ดึงผลลัพธ์
	
	$sumbkk = getsumbkk($slbrch,$date1,$date2);
	$sumknb = getsumknb($slbrch,$date1,$date2);
	$sumnpt = getsumืnpt($slbrch,$date1,$date2);
	$sumrab = getsumืrab($slbrch,$date1,$date2);
	$sumspb = getsumืspb($slbrch,$date1,$date2);
	$sumnon = getsumืnon($slbrch,$date1,$date2);
	$sumtotal =  $sumbkk + $sumknb + $sumnpt + $sumrab + $sumnon;   
	
	
	//สรุปผลเป็น %
	// $sumtotal = 100% ถ้า $sumnon =  ($sumnom * 100) / $sumtotal
	$sumtotal2 = 0;
	
	if ($sumbkk>0){
		$sumbkkpct = ($sumbkk*100)/$sumtotal;
	}else{
		$sumbkkpct = 0;
	}
	if ($sumknb>0){
		$sumknbpct = ($sumknb*100)/$sumtotal;	
	}else{
		$sumknbpct = 0;
	}
	if ($sumnpt>0){
		$sumnptpct = ($sumnpt*100)/$sumtotal;	
	}else{
		$sumknbpct = 0;
	}
	if ($sumrab>0){
		$sumrabpct = ($sumrab*100)/$sumtotal;	
	}else{
		$sumrabpct = 0;
	}
	if ($sumspb>0){
		$sumspbpct = ($sumspb*100)/$sumtotal;	
	}else{
		$sumspbpct = 0;
	}
	if ($sumnon>0){
		$sumnonpct = ($sumnon*100)/$sumtotal;	
	}else{
		$sumnonpct = 0;
	}

	$sumtotal2 = $sumbkkpct + $sumknbpct + $sumnptpct +  $sumrabpct + $sumspbpct + $sumnonpct;
	
	if($sumtotal2 > 100){
		if ($sumbkkpct>0){
			$sumbkkpct = ($sumbkkpct*100)/$sumtotal2;
		}else{
			$sumbkkpct = 0;
		}
		if ($sumknbpct>0){
			$sumknbpct = ($sumknbpct*100)/$sumtotal2;	
		}else{
			$sumknbpct = 0;
		}
		if ($sumnptpct>0){
			$sumnptpct = ($sumnptpct*100)/$sumtotal2;	
		}else{
			$sumknbpct = 0;
		}
		if ($sumrabpct>0){
			$sumrabpct = ($sumrabpct*100)/$sumtotal2;	
		}else{
			$sumrabpct = 0;
		}
		if ($sumspbpct>0){
			$sumspbpct = ($sumspbpct*100)/$sumtotal2;	
		}else{
			$sumspbpct = 0;
		}
		if ($sumnonpct>0){
			$sumnonpct = ($sumnonpct*100)/$sumtotal2;	
		}else{
			$sumnonpct = 0;
		}

	}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="utf-8">
<title>SumOfProvice</title>
</head>

<body >
  
  <table class="table table-striped table-hover table-bordered" style="font-family:BrowalliaUPC, AngsanaUPC, 'Angsana New', 'Browallia New', 'Cordia New', CordiaUPC; font-size:22px;" id="datatable">
  	<thead>
    	<tr>
      		<th>จังหวัด</th>
      		<th style="text-align:right; color:#06C;">ยอดขาย</th>
            <th style="text-align:center;">%</th>
    	</tr>
  	</thead>
    <tbody>
    	<tr>
        	<td>กาญจนบุรี</td>
            <td style="text-align:right; color:#06C;"><?=number_format($sumknb,2,'.',',')?></td>
            <td><?=number_format($sumknbpct,1,'.',',')?> %</td>
        </tr>
    	<tr>
        	<td>กรุงเทพฯ</td>
            <td style="text-align:right; color:#06C;"><?=number_format($sumbkk,2,'.',',')?></td>
            <td><?=number_format($sumbkkpct,1,'.',',')?> %</td>
        </tr>
    	<tr>
        	<td>นครปฐม</td>
            <td style="text-align:right; color:#06C;"><?=number_format($sumnpt,2,'.',',')?></td>
            <td><?=number_format($sumnptpct,1,'.',',')?> %</td>
        </tr>
    	<tr>
        	<td>ราชบุรี</td>
            <td style="text-align:right; color:#06C;"><?=number_format($sumrab,2,'.',',')?></td>
            <td><?=number_format($sumrabpct,1,'.',',')?> %</td>
        </tr>
    	<tr>
        	<td>สุพรรณบุรี</td>
            <td style="text-align:right; color:#06C;"><?=number_format($sumspb,2,'.',',')?></td>
            <td><?=number_format($sumspbpct,1,'.',',')?> %</td>
        </tr>
    	<tr>
        	<td>อื่นๆ</td>
            <td style="text-align:right; color:#06C;"><?=number_format($sumnon,2,'.',',')?></td>
            <td><?=number_format($sumnonpct,1,'.',',')?> %</td>
        </tr>

    </tbody>
    <tfoot>
    	<tr>
        	<th style="text-align:right;">รวม</th>
            <th style="text-align:right;"><?=number_format($sumtotal,2,'.',',')?></th>
            <th></th>
        </tr>
    </tfoot>
  </table>
  
</body>
</html>

<?

function getsumbkk($b,$d1,$d2) {

	include "Connections/connect_mysql.php";
	
	if($b==2){
		
		//mtbkk_tb
		
		$sql = " SELECT Sum(mtbkk_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM mtbkk_tb ";
		$sql .= " WHERE (((mtbkk_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==3){
		
		//y1bkk_tb

		$sql = " SELECT Sum(y1bkk_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y1bkk_tb ";
		$sql .= " WHERE (((y1bkk_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}else if($b==5){
		
		//y6bkk_tb
		
		$sql = " SELECT Sum(y6bkk_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y6bkk_tb ";
		$sql .= " WHERE (((y6bkk_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==6){
		
		//y7bkk_tb

		$sql = " SELECT Sum(y7bkk_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y7bkk_tb ";
		$sql .= " WHERE (((y7bkk_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}
	
   mysql_close($c);
   
   if($z){ 
		$z = $z;
	}else{
		$z = 0.00;
	}
   return $z;
   
}

function getsumknb($b,$d1,$d2) {

	include "Connections/connect_mysql.php";
	
	if($b==2){
		
		//mtknb_tb

		$sql = " SELECT Sum(mtknb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM mtknb_tb ";
		$sql .= " WHERE (((mtknb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}else if($b==3){
		
		//y1knb_tb

		$sql = " SELECT Sum(y1knb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y1knb_tb ";
		$sql .= " WHERE (((y1knb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}else if($b==5){
		
		//y6knb_tb

		$sql = " SELECT Sum(y6knb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y6knb_tb ";
		$sql .= " WHERE (((y6knb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	
	}else if($b==6){
		
		//y7knb_tb

		$sql = " SELECT Sum(y7knb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y7knb_tb ";
		$sql .= " WHERE (((y7knb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}
	
   mysql_close($c);
   if($z){ 
		$z = $z;
	}else{
		$z = 0.00;
	}
   return $z;
   
}

function getsumืnpt($b,$d1,$d2) {

	include "Connections/connect_mysql.php";
	
	if($b==2){
		
		//mtnpt_tb

		$sql = " SELECT Sum(mtnpt_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM mtnpt_tb ";
		$sql .= " WHERE (((mtnpt_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==3){
		
		//y1npt_tb

		$sql = " SELECT Sum(y1npt_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y1npt_tb ";
		$sql .= " WHERE (((y1npt_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}else if($b==5){
		
		//y6npt_tb

		$sql = " SELECT Sum(y6npt_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y6npt_tb ";
		$sql .= " WHERE (((y6npt_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==6){
		
		//y7npt_tb

		$sql = " SELECT Sum(y7npt_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y7npt_tb ";
		$sql .= " WHERE (((y7npt_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}
	
   mysql_close($c);
   if($z){ 
		$z = $z;
	}else{
		$z = 0.00;
	}
   return $z;
   
}

function getsumืrab($b,$d1,$d2) {

	include "Connections/connect_mysql.php";
	
	if($b==2){
		
		//mtrab_tb

		$sql = " SELECT Sum(mtrab_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM mtrab_tb ";
		$sql .= " WHERE (((mtrab_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==3){
		
		//y1rab_tb

		$sql = " SELECT Sum(y1rab_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y1rab_tb ";
		$sql .= " WHERE (((y1rab_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
		
	}else if($b==5){
		
		//y6rab_tb

		$sql = " SELECT Sum(y6rab_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y6rab_tb ";
		$sql .= " WHERE (((y6rab_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==6){
		
		//y7rab_tb

		$sql = " SELECT Sum(y7rab_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y7rab_tb ";
		$sql .= " WHERE (((y7rab_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}
	
   mysql_close($c);
   if($z){ 
		$z = $z;
	}else{
		$z = 0.00;
	}
   return $z;
   
}

function getsumืspb($b,$d1,$d2) {

	include "Connections/connect_mysql.php";
	
	if($b==2){
		
		//mtspb_tb

		$sql = " SELECT Sum(mtspb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM mtspb_tb ";
		$sql .= " WHERE (((mtspb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}else if($b==3){
		
		//y1spb_tb

		$sql = " SELECT Sum(y1spb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y1spb_tb ";
		$sql .= " WHERE (((y1spb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}else if($b==5){
		
		//y6spb_tb

		$sql = " SELECT Sum(y6spb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y6spb_tb ";
		$sql .= " WHERE (((y6spb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==6){
		
		//y7spb_tb

		$sql = " SELECT Sum(y7spb_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y7spb_tb ";
		$sql .= " WHERE (((y7spb_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}
	
   mysql_close($c);
   if($z){ 
		$z = $z;
	}else{
		$z = 0.00;
	}
   return $z;
   
}

function getsumืnon($b,$d1,$d2) {

	include "Connections/connect_mysql.php";
	
	if($b==2){
		
		//mtnon_tb

		$sql = " SELECT Sum(mtnon_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM mtnon_tb ";
		$sql .= " WHERE (((mtnon_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
		
	}else if($b==3){
		
		//y1non_tb
		
		$sql = " SELECT Sum(y1non_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y1non_tb ";
		$sql .= " WHERE (((y1non_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}else if($b==5){
		
		//y6non_tb
		
		$sql = " SELECT Sum(y6non_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y6non_tb ";
		$sql .= " WHERE (((y6non_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
	
	}else if($b==6){
		
		//y7non_tb

		$sql = " SELECT Sum(y7non_tb.NetAmnt) AS SumOfNetAmnt";
        $sql .= " FROM y7non_tb ";
		$sql .= " WHERE (((y7non_tb.DocuDate) Between '" . $d1 . "' And '" . $d2 . "'))";
		$result = mysql_query($sql) or die(mysql_error());
		$record=mysql_fetch_array($result);
		$z = $record['SumOfNetAmnt'];
		
	}
	
   mysql_close($c);
   if($z){ 
		$z = $z;
	}else{
		$z = 0.00;
	}
   return $z;
   
}


?>
