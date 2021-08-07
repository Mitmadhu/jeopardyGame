<?php 

	/**
	 * 
	 */
	namespace Classes;
	class Old
	{
		
		public static function get($name)	
		{	
			if (isset($_POST[$name])) {
				return $_POST[$name];
			}
			return '';
		}
	}