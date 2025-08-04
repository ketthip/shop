<?php
class direction
{
	public static function locate($route)
	{
		if (isset($_SESSION['LOGIN_auth'])) {
			foreach($_ENV['ROUTE_PAGES'] as $url){
				if (strpos($route,"/".$url) !== false || "/" . $_ENV['ROUTE_LOGIN'] == $route) {
					echo header("Location:" . $_ENV['HOST_FOLDER'] . "/" . $_ENV['ROUTE_HOME']);
					exit();
				}
			}
		} else {
			foreach($_ENV['ROUTE_PAGES'] as $url){
				if (strpos($route,"/".$url) !== false || "/" . $_ENV['ROUTE_LOGIN'] == $route) {
					$chk = true;
					break;
				}
			}
			if(!$chk){
				echo header("Location:" . $_ENV['HOST_FOLDER'] . "/" . $_ENV['ROUTE_LOGIN']);
				exit();
			}
		}
	}

	public static function redirect($url)
	{
		echo header("Location:" . $_ENV['HOST_FOLDER'] . "/" . $url);
		exit();
	}

	public static function back()
	{
		echo header("Location:" . $_SERVER['HTTP_REFERER']);
		exit();
	}

	public static function backwith($name, $value)
	{
		$_SESSION['TIME_flash'] = time();
		$_SESSION[$name . "_flash"] = $value;
		echo header("Location:" . $_SERVER['HTTP_REFERER']);
		exit();
	}
}
