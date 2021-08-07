<?php 
	require_once('navbar.php');
	if (!isset($_POST['code'])) {
		header('location: ./dashbaord');
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Play</title>
</head>
<body>
	<?php 
		$limit = 4;
		$gameObj = new Classes\Game();
		// echo "<button onclick='startGame(".$_SESSION['username'].")' class='button'>Start Game</button>";
	?>
	<div id="control"></div>
	
	<div class="grid-container" id="winner-text">
	</div>
	
	<div class="grid-container" id="winner">

			<!-- <div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div><div class="sticker"><aside class="sticker cyan">1st</aside></div></div> -->

	</div>
	<div class="grid-container" id="board">
		<br>
		<table class="unstriped game-table">
			<thead>
				<br>
				<tr><h1 class="text-center animate__animated animate__backInDown">Play Jeopardy</h1></tr>
			</thead>
			<tbody>
				<tr>
					<th class="h4 category-heading">Editorial</th>
					<?php 
						for ($level=100; $level <= 400; $level += 100) { 
							$question = $gameObj->getEditoralQuestion($level);
							echo "<td class='game-td remain' id='editorial-". $question['id'] ."-td'><button class='button large animate__animated' data-open='editorial-". $question['id'] ."' onclick='trigerQuestion(this)'>$".$level."</button></td>";

							// /* ---- model --------*/
							// echo "<div class='reveal animate__animated animate__zoomIn' id='editorial-". $question['id'] ."' data-reveal data-close-on-click='false' data-close-on-esc='false'>
							// 	  <h3>". $question['question'] ."</h3>
							// 	  <form action='' method='post' onsubmit='return checkResponse(this)'>
							// 		<fieldset class='large-5 cell'>
							// 		    <input type='radio' name='option' value='1' required><label>".$question['option1']."</label><br>
							// 		    <input type='radio' name='option' value='2'><label>".$question['option2']."</label><br>
							// 		    <input type='radio' name='option' value='3'><label>".$question['option3']."</label><br>
							// 		    <input type='radio' name='option' value='4'><label>".$question['option4']."</label><br>
							// 		    <button type='submit' class='button success float-right'>Answer It</button>
							// 		</fieldset>
							// 	</form>
								  
							// 	  <button class='close-button' data-close aria-label='Close modal' type='button'>
								    
							// 	  </button>
							// 	</div>"	;
						}
					 ?>
				</tr>

				<tr>
					<th class="h4 category-heading">Sports</th>
					<?php 
						for ($level=100; $level <= 400; $level += 100) { 
							$question = $gameObj->getSportsQuestion($level);
							echo "<td class='game-td remain' id='sports-". $question['id'] ."-td'><button class='button large' data-open='sports-". $question['id'] ."' onclick='trigerQuestion(this)'>$".$level."</button></td>";

							/* ---- model --------*/
							/*echo "<div class='reveal animate__animated animate__zoomIn' id='sports-". $question['id'] ."' data-reveal data-close-on-click='false' data-close-on-esc='false'>
								  <h3>". $question['question'] ."</h3>
								  <form action='' method='post' onsubmit='return checkResponse(this)'>
									<fieldset class='large-5 cell'>
									    <input type='radio' name='option' value='1' required><label>".$question['option1']."</label><br>
									    <input type='radio' name='option' value='2'><label>".$question['option2']."</label><br>
									    <input type='radio' name='option' value='3'><label>".$question['option3']."</label><br>
									    <input type='radio' name='option' value='4'><label>".$question['option4']."</label><br>
									    <button type='submit' class='button success float-right'>Answer It</button>
									</fieldset>
								</form>
								  
								  <button class='close-button' data-close aria-label='Close modal' type='button'>
								    
								  </button>
								</div>"	;*/
						}
					 ?>
				</tr>

				<tr>
					<th class="h4 category-heading">Technology</th>
					<?php 
						for ($level=100; $level <= 400; $level += 100) { 
							$question = $gameObj->getTechnologyQuestion($level);
							echo "<td class='game-td remain' id='technology-". $question['id'] ."-td'><button class='button large' data-open='technology-". $question['id'] ."' onclick='trigerQuestion(this)'>$".$level."</button></td>";

							/* ---- model --------*/
							/*echo "<div class='reveal animate__animated animate__zoomIn' id='technology-". $question['id'] ."' data-reveal data-close-on-click='false' data-close-on-esc='false'>
								  <h3>". $question['question'] ."</h3>
								  <form action='' method='post' onsubmit='return checkResponse(this)'>
									<fieldset class='large-5 cell'>
									    <input type='radio' name='option' value='1' required><label>".$question['option1']."</label><br>
									    <input type='radio' name='option' value='2'><label>".$question['option2']."</label><br>
									    <input type='radio' name='option' value='3'><label>".$question['option3']."</label><br>
									    <input type='radio' name='option' value='4'><label>".$question['option4']."</label><br>
									    <button type='submit' class='button success float-right'>Answer It</button>
									</fieldset>
								</form>
								  
								  <button class='close-button' data-close aria-label='Close modal' type='button'>
								    
								  </button>
								</div>"	;*/
						}
					 ?>
				</tr>

				<tr>
					<th class="h4 category-heading">Trailer</th>
					<?php 
						for ($level=100; $level <= 400; $level += 100) { 
							$question = $gameObj->getTrailerQuestion($level);
							echo "<td class='game-td remain' id='trailer-". $question['id'] ."-td'><button class='button large' data-open='trailer-". $question['id'] ."' onclick='trigerQuestion(this)'>$".$level."</button></td>";

							/* ---- model --------*/
							/*echo "<div class='reveal animate__animated animate__zoomIn' id='trailer-". $question['id'] ."' data-reveal data-close-on-click='false' data-close-on-esc='false'>
								  <h3>". $question['question'] ."</h3>
								  <form action='' method='post' onsubmit='return checkResponse(this)'>
									<fieldset class='large-5 cell'>
									    <input type='radio' name='option' value='1' required><label>".$question['option1']."</label><br>
									    <input type='radio' name='option' value='2'><label>".$question['option2']."</label><br>
									    <input type='radio' name='option' value='3'><label>".$question['option3']."</label><br>
									    <input type='radio' name='option' value='4'><label>".$question['option4']."</label><br>
									    <button type='submit' class='button success float-right'>Answer It</button>
									</fieldset>
								</form>
								  
								  <button class='close-button' data-close aria-label='Close modal' type='button'>
								    
								  </button>
								</div>"	;*/
						}
					 ?>
				</tr>
			</tbody>


		</table>
		<!-- score card -->
		<br>
	</div>

	<div class="grid-container">
		<hr>
		<p>Scorecard of players</p>

		<div class="grid-x grid-margin-x small-up-2 medium-up-3" id="score-card">
				<!-- <div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div></div>
				<div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div></div>
				<div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div></div>

				<div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div></div>
				<div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div></div>
				<div class="card game-card"><div class="card-section"><p>Username: ${payload[0]}</p><p>Correct: ${payload[1]}</p><p>Incorrect: ${payload[2]}</p><p>Score: ${payload[3]}</p></div></div> -->

		</div>
	</div>

	

	<!-- <div class="cell">
		<div class="card game-card">
		  <img src="/jeopardy/includes/images/wrong.jpeg" width="70">
		  <div class="card-section">
		  	<p>Incorect</p>
		    <p id="total-incorrect">0</p>
		  </div>
		</div>
	</div>
	<div class="cell">
		<div class="card game-card">
		  <img src="/jeopardy/includes/images/score.png" width="90">
		  <div class="card-section">
		  	<p>Total Score</p>
		    <p id="total-score">0</p>
		  </div>
		</div>
	</div> -->
		<div class='reveal' id="all-question-model" data-reveal data-close-on-click='false' data-close-on-esc='false'>
		  <!-- <h1>Awesome. I Have It.</h1>
		  <p class='lead'>Your couch. It is mine.</p>
		  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
		  <button class='close-button' data-close aria-label='Close modal' type='button'>
		    <span aria-hidden='true'>&times;</span>
		  </button> -->
		</div>
		</div>

		<button class='button' data-open='all-question-model' id="openModal" >Click me for a modal</button>

	<br><br>

	<!-- <div id="modal-from-io"></div> -->


	<script type="text/javascript" src="/jeopardy/includes/js/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.min.js" integrity="sha512-eVL5Lb9al9FzgR63gDs1MxcDS2wFu3loYAgjIH0+Hg38tCS8Ag62dwKyH+wzDb+QauDpEZjXbMn11blw8cbTJQ==" crossorigin="anonymous"></script>

	<script type="text/javascript" src="/jeopardy/includes/js/socketDemo.js"></script>
	<script type="text/javascript">

		$(document).ready(() => {
			const room = <?php echo json_encode($_POST['code']); ?>;
			const username = <?php echo json_encode($_SESSION['username']); ?>

			// join user to their room
			joinRoom(room, username);


			// prevent user to refresh
			window.onbeforeunload = function() {
		        return "Dude, are you sure you want to leave? You will lose the game!";
		    }

		    function disableF5(e) { 
		    	if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault();
		    };
		    $(document).on("keydown", disableF5);

		});
		
		const userLoggedIn = '<?php echo $_SESSION['username'] ?>';

		
	</script>
	

	<!-- <div class='reveal' id='exampleModal1' data-reveal>data-close-on-click='false' data-close-on-esc='false'>
	  <h1>Awesome. I Have It.</h1>
	  <p class='lead'>Your couch. It is mine.</p>
	  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
	  <button class='close-button' data-close aria-label='Close modal' type='button'>
	    <span aria-hidden='true'>&times;</span>
	  </button>
	</div>

	<p><button class='button' data-open='exampleModal1'>Click me for a modal</button></p> -->
</body>
</html>