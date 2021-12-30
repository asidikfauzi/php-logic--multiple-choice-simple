<?php
session_start();
	$mysqli = new mysqli("localhost","root","","upinipin");  
	if($mysqli->connect_errno)
	{
		echo "Failed to connect to MySQL : ".$mysqli->connect_error;
	}
	$res = $mysqli->query("SELECT s.nomor, s.pertanyaan, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>KESIMPULAN</title>
	<style>
		h1, .skor{
			text-align: center;
		}
		.soal1 {
			background-color: #F0FFFF;
			border: 1px solid black;
			margin: 20px;
			padding: 30px;
		}
		.soal{
			position: absolute;
			background-color: white;
		  	border: 1px solid black;
		  	padding: 30px;
		  	right: 30px;
		  	top: 50px;
		}
		.urutan{
			background-color: #F0FFFF;
			border: 1px solid black;
			padding: 30px;
		}
		.next{
			
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 16px 32px;
			text-decoration: none;
			margin: 4px 2px;
			cursor: pointer;
		}
		.previous{
			position: absolute;
			right: 50px;
			top: 200px;
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 16px 32px;
			text-decoration: none;
			margin: 4px 2px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form method="post" action="tryagain.php">	
		<div class="soal1">
			<h1>KESIMPULAN</h1>
			<?php 
				$skor1 = 0;
				$skor2 = 0;
				$skor3 = 0;
				$skor4 = 0;
				$skor5 = 0;
				$skor6 = 0;
				while($row = $res->fetch_assoc()) 
				{
					$jawaban1 = $mysqli->query("SELECT s.nomor, s.pertanyaan, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE benarkah = 1 AND nomor = 1");
					$rowj1 = $jawaban1->fetch_assoc();
					$jawaban2 = $mysqli->query("SELECT s.nomor, s.pertanyaan, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE benarkah = 1 AND nomor = 2");
					$rowj2 = $jawaban2->fetch_assoc();
					$jawaban3 = $mysqli->query("SELECT s.nomor, s.pertanyaan, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE benarkah = 1 AND nomor = 3");
					$rowj3 = $jawaban3->fetch_assoc();
					$jawaban4 = $mysqli->query("SELECT s.nomor, s.pertanyaan, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE benarkah = 1 AND nomor = 4");
					$rowj4 = $jawaban4->fetch_assoc();
					$jawaban5 = $mysqli->query("SELECT s.nomor, s.pertanyaan, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE benarkah = 1 AND nomor = 5");
					$rowj5 = $jawaban5->fetch_assoc();
					$jawaban6 = $mysqli->query("SELECT s.nomor, s.pertanyaan, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE benarkah = 1 AND nomor = 6");
					$rowj6 = $jawaban6->fetch_assoc();

					if($_SESSION['jawaban1'] == $row['idjawaban'])
					{
						echo "<h2>".$row['nomor'] .". ". $row['pertanyaan']."</h2>"; 
						echo  $row['isi_jawaban'];
						if($row['benarkah'] == 1)
						{
							echo "&nbsp; <b style='color: green;'>&radic;</b>";
							$skor1 = 20;
						}
						else
						{
							echo "&nbsp; <b style='color:red;'>&times;</b><br>";
							echo "<b style='color: green;'>&radic; &nbsp;".$rowj1['isi_jawaban'] ."</b>";
						}
					}
					elseif ($_SESSION['jawaban2'] == $row['idjawaban']) {
						// code...
						echo "<h2>".$row['nomor'] .". ". $row['pertanyaan']."</h2>"; 
						echo $row['isi_jawaban'];
						if($row['benarkah'] == 1)
						{
							echo "&nbsp; <b style='color: green;'>&radic;</b>";
							$skor2 = 20;
						}
						else
						{
							echo "&nbsp; <b style='color:red;'>&times;</b><br>";
							echo "<b style='color: green;'>&radic; &nbsp;".$rowj2['isi_jawaban'] ."</b>";
							
						
						}
					}
					elseif ($_SESSION['jawaban3'] == $row['idjawaban']) {
						// code...
						echo "<h2>".$row['nomor'] .". ". $row['pertanyaan']."</h2>"; 
						echo $row['isi_jawaban'];
						if($row['benarkah'] == 1)
						{
							echo "&nbsp; <b style='color: green;'>&radic;</b>";
							$skor3 = 20;
						}
						else
						{
							echo "&nbsp; <b style='color:red;'>&times;</b><br>";
							echo "<b style='color: green;'>&radic; &nbsp;".$rowj3['isi_jawaban'] ."</b>";	
							
						}
					}
					elseif ($_SESSION['jawaban4'] == $row['idjawaban']) {
						// code...
						echo "<h2>".$row['nomor'] .". ". $row['pertanyaan']."</h2>"; 
						echo  $row['isi_jawaban'];
						if($row['benarkah'] == 1)
						{
							echo "&nbsp; <b style='color: green;'>&radic;</b>";
							$skor4 = 20;
						}
						else
						{
							echo "&nbsp; <b style='color:red;'>&times;</b><br>";
							echo "<b style='color: green;'>&radic; &nbsp;".$rowj4['isi_jawaban'] ."</b>";
						}
					}
					elseif ($_SESSION['jawaban5'] == $row['idjawaban']) {
						// code...
						echo "<h2>".$row['nomor'] .". ". $row['pertanyaan']."</h2>"; 
						echo  $row['isi_jawaban'];
						if($row['benarkah'] == 1)
						{
							echo "&nbsp; <b style='color: green;'>&radic;</b>";
							$skor5 = 20;
						}
						else
						{
							echo "&nbsp; <b style='color:red;'>&times;</b><br>";
							echo "<b style='color: green;'>&radic; &nbsp;".$rowj5['isi_jawaban'] ."</b>";
						}
					}
					elseif ($_SESSION['jawaban6'] == $row['idjawaban']) {
						// code...
						echo "<h2>".$row['nomor'] .". ". $row['pertanyaan']."</h2>"; 
						echo  $row['isi_jawaban'];
						if($row['benarkah'] == 1)
						{
							echo "&nbsp; <b style='color: green;'>&radic;</b>";
							$skor6 = 20;
						}
						else
						{
							echo "&nbsp; <b style='color:red;'>&times;</b><br>";
							echo "<b style='color: green;'>&radic; &nbsp;".$rowj6['isi_jawaban'] ."</b>";
						}
					}
					
				}
				$hasil = $skor1 + $skor2 + $skor3 + $skor4 + $skor5 + $skor6;
				echo "<div class='skor'><h2> Skor Max = 120</h2><h1> Skor Anda = ". $hasil. "</h1> </div>";
								
			?>
			<center><input type="submit" name="next" class="next" value="TRY AGAIN"></center>
			
		</div>
	</form>



</body>
</html>
