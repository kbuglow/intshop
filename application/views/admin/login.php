<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    	<div style="max-width: 400px; margin: 0 auto;">
			<?php echo form_open('admin/admin/login_submit'); ?>
				<h2 class="form-signin-heading">Admin Panel</h2>


			    <?php if ($this->session->flashdata('error_msg')): ?>
			            <div class="alert alert-danger" role="alert">
			                <?php echo $this->session->flashdata('error_msg'); ?>
			            </div>
			    <?php endif; ?>

				<div class="form-group">
					<?php echo form_input(array(
						'name' => 'username', 
						'placeholder' => 'Username',
						'class' => 'form-control',
						'reqired' => '',
						'autofocus' => ''
					)); ?>
				</div>

				<div class="form-group">
					<?php echo form_password(array(
						'name' => 'password', 
						'placeholder' => 'Password',
						'class' => 'form-control',
						'reqired' => '',
					)); ?>
				</div>

				<?php echo form_submit(array(
					'name' => 'login',
					'value' => 'Sign in',
					'class' => 'btn btn-lg btn-primary btn-block'
				)); ?>
			<?php echo form_close(); ?>
		</div>
    </div> <!-- /container -->
  </body>
</html>
