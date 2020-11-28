<?php
	function tentukanolahraga($total){
		$hasil = (($total/20) * 2); 
		$waktu = round($hasil,0);
		if ($total >= 750) {
			echo "Jumlah Kalori :".$total;
			echo "<br>";
			echo "Jenis Olah Raga : Lari";
			echo "<br>";
			echo "Waktu Olah Raga :" .$waktu;
		}elseif($total >= 500 AND $total <=749){
			echo "Jumlah Kalori :".$total;
			echo "<br>";
			echo "Jenis Olah Raga : Badminton";
			echo "<br>";
			echo "Waktu Olah Raga :" .$waktu;
		}else{
			echo "Jumlah Kalori :".$total;
			echo "<br>";
			echo "Jenis Olah Raga :Renang";
			echo "<br>";
			echo "Waktu Olah Raga :" . $waktu;
		}
	}
	echo tentukanolahraga(751);
?>