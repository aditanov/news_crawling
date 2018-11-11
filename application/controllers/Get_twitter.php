<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_twitter extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      $this->config->load('media_online');
      //$this->load->library('getTwitter/OAuth');
      require_once(APPPATH.'libraries/getTwitter/OAuth.php');
      $this->load->model('M_input');
      $this->load->helper('url');
      date_default_timezone_set('Asia/Jakarta');
  }

  function trending_topic()
  {
    //include "twitteroauth.php";
    require_once(APPPATH.'libraries/getTwitter/twitteroauth.php');
    $consumer = "gkNdxGJVua3cF7ILYjkDlY4WW";
    $consumersecret = "DKnvJSe2hB5fRYPGYRI6ORaDz7xVuBmf4xbmV88Ts9xf1SZdqj";
    $accessToken = "489165352-FcsETQfSzqBGTkNmdpA5O8wnbwG9z0sy95vOLYIp";
    $accessTokenSecret = "uVwdJLM10wsL7hS4VsBfr5JgXmtzdA7X206LH8pHSovEN";
    $twitter = new TwitterOAuth($consumer,$consumersecret,$accessToken,$accessTokenSecret);

    $tweets = $twitter->get('https://api.twitter.com/1.1/trends/place.json?id=1048059&limit=5');
    //************************************************ TRENDING TOPIC ***********************************************
    //$tweets = $twitter->get('https://api.twitter.com/1.1/trends/place.json?id=1048059&result_type=popular&count=5');
    echo "<pre>";print_r($tweets);echo "</pre>";

    foreach ($tweets as $tweet)
    {
      $t = $tweet->trends;
      //echo "<br>//////////////////////<br><pre>";print_r($t);
      //echo "</pre>";
      $n = count($t);
      for($i = 0; $i < $n; $i++)
      {
        $nama = $t[$i]->name;
        $nama_query = $t[$i]->query;
        echo "<br>//////////////////////<br>";
        echo 'nama : '.$nama;
        echo '<br>nama_query : '.$nama_query;
        $duplikat = $this->M_input->topik_twitter($nama);
  			if($duplikat<=0)
  			{
          $dataInsert = array('nama' => $nama, 'nama_query' => $nama_query);
          $this->M_input->add_data($dataInsert,'topik_twitter');
        }
      }

    }

  }

  function search_tweet()
  {
    require_once(APPPATH.'libraries/getTwitter/twitteroauth.php');
    $consumer = "gkNdxGJVua3cF7ILYjkDlY4WW";
    $consumersecret = "DKnvJSe2hB5fRYPGYRI6ORaDz7xVuBmf4xbmV88Ts9xf1SZdqj";
    $accessToken = "489165352-FcsETQfSzqBGTkNmdpA5O8wnbwG9z0sy95vOLYIp";
    $accessTokenSecret = "uVwdJLM10wsL7hS4VsBfr5JgXmtzdA7X206LH8pHSovEN";
    $twitter = new TwitterOAuth($consumer,$consumersecret,$accessToken,$accessTokenSecret);
    $i = 0;
    $daftar_topik_twitter = $this->M_input->daftar_topik_twitter();
    //echo "<pre>";print_r($daftar_topik_twitter);echo "</pre>";
    foreach ($daftar_topik_twitter as $topik)
    {
      $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$topik['nama_query'].'&result_type=recent&count=10');
      //************************************************ TRENDING TOPIC ***********************************************
      echo "<pre>";print_r($tweets);echo "</pre>";
      //$tweets = $twitter->get('https://api.twitter.com/1.1/trends/place.json?id=1048059&result_type=popular&count=5');
      foreach ($tweets as $tweet) {
        foreach ($tweet as $t)
        {
          $i++;
          $name = $t->user->name;
          $image = $t->user->profile_image_url;
          $datetime = $t->created_at;
          $tahun = date("Y", strtotime($datetime));
          $bulan = date("m", strtotime($datetime));
          $tanggal = date("d", strtotime($datetime));
          $jam = date("H", strtotime($datetime));
          $description = $t->text;
          $id = "'".$t->id."'";
  /*        echo "<br>//////////////////////////<br>".$name.'<br>';
          echo $image.'<br>';
          echo $datetime."<br>";
          echo $description."<br>";
  */
          $duplikat = $this->M_input->sosial_media("'".$id."'");
          if($name != "" && $duplikat<=0){
            $dataInsert = array( 'nama' => $name, 'gambar' => $image, 'isi' => $description, 'waktu' =>$datetime, 'tahun' => $tahun,
                                'bulan' => $bulan, 'tanggal' => $tanggal, 'jam' => $jam, 'id_tweet' => $id, 'id_topik_twitter' => $topik['id'] );
            $this->M_input->add_data($dataInsert,'social_media');
          }
        }//end foreach t
      }//end foreach tweet

    }//end topik

  }//end fungsi

}
