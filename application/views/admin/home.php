<h1>Admin panel</h1>
<?php echo $this->session->flashdata('success_msg');  ?>
<a href="<?php echo base_url('admin/products'); ?>">Products</a><br />
<a href="<?php echo base_url('admin/category'); ?>">Add category</a><br />
<a href="<?php echo base_url('admin/orders'); ?>">Show orders</a><br />
<a href="#">Users</a><br />
<a href="<?php echo base_url('admin/logout'); ?>">Logout</a><br />