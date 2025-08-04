<?php
date_default_timezone_set("Asia/Bangkok");
//error_reporting(0);
session_start();
require 'config/config.php';
require 'direction/direction.php';
require 'connect/connect.php';
require 'auth/auth.php';
require 'database/database.php';
require 'request/request.php';
require 'function/function.php';
require 'vendor/autoload.php';
require 'router/router.php';