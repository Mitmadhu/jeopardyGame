<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="/jeopardy/includes/foundation/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="/jeopardy/includes/css/demo.css">
</head>
<body>
	<?php
		if (!isset($_SESSION['admin'])) {
			header('location: /jeopardy');
			exit();

		}

		/*------------- header ------------------*/
		require_once __DIR__.'/../navbar.php';

	 ?>
	 <!-- 
			sports
			technology
			trailer
			editorial

	  -->

	  <!-- Select menu -->
	  <br>
	  <br>
	  <div class="grid-container">
	  	<div class="grid-x grid-padding-x">
	  		<div class="cell medium-12">
	  			<label><h2>Select Category for which you want to insert question</h2>
		  		  <select name="category" onchange="showCategory(this)">
		  		    <option value="Sports">Sports</option>
		  		    <option value="Technology">Technology</option>
		  		    <option value="Trailer">Trailer</option>
		  		    <option value="Editorial">Editorial</option>
		  		  </select>
		  		</label>
	  		</div>
	  	</div>
	  	<br>
	  	<?php 
	  		if (isset($_SESSION['success'])) {
	  			echo "<div class='callout success' data-closable>
					  <p>". $_SESSION['success'] ."</p>
					  <button class='close-button' aria-label='Dismiss alert' type='button' data-close>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>"	;
	  		}
	  		unset($_SESSION['success']);
	  	 ?>
	  </div>


	  <form action="./insert/Sports" method="POST" id="questionForm">
	    <div class="grid-container">
	      <div class="grid-x grid-padding-x">
	        <div class="medium-12 cell">
	  		  <h1 id="catName">Sports</h1>
	          <label>Question
	        		<textarea name="question" placeholder="Question"></textarea>
	          </label>
	        </div>
	      </div>

	      <div class="grid-x grid-padding-x">
	        <div class="medium-6 cell">
	          <label>Option 1
	            <input type="text" placeholder="Option 1" name="1" required>
	          </label>
	        </div>
	        <div class="medium-6 cell">
	          <label>Option 2
	            <input type="text" placeholder="Option 2" name="2" required>
	          </label>
	        </div>
	      </div>

	      <div class="grid-x grid-padding-x">
	        <div class="medium-6 cell">
	          <label>Option 3
	            <input type="text" placeholder="Option 3" name="3" required>
	          </label>
	        </div>
	        <div class="medium-6 cell">
	          <label>Option 4
	            <input type="text" placeholder="Option 4" name="4" required>
	          </label>
	        </div>
	      </div>	

	      <div class="grid-x grid-padding-x">
	        <div class="medium-6 cell">
	          <label>Correct option ?
				  <select name="correct">
				    <option value="1">option 1</option>
				    <option value="2">option 2</option>
				    <option value="3">option 3</option>
				    <option value="4">option 4</option>
				  </select>
				</label>
	        </div>

	        <div class="medium-6 cell">
	          <label>Question level
				  <select name="level">
				    <option value="100">$100</option>
				    <option value="200">$200</option>
				    <option value="300">$300</option>
				    <option value="400">$400</option>
				  </select>
				</label>
	        </div>
	      </div>	

		<button type="submit" class="success button float-right">Insert</button>

	    </div>
	  </form>

	  <br><br><br>
	  <br><br><br>
	<script type="text/javascript" src="/jeopardy/includes/js/jquery.js"></script>
    <script src="/jeopardy/includes/foundation/js/vendor.js"></script>
    <script src="/jeopardy/includes/foundation/js/foundation.js"></script>
    <script type="text/javascript" src="/jeopardy/includes/js/admin.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>