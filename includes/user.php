<?php 
	require_once("database.php");

	class user{

		public $id;
		public $user_name;
		public $password;
		public $first_name;
		public $last_name;

		public function find_all(){
			return self::find_by_sql("SELECT * FROM users");
		}

		public function find_by_id($id=0){
			$result=self::find_by_sql("SELECT * FROM users WHERE id='{$id}'");
			return $database->fetch_result($result);

		}

		public function find_by_sql($query=""){

			global $database;

			$result=$database->perform_query($query);

			$result=$database->fetch_result($result);

			return $result;
		}


		public function full_name(){

			if (isset($this->first_name) && isset($this->last_name)) {
				return $this->first_name . " ". $this->last_name;
			}
				else{
					return "Not Set yet";
				}

		}



		public function instantiate($record){

			$u=new self;

			foreach ($record as $attribute => $value) {
				if ($u->has_attribute($attribute)) {
					$u->$attribute=$value;
				}
			}

			return $u;

		}

		private function has_attribute($attribute){
			$objVars=get_object_vars($this);

			return array_key_exists($attribute, $objVars);

		}


		public function authenticate($user_name="", $user_pass=""){

			global $database;

			$query="SELECT * FROM users where Email='{$user_name}' AND Password='{$user_pass}' LIMIT 1";

			 $result=self::find_by_sql($query);
			 self::instantiate($result);
			 return !empty($result) ? array_shift($result) : false;

		}


		public function give_me_hash($password){
			$hash_format="$2y$11$";
			$salt="amarektanodiacheNirjon";

			$format_salt=$hash_format.$salt;

			$hashed=crypt($password, $format_salt);

			return $hash;

		}

	}

	$user=new user();

	echo $user->give_me_hash("Kala");
 ?>