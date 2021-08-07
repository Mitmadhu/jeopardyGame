<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
</head>
<body>
	<?php
		require_once 'header.php';
		require_once 'navbar.php';

		$profileObj = new \Classes\Profile();
		$profileDetails = $profileObj->getUserDetails($_SESSION['username']);
	?>

	<div class="container">
		<div id="left">
				<div id="profilePic">
					<img src="<?php echo $profileDetails['avatar']; ?>">
				</div>

				<div id="details">
					<li>Username: <span class="colorText"><?php echo $profileDetails['username'] ?></span></li>
					<li>Name: 
						<span class="colorText">
							<?php echo $profileDetails['first_name']. " ". $profileDetails['last_name']; ?>
						</span>
					</li>
					<li>Won: <span class="colorText">
						<?php echo $profileDetails['won']; ?>
					</span></li>
					<li>Score: <span class="colorText">
						<?php echo convertNumber($profileDetails['total_score']); ?>
					</span></li>
				</div>
		</div>

		<div id="right">
			<!-- setting page -->

	  	<?php 
	  		/* ---- show errors ------*/
	  		if (isset($_SESSION['errors'])) {
			  			
	  			echo '<div class="callout alert small" data-closable>';
	  			foreach ($_SESSION['errors'] as $error) {
	  				if(strlen($error) > 0)
		  				echo '<p>'.$error.'</p>';
	  			}
	  			echo '<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
					    <span aria-hidden="true">X&times;</span>
					  </button>
					</div><br>';

					unset($_SESSION['errors']);
	  		}

	  		/* ---- show success ------*/
	  		if (isset($_SESSION['success'])) {
			  			
	  			echo '<div class="callout success small" data-closable>';
	  			foreach ($_SESSION['success'] as $error) {
	  				if(strlen($error) > 0)
		  				echo '<p>'.$error.'</p>';
	  			}
	  			echo '<button class="close-button" aria-label="Dismiss success" type="button" data-close>
					    <span aria-hidden="true">X&times;</span>
					  </button>
					</div><br>';

					unset($_SESSION['success']);
	  		}

	  	?>

			<!-- change first name last name email -->
			<div class="singleForm">
				<form action="/jeopardy/profile/update" method="POST">
						<div class="grid-container align-middle">
					    <div class="grid-x grid-padding-x">
					    	<div class="cell medium-2 small-1"></div>

						    <div class="medium-4 cell">
						        <label>First Name
						          <input type="text" placeholder="First name" value="<?php echo $profileDetails['first_name']; ?>" name="first" required>
						        </label>
						    </div>

						    <div class="medium-4 cell">
						        <label>Last Name
						        <input type="text" placeholder="Last name" value="<?php echo $profileDetails['last_name']; ?>" name="last" required>
						    	</label>
						    </div>
					    
					    	<div class="cell medium-2 small-1"></div>
					    </div>


					    <div class="grid-x grid-padding-x">
					    	<div class="cell medium-2 small-1"></div>

						    <div class="medium-8 cell">
						        <label>Email
						          <input type="email" placeholder="Your Email" name="email" value="<?php echo $profileDetails['email'];  ?>" required>
						        </label>
						    </div>
					    
					    	<div class="cell medium-2 small-1"></div>
					    </div>

					    <div class="grid-x grid-padding-x">
					    	<div class="cell medium-2 small-1"></div>

						    <div class="medium-8 cell">
						       	<div class="cell">
						    		<div class="">
										 	<button class="button float-right">Change</button>
										</div>
							    </div>
					    	</div>
					  </div>
				</form>
			</div>

			<div class="singleForm">
				<form action="/jeopardy/profile/passUpdate" method="POST">
						<div class="grid-container align-middle">

					    <div class="grid-x grid-padding-x">
					    	<div class="cell medium-2 small-1"></div>

						    <div class="medium-8 cell">
						        <label>Old Password
						          <input type="password" placeholder="Old Password" name="oldPass" required>
						        </label>
						    </div>
					    
					    	<div class="cell medium-2 small-1"></div>
					    </div>

					    <div class="grid-x grid-padding-x">
					    	<div class="cell medium-2 small-1"></div>

						    <div class="medium-8 cell">
						        <label>New Password
						          <input type="password" placeholder="New Password" name="newPass" required>
						        </label>
						    </div>
					    
					    	<div class="cell medium-2 small-1"></div>
					    </div>

					    <div class="grid-x grid-padding-x">
					    	<div class="cell medium-2 small-1"></div>

						    <div class="medium-8 cell">
						        <label>Confirm Password
						          <input type="password" placeholder="Confirm Password" name="cnfPass" required> 
						        </label>
						    </div>
					    
					    	<div class="cell medium-2 small-1"></div>
					    </div>

					    <div class="grid-x grid-padding-x">
					    	<div class="cell medium-2 small-1"></div>

						    <div class="medium-8 cell">
						       	<div class="cell">
						    		<div class="">
										 	<button class="button float-right">Change</button>
										</div>
							    </div>
					    	</div>
					  </div>
				</form>
			</div>
		</div>
	</div>

	<!-- ------------------- modal ------------------------ -->
	<div class="large reveal" id="avatar-modal" data-reveal>
	  <h3>Change Avatar</h3>

	  <div class="mainImageContainer">
	  	<?php 
	  		for($i = 1; $i < 12; $i += 1){
	  			echo "<div class='imageContainer' id='avatar-{$i}'>
				  	<img src='/jeopardy/includes/images/profile/avatar-{$i}.jpg'>
				  </div>";
	  		}

	  	 ?>
	  </div>

	  <button class="close-button" data-close aria-label="Close modal" type="button">
	    <span aria-hidden="true">X&times;</span>
	  </button>
	</div>

	<p><button class="button" id="modal-btn" style="display: none;" data-open="avatar-modal">Click me for a modal</button></p>
	<?php
		require_once 'footer.php';
	?>

	<script type="text/javascript">
		// add border to selected
		const avatar_id = "<?php echo $profileDetails['avatar_id']; ?>";
		$("#" + avatar_id).addClass('selected');
	</script>


</body>
</html>