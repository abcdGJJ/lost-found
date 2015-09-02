    <div class="container" style="margin-top: 30px;">
    	<form role="form" class="form-horizontal" action="<?php echo base_url(); ?>post/form"  enctype="multipart/form-data" method="post" id="post">
  	 		<div class="form-group">
      			<label class="col-sm-3 control-label">发布类型</label>
      			<div class="col-sm-9">
      				<label class="checkbox-inline">
      					<input type="radio" name="type" value="lost" checked > 丢失物品
   					</label>
      				<label class="checkbox-inline">
      					<input type="radio" name="type"  value="found" > 捡到物品
   					</label>
   				</div>
   			</div>
   			<div class="form-group">
      			<label class="col-sm-3 control-label"><span style="color:red;">*物体名称(必填)</span></label>
      			<div class="col-sm-3">
      				<input type="text" name="name" class="form-control validate[required]">
      			</div>
   			</div>
   			<div class="form-group">
      			<label class="col-sm-3 control-label"><span style="color:red;">*物体描述(必填)</span></label>
      			<div class="col-sm-5">
      				<input type="text" name="description" class="form-control validate[required]">
      			</div>
   			</div>
   			<div class="form-group">
      			<label class="col-sm-3 control-label">捡到/丢失时间</label>
      			<div class="col-sm-5 control-label clearright">
      				<input placeholder="请输入日期和时间" type="text" name="time" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
      			</div>
			</div>
   			<div class="form-group">
      			<label class="col-sm-3 control-label">捡到/丢失校区</label>
      			<label class="col-sm-3">
      				<select class="form-control" name="school">
         				<option value='西校区'>西校区</option>
         				<option value='东校区'>东校区</option>
         				<option value='其他'>其他</option>
   					</select>
      			</label>
      		</div>
      		<div class="form-group">
      			<label class="col-sm-3 control-label">捡到/丢失地点</label>
      			<div class="col-sm-3">
      				<input type="text" name="place" class="form-control">
      			</div>
   			</div>
      		<div class="form-group">
      			<label class="col-sm-3 control-label">图片(选填。大小不能超过2M，格式只能为png|gif|jpg|jpeg|bmp)</label>
				<label class="col-sm-3">
					<input type="file" name="img">
				</label>
      		</div>
      		<div class="form-group">
      			<label class="col-sm-3 control-label"><span style="color:red;">*联系方式(必填)</span></label>
				<label class="col-sm-3">
					<input type="text" name="contact" class="form-control validate[required]" ></input>
				</label>
      		</div>
      		<div class="form-group">
      			<label class="col-sm-3 col-sm-offset-2 control-label">
      				<button type="submit" class="btn btn-success btn-lg">提交</button>
      			</label>
				
      		</div>
   			
		</form>

  	</div>