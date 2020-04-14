<?php
include("session.php");
session_destroy();
header('Location:./main_page.php');
?>