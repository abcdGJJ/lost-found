<?php 
   foreach ($res as $item){
?>
   <div class="container" style="margin-top: 30px;">
      <form role="form" class="form-horizontal" action="<?php echo base_url(); ?>post/updateedit"  enctype="multipart/form-data" method="post" id="post">
            <input type="hidden" value="<?php echo $item->id ?>" name="id">
            <div class="form-group">
               <label class="col-sm-3 control-label">发布类型</label>
               <div class="col-sm-9">
                  <label class="checkbox-inline">
                  <?php 
                     if($item->type=="lost"){
                  ?>
                     <input type="radio" name="type" value="lost" checked > 丢失物品
                  <?php  
                     }
                  ?>
                   <?php 
                     if($item->type=="found"){
                  ?>
                     <input type="radio" name="type" value="found" checked > 捡到物品
                  <?php  
                     }
                  ?>
                     
                  </label>
                 
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-3 control-label"><span style="color:red;">*物体名称(必填)</span></label>
               <div class="col-sm-3">
                  <input type="text" name="name" value="<?php echo $item->name ?>" class="form-control validate[required]">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-3 control-label"><span style="color:red;">*物体描述(必填)</span></label>
               <div class="col-sm-5">
                  <input type="text" name="description" value="<?php echo $item->description ?>" class="form-control validate[required]">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-3 control-label">捡到/丢失时间</label>
               <div class="col-sm-5 control-label clearright">
                  <input placeholder="请输入日期和时间" value="<?php echo $item->time ?>" type="text" name="time" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
               </div>
         </div>
            <div class="form-group">
               <label class="col-sm-3 control-label">捡到/丢失校区</label>
               <label class="col-sm-3">
                  <select class="form-control" name="school">
                     <?php 
                        if($item->school=="东校区"){
                           echo "<option value='西校区'>西校区</option>";
                           echo "<option value='东校区' selected>东校区</option>";
                           echo "<option value='其他'>其他</option>";
                        }
                         if($item->school=="其他"){
                           echo "<option value='西校区'>西校区</option>";
                           echo "<option value='东校区'>东校区</option>";
                           echo "<option value='其他' selected>其他</option>";
                        }
                        echo "<option value='西校区'>西校区</option>";
                        echo "<option value='东校区'>东校区</option>";
                        echo "<option value='其他'>其他</option>";
                     ?>
                    
                  </select>
               </label>
            </div>
            <div class="form-group">
               <label class="col-sm-3 control-label">捡到/丢失地点</label>
               <div class="col-sm-3">
                  <input type="text" name="place" value="<?php echo $item->place ?>" class="form-control">
               </div>
            </div>
            <?php if($item->img!=""){?>
               <div class="form-group">
               <label class="col-sm-3 control-label">图片</label>
               <label class="col-sm-3">
                  <?php  echo "<a href='".base_url()."uploads/".$item->img."'>"."<img src='".base_url()."uploads/".$item->img."' width='200' height='100'></a>"?>
               </label>
            </div>
            <?php  
               }
            ?>
            
            <input type="hidden" name="previousimg" value="<?php echo $item->img ?>">
            <div class="form-group">
               <label class="col-sm-3 control-label">图片(选填。大小不能超过2M，格式只能为png|gif|jpg|jpeg|bmp)</label>
            <label class="col-sm-3">
               <input type="file" name="img" >
            </label>
            </div>
            <div class="form-group">
               <label class="col-sm-3 control-label"><span style="color:red;">*联系方式(必填)</span></label>
            <label class="col-sm-3">
               <input type="text" value="<?php echo $item->contact ?>" name="contact" class="form-control validate[required]" ></input>
            </label>
            </div>
            <div class="form-group">
               <label class="col-sm-3 col-sm-offset-2 control-label">
                  <button type="submit" class="btn btn-success btn-lg">提交</button>
               </label>
            
            </div>
            
      </form>

   </div>





<?php 
   }
?>   


    
   