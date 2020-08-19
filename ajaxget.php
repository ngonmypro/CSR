<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
	//$.get(URL,callback);
	
    $("button").click(function(){
        $.get("demo_test.php", function(data, status, xhr){
            //alert("Data: " + data + "\nStatus: " + status);
			$("#a1").html(status);
        });
    });
	
	//$.post(URL,data,callback);
$("#btnpost").click(function(){
    $.post("demo_test_post.php",
    {
        name: "Donald Duck",
        city: "Duckburg"
    },
    function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
		$("#a1").html(data);
    });
});
	
	//$(selector).post(URL,data,function(data,status,xhr),dataType)	
    $("#btngo").click(function(){
        var txt = $("#mytxt").val();
        $.post("demo_ajax_gethint.php", 
		{
			suggest: txt
		}, 
		function(result){
            $("#s1").html(result);
        });
    });

/*
function(data,status,xhr)	Optional. Specifies a function to run if the request succeeds
Additional parameters:
data - contains the resulting data from the request
status - contains the status of the request ("success", "notmodified", "error", "timeout", or "parsererror")
xhr - contains the XMLHttpRequest object
*/

/*
dataType	Optional. Specifies the data type expected of the server response.
By default jQuery performs an automatic guess.
Possible types:
"xml" - An XML document
"html" - HTML as plain text
"text" - A plain text string
"script" - Runs the response as JavaScript, and returns it as plain text
"json" - Runs the response as JSON, and returns a JavaScript object
"jsonp" - Loads in a JSON block using JSONP. Will add an "?callback=?" to the URL to specify the callback
*/
	
});
</script>
</head>
<body>

<button>Send an HTTP GET request to a page and get the result back</button><br>
<button id="btnpost">Send and HTTP POST requert to a page and get the result back</button>

<br>

<p>Start typing a name in the input field below:</p>
First name:

<input type="text" id="mytxt">
<button id="btngo">Go!</button>

<p>Suggestions: <span id="s1"></span></p>

<div id="a1"></div>


</body>
</html>

