<h1>Static Pages</h1>
<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a>
<hr/>
<table border="1">
    <tr>
        <td>Title</td>
        <td>Options</td>
    <tr>
        <?php foreach ($pages as $page): ?>
    <tr>
        <td><?php echo $page->title; ?></td>
        <td>
            <a href="<?php echo base_url("admin/static_pages/edit/{$page->id}"); ?>">Edit</a>
            <a href="<?php echo base_url("admin/static_pages/delete/{$page->id}") ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
