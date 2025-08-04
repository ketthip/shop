<?php
$req = new request();

if (auth::login($req->input('username'),$req->input('password'))) {
	if($_SESSION['role_auth'] == "Admin"){
		direction::redirect("home");
	}elseif($_SESSION['role_auth'] == "Operator"){
		direction::redirect("pos");
	}else{
		direction::redirect("home");
		exit;
	}
	
}else{
	direction::backwith("error","Username or Password is Wrong!");
}
