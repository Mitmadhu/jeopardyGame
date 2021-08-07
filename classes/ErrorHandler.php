<?php 
	/**
	 * 
	 */
	namespace Classes;
	class ErrorHandler
	{
		
		public static function checkString($code){
			$code = $this->sanitize($code);
			if (strlen($code) == 0) {
				
			}
		}
		
		public static function checkPass($code){
			
			return $code;

		}
		
		public static function checkEmail($code){
			
			return $code;

		}

		public static function sanitize($code){
			$code = strip_tags($code);
			$code = htmlspecialchars($code);
			$code = str_replace(' ', '', $code);
			$code = trim($code);

			return $code;
		}
	}