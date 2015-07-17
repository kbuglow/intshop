<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
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
            <?php if ($users): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user->username; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->role; ?></td>
                                <td><a href="<?php echo base_url("admin/users/edit/{$user->id}"); ?>">
                                        <i class="btn btn-warning btn-circle fa fa-pencil fa-lg"></i></a>
                                        <a <?php if($user->id !== $this->session->userdata('user_id')) echo 'href="' . base_url("admin/users/delete/{$user->id}") . '" class="delete"'; ?>>
                                        <i class="btn btn-danger btn-circle fa fa-trash-o fa-lg<?php if($user->id == $this->session->userdata('user_id')) echo ' disabled'; ?>"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">No users found!</div>
            <?php endif; ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
