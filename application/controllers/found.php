<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Found extends CI_Controller
    {
        public function index()
        {
            $this->load->view('header');
            $this->load->view('nav-found');
            $this->load->view('user');
            $this->load->view('nav-remain');
            //$this->db->where('type','捡到');
           
            $total=$this->db->count_all('found');
            $this->load->library('pagination');
            //每页显示10条
            $page_size=10;
            $config['base_url']=site_url('lost/index');
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

            $data['links']=$this->pagination->create_links();



            $this->db->select('*');
            $this->db->order_by('time','DESC');
            $query= $this->db->get('found',$page_size,($offset-1)*$page_size);

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
            $this->load->view('found',$data);
            $this->load->view('footer');
        }
    }
?>