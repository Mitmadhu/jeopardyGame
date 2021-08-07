<?php 

	/**
	 * 
	 */
	namespace Classes\Models;
	class UserModel
	{

		public function registerUser($data)
		{
			$con = getCon();
			$data['first'] = ucfirst($data['first']);
			$data['last'] = ucfirst($data['last']);

			$sql = "INSERT INTO users (first_name,last_name,username,password,email) VALUES (?,?,?,?,?)";
			$stmt= $con->prepare($sql);
			$stmt->execute(
				[$data['first'],
				$data['last'],
				$data['username'],
				password_hash($data['password'], PASSWORD_DEFAULT),
				$data['email']]
			);

			$_SESSION['username'] = $data['username'];
			$_SESSION['name'] = $data['first'] ."  ". $data['last'];
		}

		public function login()
		{
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where username = ?");
			$sql->execute([$_POST['username']]);

			if ($sql->rowCount() > 0) {
			  	// output data of each row
				$rows = $sql->fetchAll(\PDO::FETCH_ASSOC);
				
				if (password_verify($_POST['password'], $rows[0]['password'])) {

					$_SESSION['username'] = $rows[0]['username'];
					$_SESSION['name'] = $rows[0]['first_name']." ".$rows[0]['last_name'];
					
					return true;
				}
				
			} 
			return false;
		}

		public function isAdmin($username)
		{
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where username = ? and role = ? limit 1");
			$sql->execute([$username, 'admin']);
			return $sql->rowCount() > 0;
		}

		public function getDetailByUsername($username){
			$con = getCon();
			$sql = $con->prepare("SELECT * from users where username =:username limit 1");
			$sql->execute([ 'username' => $username]);

			return $sql->fetch();
		}

		public function getEmail($username){
			$con = getCon();
			$sql = $con->prepare("SELECT email from users where username=:username limit 1");
			$sql->execute(['username' => $username]);

			$result = $sql->fetch();
			return $result['email'];
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

		public function updateDetails($first, $last, $email)
		{
			$con = getCon();
			$sql = $con->prepare("UPDATE users set first_name=:first, last_name=:last, email=:email where username=:username");
			$sql->execute([
				'first' => $first,
				'last' => $last,
				'email' => $email,
				'username' => $_SESSION['username']
			]);
		}

		public function getOldPassword($username)
		{
			$con = getCon();
			$sql = $con->prepare("SELECT password from users where username = :username");
			$sql->execute(['username' => $username]);
			$res = $sql -> fetch();
			return $res['password'];
		}

		public function upadatePassword($username, $newPass){
			$con = getCon();
			$sql = $con->prepare('UPDATE users set password = :newPass where username = :username');
			$sql->execute(['newPass' => $newPass, 'username' => $username]);
			$_SESSION['success'] = ['Password updated successfully'];
		}

		public function addScore($score)
		{
			$con = getCon();
			$sql = $con->prepare("UPDATE users set total_score = total_score + $score where username = :username");
			$sql->execute(['username' => $_SESSION['username']]);
		}

		public function incWon(){
			$con = getCon();
			$sql = $con->prepare("UPDATE users set won = won + 1 where username = :username");
			$sql->execute(['username' => $_SESSION['username']]);
		}



		public function updateImage($imageName)
		{
			$con = getCon();
			$sql = $con->prepare("UPDATE users set avatar_id = :imageName, avatar = :avatar where username = :username");

			$avatar = "/jeopardy/includes/images/profile/". $imageName .".jpg";	
			$sql->execute([
				'avatar' => $avatar,
				'imageName' => $imageName,
				'username' => $_SESSION['username']
			]);
		}










	}