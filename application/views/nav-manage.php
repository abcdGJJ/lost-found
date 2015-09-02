<li ><a href="<?php echo base_url();?>lost">丢失物品</a></li>
<li><a href="<?php echo base_url();?>found">捡到物品</a></li>
<li><a href="<?php echo base_url();?>post">信息发布</a></li>
<li><a href="<?php echo base_url();?>admin">管理登陆</a></li>
<li class="dropdown active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            	<?php echo "欢迎管理员".$_SESSION['user']?>
               
               <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="<?php echo base_url() ?>admin/manage">管理</a></li>
            </ul>
         </li>