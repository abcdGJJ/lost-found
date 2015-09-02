<div class="container">
	<div class="table-responsive">
    	<table class="table table-condensed table-hover ">
      	<caption><h1>丢失物品</h1></caption>
      	<thead>
         	<tr>
            	<th>物体名称</th>
            	<th>物体描述</th>
            	<th>丢失时间</th>
            	<th>丢失校区</th>
            	<th>丢失地点</th>
            	<th>图片</th>
            	<th>联系方式</th>
               <?php 
                  if(!empty($_SESSION['user'])){
                     echo "<th>编辑</th>";
                     echo "<th>删除</th>";
                  }
               ?>
         	</tr>
      	</thead>
      	<tbody>
      	<?php 
      	   foreach ($res as $item){
      			echo "<tr>";
					echo "<td>"."<span style='color:#FF6100'>".$item->name."</span>"."</td>";
					echo "<td>"."<span style='color:#D8B303'>".$item->description."</span>"."</td>";
               if($item->time=="0000-00-00 00:00:00"){
                  echo "<td>无</td>";
               }
               else{
                  echo "<td>$item->time</td>";
               }
					//echo "<td>".$item->time."</td>";
					echo "<td>".$item->school."</td>";
               if($item->place==""){
                  echo "<td>无</td>";
               }
               else{
                  echo "<td>$item->place</td>";
               }
					//echo "<td>".$item->place."</td>";
					if($item->img==""){
						echo "<td>无</td>";
					}
					else{
						echo"<td>"."<a href='".base_url()."uploads/$item->img'><img src='".base_url()."uploads/$item->img' width='200px' height='100px'></a>"."</td>";
					}
					echo "<td>"."<span style='color:#B433FF'>".$item->contact."</span>"."</td>";
               if(!empty($_SESSION['user'])){
                  echo "<td>"."<a href='".base_url()."post/edit/".$item->id."/".$item->type."'>编辑</a>"."</td>";
                  echo "<td>"."<a href='".base_url()."post/delect/".$item->id."/".$item->type."'"." onclick='javascript:return delectconfirm()'".">删除</a>"."</td>";
               }
               
					echo "</tr>";
      	   }	
			?>
         </tbody>
      </table>
   </div> 
      <ul class="pagination ">
         <li><?=$links?></li>
      </ul> 	
</div>
<script type="text/javascript">
   function delectconfirm() { 
      var msg = "您真的确定要删除吗？\n\n请确认！"; 
      if (confirm(msg)==true){ 
         return true; 
      }else{ 
         return false; 
      } 
   } 
</script>