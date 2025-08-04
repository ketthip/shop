<?php
class auth{
	public static function login($username,$password){
		$pdo = connect::db();
		$login = $pdo->prepare("select * from ".$_ENV['TB_USER']." where ".$_ENV['TB_USERNAME']." =:username AND ".$_ENV['TB_PASSWORD']."=:password");
		$login->bindParam(':username', $username);
		$login->bindParam(':password', $password);
		$login->execute();
		$users = $login->fetch(PDO::FETCH_ASSOC);
		if(empty($users)){
			return false;
		}else{
			$_SESSION['LOGIN_auth'] = true;
			foreach($users as $key => $user){
				$_SESSION[$key."_auth"] = $user;
			}
			return true;
		}
	}

}