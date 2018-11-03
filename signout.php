<?php
   include('Common.php');
   include('DbConnection.php');
   session_destroy(); 
   redirect("signin.php");
   
?>