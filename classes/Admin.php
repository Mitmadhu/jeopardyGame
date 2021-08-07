<?php 

	/**
	 * 
	 */
	namespace Classes;
	class Admin
	{
		
		public function show()	
		{	

			view('admin/dashboard');
		}

		public function addSports()
		{
			$con = getCon();
			$sql = $con->prepare("INSERT into sports (question, option1, option2, option3, option4, answer, level) values (?,?,?,?,?,?,?)");
			$sql->execute([$_POST['question'], $_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'],$_POST['correct'],$_POST['level'] ]);
			$_SESSION['success'] = "Data added successfully";
			header('location: /jeopardy/admin');
		}
		public function addEditorial()
		{
			$con = getCon();
			$sql = $con->prepare("INSERT into editorial (question, option1, option2, option3, option4, answer, level) values (?,?,?,?,?,?,?)");
			$sql->execute([$_POST['question'], $_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'],$_POST['correct'],$_POST['level'] ]);
			$_SESSION['success'] = "Data added successfully";
			header('location: /jeopardy/admin');
		}
		public function addTrailer()
		{
			$con = getCon();
			$sql = $con->prepare("INSERT into trailer (question, option1, option2, option3, option4, answer, level) values (?,?,?,?,?,?,?)");
			$sql->execute([$_POST['question'], $_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'],$_POST['correct'],$_POST['level'] ]);
			$_SESSION['success'] = "Data added successfully";
			header('location: /jeopardy/admin');
		}
		public function addTechnology()
		{
			$con = getCon();
			$sql = $con->prepare("INSERT into technology (question, option1, option2, option3, option4, answer, level) values (?,?,?,?,?,?,?)");
			$sql->execute([$_POST['question'], $_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'],$_POST['correct'],$_POST['level'] ]);
			$_SESSION['success'] = "Data added successfully";
			header('location: /jeopardy/admin');
		}
	}

?>
