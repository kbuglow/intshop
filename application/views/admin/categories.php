<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<h1>Categories  | <a id="status">Read</a></h1>
<button id="edit_toggle">Change Mode</button>
<input type="button" onclick="location.href='<?php echo base_url('admin');?>'" value="Back" />
<?php
echo form_open('admin/category/edit_category');
?>
<ul>
<?php echo $categories; ?>
</ul>

<?php
echo form_close();
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $('.cat').click(function() {
                var id = $(this).attr('id');
                $('#sub' + id).slideToggle("fast");
             });
            $('#edit_toggle').click(function() {
                if($('#status').html() == "Read") {
                    $('#status').html("Edit");
                    $('.options').slideToggle();
                } else{
                    $('#status').html("Read");
                    $('.options').slideToggle();

                }
            });
            $('.edit_btn').click(function(){
                var id = $(this).attr('id');
                var number = id.split("-")[1];
                var t = $('#' + number).text();
                $('#' + number).html($('<input name="new_name" value="'+t+'"/>'));
                $(this).replaceWith(' <input type="hidden" name="cat_id" value="' +number+ '"><input type="submit" value="Edit">');

            });
            $('.delete_btn').each(function(){
                var id = $(this).attr('id');
                var number = id.split("-")[1];
                $(this).attr("href", "<?php echo base_url('admin/category/delete_category')?>/" + number);


            });
        });
</script>
</body>
</html>