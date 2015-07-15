<h1>Static Pages</h1>
<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a><hr />

<?php if ($this->session->flashdata('success_msg')): ?>
    <p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<table border="1">
    <tr>
        <td>Contacts</td>
        <td>asdasdasd</td>
              <td><a href="<?php echo base_url("contacts"); ?>">Show & Edit</a> </td>
      
    <tr>
   
                 <tr>
                     <td>Delivery</td>
        <td>lalalat</td>
        
            
        </tr>
   
</table>