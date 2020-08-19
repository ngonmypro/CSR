<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
 <meta charset="utf-8">
<title>ajax ของง่ายถ้าใช้ jQuery</title>
 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="codejquery/jquery.min.js"></script>
<script type="text/javascript">


// ทดสอบการใช้ GET
function getData(){
	$.get("get.php", { data: $("#data1").val()}, 
		function(data){
			$("#divGetData").html(data);
		}
	);
}
 
// ทดสอบการใช้ POST
function postData(){
	$.post("post.php", { data: $("#data2").val()}, 
		function(data){
			$("#divPostData").html(data);
		}
	);
}
 
// ทดสอบการใช้ LOAD
function loadData(){
	$("#divLoadData").load("load.php?data="+$("#data3").val());
}
 
 
</script>
 
</head>
 
<body>
<form id="form1" name="form1" method="post" action="">
  <div id="divGetData"></div>
  <input name="data1" type="text" id="data1" size="40" />
  <input type="button" name="Button1" id="button1" value="Get" onclick="getData()" />
</form>
 
<hr />
 
<form id="form2" name="form2" method="post" action="">
  <div id="divPostData"></div>
  <input name="data2" type="text" id="data2" size="40" />
  <input type="button" name="Button2" id="button2" value="Post" onclick="postData()" />
</form>
 
<hr />
 
<form id="form3" name="form3" method="post" action="">
  <div id="divLoadData"></div>
  <input name="data3" type="text" id="data3" size="40" />
  <input type="button" name="Button3" id="button3" value="Load" onclick="loadData()" />
</form>
 
</body>
</html>