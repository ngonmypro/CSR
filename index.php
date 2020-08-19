<?
	session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	
	include "Connections/create_new_salereport_db.php";
	include "Connections/create_new_salereport_tb.php";
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head><!-- Created by Artisteer v4.1.0.59688 -->

    <meta charset="utf-8">
    <title>Sale Reporting</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = yes, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
    
     <!-- // เรียกใช้ Bootstrap stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet"  />
    
     <!-- // เรียกใช้ Bootstrap javascript -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    
    <!--  // กำหนด favicon // -->
    <link rel="shortcut icon" href="images/favicon.ico">
    
  <!-- // เรียกใช้ jquery ui //  -->
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> -->
  
   <link rel="stylesheet" href="codejquery/jquery-ui.css"> 
   <link rel="stylesheet" href="codejquery/style.css"> 
   <script src="codejquery/jquery-1.12.4.js"></script>
   <script src="codejquery/jquery-ui.js"></script>
   <!-- <script src="codejquery/jquery.min.js"></script> -->
   
   
  <!-- // เรียกใช้ jquery ui date picker // -->
  <script>
  $( function() {
	  
    $( "#datepicker1" ).datepicker({
	  dateFormat: "dd-mm-yy",
      showOtherMonths: true,
      selectOtherMonths: true
    });
	
	$( "#datepicker2" ).datepicker({
	  dateFormat: "dd-mm-yy",
      showOtherMonths: true,
      selectOtherMonths: true
    });
	
  } );
  </script>
  
   <!-- // เรียกใช้ javascript ajax -->
    <script src="ajax/ajax_framework.js"></script>
    <script src="ajax/function.js"></script>

<style>.art-content .art-postcontent-0 .layout-item-0 { background: ;  }
.art-content .art-postcontent-0 .layout-item-1 { padding: 10px;  }
.art-content .art-postcontent-0 .layout-item-2 { margin-top: 20px;margin-bottom: 0px;  }
.art-content .art-postcontent-0 .layout-item-3 { color: #262626; background:  url('images/a242b.png') no-repeat scroll; padding: 0px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style>

</head>
<body onLoad="maxWindow();" id="target">

	<div class="dropdown" style="margin-left:10px; margin-right:10px; background-color:transparent; background:none;">
  		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        Help &nbsp;
        <span class="caret"></span>
        </button>
  		<ul class="dropdown-menu">
    		<li><a href="javascript:showpdf();">Manual (คู่มือการใช้งาน)</a></li>
            <li class="divider"></li>
    		<li><a data-toggle="modal" href="#myModal">About (เกี่ยวกับโปรแกรม)</a></li>
  		</ul>
	</div>

<div id="art-main">
<div class="art-layout-wrapper clearfix">
	<div class="art-content-layout">
    	<div class="art-content-layout-row">
        	<div class="art-layout-cell art-content clearfix">
            <article class="art-post art-article">                    
                <div class="art-postcontent art-postcontent-0 clearfix">
                <div class="art-content-layout layout-item-0">
    				<div class="art-content-layout-row" id="content">
      					<div class="art-layout-cell layout-item-1" style="width: 100%" >
                        <div style="float:left;"><img src="images/34_64x64.png" width="64" height="64" ></div>
        					<div>
                        		<div>
                                	<h3 style="font-size:30px;">&nbsp;&nbsp;Cash SALe Reporting </h3>
                                    <h4 style="font-family:BrowalliaUPC, AngsanaUPC; position: relative; top:-25px; left:85px;">โปรแกรมแสดงยอดขายเงินสดแบ่งตามที่อยู่ลูกค้า-บัตรสมาชิก</h5>
                                </div>
                                <div class="container-fluid" style=" position:relative; top:-35px;"> <!-- ความกว้าง แบบยืดหยุ่น -->
									<div class="row-fluid" style="float:left; position:relative;">
                                    <div class="form-inline" style="padding-left:15px;">
                                	&nbsp;&nbsp;&nbsp;Branch : <select style="width:auto;" id="slbrch">
                                      <option value="0">-- เลือกสาขา --</option>	
                                	  <option value="2">สำนักงานใหญ่ (MT)</option>
                                	  <option value="3">สาขา ท่าม่วง (Y1)</option>
                                	  <option value="5">สาขา นครปฐม (Y6)</option>
                                	  <option value="6">สาขา นครปฐม (Y7)</option>
                                	</select>
                                    &nbsp;&nbsp;&nbsp; From: <input type="text" placeholder="จากวันที่" id="datepicker1" style="text-align:center;">  
                                    To: <input type="text" placeholder="ถึงวันที่" id="datepicker2" style="text-align:center;">
                                    &nbsp;&nbsp;&nbsp;<button class="art-button" type="button" onClick="schsale();showchart1();"><i class="icon-play"></i> Search Data</button>
                                    <hr>
                                    </div>
                                    </div>
                                </div>
                            </div>
    					</div>
   				  </div>
				</div>
                
				<div class="art-content-layout" style=" position:relative; top:-30px;">
    				<div class="art-content-layout-row" id="mycontent">
        				<div class="art-layout-cell layout-item-1" style="width: 100%;" >
        				 <!-- <h1>Our Quality</h1> -->
       					 <div id="m1" style="width:auto; height:500px;"></div>
                         <div style="float:left; width:auto; margin-left:30px; position:relative;" id="a1"></div>
                         <div id="a2" style=" position:relative; left:20px; height:400px; width:40%;"></div>
                         <div id="a3" style=" position:relative;margin-left:30px;float:left; width:auto;"></div>
                         <div id="a4" style=" position:relative;left:20px; height:400px; width:70%;"></div>
                         <div><!-- <button id="export2pdf" onClick="exportpiechart();">Export to PDF</button> -->
    					</div>
                        <div id="m1" style="margin-left:20px;"></div>
                  	</div>
				</div>
				</div>
			</article>
			</div>
       	</div>
   	</div>
</div>
</div>
<footer class="art-footer clearfix">
  <div class="art-footer-inner"></div>
</footer>
</div>

<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="js/highcharts.js"></script>
<!--<script src="https://code.highcharts.com/highcharts-3d.js"></script> -->
<script src="js/highcharts-3d.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<script src="js/modules/exporting.js"></script>

<script type="text/javascript" src="dist/jspdf.debug.js"></script>

<!-- Modal  -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content"> 
      
       <div class="modal-header">
       	<button type="button" class="close" data-dismiss="modal">Close &times;</button>
        <h4 class="modal-title"><img src="images/34_64x64.png" width="64" height="64" > &nbsp; Cash Sales Reporting (CSR)</h4>
       </div>
      
       <div class="modal-body">
       
        <p> Version 1.0  || Build 992016.</p>
        <p> &copy;2016-2020 YongHouse Inc.,</p>
        <p> Released by IT Team,</p>
        <p> ALL RIGHTS RESERVED.</p>
		<br>
        <p>Support Tel: 501 </p>
       </div>
      <!-- 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> 
      -->
   </div>
 </div>  
</div>
<!-- Modal -->


</body>
</html>