<?php session_start(); ?>
<?php include 'inc/db_details.php'; ?>
<?php
if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
 $name = $_SESSION['uname'];  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

          <script>
          function openForm() {
            document.getElementById("myForm").style.display = "block";
          }

          function closeForm() {
            document.getElementById("myForm").style.display = "none";
          }
          </script>
					<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
						 <div class="navbar-header">
						<a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-arrow-left"></span> </a>
						</div>
							 </nav>
  <div class="container">
    <center>
    <h3> <b><u>Edit Details</u></b> </h3>
  </center>
    <div class="row">
      <div class="col-sm-3">
        <button class="btn btn-default btn-sm btn-block btn-r" onclick='openForm()'>
      <span class="glyphicon glyphicon-edit"></span> Edit Name<span class="glyphicon glyphicon-chevron-right"></span>
      </button>
      <button class="btn btn-default btn-sm btn-block  btn-r" onclick='opForm()'>
    <span class="glyphicon glyphicon-edit"></span> Edit Email<span class="glyphicon glyphicon-chevron-right"></span>
    </button>
        <button class="btn btn-default btn-sm btn-block  btn-r" onclick='oForm()'>
      <span class="glyphicon glyphicon-edit"></span> Edit phonenumber<span class="glyphicon glyphicon-chevron-right"></span>
      </button>
      <button class="btn btn-default btn-sm btn-block  btn-r" onclick='locForm()'>
    <span class="glyphicon glyphicon-edit"></span> Edit Current location<span class="glyphicon glyphicon-chevron-right"></span>
    </button>
      </div>
      <div class="col-sm-8">

      <div class="form-popup col-xs-12" id="myForm">

      <form method="post" class="form-inline frm" action="inc/update_name.php">
        <center><h4><b>Edit Name</b></h4></center><br>
        <label for="fname">Firstname:</label>
        <input type="text" name="fname" placeholder="<?php echo $firstname ?>">
        <label for="lname">Lastname:</label>
        <input type="text" name="lname" placeholder="<?php echo $lastname ?>">
         <button type="submit" class="btn btn-success btn-sm" name="sub">Update</button>
          <button type="button" class="btn btn-danger btn-sm" onclick="closeForm()"> <span class="glyphicon glyphicon-remove"></span></button>
        </form>
      </div>

      <div class="form-popup col-xs-12" id="eForm">

      <form method="post" class="form-inline frm" action="inc/update_email.php">
          <center>  <h4><b>Edit Email</b></h4></center><br>
        <label for="email">Edit Email: </label>
        <input type="text" name="email" placeholder="<?php echo $email ?>">

         <button type="submit" class="btn btn-success btn-sm" name="sub">Update</button>
          <button type="button" class="btn btn-danger btn-sm" onclick="cloForm()"> <span class="glyphicon glyphicon-remove"></span></button>

                    <script>
                    function opForm() {
                      document.getElementById("eForm").style.display = "block";
                    }

                    function cloForm() {
                      document.getElementById("eForm").style.display = "none";
                    }
                    </script>

        </form>
      </div>

    <div class="form-popup col-xs-12" id="pForm">

    <form method="post" class="form-inline frm" action="inc/update_phone.php">
          <center><h4><b>Edit Phone</b></h4></center><br>
      <label for="email">Edit Phone: </label>
      <input type="text" name="phone" placeholder="<?php echo $phonenumber?>">

       <button type="submit" class="btn btn-success btn-sm" name="sub">Update</button>
        <button type="button" class="btn btn-danger btn-sm" onclick="closForm()"> <span class="glyphicon glyphicon-remove"></span></button>

                  <script>
                  function oForm() {
                    document.getElementById("pForm").style.display = "block";
                  }

                  function closForm() {
                    document.getElementById("pForm").style.display = "none";
                  }
                  </script>

      </form>
    </div>

  <div class="form-popup col-xs-12" id="locForm">

  <form method="post" class="form-inline frm" action="inc/update_location.php">
    <center><h4><b>Current Location</b></h4></center><br>
    <label for="email">Edit current location: </label>
      <select name="current" class="form-control">
        <option value="Archerspost"><?php echo $current_location ?></option>
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

     <button type="submit" class="btn btn-success btn-sm" name="sub">Update</button>
      <button type="button" class="btn btn-danger btn-sm" onclick="clocForm()"> <span class="glyphicon glyphicon-remove"></span></button>

                <script>
                function locForm() {
                  document.getElementById("locForm").style.display = "block";
                }

                function clocForm() {
                  document.getElementById("locForm").style.display = "none";
                }
                </script>

    </form>
  </div>
    </div>
    </div>
  </div>
  </body>
</html>
