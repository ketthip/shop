<?php
class router
{
	public static function get($route, $path_to_include)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			self::route($route, $path_to_include);
		}
	}
	public static function post($route, $path_to_include)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			self::route($route, $path_to_include);
		}
	}
	public static function put($route, $path_to_include)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
			self::route($route, $path_to_include);
		}
	}
	public static function patch($route, $path_to_include)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
			self::route($route, $path_to_include);
		}
	}
	public static function delete($route, $path_to_include)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
			self::route($route, $path_to_include);
		}
	}
	public static function any()
	{
		direction::redirect($_ENV['ROUTE_LOGIN']);
	}
	public static function route($route, $path_to_include)
	{
		$route = "/" . $route;
		$path_include = explode('/', $path_to_include);
		if ($path_include[0] == "controller") {
			$path_to_include = "app/$path_to_include";
		} else {
			$path_to_include = "views/$path_to_include";
		}
		// -- For error 404 page include --//
		//$ROOT = $_SERVER['DOCUMENT_ROOT'];
		if ($route == "/404") {
			//include("$ROOT/$path_to_include");
			exit();
		}
		// -- Filter right URL syntax -- //
		//$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
		$request_url = filter_var(str_replace($_ENV['HOST_FOLDER'], "", $_SERVER['REQUEST_URI']), FILTER_SANITIZE_URL);
		// -- Use for specific remove '/' last in URL -- //
		$request_url = rtrim($request_url, '/');
		// -- Prevent use normal param style --//
		$request_url = strtok($request_url, '?');
		// -- Get explode param -- //
		$route_parts = explode('/', $route);
		$request_url_parts = explode('/', $request_url);
		// -- prevent empty array -- //
		array_shift($route_parts);
		array_shift($request_url_parts);

		// -- For without URL param --//
		if ($route_parts[0] == '' && count($request_url_parts) == 0) {
			//include("$ROOT/$path_to_include");
			direction::locate($route);
			include($path_to_include);
			exit();
		}

		if (count($route_parts) != count($request_url_parts)) {
			return;
		}

		$parameters = [];
		for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {

			$route_part = $route_parts[$__i__];
			if (preg_match("/^[$]/", $route_part)) {
				$route_part = ltrim($route_part, '$');
				array_push($parameters, $request_url_parts[$__i__]);
				$$route_part = $request_url_parts[$__i__];
			} else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
				return;
			}
		}
		// -- For with URL param --//
		//include("$ROOT/$path_to_include");
		direction::locate($route);
		include($path_to_include);
		exit();
	}

	/*function out($text){echo htmlspecialchars($text);}
	function set_csrf(){
	  if( ! isset($_SESSION["csrf"]) ){ $_SESSION["csrf"] = bin2hex(random_bytes(50)); }
	  echo '<input type="hidden" name="csrf" value="'.$_SESSION["csrf"].'">';
	}
	function is_csrf_valid(){
	  if( ! isset($_SESSION['csrf']) || ! isset($_POST['csrf'])){ return false; }
	  if( $_SESSION['csrf'] != $_POST['csrf']){ return false; }
	  return true;
	}*/
}
