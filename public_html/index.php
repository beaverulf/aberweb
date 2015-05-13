<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

?>

<html>
<?php include 'head.php';?>
<body onload="setupCanvas()" onkeydown="keyEvent(event)">

	<?php if (login_check($mysqli) == true) : ?>
	<div  class="background-image" >
		<div id="blacklayer"></div>
	</div>




	<div class="content">
		<div class="bs-docs-section">
			<div class="row">
				<div class="col-lg-12">
					<h1 id="type">ABER boating </h1>
				</div>
			</div>
		</div>
		<legend></legend>
		<?php include 'navbar.php';?>
		<legend></legend>
		<table>
			<tr>
				<td>
				
			
				<script src="js/gamepad.js"></script>
				<canvas id="steeringCanvas" width="400" height="300" style="background-color: #000000;"></canvas>
					<!--<p id="controlsInfo">Steer with WASD</p>-->
					<br>
				
					<div id="console">
						<div id="console-content">
							<?php 
								printConn();
								echo "<br>Boat IP address: ";
								printIp();
							?>
							
						</div>
		
			
		
					</div>
							<input class="form-control" disabled="disabled" type="text" id="commandline" placeholder="Disconnected"  style="width: 400"/>

					
					</td>

					<td>
						<embed 
							type="application/x-vlc-plugin" 
							pluginspage="http://www.videolan.org" 
							version="VideoLAN.VLCPlugin.2"
							width="640"
							height="480"
							target="http://176.10.131.208:8080/"
							id="vlc">

						<param name="AutoPlay" value="true"/>
					</embed>
				</td>
			</tr>
		</table>
		<legend></legend>
	</div>

<?php else : ?>
	<p>
		<span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
	</p>
<?php endif; ?>

</body>

</html>

