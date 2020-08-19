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
	$pv = $_POST['pv'];
	$totalpv = $_POST['totalpv'];
	
	//จัดรูปแบบวันที่
	$datepicker1f = explode("-", $datepicker1);
	$date1 = $datepicker1f[2] . $datepicker1f[1] . $datepicker1f[0]; 	
	$datepicker2f = explode("-", $datepicker2);
	$date2 = $datepicker2f[2] . $datepicker2f[1] . $datepicker2f[0]; 

	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="utf-8">
<title>SumOfProvice</title>
</head>

<body >
  
  <table class="table table-striped table-hover table-bordered" style="font-family:BrowalliaUPC, AngsanaUPC, 'Angsana New', 'Browallia New', 'Cordia New', CordiaUPC; font-size:22px;">
  	<caption>จังหวัด <?=$pv?></caption>
  	<thead>
    	<tr>
      		<th><? if($pv != 'อื่นๆ'){ ?>อำเภอ<? }else{ ?> ชื่อจังหวัด <? } ?></th>
      		<th style="text-align:right; color:#06C;">ยอดขาย</th>
            <th style="text-align:center;">%</th>
    	</tr>
  	</thead>
    <tbody>
	<?
		
		include "Connections/connect_mysql.php";
		
		if ($slbrch == 2 && $pv=='กรุงเทพฯ' ){
			$pvname = 'mtbkk_tb';
		}else if($slbrch == 2 && $pv=='กาญจนบุรี'){
			$pvname = 'mtknb_tb';
		}else if($slbrch == 2 && $pv=='นครปฐม'){
			$pvname = 'mtnpt_tb';
		}else if($slbrch == 2 && $pv=='ราชบุรี'){
			$pvname = 'mtrab_tb';
		}else if($slbrch == 2 && $pv=='สุพรรณบุรี'){
			$pvname = 'mtspb_tb';
		}else if($slbrch == 2 && $pv=='อื่นๆ'){
			$pvname = 'mtnon_tb';
		}//if
			
		if ($slbrch == 3 && $pv=='กรุงเทพฯ' ){
			$pvname = 'y1bkk_tb';
		}else if($slbrch == 3 && $pv=='กาญจนบุรี'){
			$pvname = 'y1knb_tb';
		}else if($slbrch == 3 && $pv=='นครปฐม'){
			$pvname = 'y1npt_tb';
		}else if($slbrch == 3 && $pv=='ราชบุรี'){
			$pvname = 'y1rab_tb';
		}else if($slbrch == 3 && $pv=='สุพรรณบุรี'){
			$pvname = 'y1spb_tb';
		}else if($slbrch == 3 && $pv=='อื่นๆ'){
			$pvname = 'y1non_tb';
		}//if

		if ($slbrch == 5 && $pv=='กรุงเทพฯ' ){
			$pvname = 'y6bkk_tb';
		}else if($slbrch == 5 && $pv=='กาญจนบุรี'){
			$pvname = 'y6knb_tb';
		}else if($slbrch == 5 && $pv=='นครปฐม'){
			$pvname = 'y6npt_tb';
		}else if($slbrch == 5 && $pv=='ราชบุรี'){
			$pvname = 'y6rab_tb';
		}else if($slbrch == 5 && $pv=='สุพรรณบุรี'){
			$pvname = 'y6spb_tb';
		}else if($slbrch == 5 && $pv=='อื่นๆ'){
			$pvname = 'y6non_tb';
		}//if
		
		if ($slbrch == 6 && $pv=='กรุงเทพฯ' ){
			$pvname = 'y7bkk_tb';
		}else if($slbrch == 6 && $pv=='กาญจนบุรี'){
			$pvname = 'y7knb_tb';
		}else if($slbrch == 6 && $pv=='นครปฐม'){
			$pvname = 'y7npt_tb';
		}else if($slbrch == 6 && $pv=='ราชบุรี'){
			$pvname = 'y7rab_tb';
		}else if($slbrch == 6 && $pv=='สุพรรณบุรี'){
			$pvname = 'y7spb_tb';
		}else if($slbrch == 6 && $pv=='อื่นๆ'){
			$pvname = 'y7non_tb';
		}//if

			if ($pv != 'อื่นๆ'){		
				$sql = " SELECT {$pvname}.Amphur, Sum({$pvname}.NetAmnt) AS SumOfNetAmnt";
				$sql .= " FROM {$pvname}";
				$sql .= " WHERE ((({$pvname}.DocuDate) Between '" . $date1 . "' And '" . $date2 . "'))";
				$sql .= " GROUP BY {$pvname}.Amphur;";
			}else{
				$sql = " SELECT {$pvname}.Province, Sum({$pvname}.NetAmnt) AS SumOfNetAmnt";
				$sql .= " FROM {$pvname} ";
				$sql .= " WHERE ((({$pvname}.DocuDate) Between '" . $date1 . "' And '" . $date2 . "'))";
				$sql .= " GROUP BY {$pvname}.Province; ";
			}
			
			$result = mysql_query($sql) or die(mysql_error());
			while($record=mysql_fetch_array($result)){
				if($pv != 'อื่นๆ'){ 
					$amphur = $record['Amphur'];
				}else{
					if($record['Province']){
						$amphur = $record['Province'];
					}else{
						$amphur = 'Cash Sales';	
					}
				}
				$sumnetamnt = $record['SumOfNetAmnt'];

?>

    	<tr>
        	<td><?=iconv('tis-620','utf-8',$amphur)?></td>
            <td style="text-align:right; color:#06C;"><?=number_format($sumnetamnt,2,'.',',')?></td>
            <td><?=number_format(($sumnetamnt*100)/$totalpv,1,'.',',')?> %</td>
        </tr>

<?	

			}	//while			
		
		mysql_close($c);

?>
        
    </tbody>
    <tfoot>
    	<tr>
        	<th style="text-align:right;">รวม</th>
            <th style="text-align:right;"><?=number_format($totalpv,2,'.',',')?></th>
            <th></th>
        </tr>
    </tfoot>
  </table>
  
</body>
</html>

