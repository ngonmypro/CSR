// --- JavaScript Document --- //

window.onload = maxWindow;

function maxWindow() {
	window.moveTo(0, 0);
	window.resizeTo(screen.width, screen.height);
	window.focus();
	
    /*
	if (document.all) {
    	top.window.resizeTo(screen.availWidth, screen.availHeight);
    }
    else if (document.layers || document.getElementById) {
    	if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
        	top.window.outerHeight = screen.availHeight;
           	top.window.outerWidth = screen.availWidth;
        }
    }
	*/
}

function showscreen(){
	var windowWidth = 850;
	var windowHeight = 800;
	window.resizeTo(windowWidth,windowHeight);
	var xPos = (screen.width/2) - (windowWidth/2);
	var yPos = (screen.height/2) - (windowHeight/2);
	window.moveTo(xPos, yPos); 
	window.focus();
}

function checkKey(n){
  if (window.event.keyCode == 13){ //Enter
	  schstock();
  }else if(window.event.keyCode == 37){ //Left
	  //ChkKeyLeft(n,i)
  }else if(window.event.keyCode == 38){ //Up
	  //ChkKeyUp(n,i);
  }else if(window.event.keyCode == 39){ //Right
	  //ChkKeyRight(n,i);
  }else if(window.event.keyCode == 40){ //Down
	  //ChkKeyDown(n,i);
  }
}

function test(){
	alert('ok');	
}

function schsale(){
	
	var slbrch = $("#slbrch").val();
	var datepicker1 = $("#datepicker1").val();
	var datepicker2 = $("#datepicker2").val();
	
	if((slbrch == '0') || (datepicker1 == '') || (datepicker2 == '') || (datepicker1>datepicker2)){
		alert ("Not selected branches Or Not Enter dates !!!");
	}else{
		//alert(slbrch + "," + datepicker1 + "," + datepicker2 );
		//document.getElementById('a1').innerHTML = " Loading..." + "<img src='images/preloader-01.gif' />";
		$("#a1").html(" Loading..." + "<img src='images/preloader-01.gif' />");
		$("#a2").html("");
		$("#a3").html("");
		$("#a4").html("");
		$("#m1").html("");
		$("#m1").hide();
		$.post(
			"sumofprovice.php",
		 	{ 
		 		slbrch: slbrch,
				datepicker1: datepicker1,
				datepicker2: datepicker2
		 	}, 
		 	function(data){
				$("#a1").html(data);
		 	}
		);
		//showchart
		//showchart1(slbrch,datepicker1,datepicker2);	
	}
}

function showchart1(){
	
	var slbrch = $("#slbrch").val();
	var datepicker1 = $("#datepicker1").val();
	var datepicker2 = $("#datepicker2").val();
	
	if((slbrch == '0') || (datepicker1 == '') || (datepicker2 == '') || (datepicker1>datepicker2)){
		//
	}else{
		$("#a2").html("");
		$("#m1").html("");
		$("#m1").hide();
		$.post(
			"chart1.php",
			{
				slbrch : slbrch,
				datepicker1: datepicker1,
				datepicker2: datepicker2	
			},
			function (data){
				$("#a2").html(data);	
			}
		);
		
	}
}

function schsumdistrict(pv,totalpv){
	
	var slbrch = $("#slbrch").val();
	var datepicker1 = $("#datepicker1").val();
	var datepicker2 = $("#datepicker2").val();
	
	if((slbrch == '0') || (datepicker1 == '') || (datepicker2 == '') || (datepicker1>datepicker2)){
		//alert ("Not selected branches Or Not Enter dates !!!");
	}else{
		$("#a3").html(" Loading..." + "<img src='images/preloader-01.gif' />");
		$("#a4").html("");
		$("#m1").html("");
		$("#m1").hide();
		$.post(
			"sumofdistrict.php",
		 	{ 
		 		slbrch: slbrch,
				datepicker1: datepicker1,
				datepicker2: datepicker2,
				pv: pv,
				totalpv: totalpv
		 	}, 
		 	function(data){
				$("#a3").html(data);
		 	}
		);
	}
}

function showchart2(pv,totalpv){
	
	var slbrch = $("#slbrch").val();
	var datepicker1 = $("#datepicker1").val();
	var datepicker2 = $("#datepicker2").val();
	
	if((slbrch == '0') || (datepicker1 == '') || (datepicker2 == '') || (datepicker1>datepicker2)){
		//alert ("Not selected branches Or Not Enter dates !!!");
	}else{
		//$("#a4").html(" Loading..." + "<img src='images/preloader-01.gif' />");
		$("#m1").html("");
		$("#m1").hide();
		$.post(
			"chart2.php",
		 	{ 
		 		slbrch: slbrch,
				datepicker1: datepicker1,
				datepicker2: datepicker2,
				pv: pv,
				totalpv: totalpv
		 	}, 
		 	function(data){
				$("#a4").html(data);
		 	}
		);
	}	
}

function showpdf(){
	$("#m1").show();
	$("#m1").html(" Loading..." + "<img src='images/preloader-01.gif' />");
	$("#a1").html("");
	$("#a2").html("");
	$("#a3").html("");
	$("#a4").html("");
	$("#m1").html("<iframe src='Manual.pdf' style='width:900px; height:550px;' frameborder='0'></iframe>");
}

function exportpiechart(){
	
	var chart = $('#container').highcharts();
	chart.exportChart({
		type: 'image/png',
    	filename: 'my_chart_pie'
	});
	
	setTimeout("",3000);
	 
	exportbarchart();		
}

function exportbarchart(){
	
	var chart2 = $('#container2').highcharts();
	chart2.exportChart({
		type: 'image/png',
    	filename: 'my_chart_bar'
	});
	
}

/*
function schstock(){
	var sj = document.getElementById('sj');
	var sb = document.getElementById('sb');
	var st = document.getElementById('st');
	var data = 'sj=' + sj.value + '&sb=' + sb.value + '&st=' + st.value; 
	//alert(data);
	if(st.value != ''){
		if(sb.value=='1'){
			document.getElementById('a2').innerHTML = " Loading..." + "<img src='images/preloader-01.gif' />";
			ajaxLoad('post', 'schstock.php', data,'a2');	
		}
		if(sb.value=='2'){
			document.getElementById('a2').innerHTML = " Loading..." + "<img src='images/preloader-01.gif' />";
			ajaxLoad('post', 'schstockbyname2.php', data,'a2');	
		}
	}else{
		alert("กรุณาตรวจสอบ ข้อมูลคำค้นหา ให้ครบถ้วน");
		st.focus();
		st.select();	
	}
}

function toggledetail(){
	var dt1 = document.getElementById('sd1');
	if(dt1.style.display == 'block'){
		dt1.style.display = 'none';
	}else{
		dt1.style.display = 'block';
	}
}

function toggledetail2(numi){
	var nametbody = 'sd' + numi;
	var nmaediv = 'sdt' + numi;
	var dt2 = document.getElementById(nametbody);
	var dt3 = document.getElementById(nmaediv);
	if(dt2.style.display == 'block'){
		dt2.style.display = 'none';
	}else{
		dt2.style.display = 'block';
		var sj = document.getElementById('sj');
		var sb = document.getElementById('sb');
		var st = document.getElementById('st');
		var data = 'sj=' + sj.value + '&sb=' + sb.value + '&st=' + st.value; 
		if(sb.value=='2'){
			dt3.innerHTML = " Loading..." + "<img src='images/preloader-01.gif' />";
			ajaxLoad('post', 'detailstock.php', data,nmaediv);	
		}
		
	}
}

function selectcode(containerid){
       if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
        }
}

*/






// --- End javascript --- //