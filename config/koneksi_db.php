<?php
define('HOST', 'localhost');
define('USER', 'root');
define('DB', 'latihan_crud rest_api');
//passwor disesuaikan dengan akses databse masing-masing
define('PASS', '');
$conn = new mysqli(HOST, USER, PASS, DB) or die('koneksi error untuk mengakses  database');
