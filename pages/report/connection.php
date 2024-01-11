<?php
// Establishing Connection with Server by passing inputs as a parameter

// $con = mysqli_connect('localhost','root','','db_barangay') or die(mysqli_error());

$conn = mysqli_connect("localhost", "root", "", "barangay") or die("Could not connect");
date_default_timezone_set("Asia/Manila");
?>
