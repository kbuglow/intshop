<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product #<?php echo $product->id; ?>
                <a href="<?php echo base_url("admin/products/delete/{$product->id}") ?>" class="btn btn-danger">Delete product</a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="row"><div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success_msg'); ?></div></div><!-- /.row -->
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="row"><div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error_msg'); ?></div><!-- /.row -->
    <?php endif; ?>

    <div class="row">
        <?php echo form_open_multipart('admin/products/edit_submit', array('class' => 'form-horizontal')); ?>
        <div class="form-group">
            <?php echo form_label('Product name: ', 'name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'name',
                    'name'  => 'name',
                    'class' => 'form-control',
                    'value' => $product->name,
                )); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo form_label('Product description: ', 'post_content', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_textarea(array(
                    'id'    => 'description',
                    'name'  => 'description',
                    'value' => $product->description,
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Product categories: ', 'categories', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_multiselect('categories[]', $categories, $selected_cats, 'class="form-control" style="min-height: 200px;" id="multiselect"'); ?> <br />
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Price: ', 'price', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'price',
                    'name'  => 'price',
                    'class' => 'form-control',
                    'value' => $product->price,
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('New Price: ', 'new_price', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'new_price',
                    'name'  => 'new_price',
                    'class' => 'form-control',
                    'value' => $product->new_price,
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('In Stock: ', 'in_stock', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'in_stock',
                    'name'  => 'in_stock',
                    'class' => 'form-control',
                    'value' => $product->in_stock,
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Choose main photo: ', 'main_photo', array('class' => 'col-sm-2 control-label')); ?>
            <?php foreach ($photos as $photo): ?>
                <?php $status = ($product->main_photo === $photo->id) ? TRUE : FALSE; ?>
                <div class="col-xs-2">
                    <img src="<?php echo $photo->url; ?>" class="img-responsive img-circle img-radio <?php if ($status) echo 'active'; ?>" style="width: 150px; height: 150px; <?php if ($status) echo 'opacity: 1;' ;?>" alt="" />
                    <button type="button" class="btn btn-primary btn-radio <?php if ($status) echo 'active'; ?>">Set as main</button>
                    <a href="<?php echo base_url("admin/products/delete_photo/{$photo->id}/{$product->id}") ?>" class="btn btn-danger btn-radio">Delete</a>
                    <?php echo form_radio('main_photo', $photo->id, $status, 'class="hidden"'); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-group">
            <?php echo form_label('Upload more photos:', 'photos', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_upload(array(
                    'id' => 'photos',
                    'name' => 'photos[]',
                    'multiple' => 'multiple',
                    'class' => 'form-control',
                    'accept' => 'image/*'
                )); ?>
            </div>
        </div>

        <div class="form-group text-center">
            <?php echo form_hidden('product_id', $product->id); ?>
            <?php echo form_submit('submit', 'Edit Product', 'class="btn btn-primary btn-lg"'); ?>
            <?php echo form_close(); ?>
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->