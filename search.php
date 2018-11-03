<?php
		  $Host='localhost';
		  $User='root';
		  $Password='';
		  $Database='fssk2';
		   
 mysql_connect($Host,$User,$Password);
 mysql_select_db($Database);
 
$output='';

if (isset($_POST['search']))
{
	$searchq=$_POST['search'];
	$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	
	$query=mysql_query("SELECT * FROM sheet7 WHERE FileName LIKE '$searchq%' OR ID LIKE '%$searchq%'") or die("could not search");
	$count = mysql_num_rows($query);
	if ($count==0)
	{
		$output='OOPS! NO RESULTS FOUND';
		
	}
	else
	{
		while($row=mysql_fetch_array($query))  		//fetching the record

		{		
		
	$ID=$row['ID'];
	$FileName=$row['FileName'];
	$Folder=$row['Folder'];
	$ContainingFolder=$row['ContainingFolder'];

	
	//INITIALIZATION OF OUTPUT
$output .=	 
			("<table border='1'>"
			."<tr width='100px' height='20px' >" 
			."<th>"
			."FileName"
			."</th>"
            ."<td width='1000px'>"
			."<a href='$Folder/$FileName'>$FileName</a>"
			."</td>"
            ."</tr>"
			."</table>");
 
		
	
		}
		
	}
		
}
?>

<html>
<head>
	<!-----------------------ONLINE LINKS OF BOOTSTRAP AND FONTAWESOME ------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	
	<!-----------------------INTERNAL CSS ------------------------------->
	<style> 	
		input
		{
			width: 900px !important;
			height:45px;
			border-radius:20px !important;
			border-color:grey !important;
			margin:5px 0px 0px 200px;
		
		}
			#btn
		{	
			margin-left:450px !important;
		}
		body
		{
		background-repeat:no-repeat;
		background-size:1382px 750px ;
		width:100%;
		
		}
		h1
		{
			font: italic bold 90px Georgia, serif;
			
			 margin:50px 0px 0px 430px;
			 color:#ccccff;
		}
		
					
							
			input.MyButton 
			{
			margin:30px 10px 0px 1200px !important;
			width:100px !important;
			padding-bottom: 30px;
			cursor: pointer;
			font-weight: bold;
			font-size: 150%;
			background: #007a99;
			color: #fff;
			border: 1px solid #3366cc;
			border-radius: 10px;
			-moz-box-shadow:: 6px 6px 5px #999;
			-webkit-box-shadow:: 6px 6px 5px #999;
			box-shadow:: 6px 6px 5px #999;
			}
			
			input.MyButton:hover 
			{
			color: red;
			background: #000;
			border: 1px solid #fff;
			}

	</style>
	
</head>

	<!-----------------------BODY------------------------------->
<body style="background: linear-gradient(to right, #000099,#3333ff,#9999ff,#3333ff,#000099);">
	<div>	
		<div> 
			<form>
<input class="MyButton" type="button" value="Logout" onclick="window.location.href='index.php'" />

</form>
        </div>
<div style="background: linear-gradient(to right,#9999ff,#e6e6ff,#9999ff ); margin:50px 180px 0px 180px;padding:10px 30px 0px 390px;">

	 </div>
	 <!-----------------------HEADING------------------------------->
		<h1> K I N P O E </h1>
		     <div class="row" id="search_bar">
		         <form id="search" action="search.php" method="post">
                     <div> 
					 <!-----------------------SEARCH BAR------------------------------->
					     <input id="search" type="text" placeholder="Search Your Data Here..." name="search">
						 
						 <!-----------------------BUTTON------------------------------->
							 <button class="btn">
						   
						         Search  <label for="search-input">
						                     
						                         
						                 </label>
						   
						 </button>
						 
					 </div>
                    
					 </form>
	         </div>
     </div>
	 


<div style="background: linear-gradient(to right,#9999ff,#e6e6ff,#9999ff ); margin:10px 150px 0px 150px;padding:10px 30px 0px 20px;">
	 
	 <!-----------------------PRINTING OF OUTPUT------------------------------->
	 <?php
	 print("$output");
	 ?>
	
	 </div>
</body>
</html>