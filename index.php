<?php
require_once('configs/config.php');
require_once('libraries/Controller.php');
require_once('libraries/Database.php');
require_once('helpers/library.php');
require_once ('route.php');
session_start();
$route = new Route();