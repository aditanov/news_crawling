<?php
$name = ['issue1','issue2','issue3','issue4','issue5','issue6','issue7','issue8','issue9','issue10'];
//untuk memanggil name
//${...} untuk merubah string $ menjadi variable $


/*TO DO :
 * oke -> labels: [ array12,array11,array10,array9,array8,array7,array6,array5,array4,array3,array2,array1,array0]
        => tanggal
 * oke -> label: "Ahok" => label untuk nama grafik
        => namaLabel[1];
 * oke -> data: [<?php echo $berita[11];?>,<?php echo $berita[10];?>,<?php echo $berita[9];?>,<?php echo $berita[8];?>,
          <?php echo $berita[7];?>,<?php echo $berita[6];?>,<?php echo $berita[5];?>,<?php echo $berita[4];?>,
          <?php echo $berita[3];?>,<?php echo $berita[2];?>,<?php echo $berita[1];?>,<?php echo $berita[0];?>],
          => jumlah
 * oke => borderColor: 'rgba(0, 255, 255, 0.7)',
 * oke => backgroundColor: 'rgba(0, 255, 255, 0.7)',
*/
$waktu = "";
$namaLabel = "[";
$data0 = $data1 = $data2 = $data3 = $data4 = "[";
for($j=0;$j<5;$j++)
{
    $waktu ="[";
    $label ="";
    foreach (${$name[$j]} as $data)
    {
      //echo "<br>".$name[$j]."<br><pre>";
      //print_r($data);
      $waktu = $waktu." ".$data['waktu']." ,";
      if($data['katakunci']!= "-")
        $label = $data['katakunci'];
      ${'data'.$j} = ${'data'.$j}." '".$data['jumlah']."' ,";
      //echo "<br>/".$name[$j]."<br></pre>";
    }
    $waktu     = substr($waktu,0,-1)."]";
    $namaLabel = $namaLabel." '".$label."' ,";
    ${'data'.$j} = substr(${'data'.$j},0,-1)."]";
}
$namaLabel = substr($namaLabel,0,-1)."]";
echo "Nama lebel : ".$namaLabel."<br/><br/>";
echo "Waktu".$waktu."<br><br/>";
echo "Data 0 : ".$data0."<br/><br/>";
echo "Data 1 : ".$data1."<br/><br/>";
echo "Data 2 : ".$data2."<br/><br/>";
echo "Data 3 : ".$data3."<br/><br/>";
echo "Data 4 : ".$data4."<br/><br/>";


?>
<script>
  alert("<?php echo $waktu;?>");
</script>
