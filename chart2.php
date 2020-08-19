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
	
	//ชื่อสาขา
	$brchname = getbechname($slbrch);
?>

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
			$count = 1;
			$cat_amphur = "";
			$data_value = "";
			$result = mysql_query($sql) or die(mysql_error());
			$num_rows = mysql_num_rows($result);
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
				$psum = $sumnetamnt;
				
				if ($count < $num_rows){
					$cat_amphur = $cat_amphur . "'" . $amphur . "'" . ",";
					$data_value = $data_value . $psum . ",";
				}else if($count = $num_rows){
					$cat_amphur = $cat_amphur . "'" . $amphur . "'";
					$data_value = $data_value . $psum;
				}
?>
<?	
			$count = $count + 1;

			}	//while			
		
		mysql_close($c);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
		
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
		<style type="text/css">
			/* ${demo.css} */
		</style>
		<script type="text/javascript">
		
$(function () {
    $('#container2').highcharts({
        chart: {
			backgroundColor:'transparent',
            type: 'column'
        },
        title: {
            text: 'กราฟแสดงยอดขายเงินสดแยกตามอำเภอ ในจังหวัด <?=$pv?>'
        },
        subtitle: {
            text: 'ระหว่างวันที่ <?=$datepicker1?> ถึงวันที่ <?=$datepicker2?>'
        },
        xAxis: {
            categories: [ <?=iconv('tis-620','utf-8',$cat_amphur)?> ],
			labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            },
            crosshair: true
        },
        yAxis: {  
            min: 0,
			//max: 100,
            title: {
                text: 'จำนวนเงิน (บาท)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.2f} บาท</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
			/*
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, { */
            name: 'ยอดขายเงินสด ',
            data: [ <?=$data_value?> ],
			dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.2f}' , // one decimal
				formatter: function() {
             		return  Highcharts.numberFormat(this.y, 2, '.');
         		},
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '8px',
                    fontFamily: 'Verdana, sans-serif'
                }
            },
				
				<? if($pv == 'กรุงเทพฯ'){ ?> color: '#6CF' <? } ?>
				<? if($pv == 'กาญจนบุรี'){ ?> color: '#53FF7E' <? } ?>
				<? if($pv == 'อื่นๆ'){ ?> color: '#FD55C2' <? } ?>
				<? if($pv == 'ราชบุรี'){ ?> color: '#7065F8' <? } ?>
				<? if($pv == 'นครปฐม'){ ?> color: '#F90' <? } ?>
				<? if($pv == 'สุพรรณบุรี'){ ?> color: '#666' <? } ?>
        }]
    });
});

		</script>
	</head>
    
<body>
<!-- <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->
<div id="container2" style="height:100%; width:100%;  position:absolute; left:350px; top:5px;"></div>

</body>
</html>
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