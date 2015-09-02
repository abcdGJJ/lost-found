<?php 
	if(!empty($_SESSION['user'])){
?>
 
		 <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            	<?php echo "欢迎管理员".$_SESSION['user']?>
               
               <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="<?php echo base_url() ?>admin/manage">管理</a></li>
               <li><a href="<?php echo base_url() ?>admin/quit">退出登录</a></li>
            </ul>
         </li>
        
	<?php  }?>
	
	
		
	

