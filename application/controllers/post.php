<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Post extends CI_Controller
	{
		function __construct()  
    	{  
        	parent::__construct();  
    	}  
    	public function index()
    	{
    		$this->load->view('header');
            $this->load->view('nav-post');
            $this->load->view('user');
            $this->load->view('nav-remain');
    		$this->load->view('post');
    		$this->load->view('footer');
    	}
        public function form()
        {
            $type=$this->input->post('type');
            $name=$this->input->post('name');
            $description=$this->input->post('description');
            $time=$this->input->post('time');
            $school=$this->input->post('school');
            $place=$this->input->post('place');
            $config['upload_path']='./uploads';
            $config['allowed_types']='gif|png|jpg|jpeg|bmp';
            $config['max_size'] = '2048';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('img'))
            {
                //echo $this->upload->display_errors();
                if ($this->upload->data('file_name')==""){
                    $img="";
                }
                else {
                    echo $this->upload->display_errors();
                }
                
                 
            }
            else
            {
                //$data['upload_data']=$this->upload->data();  //文件的一些信息
                //$img=$data['upload_data']['file_name']; //取得文件名
                $img=$this->upload->data('file_name');        
            }
            //$img=$this->input->post('img');
            $contact=$this->input->post('contact');
            $data = array (
               'id' => null,
               'type' =>$type,
               'name' => $name,
               'description' => $description,
               'time' => $time,
               'school' => $school,
               'place' => $place,
               'img' => $img,
               'contact' => $contact,
               );
            if($type=="lost"){
                if($this->db->insert('lost', $data)){
                    $data['kind']="lost";
                    $this->load->view('header');
                    $this->load->view('nav-post');
                    $this->load->view('nav-remain');
                    $this->load->view('success',$data);
                    $this->load->view('footer');
                }
            }
            if($type=="found"){
                if($this->db->insert('found', $data)){
                    $data['kind']="found";
                    $this->load->view('header');
                    $this->load->view('nav-post');
                    $this->load->view('nav-remain');
                    $this->load->view('success',$data);
                    $this->load->view('footer');
                }
                
            }
            //if($this->db->insert($table, $data)){
            	//if($type=="遗失"){
            		//$data['kind']="lost";
            	//}
            	//if($type=="捡到"){
            		//$data['kind']="found";
            		
            	//}
            	
            //$sql="insert into things (type,name,description,time,school,place,img,contact) values ('$type','$name','$description','$time','$school','$place','$img','$contact')";
            //$this->db->query($sql);
            
        }
        public function search(){
            $this->load->view('header');
            $this->load->view('nav-post');
            $this->load->view('user');
            $this->load->view('nav-remain');
            $thing=$this->input->post('thing');

            $this->db->like('name', $thing);
            $this->db->or_like('description',$thing);
            $this->db->order_by('time','DESC');
            $this->db->select('*');
            $query= $this->db->get('lost');
            $res=$query->result();
            //foreach ($res as $row){
                //echo str_replace($thing,"<font color='red'>".$thing."</font>",$row['name'])."<br>";
                //echo str_replace($thing,"<font color='red'>".$thing."</font>",$row['description'])."<br>";
                // /str_replace()
            //}
            //$highlightnum = $query->num_rows();
            //echo $highlightnum;
            //$ress = $query->result_array();
            //$a=array();
            //while($a=mysql_fetch_array($ress)){
                //str_replace($thing,"<font color=red>".$thing."</font>",$a['name']);
            //}
            //var_dump($res) ;
            
            //for ($i=0; $i <$highlightnum ; $i++) { 
               
               
                //echo $b['name'];
                //var_dump($b);
                //str_replace($thing,"<font color=red>".$thing."</font>",$b['name']);
           // }
            
            //$res = $query->result();

            $data['res'] = $res;

            $this->db->like('name', $thing);
            $this->db->or_like('description',$thing);
            $this->db->order_by('time','DESC');
            $this->db->select('*');
            $query= $this->db->get('found');
            $data['resu'] = $query->result();



            $this->load->view('search',$data);
            $this->load->view('footer');

        }
        public function edit()
        {
            $this->load->view('header');
            $this->load->view('nav-post');
            $this->load->view('user');
            $this->load->view('nav-remain');
            if(!empty($_SESSION['user'])){
            	$id = $this->uri->segment(3);
            $type =$this->uri->segment(4);
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get($type);
            $res=$query->result();
            $data['res'] = $res;
            
            $this->load->view('edit',$data);

            }
            
            $this->load->view('footer');

        }
        public function delect()
        {
            $this->load->view('header');
            $this->load->view('nav-post');
            $this->load->view('user');
            $this->load->view('nav-remain');
            if(!empty($_SESSION['user'])){

            	$id = $this->uri->segment(3);
            	$type =$this->uri->segment(4);
            	$this->db->where('id', $id);
            	$this->db->delete($type);
            	if($type=="lost"){
                	$data['kind']="lost";
            	}
            	if($type=="found"){
                	$data['kind']="found";
            	}
            	$this->load->view('delect',$data);
        	}
            $this->load->view('footer');

        }
        public function updateedit()
        {
            $id = $this->input->post('id');
            $type=$this->input->post('type');
            $name=$this->input->post('name');
            $description=$this->input->post('description');
            $time=$this->input->post('time');
            $school=$this->input->post('school');
            $place=$this->input->post('place');
            $previousimg=$this->input->post('previousimg');
            $config['upload_path']='./uploads';
            $config['allowed_types']='gif|png|jpg|jpeg|bmp';
            $config['max_size'] = '2048';
            $this->load->library('upload',$config);
            //echo $previousimg;
            if ( ! $this->upload->do_upload('img'))
            {
                //echo $this->upload->display_errors();
                if ($previousimg==""){
                    if ($this->upload->data('file_name')==""){
                        $img="";
                    }
                    else {
                        echo $this->upload->display_errors();
                    }
                }
                if ($previousimg!==""){
                    if ($this->upload->data('file_name')==""){
                        $img=$previousimg;
                    }
                    else{
                        
                        echo $this->upload->display_errors();
                        $img=$previousimg;
                    }
                    
                }
                

                
                
                 
            }
            else
            {
                
                    $img=$this->upload->data('file_name'); 
                   
                
                
                    $img=$this->upload->data('file_name'); 
                   
                

                //$data['upload_data']=$this->upload->data();  //文件的一些信息
                //$img=$data['upload_data']['file_name']; //取得文件名
                //$img=$this->upload->data('file_name');        
            }
            //$img=$this->input->post('img');
            $contact=$this->input->post('contact');

            $data = array (
               
               'name' => $name,
               'description' => $description,
               'time' => $time,
               'school' => $school,
               'place' => $place,
               'img' => $img,
               'contact' => $contact,
               );

            $this->db->where('id', $id);
            //if(!($this->upload->display_errors())){
                if($type=="lost"){
                    if($this->db->update('lost', $data)){
                        $data['kind']="lost";
                        $this->load->view('header');
                        $this->load->view('nav-post');
                        $this->load->view('nav-remain');
                        $this->load->view('update-success',$data);
                        $this->load->view('footer');
                    }
                }
            //}
                if($type=="found"){
                    if($this->db->update('found', $data)){
                        $data['kind']="found";
                        $this->load->view('header');
                        $this->load->view('nav-post');
                        $this->load->view('nav-remain');
                        $this->load->view('update-success',$data);
                        $this->load->view('footer');
                    }
                }
            
            
        }
	}
?>