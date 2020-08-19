<html>
<head>
<title>PHP PDF</title>
</head>
<body>

<?php
	require('fpdf.php');
	
	class PDF extends FPDF
	{
		//Page header
		function Header()
		{	
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',30);
			//Logo
			//$this->Image('logo.png',10,8,33);
			//Move to the right
			$this->Cell(80);
			//Title
			$this->Cell(30,10,'My Title',1,0,'C');
			//Line break
			$this->Ln(30);
		}
		//Page footer
		function Footer()
		{
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			//Position at 1.5 cm from bottom
			$this->SetY(-15);
			//Page number
			$this->Cell(0,0,iconv( 'UTF-8','TIS-620','By... ยงเฮาส์ เข้าใจบ้านเข้าใจคุณ'),0,1,'L');
			$this->Cell(0,0,'Page '.$this->PageNo().'/{nb}',0,1,'C');
			$this->Cell(0,0,iconv( 'UTF-8','TIS-620','Create date : '.date("Y-m-d")),0,1,'R');
			//Line break
			$this->Ln(10);
		}
		
		//Colored table
		function FancyTable($header,$data)
		{
		
			$this->AddFont('angsa','','angsa.php');  //เพิ่ม font เข้าใช้งาน
			$this->SetFont('angsa','',14); //ตั้งค่าชื่อ font ที่ใช้งาน
			//Header
			$w=array(20,30,55,25,25,25);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
				$this->Ln();
			//Color and font restoration
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			//Data
			$fill=false;
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
				$this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
				$this->Cell($w[4],6,number_format($row[4]),'LR',0,'R',$fill);
				$this->Cell($w[5],6,number_format($row[5]),'LR',0,'R',$fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(array_sum($w),0,'','T');

		}
		
		
	}
	

	define('FPDF_FONTPATH','font/'); //กำหนดค่าตำแหน่งที่เก็บ font

	$pdf=new PDF(); //ต้องเป็น PDF ถ้าจะส่งออกรูปภาพ
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');  //เพิ่ม font เข้าใช้งาน
	$pdf->SetFont('angsa','',36); //ตั้งค่าชื่อ font ที่ใช้งาน
	
	//*** Insert Text ***//
	//for($i=1;$i<=200;$i++)
	//{
	//	$pdf->Cell(0,5,"Link ".$i." TEXT ข้อความ TEXT ข้อความ TEXT",0,1);
	//}
	
	//$pdf->SetDrawColor(0,80,180);
	//$pdf->SetFillColor(230,230,0); //พื้นหลังสีเหลือง
	//$pdf->SetTextColor(220,50,50);
	
	//Colors, line width and bold font
	
	$pdf->SetFillColor(255,0,0); //พื้นหลังสีแดง
	$pdf->SetTextColor(255);
	$pdf->SetDrawColor(128,0,0);
	
	//$pdf->SetLineWidth(.3);
	//$pdf->SetFont('','B');
	
	$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','สวัสดี ชาวไทย'),1,1,"C",true); //ใช้ฟังก์ชั่น iconv เปลี่ยนให้เป็นฟอร์น ภาษาไทย
	
	$pdf->Image('logo.png',20,5,33);   //Image('logo.png',10,8,33);
	
	$pdf->Ln(35); //ขึ้นหน้าใหม่
	
	//Column titles
	$header=array('CustomerID','Name','Email','Country Code','Budget','Used');
	//*** Load MySQL Data ***//
	$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
	$objDB = mysql_select_db("mydatabase");
	$strSQL = "SELECT * FROM customer";
	$objQuery = mysql_query($strSQL);
	$resultData = array();
	for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
		$result = mysql_fetch_array($objQuery);
		array_push($resultData,$result);
	}
	//************************//
	$pdf->Ln(70); //ขึ้นหน้าใหม่
	//Line break
	$pdf->Ln();
	//$pdf->Cell(0,5,'(end of excerpt)');
	$pdf->FancyTable($header,$resultData);
	
	$pdf->AddPage( 'L' ,'A4' );
	//*** Insert Text ***//
	for($i=1;$i<=200;$i++)
	{
		$pdf->Cell(0,5,"Link ".$i. iconv('utf-8','tis-620','TEXT ข้อความ TEXT ข้อความ TEXT'),0,1);
	}
	
	$pdf->AddPage( 'L' ,'A4' );
	$pdf->Image('my_chart_pie.png',20,30,150);
	
	$pdf->AddPage( 'L' ,'A4' );
	$pdf->Image('my_chart_bar.png',20,30,150);
	
	
	$pdf->Output("MyPDF/MyPDF.pdf","F");

?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>