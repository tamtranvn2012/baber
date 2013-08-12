<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
class Upload extends CI_Controller
{
	protected $path_img_upload_folder;
	protected $path_img_thumb_upload_folder;
	protected $path_url_img_upload_folder;
	protected $path_url_img_thumb_upload_folder;

	protected $delete_img_url;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		if(!$this->input->cookie('userid', TRUE)){
			redirect('/user/login/', 'refresh');
		}
		$this->load->helper(array('form', 'url'));
		$this->load->helper('date');
		$this->load->model('post_model');
		$this->load->model('profile_model');		
		$os = PHP_OS;
		switch($os)
		{
			case "Linux": define("DS", "/"); break;
			case "Windows": define("DS", "\\"); break;
			default: define("DS", "\\"); break;
		}		
		//Make new folder for user upload
		$fulldate = date('Y-m-d');
		$yearfolder = date('Y');
		$monthfolder = date('m');
		$dayfolder = date('d');
		$uploaddir = FCPATH.'uploads';
		//$uploaddir = FCPATH.'assets'.DS.'img'.DS.'articles';
		$yearuploaddir = $uploaddir.DS.$yearfolder;
		if (!is_dir($yearuploaddir)){
			mkdir($yearuploaddir,777);
		}
		$monthuploaddir = $yearuploaddir.DS.$monthfolder;
		if (!is_dir($monthuploaddir)){
			mkdir($monthuploaddir,777);
		}
		$dayuploaddir = $monthuploaddir.DS.$dayfolder;
		if (!is_dir($dayuploaddir)){
			mkdir($dayuploaddir,777);
		}
		$useruploaddir = $dayuploaddir.DS.$useridss;
		if (!is_dir($useruploaddir)){
			mkdir($useruploaddir,777);
		}
		$thumbsdir = $useruploaddir.DS.'thumbnails';
		if (!is_dir($thumbsdir)){
			mkdir($thumbsdir,777);
		}
		$this->setPath_img_upload_folder($useruploaddir);
		$this->setPath_img_thumb_upload_folder($thumbsdir);
		//Set url img with Base_url()
		$this->setPath_url_img_upload_folder(base_url() . 'uploads/'.$yearfolder.'/'.$monthfolder.'/'.$dayfolder.'/'.$useridss.'/');
		$this->setPath_url_img_thumb_upload_folder(base_url() . 'uploads/'.$yearfolder.'/'.$monthfolder.'/'.$dayfolder.'/'.$useridss.'/thumbnails/');
		//Delete img url
		$this->setDelete_img_url(base_url() . 'admin/deleteImage/');
	}

	public function index()
	{
		$this->load->view('test');
	}

	// Function called by the form
	public function upload_img()
	{
		if($_FILES['userfile']['name'] == ''){
			$this->load->helper('cookie');
			$upid = $_REQUEST['upid'];
			$bpid = $_REQUEST['bpid'];
			$userid = $this->input->cookie('userid', TRUE);
			if($this->profile_model->check_upid_bpid($upid,$bpid,$userid)){
				$babershopname = $_REQUEST['babershopname'];
				$baber_type = $_REQUEST['baber_type'];
				$baber_name = $_REQUEST['babername'];
				$tags = $_REQUEST['tags'];
				$resultapid = $this->profile_model->get_apid($upid,$bpid);
				$apid = $resultapid[0]->apid;
				$photo_id = $this->input->cookie('photo_img_id', TRUE);
				$private = 0;
				$this->post_model->add_new_post($apid,$photo_id,$babershopname,$baber_type,$baber_name,$tags,$private);
				echo 'Load view complete insert post here';
			}
		}
	
		//Format the name
		if ($_FILES['userfile']['name']){
			$name = $_FILES['userfile']['name'];
			$name = strtr($name, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$useridss = $this->input->cookie('userid', TRUE);
			$yearfolder = date('Y');
			$monthfolder = date('m');
			$dayfolder = date('d');
			$fulldate = date('Y-m-d');
			$timtostr = strtotime(now());		
			$baber_name = '';
			$photo_link = '';
			$photo_tag = '';
			$baber_name = $_REQUEST['baber_name'];
			$baber_type = $_REQUEST['baber_type'];
			$photo_link = $_REQUEST['photo_link'];
			$photo_tag = $_REQUEST['photo_tag'];
			//$photo_img_link = $useridss.'___'.$fulldate.'___'.$name;
			//$photo_img_link = str_replace('-','_',$photo_img_link);
			$isprivate = 0;
			
			$uploaddir = FCPATH.'uploads';
			//$uploaddir = FCPATH.'assets'.DS.'img'.DS.'articles';
			$yearuploaddir = $uploaddir.DS.$yearfolder;
			if (!is_dir($yearuploaddir)){
				mkdir($yearuploaddir,777);
			}
			$monthuploaddir = $yearuploaddir.DS.$monthfolder;
			if (!is_dir($monthuploaddir)){
				mkdir($monthuploaddir,777);
			}
			$dayuploaddir = $monthuploaddir.DS.$dayfolder;
			if (!is_dir($dayuploaddir)){
				mkdir($dayuploaddir,777);
			}
			$useruploaddir = $dayuploaddir.DS.$useridss;
			if (!is_dir($useruploaddir)){
				mkdir($useruploaddir,777);
			}
			$thumbsdir = $useruploaddir.DS.'thumbnails';
			if (!is_dir($thumbsdir)){
				mkdir($thumbsdir,777);
			}
			
			$this->setPath_img_upload_folder($useruploaddir);
			$this->setPath_img_thumb_upload_folder($thumbsdir);
			//Set url img with Base_url()
			$this->setPath_url_img_upload_folder(base_url() . 'uploads/'.$yearfolder.'/'.$monthfolder.'/'.$dayfolder.'/'.$useridss.'/');
			$this->setPath_url_img_thumb_upload_folder(base_url() . 'uploads/'.$yearfolder.'/'.$monthfolder.'/'.$dayfolder.'/'.$useridss.'/thumbnails/');
			
			// replace characters other than letters, numbers and . by _
			$name = preg_replace('/([^.a-z0-9]+)/i', '_', $name);
			
			//Your upload directory, see CI user guide
			
			$config['upload_path'] = $this->getPath_img_upload_folder();

			$config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
			$config['max_size'] = '2000';
			$config['file_name'] = $name;

			//Load the upload library
			$this->load->library('upload', $config);

			if ($this->do_upload())
			{
				// Codeigniter Upload class alters name automatically (e.g. periods are escaped with an
				//underscore) - so use the altered name for thumbnail
				$data = $this->upload->data();
				$name = $data['file_name'];
				//$name = $_FILES['userfile']['name'];
				//$name = $file->name;

				//If you want to resize 
				$config['new_image'] = $this->getPath_img_thumb_upload_folder().$name;
				$config['image_library'] = 'gd2';
				//$config['source_image'] = $this->getPath_img_upload_folder() . $name;
				$config['source_image'] = $this->getPath_img_upload_folder() . $name;
				$config['create_thumb'] = False;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 193;
				$config['height'] = 94;

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();

				//Get info 
				$info = new stdClass();
				
				$info->name = $name;
				$info->size = $data['file_size'];
				$info->type = $data['file_type'];
				//$info->url = $this->getPath_img_upload_folder() . $name;
				
				$info->url = $this->getPath_url_img_upload_folder() . $name;
				//$info->thumbnail_url = $this->getPath_img_thumb_upload_folder() . $name; //I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$name
				//$info->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . $name; //I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$name
				$info->thumbnail_url = $this->getPath_url_img_upload_folder() . $name; //I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$name
				$info->delete_url = $this->getDelete_img_url() . $name;
				$info->delete_type = 'DELETE';

				//upload file
				$photo_img_link = $useridss.'___'.$fulldate.'___'.$name;
				$photo_img_link = str_replace('-','_',$photo_img_link);
				
				if (strlen($photo_img_link)>0){
					$this->load->model('photos_model');
					$this->photos_model->add_new_photo($baber_name,$photo_link,$photo_tag,$photo_img_link,$isprivate,$baber_type,$useridss);
					$resultphotoid = $this->photos_model->get_img_id($photo_img_link);
					$photo_id = 0;
					$photo_id = $resultphotoid[0]->photo_id;
					$cookie = array(
						'name'   => 'photo_img_id',
						'value'  => $photo_id,
						'expire' => '86400'
					);
					$this->input->set_cookie($cookie);				
				}else{
					//echo 'Please fill form';exit;
				}

				//Return JSON data
				if (IS_AJAX)
				{   //this is why we put this in the constants to pass only json data
				echo json_encode(array($info));
				//this has to be the only the only data returned or you will get an error.
				//if you don't give this a json array it will give you a Empty file upload result error
				//it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
				}
				else
				{   // so that this will still work if javascript is not enabled
					$file_data['upload_data'] = $this->upload->data();
					echo json_encode(array($info));
				}
			}
			else
			{

			// the display_errors() function wraps error messages in <p> by default and these html chars don't parse in
			// default view on the forum so either set them to blank, or decide how you want them to display.  null is passed.
			$error = array('error' => $this->upload->display_errors('',''));

			echo json_encode(array($error));
			}
		}
		/*
		if($_REQUEST){
			var_dump($this->input->cookie('photo_img_link', TRUE));
		}
		*/
	}

	//Function for the upload : return true/false
	public function do_upload()
	{
		if (!$this->upload->do_upload())
		{
			return false;
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			return true;
		}
	}


	//Function Delete image
	public function deleteImage()
	{
		//Get the name in the url
		$file = $this->uri->segment(3);
		
		$success = unlink($this->getPath_img_upload_folder() . $file);
		$success_th = unlink($this->getPath_img_thumb_upload_folder() . $file);

		//info to see if it is doing what it is supposed to	
		$info = new stdClass();
		$info->sucess = $success;
		$info->path = $this->getPath_url_img_upload_folder() . $file;
		$info->file = is_file($this->getPath_img_upload_folder() . $file);
		if (IS_AJAX)
		{//I don't think it matters if this is set but good for error checking in the console/firebug
			echo json_encode(array($info));
		}
		else
		{
			//here you will need to decide what you want to show for a successful delete
			var_dump($file);
		}
	}


	//Load the files
	public function get_files()
	{
		$this->get_scan_files();
	}

	//Get info and Scan the directory
	public function get_scan_files()
	{
		$file_name = isset($_REQUEST['file']) ?
				basename(stripslashes($_REQUEST['file'])) : null;
		if ($file_name)
		{
			$info = $this->get_file_object($file_name);
		}
		else
		{
			$info = $this->get_file_objects();
		}
		header('Content-type: application/json');
		echo json_encode($info);
	}

	protected function get_file_object($file_name)
	{
		//$file_path = $this->getPath_img_upload_folder() . $file_name;
		$file_path = $this->getPath_img_upload_folder() . $file_name;
		if (is_file($file_path) && $file_name[0] !== '.')
		{

			$file = new stdClass();
			$file->name = $file_name;
			$file->size = filesize($file_path);
			//$file->url = $this->getPath_url_img_upload_folder() . rawurlencode($file->name);
			$file->url = $this->getPath_url_img_upload_folder() . rawurlencode($file->name);
			//$file->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . rawurlencode($file->name);
			$file->thumbnail_url = $this->getPath_url_img_thumb_upload_folder() . rawurlencode($file->name);
			//File name in the url to delete 
			$file->delete_url = $this->getDelete_img_url() . rawurlencode($file->name);
			$file->delete_type = 'DELETE';
			
			return $file;
		}
		return null;
	}

	//Scan
	protected function get_file_objects()
	{
		return array_values(array_filter(array_map(
			array($this, 'get_file_object'), scandir($this->getPath_img_upload_folder())
		)));
	}



	// GETTER & SETTER 
	public function getPath_img_upload_folder()
	{
		return $this->path_img_upload_folder;
	}

	public function setPath_img_upload_folder($path_img_upload_folder)
	{
		$this->path_img_upload_folder = $path_img_upload_folder;
	}

	public function getPath_img_thumb_upload_folder()
	{
		return $this->path_img_thumb_upload_folder;
	}

	public function setPath_img_thumb_upload_folder($path_img_thumb_upload_folder)
	{
		$this->path_img_thumb_upload_folder = $path_img_thumb_upload_folder;
	}

	public function getPath_url_img_upload_folder()
	{
		return $this->path_url_img_upload_folder;
	}

	public function setPath_url_img_upload_folder($path_url_img_upload_folder)
	{
		$this->path_url_img_upload_folder = $path_url_img_upload_folder;
	}

	public function getPath_url_img_thumb_upload_folder()
	{
		return $this->path_url_img_thumb_upload_folder;
	}

	public function setPath_url_img_thumb_upload_folder($path_url_img_thumb_upload_folder)
	{
		$this->path_url_img_thumb_upload_folder = $path_url_img_thumb_upload_folder;
	}

	public function getDelete_img_url()
	{
		return $this->delete_img_url;
	}

	public function setDelete_img_url($delete_img_url)
	{
		$this->delete_img_url = $delete_img_url;
	}
}