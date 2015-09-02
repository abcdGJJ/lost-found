<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Lost extends CI_Controller
	{
		public function index()
		{
			$this->load->view('header');
			
			$total=$this->db->count_all('lost');
			
			
			
			$this->load->library('pagination');
			//每页显示10条
			
			$config['base_url']=site_url('lost/index');
			$page_size=10;
			$config['total_rows']=$total;
			$config['per_page']=$page_size;
			$config['first_link'] = '首页'; // 第一页显示   
			$config['last_link'] = '末页'; // 最后一页显示   
			$config['next_link'] = '下一页 >'; // 下一页显示   
			$config['prev_link'] = '< 上一页'; // 上一页显示   
			$config['use_page_numbers'] = TRUE;  
			$config['num_links'] = 1;
			
			
			$offset=intval($this->uri->segment(3));
			if($offset==0){
				$offset=1;
			}

			$this->pagination->initialize($config);

			//$offset=intval($this->uri->segment(3));
	

			$data['links']=$this->pagination->create_links();

			$this->db->order_by('time','DESC');
			$this->db->select('*');
			$query= $this->db->get('lost',$page_size,($offset-1)*$page_size); 
			//$query= $this->db->get('things');

    		//$sql= "select * from things where type='遗失' order by time desc";
    		//$query = $this->db->query($sql);
    		$data['res'] = $query->result();
    		/*if ($query->num_rows() > 0)
			{
        		foreach ($query->result() as $row)
        		{
                	$data['type'] = $row->type;
                	$data['name'] = $row->name;
                	$data['description'] = $row->description;
        		}
			}*/

			$this->load->view('nav-lost');
			$this->load->view('user');
			$this->load->view('nav-remain');
			$this->load->view('lost',$data);
    		$this->load->view('footer');
		}
	}
?>