<?php
include('Common.php');

$Username='';
$Password='';
$msg='';

if(isset($_POST['issubmit']) && $_POST['issubmit'] == 'true')
{
	if(isset($_POST['Username']))
		$Username=trim($_POST['Username']);
	
	if(isset($_POST['Password']))
		$Password=trim($_POST['Password']);
	
	if($Username=='')
		$msg='Kindly Enter Username :) ';
	else  if($Password=='')
		$msg='Kindly Enter Password :) ';
	
	if($msg =='')
	{
		$sql = "SELECT ID,Username,Password,Name FROM users WHERE Username = '".$Username."'";
		$res = mysql_query($sql) or die(mysql_error()); 
		$row = mysql_fetch_assoc($res);		
		if($row['Password'] == $Password)
		{
			$_SESSION['IsLogin']=true;
			$_SESSION['UserID']=$row['ID'];
			$_SESSION['Username']=$row['Username'];
			$_SESSION['Password']=$row['Password'];
			$_SESSION['Name']=$row['Name'];
			redirect("search.php");
			
			
			
		}
		else
		{
			$msg='Invalid username / password';
		}
	}
	
}

?>

<html>

   <head>
   	<!-----------------------ONLINE LINKS OF BOOTSTRAP AND FONTAWESOME ------------------------------->
	
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
      
	  <!-----------------------INTERNAL CSS ------------------------------->
     <style  style="text/css">
	 .container 
	 { background-color:white;
	    margin-top:120px;
	    margin-left:550px;
		border: 3px solid black;
		width:350px;
		height:280px;
		border-radius:50px;
		padding-top:50px;
		padding-left:70px;
		
	 }
	 
	 
	 
	    input
		{
		margin: 20px 10px 0px 0px;
		border: 1px solid black;
		padding-top:2px;
		}
	 
	 button{
	    margin: 25px 200px 5px 50px !important;

	 }
	 
	 body
	 {
	 background-image:url("img/5.jpg");
	 background-repeat:no-repeat; 
	 background-size:1400px 650px ;
	 background-repeat: no-repeat;
   -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;


	 }
	 
	 h1
	 {
	    margin: 100px 100px 0px 460px;
	 }
	
.scroll-left 
{
 height: 50px;	
 overflow: hidden;
 position: relative;
}

.scroll-left p 
{
 position: absolute;
 width: 100%;
 height: 100%;
 margin: 100px;
 line-height: 50px;
 text-align: center;
 /* Starting position */
 -moz-transform:translateX(100%);
 -webkit-transform:translateX(100%);	
 transform:translateX(100%);
 /* Apply animation to this element */	
 -moz-animation: scroll-left 10s linear infinite;
 -webkit-animation: scroll-left 10s linear infinite;
 animation: scroll-left 10s linear infinite;
}

/* Move it (define the animation) */
@-moz-keyframes scroll-left 
{
 0%   { -moz-transform: translateX(100%); }
 100% { -moz-transform: translateX(-100%); }
}

@-webkit-keyframes scroll-left 
{
 0%   { -webkit-transform: translateX(100%); }
 100% { -webkit-transform: translateX(-100%); }
}

@keyframes scroll-left 
{
 0%   { 
 -moz-transform: translateX(100%); /* Browser bug fix */
 -webkit-transform: translateX(100%); /* Browser bug fix */
 transform: translateX(100%); 		
 }
 100% { 
 -moz-transform: translateX(-100%); /* Browser bug fix */
 -webkit-transform: translateX(-100%); /* Browser bug fix */
 transform: translateX(-100%); 
 }
}
</style>
	  
  </head>
   
   
   <body>
   <br>
   <div class="scroll-left">
   <marquee behavior="scroll" direction="left"><span style=" font-size:35px; margin-top:60px;"> <span style="color:#4da6ff;"><strong> <mark style="color:#4da6ff;">K2 FULL SCOPE SIMULATOR MANAGEMENT SYSTEM </mark></strong></span> </marquee>
   </div>

 
   <div class="container" >
   <?php echo $msg; ?></p>

<form action="<?php echo $self?>"  method="post">
     <b> <i style="margin-right:22px;"> <strong>Name: </strong></i><b>   <input type="text"  placeholder="Username" name="Username"> <br> 
	  <b> <i>Password:  </i><input type="password" placeholder="Password" name="Password"/> <br>
	 <button  href="Data.html" name="submit" type="submit" class="btn btn-info"><i >SIGN IN </i> <i class="fa fa-sign-in" aria-hidden="true"></i></button>
</form>

	  <input type="hidden" name="issubmit" value="true">
	 </div>
   </body>






</html>