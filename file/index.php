<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>easy-sqli</title>
</head>

<body>


<?php
//give your mysql connection username n password
$dbuser ='root';
$dbpass ='root';
$dbname ="ctftraining";
$host = '127.0.0.1';
$dbname1 = "challenges";

$con = mysql_connect($host,$dbuser,$dbpass);

// Check connection
if (!$con)
{
    echo "Failed to connect to MySQL: " . mysql_error();
}

mysql_select_db($dbname) or die ( "Unable to connect to the database: $dbname");

// take the variables 
if(isset($_GET['id']))
{
	$id=$_GET['id'];

	//fiddling with comments
	$id= blacklist($id);
	//echo "<br>";
	//echo $id;
	//echo "<br>";
	$hint=$id;

// connectivity 
	$sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($row)
	{
	  	echo 'Your Login name:'. $row['username'];
	  	echo "<br>";
	  	echo 'Your Password:' .$row['password'];
  	}
	else 
	{
		print_r(mysql_error());
	}
}
	else { echo "Please input the ID as parameter with numeric value";}




function blacklist($id)
{
	//$id= preg_replace('/or/i',"", $id);		//strip out OR (non case sensitive)
	$exist=preg_match("/or/i",$id);
	if($exist){
		die("no hacking pls\n");
	}
	//$id= preg_replace('/and/i',"", $id);		//Strip out AND (non case sensitive)
	$exist=preg_match("/and/i",$id);
	if($exist){
		die("no hacking pls\n");
	}
	//$id= preg_replace('/[\/\*]/',"", $id);	//strip out /*
	$id= preg_replace('/[\/]/',"", $id);		//strip out /
	$id= preg_replace('/z/i',"", $id);		//strip out z
	$id= preg_replace('/[--]/',"", $id);		//Strip out --
	$id= preg_replace('/[#]/',"", $id);		//Strip out #
	$id= preg_replace('/[\s]/',"", $id);		//Strip out spaces
	$id= preg_replace('/[\/\\\\]/',"", $id);	//Strip out slashes
	return $id;
}



?>
<?php
//echo "<br>";
//echo "Hint: Your Input is Filtered with following result: ".$hint;
?>
</body>
</html>





 

