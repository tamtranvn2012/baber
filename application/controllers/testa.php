<?php if (!defined('BASEPATH')) die();
class Testa extends Main_Controller {

	public function index()
	{
		$this->load->model('testa_model');
		$data['query'] = $this->testa_model->show_all();
		$this->load->view('include/header');
		//$this->load->view('frontpage');
		$this->load->view('test',$data);
		$this->load->view('include/footer');
	}
   
}

/* End of file testa.php */
/* Location: ./application/controllers/testa.php */
