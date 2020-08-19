<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
div {padding:20px;color:#FFF;}
/* #wrapper {width:400px;} */
#wrapper {width:400px;height:2000px;}
#div-1 {background:#000;}
/* #div-2 {background:#C0C;} */
#div-2 {background:#C0C;position:relative;}
/* #div-2 {background:#C0C;position:relative;top:30px;left:-20px}  relative1 */
/* #div-2 {background:#C0C;position:relative;bottom:10px;right:20px;}  relative2 */
/* #div-2 {background:#C0C;position:absolute;top:0px;right:0px;}  absolute */
#div-3 {background:#666;}
/* defaule 
 #div-a {background:#339;} */
/* static 
#div-a {background:#339;position:static;} */
#div-a {background:#339;position:relative;}
#div-b {background:#66C;}
/* #div-b {background:#66C;position:absolute;top:0px;right:0px;}  absolute2 */
/* #div-b {background:#66C;position:absolute;top:0px;right:0px;}  absolute3 */
#div-b {background:#66C;position:fixed;top:0px;right:0px;} /* fixed */
#div-c {background:#99F;}
</style>

</head>

<body>
<!--
static นั้นถือเป็นค่าเริ่มต้นสำหรับ position เลย ดังนั้นเราจะตั้งค่า position หรือไม่ ค่า position ก็จะเป็น static อยู่แล้ว แต่ผมจะลองใส่ค่าให้ดูเป็นตัวอย่างว่า เว็บจะแสดงผลออกมาเป็นแบบไหน
-->
<!--
relative นั้นจะมีลักษณะคล้าย ๆ กับ static ต่างกันตรงที่ relative นั้น เราสามารถใช้ top left bottom right ในการกำหนดตำแหน่งได้ กับ element ที่อยู่ก่อนหน้า
-->
<!--
absolute นั้นจะไม่สนใจ element ก่อนหน้า และจะพาตัวเองไปยังจุดนั้นเลย
แล้วถ้าเราอยากให้ #div-b มาอยู่ในกรอบ #div-2 ก็ทำได้โดยการใส่ position : relative ให้ #div-2 เหมือนเป็นการกำหนดกรอบให้มัน
-->
<!-- 
fixed นั้นทำหน้าที่คล้าย absolute เลย แต่มีแตกต่างกันที่ fixed นั้นจะใช้กับ relative เพื่อกำหนดกรอบของมันไม่ได้ และจะตรึงตัวเองอยู่ตรงนั้นเสมอ ดูตัวอย่างน่าจะเข้าใจง่ายกว่าครับ อย่างเช่น
-->
<div id="wrapper">
<div id="div-1">div-1</div>
<div id="div-2">
<div id="div-a">div-a</div>
<div id="div-b">div-b</div>
<div id="div-c">div-c</div>
</div>
<div id="div-3">div-3</div>
</div>

</body>
</html>