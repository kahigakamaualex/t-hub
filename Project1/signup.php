<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
<?php include 'inc/signup.php'; ?>
  <body>
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
      <a class="navbar-brand" href="#">T-hub</a>
      </div>
         </nav>
         		 <div id="push">
  <div class="container">
  <div class="row">
    <div class="col-sm-10" >
      <h3 align='center'> <font color="#143405">SignUp!</font></h3>
    <h3 class="col-sm-offset-2"><font color="#143405">SignUp below!</h3>
      <h4 class="text-danger"><?php echo $error; ?></h4>
    <form class="form-horizontal " action="signup.php" method="post">
      <div class="form-group">
        <label for="fname" class="control-label col-sm-2">Hi, what's your firstname? </label>
        <div class="col-sm-10">
            <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Firstname" required>
        </div>
      </div>
        <div class="form-group">
          <label for="lname" class="control-label col-sm-2">What about your lastname?</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Lastname" required>
          </div>
        </div>
        <div class="form-group">
          <label for="pno" class="control-label col-sm-2">Choose a username (<small class="text-danger">should be more than 5 characters</small>)</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="uname" id="pno" placeholder="Enter a Username" required>

          </div>

        </div>
          <div class="form-group">
            <label for="pno" class="control-label col-sm-2">Please enter your phonenumber </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="pnumber" id="pno" placeholder="Enter Phonenumber" required>
            </div>
          </div>
            <div class="form-group">
              <label for="email" class="control-label col-sm-2">Please enter your email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" required>
              </div>
            </div>
                  <div class="form-group">
            <label for="art" class="control-label col-sm-2">Choose account type</label>
<div class="col-sm-10">
              <select class="form-control" required name="account">
               <option value="" disabled selected>--Select acount type--</option>
                  <option value="Normal"> Normal User</option>
                  <option value="Artist"> Artist </option>
                  </select>
                </div>
  </div>

                     <div class="form-group">
                     <label for="email" class="control-label col-sm-2">Where is home (<small class="text-danger">choose hometown</small>)</label>
         <div class="col-sm-10">
                       <select name="hometown" class="form-control">
                        <option value="" disabled selected>--Select hometown--</option>
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
                           <option value="Nakuru">Nakuru</option>
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
                         <label for="city" class="control-label col-sm-2">Select your current location</label>
             <div class="col-sm-10">
                           <select name="current_location" class="form-control">
                            <option value="" disabled selected>--Select Current Location--</option>
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
                                  <option value="Nakuru">Nakuru</option>
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
              <label for="email" class="control-label col-sm-2">Select sex</label>
  <div class="col-sm-10">
                <select name="sex" class="form-control" required>
                 <option value="" disabled selected>--Select sex--</option>
                			<option value="Female"> Female </option>
                			<option value="Male"> Male </option>
                		</select>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="email" class="control-label col-sm-2">Birthday</label>
                        <div class="col-sm-10">
                						<input type="date" class="form-control input-md" name="bday" required="required">
                </div>
                </div>
      <div class="form-group">
        <label for="pass" class="control-label col-sm-2">Enter your password (<small class="text-danger">should be more than 8 characters</small>)</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="txtNewPassword" placeholder="Enter Password" name="pass" required>
        </div>
      </div>
      <div class="form-group">
        <label for="pass" class="control-label col-sm-2">Repeat the same password</label>
        <div class="col-sm-10">
            <input type="password" id="txtConfirmPassword" onChange="checkPasswordMatch();" class="form-control" name="passrpt" placeholder="Re-enter Password" required>
        <div class="registrationFormAlert" id="divCheckPasswordMatch">
        </div>
           
</div>
      </div>
        <p class="col-sm-10  col-sm-offset-2">Already have an account?<a class="btn btn-link" href="login.php">Login here</a>
      <p class="col-sm-10  col-sm-offset-2">By creating an account you agree to our <a class="btn btn-link" href="#">Terms & Conditions</a>
        <div class="button-group">
                <div class="form-group form-inline">
                  <div class="col-sm-5 col-sm-offset-2  ">
                      <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up!</button>
                  </div>
        </div>
      </div>
      <div class="col-sm-offset-2">
      </div>
    </form>
    </div>
    </div>
    </div>
  </div>
  <script>
  function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!").css("color","red");
    else
        $("#divCheckPasswordMatch").html("Passwords match.").css("color","green");
}

$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});

  </script>
  </body>
  <?php include 'inc/footer.php'; ?>
</html>
