<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        
		<link rel="stylesheet" href="public_html/css/hbstyle.css" />
		<link rel="stylesheet" href="public_html/css/bootstrap.css">
		<link rel="shortcut icon" href="public_html/Images/transform.ico">
		
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
		
		 <?php if (login_check($mysqli) == true) : ?>
		 
        <h1>Add new user</h1>
		
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
		
		<div style="width:300px">
        <form class="form-horizontal" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post"  name="registration_form">
			
			 <fieldset>
				<legend>Registration</legend>
					
					<div class="form-group">
						<label for="username" class="col-lg-2 control-label">Username</label>
							<div class="col-lg-10">
								<input type='text'  class="form-control" name='username'  id='username' placeholder="Password"/><br>
							 </div>
					</div>
			
					<div class="form-group">
					  <label for="email" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="email" id="email" placeholder="Email Address"/><br>
						</div>
					</div>
							
					<div class="form-group">
						<label for="password" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password"/><br>
							</div>
					</div>
					
					<div class="form-group">
						<label for="confirmpwd" class="col-lg-2 control-label">Confirm:</label>
							<div class="col-lg-10">
								<input type="password" class="form-control" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password"/><br>
							</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="reset" class="btn btn-default">Reset</button>
								<input type="button" class="btn btn-danger" value="Register" onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
						</div>
					</div>
			  </fieldset>
        </form>
		
		</div>
        <p>Return to the <a href="index.php">login page</a>.</p>
		
		<?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>