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
	
	//ชื่อสาขา
	$brchname = getbechname($slbrch);
	
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
	

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="utf-8">
<title>Highcharts</title>

	<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>  -->
	<style type="text/css">
	/*  ${demo.css} */
	</style>
	<script type="text/javascript">
	
	$(function () {

    $('#container').highcharts({
		
        chart: {           
        	
			backgroundColor:'transparent',

            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
			
        },
        title: {
            text: '<p style="font-size:18px;">กราฟแสดง % ยอดขายเงินสด สาขา <?=$brchname?></p> <br> <p style="font-size:14px;">ระหว่างวันที่ <?=$datepicker1?> ถึงวันที่ <?=$datepicker2?></p>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
		
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                },
				showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Cash sales',
			
			point:{
                  events:{
                      click: function (event) {
                         
						  if (this.options.name == 'กรุงเทพฯ'){
						  	 schsumdistrict(this.options.name,<?=$sumbkk?>);
							 showchart2(this.options.name,<?=$sumbkk?>);
						  }else if (this.options.name == 'กาญจนบุรี'){
							 schsumdistrict(this.options.name,<?=$sumknb?>);
							 showchart2(this.options.name,<?=$sumbkk?>);  
						  }else if (this.options.name == 'นครปฐม'){
							  schsumdistrict(this.options.name,<?=$sumnpt?>);
							  showchart2(this.options.name,<?=$sumbkk?>);
						  }else if (this.options.name == 'ราชบุรี'){
							  schsumdistrict(this.options.name,<?=$sumrab?>);
							  showchart2(this.options.name,<?=$sumbkk?>);
						  }else if (this.options.name == 'สุพรรณบุรี'){
							  schsumdistrict(this.options.name,<?=$sumspb?>);
							  showchart2(this.options.name,<?=$sumbkk?>);
						  }else if (this.options.name == 'อื่นๆ'){
							  schsumdistrict(this.options.name,<?=$sumnon?>);
							  showchart2(this.options.name,<?=$sumbkk?>);  
						  }
						  
                      }
                  }
              },          
		
            data: [
			    /*{
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },*/
                ['กรุงเทพฯ', <?=$sumbkkpct?>],
				['สุพรรณบุรี', <?=$sumspbpct?>],
				['กาญจนบุรี', <?=$sumknbpct?>],
                ['นครปฐม', <?=$sumnptpct?>],
                ['ราชบุรี', <?=$sumrabpct?>],
				['อื่นๆ', <?=$sumnonpct?>]
            ]
        }]
    });
	
});

</script>
    
    
</head>

<body>
    
<div id="container" style="height:100%; width:100%; position:absolute; left:220px; top:-20px;"></div>

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

<?
function getbechname($bc){
	
	if ($bc == 2){
		$z = 'สำนักงานใหญ่ (MT)';	
	}else if ($bc == 3){
		$z = 'ท่าม่วง (Y1)';
	}else if ($bc == 5){
		$z = 'นครปฐม (Y6)';
	}else if ($bc == 6){
		$z = 'นครปฐม (Y7)';
	}
	
	return $z;
}
?>
