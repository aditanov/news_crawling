<?php


$waktu = $namaLabel = $jam = $id_katakunci = "";
  $data0 = $data1 = $data2 = $data3 = $data4 = $data5 = $data6 = $data7 = $data8 = $data9 ="";
  
  
    for($j=0;$j<13;$j++)
    {
      $n =0;
      foreach (${'issue'.$j} as $data) {
          ${'data'.$n} = $data['jumlah'];
          $isi[$n][$j]= ${'data'.$n};
          $n++;
          $jam[$j] = $data['waktu'];
         
            //$namaLabel[$n]=$data['katakunci'];
            //$id_katakunci = " '".$data['id_katakunci']."' ,".$id_katakunci;
          
      }
     // $waktu = $jam."".$waktu;
    }
    
    $x=1;
    $o=0;
      foreach (${'issue'.$x} as $data) {
          
            if($data['katakunci'] != NULL){
            	
            	$namaLabel[$o]=$data['katakunci'];
            
            }
            //$id_katakunci = " '".$data['id_katakunci']."' ,".$id_katakunci;
          $x++;
          $o++;
      }
 
    
 
//  echo $namaLabel[1];
  //echo $isi[1][0];
  //echo $jam[9];
  
 
  ?>
  
  

 
 <html>
<head>
	<title>Cetak PDF</title>
</head>
<body>

<h1 style="text-align: center;">Laporan Top Isue</h1>

<style>


table {border-collapse: collapse; border-spacing: 2px;}
td  th  {padding: 6px ; text-align: center;}
</style>


 
<table border="1" align="center" cellpadding="20" height=100px;>



<tr style="text-align: center;width=5%;height=70;"> 
	<th style="text-align: center;width=2%;height=70;">Waktu/Issue</th>

<?php
    for($j=0;count($namaLabel)>$j;$j++){
        ?>
        <th style="text-align: center;width=9%;height=70;"><?php $k=$j+1; echo 'Issue '.$k;?></th>

 <?php          
     }
?>


</tr>

<?php
		for($a=0;$a<13;$a++){
			?>
		<tr><th style="text-align: center;width=5%;height=70;"> <?php echo $jam[$a];?></th>
		<?php
		for($b=0;count($namaLabel)>$b;$b++){
			?>
			<th style="text-align: center;width=5%;height=70;"><?php echo $isi[$b][$a];?></th>

		<?php
		}
?>
			
		
		</tr>
		<?php
		}
?>

</table>

<p style="text-align: right;">*Issue Diatas Dalam Satuan Frekuensi Jumlah Berita        </p>

<br>
<br>


<?php
    for($j=0;count($namaLabel)>$j;$j++){
        ?>
        <p style="text-align: left;"><?php $k=$j+1; echo '        Issue '.$k.' = '.$namaLabel[$j];?></p>

 <?php          
     }
?>


</body>
</html>
