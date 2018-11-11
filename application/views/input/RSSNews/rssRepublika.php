<?php
/*********************************** LAKUKAN INPUT SETIAP 3 JAM SEKALI ************************************/
function republikaNews($url){
  $data= file_get_contents($url);
  $data= simplexml_load_string($data);
  $articles = array();
  foreach ($data->channel->item as $item) {
      $media = $item->children('http://search.yahoo.com/mrss/');
      $image = array();
      foreach ($media->content[0]->attributes() as $key => $value) {
        $image[$key] = (string)$value;
      }
      $articles[]= array(
        'title'       => (string)$item->title,
        'link'        => (string)$item->link,
        'date'        => (string)$item->pubDate,
        'creator'     => (string)$item->children('http://purl.org/dc/elements/1.1/'),
        'image'       => $image,
        'description' => (string)$item->description
       );
    }
    return $articles;
}

function form_input($url,$i)
{
  //GLOBALS $i;
  //********************CEK UNTUK MEMANGGIL FUNGSI
  foreach (republikaNews($url) as $article)
  {
    $i++;
    //****MEMECAH TANGGAL AND WAKTU*****
    $datetime = $article['date'];
    $datetime = substr($datetime, 5, 20);
    $date = substr($datetime,0, 12);
    $time = substr($datetime,12,10);
    //****MEMECAH TANGGAL AND WAKTU*****
    //****MENGAMBIL LOKASI ****
    $deskripsi = $article['description'];
    $location = current(explode(' -', strtolower($deskripsi)));
    $location = strtolower(str_replace('republika.co.id, ','',$location));
    //****MENGAMBIL LOKASI ****

    ?>
      <form id="form<?php echo $i;?>"action="<?php echo base_url('index.php/C_input/AddNewsRSS');?>" target="_self" method="POST">
              <p><input type="text" name="title" value="<?php echo $article['title'];?>"></input></p>
              <p><input type="text" name="link" value='<?php echo $article['link'];?>'></input>
              </p><p><input type="text" name="date" value='<?php echo $date;?>'></input>
              </p><p><input type="text" name="time" value='<?php echo $time;?>'></input>
              </p><p><textarea name="description"><?php echo $article['description'];?></textarea>
              </p><p><input type="text" name="image" value='<?php echo $article['image']['url'];?>'></input>
              </p><p><input type="text" name="creator" value='<?php echo $article['creator'];?>'></input>
              </p><p><input type="text"  name="location" value="<?php echo $location;?>"></input>
              </p><p><input type="date" name="datetime" value="<?php echo $datetime;?>"></input>
              </p><p><input type="text" name="media" value="republika"></input>
              </p><p><input type="submit" value="Submit"></input></p>
          <!--type='hidden' || style="display:none"-->
      </form>
<?php
  }
return $i; //untuk mengambil banyaknya form
}

$i = form_input('http://www.republika.co.id/rss/nasional',0);
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