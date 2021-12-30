<?php
session_start();

$jawaban1 = $_POST['jawaban1'];
$jawaban2 = $_POST['jawaban2'];

if(isset($_POST['next']))
{	
	if(isset($jawaban1) || isset( $jawaban2) )
	{
		if($jawaban1 <= 4 )
		{
			$_SESSION['jawaban1'] = $jawaban1;		
		}
		if($jawaban2 >=5 && $jawaban2 <= 8)
		{
			$_SESSION['jawaban2'] = $jawaban2;
		}

	}
	header('location:halaman2.php');
}




?>