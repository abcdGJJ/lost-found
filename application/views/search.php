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
					echo "</tr>";
      	   }	
			?>
         </tbody>
      </table>
   </div> 
</div>

<div class="container">
   <div class="table-responsive">
      <table class="table table-condensed table-hover ">
         <caption><h1>捡到物品</h1></caption>
         <thead>
            <tr>
               <th>物体名称</th>
               <th>物体描述</th>
               <th>丢失时间</th>
               <th>丢失校区</th>
               <th>丢失地点</th>
               <th>图片</th>
               <th>联系方式</th>
            </tr>
         </thead>
         <tbody>
         <?php 
            foreach ($resu as $item){
               echo "<tr>";
               echo "<td>"."<span style='color:#428BCA'>".$item->name."</span>"."</td>";
               echo "<td>"."<span style='color:#B37333'>".$item->description."</span>"."</td>";
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
               echo "<td>"."<span style='color:#5CB85C'>".$item->contact."</span>"."</td>";
               echo "</tr>";
            }  
         ?>
         </tbody>
      </table>
   </div>   
</div>
