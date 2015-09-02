<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>static/css/styles.css">
	<!--[if IE]>
		<script src="<?php echo base_url();?>static/js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
	<div class="htmleaf-container">
		
		<div class="wrapper">
			<div class="container">
				<h1>管理员登录</h1>
				
				<form class="form" method="post" action="<?php echo base_url() ;?>admin/user">
					<input type="text" placeholder="用户名" name="name">
					<input type="password" placeholder="密码" name="password">
					<button type="submit" id="login-button">登录</button>
				</form>
			</div>
			
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		
	</div>
	
	<script src="<?php echo base_url();?>static/js/jquery-1.11.3.min.js"></script>
	
	<script>
	
	$('#login-button').click(function (event) {
	    //event.preventDefault();
	    $('form').fadeOut(5000);
	    $('.wrapper').addClass('form-success');
	   
	});
	</script>
</body>
</html>