<?php
include("../.../public/index.php");

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../../')->load();

define("HOST", $_ENV['DB_HOST']);
define("USER", $_ENV['DB_USERNAME']);
define("PASSWORD", $_ENV['DB_PASSWORD']);
define("DATABASE", $_ENV['DB_DATABASE']);

?>