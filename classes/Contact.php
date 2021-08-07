<?php 
	/**
	 * 
	 */
	namespace Classes;
	class Contact
	{
		
		public function show()
		{
			view('contact');
			// var_dump($username);
		}

		public function feedback()
		{
			$con = getCon();
			$sql = $con->prepare("INSERT into contacts (name, email, feedback) VALUES (:name, :email, :feedback)");
			$sql->execute([
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'feedback' => $_POST['feedback']
			]);

			$_SESSION['success'] = ['Thanks for contacting'];
			header('location: /jeopardy/contact');
		}
	}