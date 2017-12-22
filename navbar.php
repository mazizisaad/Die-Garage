<nav class="navbar navbar-toggleable-sm navbar-inverse bg-primary sticky-top">
	<button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarContent">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-brand"><strong>Die Garage</strong></div>
	<div class="collapse navbar-collapse" id="navbarContent">
		<?php
		if(basename($_SERVER["PHP_SELF"], ".php") == "viewBook")
		{
			echo "";
		}
		else
		{
			?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="index.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="aboutUs.php" class="nav-link">About Us</a>
				</li>
				<li class="nav-item">
					<a href="contactUs.php" class="nav-link">Contact Us</a>
				</li>
				<li class="nav-item">
					<a href="faq.php" class="nav-link">FAQ</a>
				</li>
			</ul>
			<?php
				if(basename($_SERVER["PHP_SELF"], ".php") == "signIn")
				{
					echo "";
				}
				else if($_SESSION)
				{
					echo "<a href='dashboard.php' class='btn navbar-btn btn-primary navbar-right'>Dashboard</a>";
					echo "&nbsp;";
					echo "<a href='signout.php' class='btn navbar-btn btn-danger navbar-right'>Sign Out</a>";
				}
				else
				{
					echo "<a href='signIn.php' class='btn navbar-btn btn-primary navbar-right'>Sign In</a>";
				}
		}

			?>
	</div>
</nav>