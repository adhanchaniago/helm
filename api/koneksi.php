<?php
// require_once 'vendor/autoload.php';
require "Medoo.php";

// Using Medoo namespace
use Medoo\Medoo;

// Initialize
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'db_e_document',
    'server' => "localhost",
    'username' => "root",
    'password' => ""
]);
