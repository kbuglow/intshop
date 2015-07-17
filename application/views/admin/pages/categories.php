<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories <button class="btn btn-info" id="edit_toggle">Change Mode</button>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!--<h1>Categories | <a id="status">Read</a></h1>-->
    <!--<button id="toggle_all">Toggle All</button>-->

    <div class="row">
        <?php
        echo form_open('admin/category/handle_request');
        ?>
        <div class="form-group">

            <ul>
                <?php echo $categories; ?>
            </ul>
        </div>
        <?php
        echo form_close(); ?>
    </div>
    <div class="row">
        <?php
        echo form_open('admin/category/add_category');
        ?>
        <div class="form-group">
            <div class="col-sm-8">
                <?php echo form_input(array(
                    'id'          => 'new_cat',
                    'name'        => 'new_cat',
                    'placeholder' => 'New Category',
                    'class' 	  => 'form-control',
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg" value="Add new category"/>
        </div>
        <?php
        echo form_close();
        ?>
    </div>



<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $('.children').slideToggle("fast");
        $('.cat').click(function () {
            $('#sub' + $(this).attr('id')).slideToggle("fast");
        });
        $('#edit_toggle').click(function(){
            $('.options').slideToggle();
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
        $('.add_btn').click(function () {
            var id = $(this).attr('id');
            var number = id.split("-")[1];
            $("#list_element-" + number).after('<input type="text"  name="new_cat"/><input type="submit" name="submit_add" value="Add"/>' +
                '<input type="hidden" name="parent_id" value="' + number + '">');
        });
        $('.active_check').click(function () {
            var id = $(this).attr('id');
            var number = id.split("-")[1];
            window.location.href = '<?php echo base_url('admin/category/change_active')?>/' + number;
        });
    });
</script>
