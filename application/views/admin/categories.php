<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<h1>Categories | <a id="status">Read</a></h1>
<input type="button" onclick="location.href='<?php echo base_url('admin'); ?>'" value="Back"/>
<button id="edit_toggle">Change Mode</button>
<button id="toggle_all">Toggle All</button>


<?php
echo form_open('admin/category/handle_request');
?>
<ul>
    <?php echo $categories; ?>
</ul>
<?php
echo form_close();
echo form_open('admin/category/add_category');
?>
<input type="text" name="new_cat">
<input type="submit" value="Add new category"/>
<?php
echo form_close();
?>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $('.cat').click(function () {
            $('#sub' + $(this).attr('id')).slideToggle("fast");
        });
        $('#edit_toggle').click(function () {
            if ($('#status').html() == "Read") {
                $('#status').html("Edit");
                $('.options').slideToggle();
            } else {
                $('#status').html("Read");
                $('.options').slideToggle();

            }
        });
        $('.edit_btn').click(function () {
            var id = $(this).attr('id');
            var number = id.split("-")[1];
            var t = $('#' + number).text();
            $('#' + number).html($('<input name="new_name" value="' + t + '"/>'));
            $(this).replaceWith('<input type="hidden" name="cat_id" value="' + number + '"><input type="submit" name="submit_edit" value="Edit"/>');

        });
        $('.delete_btn').each(function () {
            var id = $(this).attr('id');
            var number = id.split("-")[1];
            $(this).attr("href", "<?php echo base_url('admin/category/delete_category')?>/" + number);


        });
        $('#toggle_all').click(function () {
            $('.children').slideToggle("fast");
        });
        $('.add_btn').click(function () {
            var id = $(this).attr('id');
            var number = id.split("-")[1];
            $("#list_element-" + number).after('<input type="text"  name="new_cat"/><input type="submit" name="submit_add" value="Add"/>' +
                '<input type="hidden" name="parent_id" value="' + number + '">');
        });

    });
</script>
</body>
</html>