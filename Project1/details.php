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
    <title>Update details</title>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="navbar-header">
      <a class="navbar-brand" href="#">Parttee</a>
      </div>
         </nav>
         <div class="container">
         <div class="row">
           <h4 align='center'> <font color="#143405">Update your details before you continue</font></h4><br><br>
           <form class="form-horizontal" action="signup_artist.php" method="post">

                   <div class="form-group">
                   <label for="email" class="control-label col-sm-2">Select hometown</label>
       <div class="col-sm-10">
                     <select name="hometown" class="form-control">
                     			<option value="Female"> </option>
                     			<option value="Male"> Male </option>
                          <option value="Female"> Female </option>
                     			<option value="Male"> Male </option>
                          <option value="Female"> Female </option>
                     			<option value="Male"> Male </option>
                          <option value="Female"> Female </option>
                     			<option value="Male"> Male </option>
                          <option value="Female"> Female </option>
                     			<option value="Male"> Male </option>
                          <option value="Female"> Female </option>
                     			<option value="Male"> Male </option>
                          <option value="Female"> Female </option>
                     			<option value="Male"> Male </option>
                     		</select>
                       </div>
                       </div>
                       <div class="form-group">
                       <label for="city" class="control-label col-sm-2">Select Current Location</label>
           <div class="col-sm-10">
                         <select name="current_location" class="form-control">
                         			<option value="Female"> </option>
                         			<option value="Male"> Male </option>
                              <option value="Female"> Female </option>
                         			<option value="Male"> Male </option>
                              <option value="Female"> Female </option>
                         			<option value="Male"> Male </option>
                              <option value="Female"> Female </option>
                         			<option value="Male"> Male </option>
                              <option value="Female"> Female </option>
                         			<option value="Male"> Male </option>
                              <option value="Female"> Female </option>
                         			<option value="Male"> Male </option>
                         		</select>
                           </div>
                         </div>

                       <div class="form-group">
                         <label for="pno" class="control-label col-sm-2">School</label>
                         <div class="col-sm-10">
                             <input type="text" name="school" class="form-control" id="pno" placeholder="Where did you study?">
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="pno" class="control-label col-sm-2">Extra art</label>
                         <div class="col-sm-10">
                             <input type="text" name="extra_art" class="form-control" id="pno" placeholder="Enter any other extra art">
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="pno" class="control-label col-sm-2">Describe yourself</label>
                         <div class="col-sm-10">
                             <input type="text" name="about" class="form-control" id="pno" placeholder="Optional">
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="pno" class="control-label col-sm-2">Website</label>
                         <div class="col-sm-10">
                             <input type="url" name="web" class="form-control" id="pno" placeholder="Optional">
                         </div>
                       </div>
       <div class="button-group">
               <div class="form-group form-inline">
                 <div class="col-sm-5 col-sm-offset-2  ">
                     <button type="submit" name="continue" class="btn btn-primary  btn-block" >Continue</button>
                 </div>

               </div>
             </div>
           </form>
           </div>
           </div>
           </div>

  </body>
</html>
