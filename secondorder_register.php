<!-- Enable debug using ?debug=true" -->
<?php
ob_start();
include("db_config.php");
ini_set('display_errors', 1);
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Second Order SQL Injection User Registration - SQL Injection Training App</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead" style="color:white">
				Second Order SQL Injection User Registration page</a>
			</p>
        </div>
		
		<div class="response">
		
			<p style="color:white">
			<table class="response">
			<form method="POST" autocomplete="off">
			
			<tr>
				<td>
					Enter your username:  
				</td>
				<td>
					<input type="text" id="uid" name="uid"><br />
				</td>
			</tr>

			<tr>
				<td>
					Enter a password:  
				</td>
				<td>
					<input type="password" id="password" name="password"><br />
				</td>
			</tr>

			<tr>
				<td>
					Enter your Name: 
				</td>
				<td>
					<input type="text" id="name" name="name"><br />
				</td>
			</tr>

			<tr>
				<td>
					Describe yourself:
				</td>
				<td>
					<textarea rows="8" cols="50" id="descr" name="descr"></textarea><br />
				</td>
			</tr>	
<tr>
<td>
</td>
</tr>
			<tr>
				<td>
					<input type="submit" value="Submit"/> 
				</td>
				<td>
					<input type="reset" value="Reset"/>
				</td>
			</tr>			
			</table>
				
			</p>

		</form>
        </div>
    
        
		<br />
		
      <div class="row marketing">
        <div class="col-lg-6">

<?php
//echo md5("pa55w0rd");
if (!empty($_REQUEST['uid'])) {
session_start();
$username = str_replace("'","''",$_REQUEST['uid']);
$pass = $_REQUEST['password'];
$fname = str_replace("'","''",$_REQUEST['name']);
$descr = str_replace("'","''",$_REQUEST['descr']);
$id =  rand(20,100);

	$q = "INSERT INTO users (id, username, password, fname, description) values (".$id.",'".$username."','".md5($pass)."','".$fname."','".$descr."')" ;
	
if (isset($_GET['debug']))
{
	if ($_GET['debug']=="true")
{
	echo "<pre>".$q."</pre><br /><br />";
	}
}


	if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}
	
	
	$_SESSION["id"] = $id;
	$_SESSION["fname"] = $fname;
	
	ob_clean();
	header('Location:secondorder_home.php');
	}
	
?>


	</div>
	</div>
	  
	  
	  <div class="footer">
		<p><h4><a href="index.php">Home</a><h4></p>
      </div>
	  
	  
	  <div class="footer">
		<p>Riyaz Walikar | @riyazwalikar | karniv0re@null.co.in</p>
      </div>

	</div> <!-- /container -->
  
</body>
</html>