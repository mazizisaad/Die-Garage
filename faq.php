<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include"head.php"; ?>
    <title>FAQ - Online Car Rental</title>
</head>

<body>
	<!-- Navbar -->
	<?php include "navbar.php"; ?>
	<!-- End Navbar -->

	<!-- FAQ -->
	<div class="container">
		<br>
		<div class="page-header">
			<h2>Frequently Ask Questions (FAQ)</h2>
			<hr>
		</div>	
		<br>
		<!-- Q1 -->
		<div id="faqAccordion1">
			<div class="card">
				<div class="card-header" id="headingQ1">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#faqAccordion1" href="#collapseQ1">
							Question 1
						</a>
					</h5>
				</div>
				<div id="collapseQ1" class="collapse">
					<div class="card-block">
						Question 1
					</div>
				</div>
			</div>
		</div>
		<!-- End Q1 -->

		<!-- Q2 -->
		<div id="faqAccordion2">
			<div class="card">
				<div class="card-header" id="headingQ2">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#faqAccordion2" href="#collapseQ2">
							Question 2
						</a>
					</h5>
				</div>
				<div id="collapseQ2" class="collapse">
					<div class="card-block">
						Question 2
					</div>
				</div>
			</div>
		</div>
		<!-- End Q2 -->

		<!-- Q3 -->
		<div id="faqAccordion3">
			<div class="card">
				<div class="card-header" id="headingQ3">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#faqAccordion3" href="#collapseQ3">
							Question 3
						</a>
					</h5>
				</div>
				<div id="collapseQ3" class="collapse">
					<div class="card-block">
						Question 3
					</div>
				</div>
			</div>
		</div>
		<!-- End Q3 -->

		<!-- Q4 -->
		<div id="faqAccordion4">
			<div class="card">
				<div class="card-header" id="headingQ4">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#faqAccordion4" href="#collapseQ4">
							Question 4
						</a>
					</h5>
				</div>
				<div id="collapseQ4" class="collapse">
					<div class="card-block">
						Question 4
					</div>
				</div>
			</div>
		</div>
		<!-- End Q4 -->

		<!-- Q4 -->
		<div id="faqAccordion5">
			<div class="card">
				<div class="card-header" id="headingQ5">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#faqAccordion5" href="#collapseQ5">
							Question 5
						</a>
					</h5>
				</div>
				<div id="collapseQ5" class="collapse">
					<div class="card-block">
						Question 5
					</div>
				</div>
			</div>
		</div>
		<!-- End Q4 -->

	</div>
	<!-- End FAQ --> 

	<!-- Footer -->
	<?php include "footer.php"; ?>
	<!-- End Footer -->

    <?php include"script.php"; ?>
</body>

</html>