<h1>Admin panel</h1>
<?php echo $this->session->flashdata('success_msg'); ?>
<a href="<?php echo base_url('admin/products'); ?>">Products</a><br/>
<a href="<?php echo base_url('admin/category'); ?>">Categories</a><br/>
<a href="<?php echo base_url('admin/orders'); ?>">Orders</a><br/>
<a href="<?php echo base_url('admin/users'); ?>">Users</a><br/>
<a href="<?php echo base_url('admin/news'); ?>">News</a><br/>
<a href="<?php echo base_url('admin/static_pages'); ?>">Static Pages</a><br/>
<a href="<?php echo base_url('admin/logout'); ?>">Logout</a><br/>