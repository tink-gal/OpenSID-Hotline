<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotline extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();

		$this->load->model('header_model');
		$this->load->model('Hotline_model');
		$this->load->model('Modul_model');
		$this->modul_ini = 13;
		$this->sub_modul_ini = 64;
	}
	public function index()
	{
		$data['main'] = $this->Hotline_model->list_data();
		$header = $this->header_model->get_data();
		$nav['act'] = $this->modul_ini;
		$nav['act_sub'] = $this->sub_modul_ini;
		
		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('hotline/table', $data);
		$this->load->view('footer');
	}

	public function form($id = '')
	{
		if ($id)
		{
			$data['teks'] = $this->Hotline_model->get_teks($id);
			$data['form_action'] = site_url("hotline/update/$id");
		}
		else
		{
			$data['teks'] = null;
			$data['form_action'] = site_url("hotline/insert");
		}

		$header = $this->header_model->get_data();
		$nav['act'] = $this->modul_ini;
		$nav['act_sub'] = $this->sub_modul_ini;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('hotline/form', $data);
		$this->load->view('footer');
	}

	public function insert()
	{
		$this->Hotline_model->insert();
		redirect("hotline");
	}

	public function update($id = '')
	{
		$this->Hotline_model->update($id);
		redirect("hotline");
	}

	public function delete($id = '')
	{
		$this->redirect_hak_akses('h', "Hotline");
		$this->session->success = 1;
		$this->session->error_msg = '';
		$this->Hotline_model->delete($id);
		redirect("hotline");
	}

	public function delete_all()
	{
		$this->redirect_hak_akses('h', "hotline");
		$this->session->success = 1;
		$this->session->error_msg = '';
		$this->Hotline_model->delete_all();
		redirect("hotline");
	}

	public function urut($id = 0, $arah = 0)
	{
		$urut = $this->hotline_model->urut($id, $arah);
 		redirect("hotline/index/$page");
	}

	public function lock($id = 0)
	{
		$this->Hotline_model->lock($id, 1);
		redirect("hotline");
	}

	public function unlock($id = 0)
	{
		$this->Hotline_model->lock($id, 2);
		redirect("hotline");
	}

///batas akhir
}
