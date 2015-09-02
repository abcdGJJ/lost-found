<?php 
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class Admin extends CI_Controller
	 {
	 	public function index()
	 	{
			$this->load->view('admin');
	 	}
	 	public function user()
	 	{
	 		
	 		$name=$this->input->post('name');
	 		$password=$this->input->post('password');
	 		

	 		$sql="select * from user where name='$name' and password ='$password' limit 1";
	 		$query= $this->db->query($sql);
	 		if ($query->num_rows() > 0)
			{
				
        		$this->load->view('header');
				$this->load->view('nav-admin');
				
				$this->session->set_userdata('user',$name);
				
				$this->load->view('user');
				$this->load->view('nav-remain');
				
				$this->load->view('login-success');
				$this->load->view('footer');
				
			}
			else{
				$this->load->view('header');
				$this->load->view('nav-admin');
				$this->load->view('nav-remain');
				$this->session->set_userdata('user',"");
				$this->load->view('login-fail');
				$this->load->view('footer');
				//echo "fa";
			}

	 	}
	 	public function lost()
	 	{
	 		$this->load->view('header');
	 		$this->load->view('nav-lost');
	 		$this->load->view('user');
			$this->load->view('nav-remain');
				
	 		$total=$this->db->count_all('lost');
			$this->load->library('pagination');
			$config['base_url']=site_url('admin/lost/index');
			$page_size=10;
			$config['total_rows']=$total;
			$config['per_page']=$page_size;
			$config['first_link'] = '首页'; // 第一页显示   
			$config['last_link'] = '末页'; // 最后一页显示   
			$config['next_link'] = '下一页 >'; // 下一页显示   
			$config['prev_link'] = '< 上一页'; // 上一页显示   
			$config['use_page_numbers'] = TRUE;  
			$config['num_links'] = 1;
			$offset=intval($this->uri->segment(4));
			if($offset==0){
				$offset=1;
			}

			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$this->db->order_by('time','DESC');
			$this->db->select('*');
			$query= $this->db->get('lost',$page_size,($offset-1)*$page_size); 
			$data['res'] = $query->result();
			
			$this->load->view('admin-lost',$data);
    		$this->load->view('footer');

	 	}
	 	public function found()
	 	{
	 		$this->load->view('header');
            $this->load->view('nav-found');
            $this->load->view('user');
            $this->load->view('nav-remain');
            $total=$this->db->count_all('found');
            $this->load->library('pagination');
            $page_size=10;
            $config['base_url']=site_url('admin/lost/index');
            $config['total_rows']=$total;
            $config['per_page']=$page_size;
            $config['first_link'] = '首页'; // 第一页显示   
            $config['last_link'] = '末页'; // 最后一页显示   
            $config['next_link'] = '下一页 >'; // 下一页显示   
            $config['prev_link'] = '< 上一页'; // 上一页显示   
            $config['use_page_numbers'] = TRUE;  
            $config['num_links'] = 1;
            $offset=intval($this->uri->segment(4));
            if($offset==0){
                $offset=1;
            }
            $this->pagination->initialize($config);

            $data['links']=$this->pagination->create_links();


            $this->db->select('*');
            $this->db->order_by('time','DESC');
            $query= $this->db->get('found',$page_size,($offset-1)*$page_size);
            $data['res'] = $query->result();
            $this->load->view('admin-found',$data);
            $this->load->view('footer');
	 	}
	 	public function manage()
	 	{
	 		$this->load->view('header');

			$this->load->view('nav-admin');
			$this->load->view('user');
			$this->load->view('nav-remain');
			$this->load->view('manage');
			$this->load->view('footer');

	 	}
	 	public function quit()
	 	{
	 		$this->session->set_userdata('user',"");
	 		$this->load->view('header');
			$this->load->view('nav-post');
			$this->load->view('user');
			$this->load->view('nav-remain');
			$this->load->view('post');
			$this->load->view('footer');
	 	}
	 }

?>