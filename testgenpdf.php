<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>html2pdf</title>
<body>

<div id="content" style = "width: 100px">
     
            <div id = "name" style="float:right">
				<div id ="rey"> Rey </div>
				<div id ="norbert"> norbert </div>
			</div>
			<div id = "age" style="float:left; width:50px">age</div>

</div>

<div id = "button" style ="margin-top:50px">
<button id="cmd" onclick ="run()">generate PDF</button>
</div>
<!-- <script src="C:\Users\besmonte\Desktop\for Practice\jspdf.debug.js"></script> -->
<script type="text/javascript" src="dist/jspdf.debug.js"></script>
<!-- <script src="C:\Users\besmonte\Desktop\for Practice\jquery.min.js"></script> -->
<script src="jquery.js"></script>
<script src="script.js"></script>
<script src="script.responsive.js"></script>

<script lang="javascript" type="text/javascript">


function run()
 {
    var pdf = new jsPDF('p', 'pt', 'letter'),
    source = $('#content')[0],
    margins = {
        top: 40,
        bottom: 40,
        left: 40,
        right: 40,
        width: 522
    };

pdf.fromHTML(
        source,
        margins.left,
        margins.top,
        {
        'width': margins.width 
        },
        function (dispose) {
            pdf.save('Test.pdf');
        },
        margins
   );
};


</script>

</body>
</html>