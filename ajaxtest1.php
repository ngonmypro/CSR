<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

$(document).ready(function(){
	
	//$(selector).load(URL,data,callback);
	//$("#div1").load("demo_test.txt");
	//$("#div1").load("demo_test.txt #p1");
	
	//ตัวอย่างที่ 1 ดึงข้อมูลมาแสดงใน Div1
   // $("button").click(function(){
     //   $("#div1").load("demo_test.txt");
    //});
	
	//ตัวอย่างที่ 2 ดึงข้อมูลมาแสดงใน div1 และ ตรวจสอบผลลัพธ์ที่ส่งกลับมา
	$("button").click(function(){
    $("#div1").load("demo_test.txt", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            alert("External content loaded successfully!");
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
	
});
});

</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

</body>
</html>