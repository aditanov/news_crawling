<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_input extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      $this->load->model('M_input','data');
      $this->load->helper('url');
      date_default_timezone_set('Asia/Jakarta');
  }
/******************************************** FOLDER RSS **********************************************************/
    public function formRSSTribun()
    {
        $this->load->view('input/RSSNews/rssTribun');
    }

    public function formRSSDetik()
    {
        $this->load->view('input/RSSNews/rssDetik');
    }

    public function formRSSRepublika()
    {
        $this->load->view('input/RSSNews/rssRepublika');
    }

    public function formRSSOkezone()
    {
        $this->load->view('input/RSSNews/rssOkezone');
    }

    public function formRSSSindo()
    {
        $this->load->view('input/RSSNews/rssSindo');
    }

    public function formRSSjpnn()
    {
        $this->load->view('input/RSSNews/rssJPNN');
    }

    //controller untuk insert rss berita ke database
    public function AddNewsRSS()
    {
        //ambil data berita
        $title        = $this->input->post('title');
        $link         = $this->input->post('link');
        $date         = $this->input->post('date');
        $time         = $this->input->post('time');
        $description  = $this->input->post('description');
        $image        = $this->input->post('image');
        $creator      = $this->input->post('creator');
        $location     = $this->input->post('location');
        $datetime     = $this->input->post('datetime');
        $media        = $this->input->post('media');
        $id_kataKunciBerita = 0;
        $jumlah       = 0;
        //ambil keyword
        $getKeyword = $this->data->data_keyword();

        //cek kataKunci
        foreach ($getKeyword as $key) {
          if(strpos(strtolower($description),strtolower($key['katakunci']))!==FALSE || strpos(strtolower($title),strtolower($key['katakunci']))!==FALSE )
          {
            $id_kataKunciBerita = $key['id_katakunci_berita'];
            break;
          }
        }
        //data input berita
        $berita = array( 'judul' => $title, 'isi' => $description, 'penulis' => $creator, 'url' => $link, 'lokasi'=> $location, 'gambar' => $image, 'id_katakunciberita' =>$id_kataKunciBerita, 'waktu' => $datetime, 'media' => $media);
        $this->data->addBeritaRss($berita,'berita3');
    }

/******************************************** FOLDER RSS **********************************************************/
/*************************************** FOLDER API TWITTER *******************************************************/
    public function formtwitter()
    {
      $this->load->view('input/ApiTwitter/getTwitterSearch');
    }


		public function formtwitterakun()
    {
    	$data2['akun'] = $this->data->ambilakun()->result();
      $this->load->view('input/ApiTwitter/twittakun',$data2);
    }
    public function AddTwitter()
    {
      $name        = $this->input->post('name');
      $image       = $this->input->post('image');
      $date         = $this->input->post('date');
      $time         = $this->input->post('time');
      $description  = $this->input->post('description');
      $ketakun         = $this->input->post('ketakun');
      $data = array( 'nama' => $name, 'gambar' => $image, 'tanggal' => $date, 'jam' => $time, 'isi' => $description, 'ketakun' => $ketakun);
      $this->data->addSocialMedia($data,'socialMedia');
    }
/*************************************** FOLDER API TWITTER *******************************************************/


}