<?php
session_start();
	unset($_SESSION["emailM"]);
	unset($_SESSION["passwordM"]);
	unset($_SESSION["nameM"]);
	header("location:JoinUs.html");
?>