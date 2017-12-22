<?php
?>
	<div class="card">
	  <div class="card-block text-center">
	    Welcome <?php echo $_SESSION["name"] ?>
	  </div>
	</div>
	<br>
<?php
if($_SESSION["category"] == "Owner")
{
	?>
	<div class="container">
		<ul class="nav flex-column nav-pills nav-fill">
			<li class="nav-item">
				<a class="nav-link" href="dashboard.php">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="manageCar.php">Manage Car</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="trackReservation.php">Track Reservation</a>
			</li>
		</ul>
	</div>	
	<?php
}
else if($_SESSION["category"] == "Renter")
{
	?>
	<div class="container">
		<ul class="nav flex-column nav-pills nav-fill">
			<li class="nav-item">
				<a class="nav-link" href="dashboard.php">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="manageReservation.php">Manage Reservation</a>
			</li>
		</ul>
	</div>	
	<?php
}
?>