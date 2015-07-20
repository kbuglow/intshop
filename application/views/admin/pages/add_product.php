<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Product</h1>
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
		<?php echo form_open_multipart('admin/products/add_submit', array('class' => 'form-horizontal')); ?>
		<div class="form-group">
			<?php echo form_label('Product name: ', 'name', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
			<?php echo form_input(array(
				'id'          => 'name',
				'name'        => 'name',
				'placeholder' => 'Product name',
				'class' 	  => 'form-control',
				'value'		  => set_value('name')
			)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('Description: ', 'description', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_textarea(array(
					'id'          => 'description',
					'name'        => 'description',
					'placeholder' => 'Product description',
					'class' 	  => 'form-control',
					'value'		  => set_value('description')
				)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('Choose category: ', 'categories', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_multiselect('categories[]', $categories, '', 'class="form-control" style="min-height: 200px;" id="multiselect"'); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('Price: ', 'price', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'id'          => 'price',
					'name'        => 'price',
					'placeholder' => 'Price',
					'class' 	  => 'form-control',
					'value'		  => set_value('price')
				)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('New Price: ', 'new_price', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'id'          => 'new_price',
					'name'        => 'new_price',
					'placeholder' => 'New Price',
					'class' 	  => 'form-control',
					'value'		  => set_value('new_price')
				)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('In Stock: ', 'in_stock', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_input(array(
					'id'          => 'in_stock',
					'name'        => 'in_stock',
					'placeholder' => 'In Stock',
					'class' 	  => 'form-control',
					'value'		  => set_value('in_stock')
				)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo form_label('Photos', 'photos', array('class' => 'col-sm-2 control-label')); ?>
			<div class="col-sm-10">
				<?php echo form_upload(array(
					'id'       => 'photos',
					'name'     => 'photos[]',
					'multiple' => 'multiple',
					'class'    => 'form-control',
					'accept'   => 'image/*'
				)); ?>
			</div>
		</div>

		<div class="form-group text-center">
			<?php echo form_submit('add', 'Add Product', 'class="btn btn-primary btn-lg"'); ?>
			<?php echo form_close(); ?>
		</div>  
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->