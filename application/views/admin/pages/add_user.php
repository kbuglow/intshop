<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

	<?php if ($this->session->flashdata('error_msg')): ?>
		<div class="row"><div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error_msg'); ?></div><!-- /.row -->
	<?php endif; ?>

    <div class="row">
		<?php echo form_open_multipart('admin/users/add_new', array('class' => 'form-horizontal')); ?>
		<div class="form-group">
			<?php echo form_label('Username: ', 'username', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
			<?php echo form_input(array(
				'id'          => 'username',
				'name'        => 'username',
				'placeholder' => 'Username',
				'class' 	  => 'form-control',
				'value'		  => set_value('username')
			)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('Password: ', 'password', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_password(array(
					'id'          => 'password',
					'name'        => 'password',
					'placeholder' => 'Password',
					'class' 	  => 'form-control',
				)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('Email: ', 'email', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'id'          => 'email',
					'name'        => 'email',
					'placeholder' => 'Email',
					'class' 	  => 'form-control',
					'value'		  => set_value('email')
				)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('User Role: ', 'role', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php
				$options = array(
					'Administrator' => 'Administrator',
					'User' => 'User'
				);

				echo form_dropdown('role', $options, 'class="form-control input-sm"');
				?>
			</div>
		</div>

		<div class="form-group text-center">
			<?php echo form_submit('add', 'Add User', 'class="btn btn-primary btn-lg"'); ?>
			<?php echo form_close(); ?>
		</div>  
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->