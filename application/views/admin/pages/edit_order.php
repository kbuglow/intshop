<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Order #<?php echo $order->id; ?>
                <a href="<?php echo base_url("admin/orders/delete/{$order->id}") ?>" class="btn btn-danger">Delete order</a>
                <p><small class="text-primary">Placed on <strong><?php echo $order->date; ?></strong></small></p>
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
        <?php echo form_open('admin/orders/edit_submit', array('class' => 'form-horizontal')); ?>
        <div class="form-group">
            <?php echo form_label('Customer: ', 'client_name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'client_name',
                    'name'  => 'client_name',
                    'class' => 'form-control',
                    'value' => $order->client_name,
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Client Phone: ', 'phone', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'phone',
                    'name'  => 'phone',
                    'class' => 'form-control',
                    'value' => $order->phone,
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Client Email: ', 'email', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'email',
                    'name'  => 'email',
                    'class' => 'form-control',
                    'value' => $order->email,
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Shipping Address: ', 'address', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'address',
                    'name'  => 'address',
                    'class' => 'form-control',
                    'value' => $order->address,
                )); ?>
            </div>
        </div>


        <div class="form-group">
            <?php echo form_label('Order Status: ', 'status', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php 
                    $options = array(
                        'New'              => 'New',
                        'Processing'       => 'Processing',
                        'Shipped'          => 'Shipped',
                        'Delivered'        => 'Delivered',
                        'Will Not Deliver' => 'Will Not Deliver',
                        'Returned'         => 'Returned'
                    );

                    echo form_dropdown('status', $options, $order->status, 'class="form-control"'); 
                ?>
            </div>
        </div>

        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Product #</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>          
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?php echo $item->name; ?></td>
                            <td><?php echo $item->price; ?></td>
                            <td><?php echo form_input("_{$item->id}", $item->quantity, 'class="form-control"') ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th><i>Total:</i></th>
                            <td><?php echo $order->total; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group text-center">
            <?php echo form_hidden('order_id', $order->id); ?>
            <?php echo form_submit('submit', 'Edit Order', 'class="btn btn-primary btn-lg"'); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->