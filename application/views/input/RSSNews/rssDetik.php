<?php
/**************************** LAKUKAN INPUT SETIAP SATU JAM SEKALI ************************************/
    function detikNews($link){
    $data= file_get_contents($link);
    $data= simplexml_load_string($data);//ada panahnya
    $articles = array();
    foreach ($data->channel->item as $item)
    {
      /*ambil gambar*/
      $media = $item->enclosure;
      $image = array();
      foreach ($media->attributes() as $key => $value)
      {
          $image[$key] = (string)$value;
      }
      /*ambil gambar*/
      /*kupas deskripsi agar tidak ada tagnya lagi*/
      $description = (string)$item->description;
      $image_description = current(explode(">", strtolower($description))).">";
      $description = str_replace($image_description, '', $description);
      /*kupas deskripsi agar tidak ada tagnya lagi*/
      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => (string)$item->link,
        'date'        => (string)$item->pubDate,
        'description' => $description,
        'image'       => $image
       );
    }

   return $articles;
  //  print_r($articles);
}

function form_input($url,$i)
{
  $creator  = ""; //variable untuk menyimpan penulis berita
  $location = ""; //variable untuk menyimpan lokasi berita
  foreach (detikNews($url) as $article)
  {
    $i++;
    //****MEMECAH TANGGAL AND WAKTU*****
    $datetime = $article['date'];
    $datetime = substr($datetime,5,20);
    $date = substr($datetime,0, 12);
    $time = substr($datetime,12,10);
    //****MEMECAH TANGGAL AND WAKTU*****
?>
    <form id="form<?php echo $i;?>"action="<?php echo base_url('index.php/C_input/AddNewsRSS');?>" target="_blank" method="POST">
          <p><input type="text" name="title" value="<?php echo $article['title'];?>"></input>
          </p><p><input type="text" name="link" value='<?php echo $article['link'];?>'></input>
          </p><p><input type="text" name="date" value='<?php echo $date;?>'></input>
          </p><p><input type="text" name="time" value='<?php echo $time;?>'></input>
          </p><p><textarea name="description"><?php echo $article['description'];?></textarea>
          </p><p><input type="text" name="image" value='<?php echo $article['image']['url'];?>'></input>
          </p><p><input type="text" name="creator" value='<?php echo $creator;?>'></input>
          </p><p><input type="text"  name="location" value="<?php echo $location;?>"></input>
          </p><p><input type="date" name="datetime" value="<?php echo $datetime?>"></input>
          </p><p><input type="text" name="media" value="detik"></input>
          </p><p><input type="submit" value="Submit"></input></p>
          <!--type='hidden' || style="display:none"-->
    </form>
<?php
  }
return $i; //untuk mengambil banyaknya form
}

  $i = form_input('http://rss.detik.com',0);
?>
  <a href="javascript:submit()">submit</a>
<?php
  if ( ! isset($_POST['title']) )
  { // not submitted yet
?>
  <script language="javascript">
    function submit()
    {
        var n = "<?php echo $i;?>";
        for(n; n>=1;n--)
            document.getElementById("form"+n).submit();
    }
  </script>
<?php
  }
?>
