<?php 
	/**
	 * 
	 */
	namespace Classes;
	class Game
	{
		private $con, $userModalObj;
		function __construct()
		{
			$this->con = getCon();
			$this->userModalObj = new Models\UserModel();
		}
		public function show(){
			view('game');
		}


		public function getEditoralQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from editorial where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}

		public function getSportsQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from sports where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
		
		public function getTechnologyQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from technology where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}
		
		public function getTrailerQuestion($level)
		{
			
			$sql = $this->con->prepare("SELECT * from trailer where level=? order by rand() limit 1");
			$sql->execute([$level]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}

		public function checkResponse()
		{   
			$table = $_POST['database'];
			$sql = $this->con->prepare("SELECT * from $table where id = ? and answer = ? LIMIT 1");
			$sql->execute([$_POST['ques_id'], intval($_POST['option'])]);

			if ($sql->rowCount()){
				$result = $sql->fetch(\PDO::FETCH_ASSOC);
				$data = array('result' => true, 'marks' => $result['level']);
				echo json_encode($data);
			}
			
			else{
				$data = array('result' => false, 'marks' => 0);
				echo json_encode($data);
			}


		}

		public function getEditorialQuestionById($id)
		{
			$sql = $this->con->prepare("SELECT * from editorial where id = ? limit 1");
			$sql->execute([$id]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}

		public function getSportsQuestionById($id)
		{
			$sql = $this->con->prepare("SELECT * from sports where id = ? limit 1");
			$sql->execute([$id]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}

		public function getTechnologyQuestionById($id)
		{
			$sql = $this->con->prepare("SELECT * from technology where id = ? limit 1");
			$sql->execute([$id]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}

		public function getTrailerQuestionById($id)
		{
			$sql = $this->con->prepare("SELECT * from trailer where id = ? limit 1");
			$sql->execute([$id]);
			return $sql->fetch(\PDO::FETCH_ASSOC);
		}


		public function getModal()
		{
			$database = $_POST['database'];
			$id = $_POST['id'];

			if ($database == 'editorial') {
				$question = $this->getEditorialQuestionById($id);
			}
			else if ($database == 'trailer') {
				$question = $this->getTrailerQuestionById($id);
				
			}
			else if ($database == 'technology') {
				$question = $this->getTechnologyQuestionById($id);
				
			}
			else{
				$question = $this->getSportsQuestionById($id);
			}



			echo "<p id='game-time-left' class='green red'>Time Left:</p>
				<h3>". $question['question'] ."</h3>
				  <form action='#' method='post' onsubmit='return checkResponseById(\"".$database."\", ".$id.", this, \"".$_SESSION['username']."\")'>
					<fieldset class='large-5 cell'>
					    <input type='radio' name='option' value='1' required><label>".$question['option1']."</label><br>
					    <input type='radio' name='option' value='2'><label>".$question['option2']."</label><br>
					    <input type='radio' name='option' value='3'><label>".$question['option3']."</label><br>
					    <input type='radio' name='option' value='4'><label>".$question['option4']."</label><br>
					    <button type='submit' class='button success float-right'>Answer It</button>
					</fieldset>
				</form>
				  
				  <button class='close-button' data-close aria-label='Close modal' type='button'>
				  </button>	";
		}

		public function showScoreCard()
		{
			$username = $_POST['username'];
			echo "<div class='grid-x grid-margin-x small-up-2 medium-up-3'>
					<div class='cell'>
						<div class='card game-card'>
						  <img src='/jeopardy/includes/images/correct.jpg' width='50' height='100'>
						  <div class='card-section'>
						  	<p>Correct</p>
						    <p id='total-correct'>0</p>
						  </div>
						</div>
					</div>
					<div class='cell'>
						<div class='card game-card'>
						  <img src='/jeopardy/includes/images/wrong.jpeg' width='70'>
						  <div class='card-section'>
						  	<p>Incorect</p>
						    <p id='total-incorrect'>0</p>
						  </div>
						</div>
					</div>
					<div class='cell'>
						<div class='card game-card'>
						  <img src='/jeopardy/includes/images/score.png' width='90'>
						  <div class='card-section'>
						  	<p>Total Score</p>
						    <p id='total-score'>0</p>
						  </div>
						</div>
					</div>
			</div>";
		}


		public function updateScore()
		{
			$this->userModalObj->addScore($_POST['score']);	
		}
		public function winnerInc()
		{
			$this->userModalObj->incWon();	
			
		}
	}