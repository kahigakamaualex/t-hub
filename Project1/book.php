<?php session_start(); ?>
<?php include 'inc/header.php';
include 'inc/connection.php';
if(!isset($_SESSION['uname'])){
	header("location: login.php");
}
include 'inc/functions/functions.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title>Book</title>
    <link rel = "icon" href =  
"http://t-zon.atwebpages.com/pictures/icon.jpg" 
        type = "image/x-icon">
  </head>
  <body>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <?php if (isset($_GET['u_id'])) {
        $u_id = $_GET['u_id'];
        $artist = "select * from users where user_id='$u_id'";
        $que = mysqli_query($conn,$artist);
        $row_art = mysqli_fetch_array($que);
        $username = $row_art['username'];
          $sex = $row_art['sex'];
        echo "
        <center>
         <h3>Book <b>$username</b> </h3>
         </center>
";
}
  ?>
  <form class="form-horizontal " action="signup.php" method="post">
    <div class="form-group">
      <label for="fname" class="control-label col-sm-3">Event ID</label>
      <div class="col-sm-9">
          <input type="text" name="event_name" class="form-control" id="fname" placeholder="Enter the event id" required>
      </div>
    </div>
    <div class="form-group">
      <label for="fname" class="control-label col-sm-3">Event Date</label>
      <div class="col-sm-9">
          <input type="date" name="event_date" class="form-control" id="fname" placeholder="Enter name of your event" required>
      </div>
    </div>
    <div class="form-group">
      <label for="fname" class="control-label col-sm-3">Event Duration</label>
      <div class="col-sm-9">
          <input type="date" name="event_date" class="form-control" id="fname" placeholder="Event Duration  " required>
      </div>
    </div>
    <div class="form-group">
    <label for="email" class="control-label col-sm-3">Event location</label>
<div class="col-sm-9">
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
        </div>
        <div class="form-group">
          <label for="fname" class="control-label col-sm-3">Event physical address</label>

          <div class="col-sm-9">
          <textarea name="name" rows="2" cols="6" class="form-control" placeholder="Enter event location  physical address"></textarea>
          </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3">
        <input type="checkbox" name="agreement" required> By booking <?php echo
         "<a href='view_profile.php?u_id=$u_id'><b>$username</b></a>"; ?> you agree to
       meet all <?php if ($sex =="Male") {
        echo "his";
      }else {
        echo "her";
      } ?><a href="#" class="btn btn-link"><b>requirements</b></a>
        </div>
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">
          <input type="submit" value="submit" class="btn btn-primary btn-sm ">
          </div>
        </div>
  </form>
    </div>
  </div>
</div>
  </body>
</html>
