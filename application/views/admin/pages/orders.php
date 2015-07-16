<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders</h1>
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
		<?php if ($orders): ?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Order #</th>
						<th>Date</th>
						<th>Customer</th>
						<th>Status</th>
						<th>Amount</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $order): ?>
					<tr>
						<th><?php echo sprintf('#%05d', $order->id); ?></th>
						<td><?php echo $order->date; ?></td>
						<td><?php echo $order->client_name . "({$order->email})"; ?></td>
						<td><?php echo $order->status; ?></td>
						<td><?php echo $order->total; ?></td>
						<td><a href="<?php echo base_url("admin/orders/edit/{$order->id}") ?>"><i class="btn btn-warning btn-circle fa fa-pencil fa-lg"></i></a> <a href="<?php echo base_url("admin/orders/delete/{$order->id}") ?>"><i class="btn btn-danger btn-circle fa fa-trash-o fa-lg"></i></a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php else: ?>
		<div class="alert alert-danger" role="alert">No orders found!</div>
		<?php endif; ?>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->