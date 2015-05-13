<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
	header('Location: ../public_html/index.php');
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
		<link href="public_html/css/bootstrap.css" rel="stylesheet">
		<link href="public_html/Images/transform.ico" rel="shortcut icon" >
		<link href="public_html/css/hbstyle.css" rel="stylesheet">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	    <script type="text/JavaScript" src="js/sha512.js"></script> 
	    <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
         


<div id="login-container">    
<form class="form-horizontal" action="includes/process_login.php" method="post" name="login_form">
  <fieldset>
    <legend></legend>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<input id="login-btn" class="btn btn-info" type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
      </div>
    </div>
	
	<script type="text/JavaScript">
		$('#inputPassword').keypress(function(event){
		  if(event.keyCode == 13){
			$('#login-btn').click();
		  }
		});
	</script>
	
  </fieldset>
</form>

 <legend></legend>

<?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-dismissible alert-danger">';
			echo '<button type="button" class="close" data-dismiss="alert">x</button>';
			echo '<strong>Shit fuck.</strong>';
			echo '</div>';
        }
?> 



</div>

<!--
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
		
?>  
-->


    </body>
</html>

