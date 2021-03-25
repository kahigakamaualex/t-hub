<?php session_start(); ?>
<?php
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title>search</title>
  </head>
	<style media="screen">
	body{ font-family:Arial, Helvetica, sans-serif; }
*{ margin:0;padding:0; }

a { color:black; text-decoration:none }
a:hover { color:black; text-decoration:none; }
ul.update { list-style:none;font-size:1.1em; margin-top:10px }
ul.update li{ height:30px; border-bottom:#dedede solid 1px; text-align:left;}
ul.update li:first-child{ border-top:#dedede solid 1px; height:30px; text-align:left; }
#flash { margin-top:20px; text-align:left; }
#searchresults {

margin-top:20px;
padding-top: 15px;
padding-bottom: 30px;
 display:none;
	 font-family:Arial, Helvetica, sans-serif;
	 font-size:16px;
		color:#000;
		background-color: white;
		border-collapse: collapse;
	}

.mar{
	margin: 2px 5px 5px 5px;
}
hr{
	border: 0.5px solid grey;
}
	</style>
<script type="text/javascript">
$(function() {
    $(".search_button").click(function() {
        // getting the value that user typed
        var searchString    = $("#search_box").val();
        // forming the queryString
        var data            = 'search='+ searchString;

        // if searchString is not empty
        if(searchString) {
            // ajax call
            $.ajax({
                type: "POST",
                url: "do_search.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    $("#results").html('');
                    $("#searchresults").show();
                    $(".word").html(searchString);
               },
               success: function(html){ // this happens after we get results
                    $("#results").show();
                    $("#results").append(html);
              }
            });
        }
        return false;
    });
});
</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		 <div class="navbar-header">
		<a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-arrow-left"></span> </a>
		</div>
	</nav>
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 col-xs-12">
<form method="post" action="do_search.php">
<div class="input-group">
	<span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span></span>
    <input type="text" name="search" id="search_box" class='form-control search_box'placeholder="Find People......."/>
    <div class="input-group-btn">
    <input type="submit" value="Search" class="search_button btn btn-primary" /><br />
</div></div>
</form>
<div id="searchresults">
<div class="panel panel-primary">
		<div class="panel-heading"><center><b>People</b></center>
		</div>
		<div class="panel-body" align="center">
			<ul id="results" class="update">
			</ul>
		</div>
	</div>
	</div>
</div>
</div>
</div>
  </body>
</html>
