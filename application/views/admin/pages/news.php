<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News <a href="<?php echo base_url('admin/news/add') ?>" class="btn btn-outline btn-primary btn-sm">Add New</a></h1>
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
        <?php if ($news): ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>New #</th>
                        <th>Creator</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($news as $new): ?>
                    <tr>
                        <th><?php echo sprintf('#%05d', $new->id); ?></th>
                        <td><?php echo $new->username; ?></td>
                        <td><?php echo $new->title; ?></td>
                        <td><?php echo $new->date; ?></td>
                        <td><?php echo substr($new->subject, 0, 50); if (strlen($new->subject) > 50) echo '...'; ?></td>
                        <td><a href="<?php echo base_url("admin/news/edit/{$new->id}") ?>"><i class="btn btn-warning btn-circle fa fa-pencil fa-lg"></i></a> <a href="<?php echo base_url("admin/news/delete/{$new->id}") ?>" class="delete"><i class="btn btn-danger btn-circle fa fa-trash-o fa-lg"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-danger" role="alert">No news found!</div>
        <?php endif; ?>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->