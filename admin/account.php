<?php include('header_sidemenu.php'); ?>

<?php include('../server/connection.php'); ?>

<?php
//protecting this page
	if(!isset($_SESSION['admin_logged_in'])){
		header('location: login.php');
		exite();
	}


?>



		<!-- MAIN -->
		<main>
			<div class="table-data">
				<div class="order">
                    
                    <p> Id: <?php echo $_SESSION['admin_id']; ?></p>
                    <p> Name: <?php echo $_SESSION['admin_name']; ?></p>
                    <p> Email: <?php echo $_SESSION['admin_email']; ?></p>


				</div>
			</div>
		</main>
		<!-- MAIN -->

	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>