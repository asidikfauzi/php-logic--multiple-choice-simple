<?php
session_start();
$mysqli = new mysqli("localhost","root","","upinipin"); 
if($mysqli->connect_errno)
{
	echo "Failed to connect to MySQL : ".$mysqli->connect_error;
}

$res = $mysqli->query("SELECT s.nomor, s.pertanyaan, s.halaman_ke, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE halaman_ke = 2 GROUP BY nomor ");



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman 2</title>
	<style>
		.soal1 {
			background-color: #F0FFFF;
			border: 1px solid black;
			margin: 20px;
			padding: 30px;
		}
		.urutan{
			background-color: #F0FFFF;
			border: 1px solid black;
			padding: 30px;
		}
		.next{
			position: absolute;
			right: 30px;
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
			left: 30px;
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
	<form method="post" action="halaman2_proses.php">	
		
	
			<?php  		

				while($row = $res->fetch_assoc())
				{
					echo "<div class='soal1'>";
					$nomor = $row['nomor'];
					echo "<h2>" . $nomor. ". " . $row['pertanyaan'] . "</h2>";
					$stmt = $mysqli->prepare("SELECT s.nomor, s.pertanyaan, s.halaman_ke, j.idjawaban, j.isi_jawaban, j.benarkah FROM soal s JOIN jawaban j ON s.idsoal = j.soal_idsoal WHERE halaman_ke = 2 AND nomor = ? ");
					$stmt->bind_param('i', $nomor); 
      				$stmt->execute();
      				$result = $stmt->get_result();

      				$j = array();

					while($row2 = $result->fetch_assoc())
					{
						$nomor = $row2['nomor'];
						$idjawaban = $row2['idjawaban'];
						$isi_jawaban = $row2['isi_jawaban'];

						array_push($j, $row2);
					}
					shuffle($j);
					foreach($j as $value){
						echo "<input type='radio' id='jawaban' name='jawaban".$value['nomor']."' value=".$value['idjawaban'];
						if(isset($_SESSION['jawaban1']) && $_SESSION['jawaban1'] == $value['idjawaban'] ||  isset($_SESSION['jawaban2']) && $_SESSION['jawaban2'] == $value['idjawaban'] || isset($_SESSION['jawaban3']) && $_SESSION['jawaban3'] == $value['idjawaban'] ||  isset($_SESSION['jawaban4']) && $_SESSION['jawaban4'] == $value['idjawaban'] || isset($_SESSION['jawaban5']) && $_SESSION['jawaban5'] == $value['idjawaban'] ||  isset($_SESSION['jawaban6']) && $_SESSION['jawaban6'] == $value['idjawaban'])
						{
							echo " checked>" . $value['isi_jawaban']. "<br><br>";
						}
						else
						{
							echo " >" . $value['isi_jawaban']. "<br><br>";
						}
					}	
					echo "</div>";
				}
			?>
			<input type="submit" name="next" class="next" value="NEXT">
			<input type="submit" name="previous" class="previous" value="PREVIOUS">
	</form>
</body>
</html>