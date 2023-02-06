<?php

session_start();

if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
	unset($_SESSION['dept']);

}

header("Location: ../index.php");