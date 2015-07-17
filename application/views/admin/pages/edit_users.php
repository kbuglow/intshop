<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User <?php echo $user->username; ?>
                <a href="<?php echo base_url("admin/users/delete/{$user->id}") ?>" class="btn btn-danger delete">Delete user</a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="row">
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-square"></i>
                <?php echo $this->session->flashdata('success_msg'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div><!-- /.row -->
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="row">
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-times"></i>
                <?php echo $this->session->flashdata('error_msg'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div><!-- /.row -->
    <?php endif; ?>

        <div class="row">
            <?php echo form_open('admin/users/edit_user', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <?php echo form_label('Username', 'username', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo form_input(array(
                        'id' => 'username',
                        'name' => 'username',
                        'value' => $user->username,
                        'class' => 'form-control'

                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Email: ', 'email', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo form_input(array(
                        'id' => 'email',
                        'name' => 'email',
                        'value' => $user->email,
                        'class' => 'form-control'
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

                    echo form_dropdown('role', $options, $user->role, 'class="form-control input-sm"');
                    ?>
                </div>
            </div>
            <div class="form-group text-center">
                <?php echo form_hidden('user_id', $user->id); ?>
                <?php echo form_submit('submit', 'Edit the user', 'class="btn btn-primary btn-lg"'); ?>

                <?php echo form_close(); ?>
            </div>

        </div>
    </div>