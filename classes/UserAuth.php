<?php 

	/**
	 * 
	 */
	namespace Classes;
	class UserAuth
	{

		public function viewLogin()
		{
			view('login');
		}

		public function viewRegister()
		{
			view('register');
		}

		public function doLogin()
		{
			// check for csrf security
			$error = [];
			// array_push($error, ErrorHandler::checkString($_POST['first']));
			// array_push($error, ErrorHandler::checkPass($_POST['first']));
			// array_push($error, ErrorHandler::checkEmail($_POST['first']));

			$userModelObj = new Models\UserModel();
			if ($userModelObj->login()) {
				// if its admin
				if ($userModelObj->isAdmin($_POST['username'])) {
					// redirect to admin page
					$_SESSION['admin'] = true;
					header('location: ./admin');
					exit();
				}
				// redirect to homepage
				header('location: ./');
			}

			// show error message
			view('login', ['Username/password does not match']);

		}

		public function doRegister()
		{
			// check for csrf security
			$errors = [];

			if (!strlen($_POST['first'])) {
				array_push($errors, 'First name can not be empty');
			}
			if (!strlen($_POST['last'])) {
				array_push($errors, 'Last name can not be empty');
			}
			if (!strlen($_POST['email'])) {
				array_push($errors, 'Email name can not be empty');
			}

			if (!$this->emailAvailable($_POST['email'])) {
				array_push($errors, 'Email is already taken');
			}

			if (!$this->userAvailable($_POST['username'])) {
				array_push($errors, 'Username is already taken');
			}

			if (!strlen($_POST['username'])) {
				array_push($errors, 'Username name can not be empty');
			}
			if (!strlen($_POST['password'])) {
				array_push($errors, 'Password name can not be empty');
			}

			foreach ($errors as $error) {
				if(strlen($error) > 0){
					view('register', $errors);
					return;
				}
			}

			$userModelObj = new Models\UserModel();
			$result = $userModelObj->registerUser($_POST);
			
			// redirect to dahsboard
			header('location: /jeopardy');
			
			//show the error
			//view('register', $result);

		}

		public function checkUsername()
		{
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where username = ?");
			$sql->execute([$_POST['username']]);


			if ($sql->rowCount() > 0) {
				echo json_encode(false);
				return false;
			}
			else{
			  	echo json_encode(true);
			} 

			return true;
		}

		public function emailAvailable($email){
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where email = ?");
			$sql->execute([$email]);


			if ($sql->rowCount() > 0) {
				return false;
			}
			return true;
		}

		public function userAvailable($username){
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where username = ?");
			$sql->execute([$username]);


			if ($sql->rowCount() > 0) {
				return false;
			}
			return true;
		}


		public function logout()
		{
			session_destroy();
			header('location: /jeopardy');
		}

	}