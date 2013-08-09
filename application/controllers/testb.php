<?php
class Testb extends Main_Controller {

	public function index()
	{
		$data = array();
		$data['testvar'] = 'Test Cao Ho Cot';
		$data['testvar1'] = 'Test Cao Ho Cot Ngu';
		$data['testvar2'] = 'Test Cao Ho Cot Ngoc';
		$this->load->view('testcaohocot',$data);
	}
	public function hello(){
		echo 'Hello,Is this me you looking for?';
	}
   
}
?>