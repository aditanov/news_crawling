<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMCA extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mca','data_mca');
        $this->load->model('M_kalangan_terbatas','data_kalangan_terbatas');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {

      $katakunci    = strtolower($this->input->get('q'));
      $data['katakunci']= $katakunci;
      $date1        = $this->input->get('d');
      $date2        = $this->input->get('d2');
      date_default_timezone_set("Asia/Jakarta");
      $datemax = $datemin = "";
      $data['list_berita'] = $data['data_grafik_sebaran_media'] = $data['jumlah'] = array();
      //PANGGIL MODEL UNTUK MENAMPILKAN BERITA
      if($date1 !=0 && $date2==NULL){
        $datemax = date("Y-m-d",strtotime($date1))." ".date("H:i:s",strtotime("23:59:59"));
        $datemin = date("Y-m-d", strtotime($date1))." ".date("H:i:s", strtotime("00:00:00"));
      }else if($date1==0){
        $datemax = date("Y-m-d",strtotime("now"))." ".date("H:i:s",strtotime("23:59:59"));
        $datemin = date("Y-m-d", strtotime("now"))." ".date("H:i:s", strtotime("00:00:00"));
        $id      = $this->input->get('id');
        //ambil katakunci dari setiap tema
        $ambilKatakunci = $this->data_kalangan_terbatas->daftar_katakunci($id);
        //buat klausa where untuk mencari katakunci pada berita
        $whereKatakunciTema = "(LOWER(isi) LIKE '%".$katakunci."%'";
        foreach ($ambilKatakunci as $dataKatakunci)
            $whereKatakunciTema = $whereKatakunciTema."OR LOWER(isi) LIKE '%".$dataKatakunci['katakunci']."%'";
        //end buat klausa where
        // mencari jumlah berita
        $data['jumlah'] = $this->data_mca->jumlah_berita2($whereKatakunciTema.')',$datemax,$datemin);
        $this->load->library('pagination');
        //$config['page_query_string'] = TRUE;
        $config['base_url']   = base_url().'index.php/DataMCA/index';
        //$config['suffix']     = '?id='.$id.'&q='.$katakunci.'&d='.$date1.'&d2='.$date2;
        $config['reuse_query_string'] = TRUE;
        $config['total_rows'] = $data['jumlah'];
        $config['per_page']   = 4;

        //style
        $config['query_string_segment'] = 'start';

        $config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //style

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        //************************************** LIST BERITA ******************************************
        $data['list_berita']  = $this->data_mca->tampil_berita2($whereKatakunciTema.')',$datemax,$datemin,$config['per_page'],$from);
        //************************************** LIST BERITA ******************************************
        //********************************** GRAFIK SEBARAN MEDIA *************************************
        $data['data_grafik_sebaran_media'] = $this->data_mca->tampil_sebaran_media2($whereKatakunciTema.')',$datemax,$datemin);
        //********************************** GRAFIK SEBARAN MEDIA *************************************
      }else {
        $datemax = date("Y-m-d", strtotime($date2))." ".date("H:i:s",strtotime("23:59:59"));
        $datemin = date("Y-m-d", strtotime($date1))." ".date("H:i:s",strtotime("00:00:00"));
      }

      if($date1!=0)
      {
        $data['jumlah'] = $this->data_mca->jumlah_berita($katakunci,$datemax,$datemin);
          $this->load->library('pagination');
          $config['base_url']   = base_url().'index.php/DataMCA/index';
          $config['suffix']     = '?q='.$katakunci.'&d='.$date1.'&d2='.$date2;
          $config['reuse_query_string'] = TRUE;
          $config['total_rows'] = $data['jumlah'];
          $config['per_page']   = 4;

          //style
          $config['query_string_segment'] = 'start';

          $config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
          $config['full_tag_close'] = '</ul></nav>';

          $config['first_link'] = 'First';
          $config['first_tag_open'] = '<li>';
          $config['first_tag_close'] = '</li>';

          $config['last_link'] = 'Last';
          $config['last_tag_open'] = '<li>';
          $config['last_tag_close'] = '</li>';

          $config['next_link'] = 'Next';
          $config['next_tag_open'] = '<li>';
          $config['next_tag_close'] = '</li>';

          $config['prev_link'] = 'Prev';
          $config['prev_tag_open'] = '<li>';
          $config['prev_tag_close'] = '</li>';

          $config['cur_tag_open'] = '<li class="active"><a>';
          $config['cur_tag_close'] = '</a></li>';

          $config['num_tag_open'] = '<li>';
          $config['num_tag_close'] = '</li>';
          //style

          $from = $this->uri->segment(3);
          $this->pagination->initialize($config);
          //************************************** LIST BERITA ******************************************
          $data['list_berita']  = $this->data_mca->tampil_berita($katakunci,$datemax,$datemin,$config['per_page'],$from);
          //************************************** LIST BERITA ******************************************
          //********************************** GRAFIK SEBARAN MEDIA *************************************
          $data['data_grafik_sebaran_media'] = $this->data_mca->tampil_sebaran_media($katakunci,$datemax,$datemin);
          //********************************** GRAFIK SEBARAN MEDIA *************************************

      }
      //************************************** LOGIN ************************************************
      if ($this->session->userdata('logged')<>1)
          $data['status_login']="LOGIN"; //belom login
      else
          $data['status_login']=$this->session->userdata('username');

      $this->load->view('mca',$data);
    }


}
