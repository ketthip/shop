<?php
class connect{
	public static function db(){
		try{
			return new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_DATABASE'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
		}catch(PDOException $error){
			return $error->getmessage();
		}
	}
}