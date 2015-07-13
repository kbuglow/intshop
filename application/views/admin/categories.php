<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<h1>Categories  | <a id="status">Read</a></h1>
<button id="edit_toggle">Change Mode</button>

<ul>
<?php echo $categories; ?>
</ul>

<?php
//echo form_open('demo/show_form');
//echo form_fieldset('Add Category');
//echo form_label("Category name ");
//echo form_input(array('name' => 'cat_name'));
//echo form_submit('submit_form', 'Submit');
//echo form_fieldset_close();
//echo form_close();
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
        $(document).ready(function() {
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

    });
</script>
</body>
</html>