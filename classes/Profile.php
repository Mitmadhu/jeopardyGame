<?php 
	/**
	 * 
	 */
	namespace Classes;
	class Profile
	{
		private $userModelObj;
		function __construct()
		{
			$this->userModelObj = new Models\UserModel();
		}
		
		public function show($username = "")
		{
			view('profile');
			// var_dump($username);
		}

		public function homepage()
		{
			view('homepage');
		}

		public function getUserDetails($username)
		{
			return $this->userModelObj->getDetailByUsername($username);
		}

		public function update()
		{
			$errors = [];
			$_POST['first'] = ErrorHandler::sanitize($_POST['first']);
			$_POST['last'] = ErrorHandler::sanitize($_POST['last']);
			$_POST['email'] = ErrorHandler::sanitize($_POST['email']);

			if (!strlen($_POST['first'])) {
				array_push($errors, 'First name can not be empty');
			}
			if (!strlen($_POST['last'])) {
				array_push($errors, 'Last name can not be empty');
			}
			if (!strlen($_POST['email'])) {
				array_push($errors, 'Email name can not be empty');
			}

			// if has been changed
			$emailChanged = $this->emailChanged($_POST['email']);

			if ($emailChanged and !$this->userModelObj->emailAvailable($_POST['email'])) {
				array_push($errors, 'Email is already taken');
			}

			foreach($errors as $error){
				if(strlen($error) > 0){
					$_SESSION['errors'] = $errors;
					header('location: /jeopardy/profile');
					return;
				}
			}

			$this->userModelObj->updateDetails($_POST['first'], $_POST['last'], $_POST['email']);
			$_SESSION['success'] = ['Profile updated'];
			header('location: /jeopardy/profile');
		}


		public function passwordUpdate(){
			$oldPass = $_POST['oldPass'];
			$newPass = $_POST['newPass'];
			$cnfPass = $_POST['cnfPass'];
			$errors = [];

			$oldPassFromDatabase = $this->userModelObj->getOldPassword($_SESSION['username']);

			if (!password_verify($oldPass, $oldPassFromDatabase)) {
				array_push($errors, 'Old password does not match');
			}

			if ($cnfPass != $newPass) {
				array_push($errors, 'new password  and confirm password not match');
			}

			foreach($errors as $error){
				if (strlen($error) > 0){
					$_SESSION['errors'] = $errors;
					header('location: /jeopardy/profile');
					return;
				}
			}

			$hashPassword = password_hash($newPass, PASSWORD_DEFAULT);
			$this->userModelObj -> upadatePassword($_POST['username'], $hashPassword);

			header('location: /jeopardy/profile');

		}


		public function changeImage()
		{
			$this->userModelObj->updateImage($_POST['image']);
		}

		private function emailChanged($newEmail){
			$email = $this->userModelObj->getEmail($_SESSION['username']);
			return $email != $newEmail;
		}



	}