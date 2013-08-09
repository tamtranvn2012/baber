<?php
	Class Testa_model extends CI_Model{
		
		public function __construct()
		{
		  parent::__construct();
		
		}
		
		function insert_tmp_user()
		{
			$this->load->database();
			$query = $this->db->query('insert into upload_tmp value ()');
			$query = $this->db->query('Select max(user_id) as user_id_tmp from upload_tmp');
			return $query->result();
		}

		function show_all()
		{
			$this->load->database();
			$query = $this->db->query('select test1 from test');
			return $query->result();
		}
	}
?>