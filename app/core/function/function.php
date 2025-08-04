<?php
function flash($name)
{
	$expire = 1;
	if (isset($_SESSION[$name . "_flash"])) {
		$inactive = time() - $_SESSION['TIME_flash'];
		if ($inactive >= $expire) {
			unset($_SESSION[$name . "_flash"]);
		}
		return $_SESSION[$name . "_flash"];
	}
}

function auth($name)
{
	return $_SESSION[$name . "_auth"];
}

function session($name, $val = "")
{
	if ($val != "") {
		return $_SESSION[$name . "_session"] = $val;
	} else {
		return $_SESSION[$name . "_session"];
	}
}

function extend($url)
{
	return include("views/" . $url . ".php");
}

function url($url)
{
	return $_ENV['HOST_FOLDER'] . "/" . $url;
}

function asset($url)
{
	return $_ENV['HOST_FOLDER'] . "/assets/" . $url;
}

function storage($url)
{
	return $_ENV['HOST_FOLDER'] . "/storage/" . $url;
}