<?php 
	/**
	 * 
	 */
	namespace Classes;
	class User
	{
		
		public function showProfile($username)
		{
			view('userProfile');
			var_dump($username);
		}

		public function homepage()
		{
			view('homepage');
		}
	}