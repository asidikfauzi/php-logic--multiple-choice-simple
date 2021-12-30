<?php
session_start();

$jawaban1 = $_POST['jawaban1'];
$jawaban2 = $_POST['jawaban2'];
$jawaban3 = $_POST['jawaban3'];
$jawaban4 = $_POST['jawaban4'];
$jawaban5 = $_POST['jawaban5'];
$jawaban6 = $_POST['jawaban6'];

if(isset($_POST['next']))
{	
	if(isset($jawaban3) || isset($jawaban4))
	{
		if($jawaban3 >=9 && $jawaban3 <= 12)
		{
			$_SESSION['jawaban3'] = $jawaban3;
		}
		if($jawaban4 >=13 && $jawaban4 <= 16)
		{
			$_SESSION['jawaban4'] = $jawaban4;
		}
		
	}
	header('location:halaman3.php');
}


if(isset($_POST['previous']))
{
	if( isset($jawaban3) || isset($jawaban4))
	{
		
		if($jawaban3 >=9 && $jawaban3 <= 12)
		{
			$_SESSION['jawaban3'] = $jawaban3;
		}
		if($jawaban4 >=13 && $jawaban4 <= 16)
		{
			$_SESSION['jawaban4'] = $jawaban4;
		}	
	}
	header('location:halaman1.php');
}


?>