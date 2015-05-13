
<?php  	include_once '../phpscripts/operator_functions.php';
							sqlConnect();
				?>
<ul class="nav nav-bar-default nav-pills" style="padding-right: 15px;">
	<li>
		<input type="hidden" value="ws://<?php getBoatIp(); printIp();?>:8888" id="wsServer">
	</li>
	<li>
		<form id="connectForm" style="margin-bottom: 0px;">
			<button class="btn btn-info" type="submit" id="connect"><span class="glyphicon glyphicon-earphone" aria-hidden="false"></span>     Connect</button>
			
		</form>

		
	</li>
	<li>
		<button class="btn btn-info" id="disconnect"><span class="glyphicon glyphicon-phone-alt" aria-hidden="false"></span>     Disconnect</button>
	</li>

	<li>
		<p class="navbar-text" >Operator: <?php echo htmlentities($_SESSION['username']); ?></p>
	</li>
		
	<ul class="nav nav-pills navbar-right">

		<li class="dropdown closed">
					<a href="#" class="dropdown-toggle list-group-item list-group-item-info" data-toggle="dropdown" role="button" aria-expanded="true">Settings<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="../register.php">Add user</a></li>
							<li><a href="http://aberboating.se/phpmyadmin">Mysql Admin login</a></li>
						</ul>
				</li>
				<li>
					<a href="../includes/logout.php" class="list-group-item list-group-item-danger " style="width: 100px"><span class="glyphicon glyphicon-off" aria-hidden="false"></span>   Log out</a>
				</li>
	</ul>
</ul>