<?php session_start(); ?>
<?php
include 'inc/connection.php';
if(!isset($_SESSION['uname'])){
	header("location: login.php");
}
include 'inc/functions/functions.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Create event</title>
  </head>
	<style media="screen">
	.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
	}
	#img-upload{
			width: 60%;
	}
	</style>
  <body>
		<nav class="navbar navbar-default navbar-inverse" role="navigation">
			 <div class="navbar-header">
			<a class="navbar-brand" href="events.php"> <span class="glyphicon glyphicon-arrow-left"></span> Create Event</a>
			</div>
				 </nav>
    <div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"><center><b>Create Event</b></center>
		</div>
		<div class="panel-body">
  <form class="form-horizontal " action="" method="post" enctype='multipart/form-data'>
		<div class="form-group">
		 <label>Event banner</label>
		 <div class="input-group">
				 <span class="input-group-btn">
						 <span class="btn btn-success btn-file">
								Choose… <input type="file" name="file" id="imgInp" accept="image/*">
						 </span>
				 </span>
				 <input type="text" class="form-control" readonly>
		 </div>
<img id='img-upload'/>
 </div>
    <div class="form-group">
      <label for="fname" >Event Name</label>
          <input type="text" name="event_name" class="form-control" id="fname" placeholder="Enter name of your event" required>
    </div>
    <div class="form-group">
      <label for="fname" >Event Date</label>
          <input type="date" name="event_date" class="form-control" id="fname" placeholder="Enter name of your event" required>
    </div>
    <div class="form-group">
    <label for="email" >Event location</label>
      <select name="event_location" class="form-control">
        <option value="Archerspost">Archerspost</option>
          <option value="Bahati">Bahati</option>
          <option value="Baragoi">Baragoi</option>
          <option value="Baringo">Baringo</option>
          <option value="Bissil">Bissil</option>
          <option value="Bomet">Bomet</option>
          <option value="Bungoma">Bungoma</option>
          <option value="Busia">Busia</option>
          <option value="Butere">Butere</option>
          <option value="Cheptais">Cheptais</option>
          <option value="Chogoria">Chogoria</option>
          <option value="Chuka">Chuka</option>
          <option value="Daadab">Daadab</option>
          <option value="Dundori">Dundori</option>
          <option value="Eldama Ravine">Eldama Ravine</option>
          <option value="Eldoret">Eldoret</option>
          <option value="Embu">Embu</option>
          <option value="Endarasha">Endarasha</option>
          <option value="Funyula">Funyula</option>
          <option value="Garbatula">Garbatula</option>
          <option value="Garissa">Garissa</option>
          <option value="Gatundu">Gatundu</option>
          <option value="Hola">Hola</option>
          <option value="Homabay">Homabay</option>
          <option value="Isiolo">Isiolo</option>
          <option value="Iten">Iten</option>
          <option value="Juakali">Juakali</option>
          <option value="Kabarnet">Kabarnet</option>
          <option value="Kabati">Kabati</option>
          <option value="Kabuti">Kabuti</option>
          <option value="Kagio">Kagio</option>
          <option value="Kagumo">Kagumo</option>
          <option value="Kajiado">Kajiado</option>
          <option value="Kakamega">Kakamega</option>
          <option value="Kakuma">Kakuma</option>
          <option value="Kaloleni">Kaloleni</option>
          <option value="Kandara">Kandara</option>
          <option value="Kangari">Kangari</option>
          <option value="Kangema">Kangema</option>
          <option value="Kangundo">Kangundo</option>
          <option value="Kapcherop">Kapcherop</option>
          <option value="Kapenguria">Kapenguria</option>
          <option value="Kapsabet">Kapsabet</option>
          <option value="Kapsokwony">Kapsokwony</option>
          <option value="Kapsowar">Kapsowar</option>
          <option value="Karatina">Karatina</option>
          <option value="Kathiani">Kathiani</option>
          <option value="Kericho">Kericho</option>
          <option value="Keroka">Keroka</option>
          <option value="Kerugoya">Kerugoya</option>
          <option value="Kiambu">Kiambu</option>
          <option value="Kibwezi">Kilifi</option>
          <option value="Kimili">Kimili</option>
          <option value="Kinamba">Kinamba</option>
          <option value="Kinna">Kinna</option>
          <option value="Kiria ini">Kiria ini </option>
          <option value="Kisii">Kisii</option>
          <option value="Kisumu">Kisumu</option>
          <option value="Kitale">Kitale</option>
          <option value="Kitui">Kitui</option>
          <option value="Laisamis">Laisamis</option>
          <option value="Lamu">Lamu</option>
          <option value="Lare">Lare</option>
          <option value="Limuru">Limuru</option>
          <option value="Lodwar">Lodwar</option>
          <option value="Loiyangalani">Loiyangalani</option>
          <option value="Lokichogio">Lokichogio</option>
          <option value="Lolgorian">Lolgorian</option>
          <option value="Lunglunga">Lunglunga</option>
          <option value="Machakos">Machakos</option>
          <option value="Machinery">Machinery</option>
          <option value="Magarini">Magarini</option>
          <option value="Majimazuri">Majimazuri</option>
          <option value="Malindi">Malindi</option>
          <option value="Mandera">Mandera</option>
          <option value="Maralal">Maralal</option>
          <option value="Marereni">Marereni</option>
          <option value="Maseno">Maseno</option>
          <option value="Masii">Masii</option>
          <option value="maunarok">Maunarok</option>
          <option value="Mazeras">Mazeras</option>
          <option value="Mbita">Mbita</option>
          <option value="Merti">Merti</option>
          <option value="Mitungu">Mitungu</option>
          <option value="Mogonga">Mogonga</option>
          <option value="Mogotio">Mogotio</option>
          <option value="Molo">Molo</option>
          <option value="Mombasa">Mombasa</option>
          <option value="Mtito Andei">Mtito Andei</option>
          <option value="Muhuru Bay">Muhuru Bay</option>
          <option value="Muranga">Murnaga</option>
          <option value="Mwatate">Mwatate</option>
          <option value="Mweiga">Mweiga</option>
          <option value="Mwingi">Mwingi</option>
          <option value="Nairobi">Nairobi</option>
          <option value="Naivasha">Naivasha</option>
          <option value="Nanyuki">Nanyuki</option>
          <option value="Narok">Narok</option>
          <option value="Naromoru">Naromoru</option>
          <option value="Ndori">Ndori</option>
          <option value="Ngong">Ngong</option>
          <option value="Njabini">Njabini</option>
          <option value="Nyahururu">Nyahururu</option>
          <option value="Nyakach">Nyakach</option>
          <option value="Nyamache">Nyamache</option>
          <option value="Nyamarambe">Nyamarambe</option>
          <option value="Nyamira">Nyamira</option>
          <option value="Nyeri">Nyeri</option>
          <option value="Ogembo">Ogembo</option>
          <option value="Othaya">Othaya</option>
          <option value="Rongai">Rongai</option>
          <option value="Ruiru">Ruiru</option>
          <option value="salgaa">Salgaa</option>
          <option value="Siakago">Siakago</option>
          <option value="Siaya">Siaya</option>
          <option value="Sindo">Sindo</option>
          <option value="Sololo">Sololo</option>
          <option value="Sultan Hamud">Sultan Hamud</option>
          <option value="Taveta">Taveta</option>
          <option value="Thika">Thika</option>
          <option value="Timboroa">Timboroa</option>
          <option value="Tongaren">Tongaren</option>
          <option value="Ugunja">Ugunja</option>
          <option value="Ukunda">Ukunda</option>
          <option value="Voi">Voi</option>
          <option value="Wajir">Wajir</option>
          <option value="Watamu">watamu</option>
          <option value="Webuye">Webuye</option>
          <option value="Wote">Wote</option>
          <option value="Wundanyi">Wundanyi</option>
          <option value="Yala">Yala</option>
       </select>
        </div>
        <div class="form-group">
          <label for="fname" >Event place</label>
              <input type="text" name="event_place" class="form-control" id="fname" placeholder="Exact event place" required>
				</div>
				<div class="form-group">
				<label for="fname" >Kick off time</label>
							<input type="time" name="kickoff" class="form-control" id="fname" placeholder="Enter the kick off time" required>
				</div>
				<div class="form-group">
				  <label for="sel5">Event Entry</label>
		  <select name="result" class="form-control" id="sel5">
		   <option value="" disabled selected>--Select--</option>
	   <option value="1">Charged</option>
		   <option value="2">Free</option>
 	 			</select>
		  </div>
			<div id="fallowupdate" style="display:none">
        <div class="form-group">
          <label for="fname" >Regular Charges</label>

            <div class="input-group">
        <span class="input-group-addon">Ksh.</span>
        <input type="text" class="form-control" name="regular_charges">
        <span class="input-group-addon">.00</span>
        </div>
        </div>
        <div class="form-group">
          <label for="fname" >VIP Charges</label>

            <div class="input-group">
        <span class="input-group-addon">Ksh.</span>
        <input type="text" class="form-control" name="vip_charges">
        <span class="input-group-addon">.00</span>
        </div>
        </div>

        <div class="form-group">
        <label for="fname" >VVIP Charges</label>
        <div class="input-group">
      <span class="input-group-addon">Ksh.</span>
      <input type="text" class="form-control" name="vvip_charges">
      <span class="input-group-addon">.00</span>
    </div>
        </div>
			</div>
<br>
          <div class="pull-right">
          <input type="submit" value="create" class="btn btn-primary btn-sm" name="create_evt">
          </div>
  </form>
  </div>
	<?php include 'inc/create_evt.php'; ?>
</div>
<script>

$(document).ready(function(){
$("#sel5").change(function() {
	if($(this).val() == 1){

			$("#fallowupdate").css('display', 'block');

	}else{
			$("#fallowupdate").css('display', 'none');
	}
});

$(document).on('change', '.btn-file :file', function() {
var input = $(this),
label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
input.trigger('filesenavbar-fixed-toplect', [label]);
});

$('.btn-file :file').on('fileselect', function(event, label) {

	var input = $(this).parents('.input-group').find(':text'),
			log = label;

	if( input.length ) {
			input.val(log);CreatePost()
	} else {
			if( log ) alert(log);
	}

});
function readURL(input) {
	if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
					$('#img-upload').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
	}
}

$("#imgInp").change(function(){
	readURL(this);
});
});


</script>
  </body>
</html>
