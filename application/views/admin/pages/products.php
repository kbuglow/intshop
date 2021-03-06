<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products <a href="<?php echo base_url('admin/products/add') ?>" class="btn btn-outline btn-primary btn-sm">Add New Product</a></h1>
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
		<?php if ($products): ?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Product #</th>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>New Price</th>
						<th>In Stock</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($products as $product): ?>
					<tr>
						<th><?php echo sprintf('#%05d', $product->id); ?></th>
						<td><?php echo $product->name; ?></td>
						<td><?php echo substr(strip_tags($product->description), 0, 50); if (strlen($product->description) > 50) echo '...'; ?></td>
						<td><?php echo $product->price; ?></td>
						<td><?php echo $product->new_price; ?></td>
						<td><?php echo $product->in_stock; ?></td>
						<td><a href="<?php echo base_url("admin/products/edit/{$product->id}") ?>"><i class="btn btn-warning btn-circle fa fa-pencil fa-lg"></i></a> <a href="<?php echo base_url("admin/products/delete/{$product->id}") ?>" class="delete"><i class="btn btn-danger btn-circle fa fa-trash-o fa-lg"></i></a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php else: ?>
		<div class="alert alert-danger" role="alert">No products added! <a href="<?php echo base_url('admin/products/add') ?>">Add new one</a></div>
		<?php endif; ?>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->