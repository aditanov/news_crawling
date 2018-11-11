<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_kalangan_terbatas extends CI_Controller {

	function __construct(){
        parent::__construct();
				$this->load->model('M_kalangan_terbatas','data_kalangan_terbatas');
				$this->load->model('M_input');
				$this->load->helper('url');
	}

	//*********************************** proses tagging **************************

	function tagging_katakunci($tag_katakunci)
  {
    $daftar_katakunci = $this->M_input->ambil_katakunci();
    foreach ($daftar_katakunci as $katakunci)
    {
      $daftar_berita = $this->M_input->ambil_berita_katakunci($tag_katakunci,"LOWER(isi) LIKE '%".$katakunci['katakunci']."%'
                                    OR LOWER(judul) LIKE '%".$katakunci['katakunci']."%'");
      foreach ($daftar_berita as $berita)
      {
        $cek_berita3_katakunci = $this->M_input->cek_berita3_katakunci($berita['id'],$katakunci['id_katakunci_berita']);
        if($cek_berita3_katakunci >= 1) continue;
        $dataInsert = array('id_berita' => $berita['id'], 'id_katakunci' => $katakunci['id_katakunci_berita']);
        $this->M_input->insert_data($dataInsert, 'berita3_katakunci');
        $this->M_input->update_data(array('tag_katakunci' => true), array('id' => $berita['id']),'berita3' );//data, where, table
      }
    }
  }
	//note : proses tagging ini sama seperti proses tagging pada fungsi get_rss->tagging_katakunci

	function coba()
	{
		$this->tagging_alias(true);
	}


	function tagging_alias($tag_alias)
	{
		$daftar_alias = $this->M_input->ambil_alias();
		foreach ($daftar_alias as $alias)
		{
			$daftar_berita = $this->M_input->ambil_berita_alias($tag_alias,"LOWER(isi) LIKE '%".$alias['alias_person']."%'
																		OR LOWER(judul) LIKE '%".$alias['alias_person']."%'");
			foreach ($daftar_berita as $berita)
			{
				$cek_berita3_alias = $this->M_input->cek_berita3_alias($berita['id'],$alias['id_alias_person']);
				if($cek_berita3_alias >= 1) continue;
				$dataInsert = array('id_berita' => $berita['id'], 'id_alias' => $alias['id_alias_person']);
				$this->M_input->insert_data($dataInsert, 'berita_aliasperson');
				$this->M_input->update_data(array('tag_alias' => true), array('id' => $berita['id'])  ,'berita3' );//data, where, table
			}
		}
	}
	//note : proses tagging ini sama seperti proses tagging pada fungsi get_rss->tagging_alias
	//*********************************** proses tagging **************************


  function kalangan_terbatas()
  {
    //********************************** AMBIL LIST TEMA ********************************************
		$data['list_tema'] = $this->data_kalangan_terbatas->tema();
    //********************************** AMBIL LIST TEMA ********************************************
		//********************************* AMBIL LIST PERSON *******************************************
		$data['list_person'] = $this->data_kalangan_terbatas->person();
		//********************************* AMBIL LIST PERSON *******************************************
		//*********************************** LOGIN *******************************************************
    $data['username'] = $data['email'] = "";
    if($this->session->userdata('logged')<>1 || $this->session->userdata('hak_akses') != 2){
      redirect('data/index');
    }else{
      $data['status']   = 'login';
      $data['username'] = $this->session->userdata('username');
      $data['email']    = $this->session->userdata('email');
      $this->load->view('kalangan_terbatas',$data);
    }
    //*********************************** LOGIN *******************************************************
  }

	function lihatTema()
	{
		$id = $this->input->get('id');
		//id tema atau id person. jika tipe nya 0 berarti id tema, jika tipenya 1 berarti id person
		$data['tipe'] = $this->input->get('ty');//tema ==0 person ==1
		$data['tema'] = $data['id_tema'] = $data['listKatakunci'] = array();

		if($data['tipe'] == 0)
		{
			//******************************  TAMPIL JUDUL TEMA  **********************************************
			$data['tema'] = $this->data_kalangan_terbatas->judul_tema($id)->tema;
			$data['id_tema'] = $id;
			//******************************  TAMPIL JUDUL TEMA  **********************************************
			//****************************** TAMPIL KEYWORD TEMA **********************************************
			$data['listKatakunci'] = $this->data_kalangan_terbatas->daftar_katakunci($id);
			//****************************** TAMPIL KEYWORD TEMA **********************************************
		}
		elseif ($data['tipe'] == 1) {
			//******************************  TAMPIL JUDUL PERSON  **********************************************
			$data['tema'] = $this->data_kalangan_terbatas->judul_person($id)->person;
			$data['id_tema'] = $id;
			//******************************  TAMPIL JUDUL PERSON  **********************************************
			//****************************** TAMPIL ALIAS PERSON **********************************************
			$data['listKatakunci'] = $this->data_kalangan_terbatas->daftar_aliasPerson($id);
			//****************************** TAMPIL ALIAS PERSON **********************************************
		}
		//*********************************** LOGIN *******************************************************
		$data['username'] = $data['email'] = "";
		if($this->session->userdata('logged')<>1 || $this->session->userdata('hak_akses') != 2){
			redirect('data/index');
		}else{
			$data['status']   = 'login';
			$data['username'] = $this->session->userdata('username');
			$data['email']    = $this->session->userdata('email');
			$this->load->view('kalangan_terbatas_tema',$data);
		}
		//*********************************** LOGIN *******************************************************

	}

/////////////////////////////////////// TEMA ///////////////////////////////////////////////////////////
	function tambah_keyword()
	{
			$id			 		 = $this->input->post('id'); //id tema jika tipe 0 / id person jika tipenya 1
			$n_katakunci = $this->input->post('jumlah');
			$data['tipe']				 = $this->input->post('ty'); // person / tema
			if($n_katakunci != 0){
				$data['id'] = $id;//tema yang akan di tambah pada keyord
				$data['n']=$n_katakunci;//banyaknya data
				//*********************************** LOGIN *******************************************************
				$data['username'] = $data['email'] = "";
				if($this->session->userdata('logged')<>1 || $this->session->userdata('hak_akses') != 2){
					redirect('data/index');
				}else{
					$data['status']   = 'login';
					$data['username'] = $this->session->userdata('username');
					$data['email']    = $this->session->userdata('email');
					$this->load->view('kalangan_terbatas_tambahKeyword',$data);
				}
				//*********************************** LOGIN *******************************************************
			}else
				echo "<script language='javascript'>window.history.go(-2);</script>";
	}

	function db_tambah_keyword()
	{
		//******************************* TAMBAH KEYWORD *************************************************
		$id = $this->input->post('id'); //id tema atu id person
		$n  = $this->input->post('n'); //n untuk mengambil data, i untuk memproses data
		for($n;$n>=1;$n--)
		{
			//cek katakunci dulu
			${'katakunci'.$n} = strtolower($this->input->post('katakunci'.$n));
			$cek_katakunci = $this->data_kalangan_terbatas->cek_keyword(${'katakunci'.$n});
			if(empty($cek_katakunci->katakunci))
			{
				$data = array('katakunci' => ${'katakunci'.$n}, 'id_tema' => $id);
				$this->data_kalangan_terbatas->db_tambah_keyword($data,'katakunci_berita');
			}
		}
		$this->tagging_katakunci(false);
		$this->tagging_katakunci(true);
		redirect('C_kalangan_terbatas/tambah_keyword');
		//******************************* TAMBAH KEYWORD *************************************************
	}

//********************************** HAPUS KEYWORD ***************************************************
	function hapus_keyword()
	{
		$id_katakunci = $this->input->get('id_keyword');
		$where = array('id_katakunci_berita' =>  $id_katakunci );
		$this->data_kalangan_terbatas->hapus_keyword($where,'katakunci_berita');
		$this->M_input->hapus_data(array('id_katakunci' => $id_katakunci), 'berita3_katakunci');
		redirect('C_kalangan_terbatas/lihatTema?id='.$this->input->get('id_tema'));
	}
//********************************** HAPUS KEYWORD ***************************************************
//**********************************  EDIT KEYWORD ***************************************************
	function edit()
	{
		$data['id_katakunci_berita'] = $this->input->get('q1'); // id katakunci atau id alias
		$data['id_tema']						 = $this->input->get('q2'); // id tema atau id person
		$data['tipe']								 = $this->input->get('ty');//tipe 0 == tema , 1 == person
			//************************** AMBIL KATAKUNCI DAN JUDUL (TEXT) *************************************
			if($data['id_katakunci_berita']==0 && $data['tipe'] == 0)
				$data['tema'] = $this->data_kalangan_terbatas->judul_tema($data['id_tema'])->tema;//edit tema
			elseif($data['tipe'] == 0)
				$data['katakunci'] = $this->data_kalangan_terbatas->katakunci($data['id_katakunci_berita'])->katakunci;//edit katakunci
			//**************************  AMBIL KATAKUNCI DAN JUDUL (TEXT) ************************************
			//************************** AMBIL KATAKUNCI DAN JUDUL (TEXT) *************************************
			elseif($data['id_katakunci_berita']==0 && $data['tipe'] == 1)
				$data['tema'] = $this->data_kalangan_terbatas->judul_person($data['id_tema'])->person;//edit tema
			elseif($data['tipe'] == 1)
				$data['katakunci'] = $this->data_kalangan_terbatas->alias($data['id_katakunci_berita'])->alias_person;//edit katakunci
			//**************************  AMBIL KATAKUNCI DAN JUDUL (TEXT) ************************************
		//*********************************** LOGIN *******************************************************
    $data['username'] = $data['email'] = "";
    if($this->session->userdata('logged')<>1 || $this->session->userdata('hak_akses') != 2){
      redirect('data/index');
    }else{
      $data['status']   = 'login';
      $data['username'] = $this->session->userdata('username');
      $data['email']    = $this->session->userdata('email');
      $this->load->view('kalangan_terbatas_edit',$data);
    }
    //*********************************** LOGIN *******************************************************
	}

	function db_edit_katakunci()
	{
		$katakunci 		= $this->input->post('katakunci');
		$id_tema 			= $this->input->post('id');
		$id_katakunci = $this->input->post('id_katakunci_berita');
		//cek katakunci sudah ada atau belum di database
		$cek_katakunci = $this->data_kalangan_terbatas->cek_keyword($katakunci);
		if(empty($cek_katakunci->katakunci)){
			//*********************************** UPDATE KATAKUNCI ********************************************
			$data_update = array('katakunci' => $katakunci);
			$where_update = array('id_katakunci_berita' => $id_katakunci );
			$this->data_kalangan_terbatas->update_katakunci($data_update,$where_update,'katakunci_berita');
			$this->M_input->hapus_data(array('id_katakunci' => $id_katakunci), 'berita3_katakunci');
			//panggil tagging lagi
			$this->tagging_katakunci(false);
			$this->tagging_katakunci(true);
			redirect('C_kalangan_terbatas/lihatTema?ty=0&id='.$id_tema);
			//*********************************** UPDATE KATAKUNCI ********************************************
		}else
			echo "<script language='javascript'> window.alert('katakunci telah terdaftar'); window.history.go(-1);</script>";
	}
//**********************************  EDIT KEYWORD ***************************************************
//********************************** EDIT TEMA *******************************************************
	function db_edit_tema()
	{
		$tema = strtolower($this->input->post('tema'));//tema maksudnya
		$id_tema = $this->input->post('id');
		//cek katakunci sudah ada atau belum di database
		$cek_tema = $this->data_kalangan_terbatas->cek_tema($tema);
		if(empty($cek_tema->tema)){
			//*********************************** UPDATE KATAKUNCI ********************************************
			$data_update = array('tema' => $tema);
			$where_update = array('id' => $id_tema);
			$this->data_kalangan_terbatas->update_tema($data_update,$where_update,'tema_katakunci');
			redirect('C_kalangan_terbatas/lihatTema?ty=0&id='.$id_tema);
			//*********************************** UPDATE KATAKUNCI ********************************************
		}else
			echo "<script language='javascript'> window.alert('katakunci telah terdaftar'); window.history.go(-1);</script>";

	}
//********************************** EDIT TEMA *******************************************************
//********************************** HAPUS TEMA *******************************************************
	function hapus_tema()
	{
		$id_tema = $this->input->get('id');
		$daftar_katakunci = $this->data_kalangan_terbatas->daftar_katakunci($id_tema);
		foreach ($daftar_katakunci as $katakunci)
			$this->M_input->hapus_data(array('id_katakunci' => $katakunci['id_katakunci_berita']), 'berita3_katakunci');
		$this->data_kalangan_terbatas->hapus_tema(array('id' =>  $id_tema),'tema_katakunci');
		$this->data_kalangan_terbatas->hapus_keyword(array('id_tema' =>  $id_tema),'katakunci_berita');
		redirect('C_kalangan_terbatas/kalangan_terbatas');
	}

//********************************** HAPUS TEMA *******************************************************
//********************************** TAMBAH TEMA *******************************************************
	function tambah_tema()
	{
		$tema = strtolower($this->input->post('tema'));
		//cek tema dulu
		$cek_tema = $this->data_kalangan_terbatas->cek_tema($tema);
		if(empty($cek_tema->tema)){
			$data = array('tema' => $tema);
			$this->data_kalangan_terbatas->db_tambah_tema($data,'tema_katakunci');
		}
		redirect('C_kalangan_terbatas/kalangan_terbatas');
	}
//********************************** TAMBAH TEMA *******************************************************
/////////////////////////////////////// TEMA ///////////////////////////////////////////////////////////
/////////////////////////////////////// PERSON ///////////////////////////////////////////////////////////
//********************************** TAMBAH PERSON *****************************************************
	function tambah_person()
	{
		$person = strtolower($this->input->post('person'));
		$cek_person = $this->data_kalangan_terbatas->cek_person($person);
		if(empty($cek_person->person)){
			$data = array('person' => $person);
			$this->data_kalangan_terbatas->db_tambah_person($data,'person');
		}
		redirect('C_kalangan_terbatas/kalangan_terbatas');
	}
//********************************* TAMBAH PERSON *****************************************************
//********************************* EDIT PERSON *****************************************************
	function db_edit_person()
	{
		$person 	 = $this->input->post('person');
		$id_person = $this->input->post('id');
		$id_alias  = $this->input->post('id_katakunci_berita');
		//cek katakunci sudah ada atau belum di database
		$cek_person = $this->data_kalangan_terbatas->cek_person($person);
		if(empty($cek_person->person)){
			//*********************************** UPDATE ALIAS ********************************************
			$data_update = array('person' => $person);
			$where_update = array('id_person' => $id_person);
			$this->data_kalangan_terbatas->update_person($data_update,$where_update,'person');
			redirect('C_kalangan_terbatas/lihatTema?ty=1&id='.$id_person);
			//*********************************** UPDATE ALIAS ********************************************
		}else
			echo "<script language='javascript'> window.alert('katakunci telah terdaftar'); window.history.go(-1);</script>";
	}
//********************************* EDIT PERSON *****************************************************
//********************************* HAPUS PERSON *****************************************************
	function hapus_person()
	{
		$id_person = $this->input->get('id');
		$daftar_aliasPerson = $this->data_kalangan_terbatas->daftar_aliasPerson($id_person);
		foreach ($daftar_aliasPerson as $alias)
			$this->M_input->hapus_data(array('id_alias' => $alias['id_alias_person']), 'berita_aliasperson');
		$this->data_kalangan_terbatas->hapus_person(array('id_person' =>  $id_person),'person');
		$this->data_kalangan_terbatas->hapus_alias(array('id_person' =>  $id_person),'alias_person');
		redirect('C_kalangan_terbatas/kalangan_terbatas');
	}
//********************************* HAPUS PERSON *****************************************************
//****************************** TAMBAH ALIAS PERSON **************************************************
	function db_tambah_alias()
	{
		$id 	= $this->input->post('id'); //id tema atu id person
		$n 		= $this->input->post('n'); //n untuk mengambil data, i untuk memproses data

		for($n;$n>=1;$n--)
		{
			//cek katakunci dulu
			${'alias'.$n} = strtolower($this->input->post('alias'.$n));
			$cek_alias = $this->data_kalangan_terbatas->cek_alias(${'alias'.$n});
			if(empty($cek_alias->alias_person))
			{
				$data = array('alias_person' => ${'alias'.$n}, 'id_person' => $id);
				$this->data_kalangan_terbatas->db_tambah_alias($data,'alias_person');
			}
		}
		$this->tagging_alias(false);
		$this->tagging_alias(true);
		redirect('C_kalangan_terbatas/tambah_keyword');
	}
//****************************** TAMBAH ALIAS PERSON **************************************************
//****************************** EDIT ALIAS PERSON **************************************************
	function db_edit_alias()
	{
		$alias 	   = $this->input->post('alias');
		$id_person = $this->input->post('id');
		$id_alias  = $this->input->post('id_katakunci_berita');
		//cek katakunci sudah ada atau belum di database
		$cek_alias = $this->data_kalangan_terbatas->cek_alias($alias);
		if(empty($cek_alias->person_alias)){
			//*********************************** UPDATE ALIAS ********************************************
			$data_update = array('alias_person' => $alias);
			$where_update = array('id_alias_person' => $id_alias);
			$this->data_kalangan_terbatas->update_alias($data_update,$where_update,'alias_person');
			$this->M_input->hapus_data(array('id_alias' => $id_alias), 'berita_aliasperson');
			//panggil tagging lagi
			$this->tagging_alias(false);
			$this->tagging_alias(true);
			redirect('C_kalangan_terbatas/lihatTema?ty=1&id='.$id_person);
			//*********************************** UPDATE ALIAS ********************************************
		}else
			echo "<script language='javascript'> window.alert('katakunci telah terdaftar'); window.history.go(-1);</script>";
	}
//****************************** EDIT ALIAS PERSON **************************************************
//********************************** HAPUS ALIAS ***************************************************
	function hapus_alias()
	{
		$id_alias = $this->input->get('id_alias');
		$where = array('id_alias_person' =>  $id_alias );
		$this->data_kalangan_terbatas->hapus_alias($where,'alias_person');
		$this->M_input->hapus_data(array('id_alias' => $id_alias), 'berita_alias');
		redirect('C_kalangan_terbatas/lihatTema?ty=1&id='.$this->input->get('id_person'));
	}
//********************************** HAPUS ALIAS ***************************************************

/////////////////////////////////////// PERSON ///////////////////////////////////////////////////////////

}
