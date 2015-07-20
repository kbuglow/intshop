<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Static Pages <a href="<?php echo base_url('admin/static_pages/add') ?>" class="btn btn-outline btn-primary btn-sm">Add New</a></h1>
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
    <?php endif;?>

    <div class="row">
        <?php if ($pages): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><?php echo $page->title; ?></td>
                            <td><a href="<?php echo base_url("admin/static_pages/edit/{$page->id}") ?>"><i class="btn btn-warning btn-circle fa fa-pencil fa-lg"></i></a> <a href="<?php echo base_url("admin/static_pages/delete/{$page->id}") ?>" class="delete"><i class="btn btn-danger btn-circle fa fa-trash-o fa-lg"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">No static pages found!</div>
        <?php endif; ?>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->