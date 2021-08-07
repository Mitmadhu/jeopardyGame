<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body id="authBody">
	<?php 
		if (isset($_SESSION['username'])) {
			header('location: /jeopardy/admin');
		}
	?>
	<div id="login-container">
		<div class="grid-x grid-padding-x">
	    	<div class="cell medium-3 small-1"></div>

		    <div class="medium-6 cell">
		       	<div class="cell">
		    		<div>
		    			<br>
					 	<h1 class="text-center">login here</h1>
					</div>
			    </div>
	    	</div>

	    	<div class="cell medium-3 small-1"></div>
	  	</div>

	  	<!-- show errors -->
	  	<?php 
	  		if (isset($data) and count($data)) {
	          
		      echo '<div class="callout alert small" data-closable>';
		      foreach ($data as $error) {
		        if(strlen($error) > 0)
		          echo '<p>'.$error.'</p>';
		      }
		      echo '<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div><br>';
		    }

	  	 ?>
		<!-- Anchors (links) -->
		
		<form action="./doLogin" method="POST">
		  <div class="grid-container align-middle">

		    <div class="grid-x grid-padding-x">
		    	<div class="cell medium-2 small-1"></div>

			    <div class="medium-8 cell">
			        <label>Username
			          <input type="text" placeholder="Username" value="<?php echo Classes\Old::get('username') ?>" name="username">
			        </label>
			    </div>
		    
		    	<div class="cell medium-2 small-1"></div>
		    </div>

		    <div class="grid-x grid-padding-x">
		    	<div class="cell medium-2 small-1"></div>

			    <div class="medium-8 cell">
			        <label>Password
			          <input type="password" placeholder="Password" name="password">
			        </label>
			        <p class="help-text" id="passwordHelpText">Your password must have at least 10 characters, a number, and an Emoji.</p>
			    </div>
		    
		    	<div class="cell medium-2 small-1"></div>
		    </div>

		    <div class="grid-x grid-padding-x">
		    	<div class="cell medium-2 small-1"></div>

			    <div class="medium-8 cell">
			       	<div class="cell">
			    		<div class="">
						 	<button class="button float-right" name="login">Login</button>
						 	<a class="float-left" href="./register">Need an account?</a>
						</div>
				    </div>
		    	</div>
		  	</div>
		</form>
	</div>	

</body>
</html>