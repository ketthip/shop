<?php
class request
{
	function input($name)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			foreach ($_POST as $key => $request) {
				if ($key == $name) {
					return $_POST[$name];
				}
			}
		} else {
			return;
		}
	}

	function file($name, $val = "tmp_name")
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			foreach ($_FILES as $key => $request) {
				if ($key == $name) {
					foreach ($_FILES[$name] as $subkey => $file) {
						if ($subkey == $val) {
							return $_FILES[$name][$val];
						}
					}
				}
			}
		} else {
			return;
		}
	}

	function store($tmp, $path)
	{
		return move_uploaded_file($tmp, "storage/" . $path);
	}

	function get()
	{
		return $_REQUEST;
	}
}
