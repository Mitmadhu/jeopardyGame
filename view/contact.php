<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact</title>
</head>
<body>
	<?php
		require_once 'header.php';
		require_once 'navbar.php';
	?>

	<div id="contactContainer">
		<?php 
			if (isset($_SESSION['success'])) {
			  			
	  			echo '<div class="displayFlex">
	  					<div class="callout success small" data-closable>';
	  			foreach ($_SESSION['success'] as $error) {
	  				if(strlen($error) > 0)
		  				echo '<p>'.$error.'</p>';
	  			}
	  			echo '<button class="close-button" aria-label="Dismiss success" type="button" data-close>
					    <span aria-hidden="true">X&times;</span>
					  </button>
					</div>
					</div><br>';

					unset($_SESSION['success']);
	  		}

		?>
		<form action="/jeopardy/contact/feedback" method="POST">
			<div class="grid-container align-middle">
			    <div class="grid-x grid-padding-x">
			    	<div class="cell medium-2 small-1"></div>

				    <div class="medium-4 cell">
				        <label>Your Name
				          <input type="text" placeholder="Your Name" name="name">
				        </label>
				    </div>

				    <div class="medium-4 cell">
				        <label>Your Email
				        <input type="email" placeholder="Your Email" name="email">
				    	</label>
				    </div>
			    
			    	<div class="cell medium-2 small-1"></div>
			    </div>


			    <div class="grid-x grid-padding-x">
			    	<div class="cell medium-2 small-1"></div>

				    <div class="medium-8 cell">
				        <label>Feedback
				          <textarea placeholder="Type here..." name="feedback"></textarea>
				        </label>
				    </div>
			    
			    	<div class="cell medium-2 small-1"></div>
			    </div>

			    <div class="grid-x grid-padding-x">
			    	<div class="cell medium-2 small-1"></div>

				    <div class="medium-8 cell">
				       	<div class="cell">
				    		<div class="">
								 	<button class="button float-right">Send</button>
								</div>
					    </div>
			    	</div>
			  </div>
		</form>
	</div>

	<span style="padding: 10%;">Created By</span>
	<div class="contactInfo">
		<div class="developer">
			<span class="colorText"><a href="#">Madhu Verma</a></span>
		</div>
		<div class="developer">
			<span class="colorText"><a href="#">Madhu Verma</a></span>
		</div>
		<div class="developer">
			<span class="colorText"><a href="#">Madhu Verma</a></span>
		</div>
		<div class="developer">
			<span class="colorText"><a href="#">Madhu Verma</a></span>
		</div>
		<div class="developer">
			<span class="colorText"><a href="#">Madhu Verma</a></span>
		</div>
	</div>

	<?php
		require_once 'footer.php';
	?>
</body>
</html>