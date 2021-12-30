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
	if(isset($jawaban5)  || isset($jawaban6))
	{
		if($jawaban5 >=17 && $jawaban5 <= 20)
		{
			$_SESSION['jawaban5'] = $jawaban5;
		}
		if($jawaban6 >=21 && $jawaban6 <= 24)
		{
			$_SESSION['jawaban6'] = $jawaban6;
		}

	}
	if(!isset($_SESSION['jawaban1'])  ||  !isset($_SESSION['jawaban2']) || !isset($_SESSION['jawaban3'])  ||  !isset($_SESSION['jawaban4']) || !isset($_SESSION['jawaban5'])  ||  !isset($_SESSION['jawaban6']) )
		{
			echo "<script> alert('Jawaban anda belum lengkap, silahkan lengkapi jawaban anda'); history.back(self);</script>";
		}
		else
		{
			header('location:kesimpulan.php');
		}

}


if(isset($_POST['previous']))
{
	if(isset($jawaban5) ||isset($jawaban6))
	{
		if($jawaban5 >=17 && $jawaban5 <= 20)
		{
			$_SESSION['jawaban5'] = $jawaban5;
		}
		if($jawaban6 >=21 && $jawaban6 <= 24)
		{
			$_SESSION['jawaban6'] = $jawaban6;
		}
	}
	header('location:halaman2.php');
}


?>