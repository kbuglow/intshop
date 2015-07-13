<html>
<head>
</head>
<body>
<h1>Categories</h1>
<ul>
<?php foreach($categories as $item){ 
        if($item->parent == NULL){ ?>
        <li>
            <a class="cat" id="<?php echo $item->id;?>"><?php echo $item->name;?></a>
        </li>   
            <div  id="sub<?php echo $item->id;?>" style="display: none;">
                <ul>
                <?php
                    
                ?>
                    <li>kopon</li>
                </ul>
            </div>
<?php
        }  
    }
?>
</ul>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            $('.cat').click(function() {
                var id = $(this).attr('id');
                console.log('.sub' + id);
                $('#sub' + id).slideToggle("fast");
        });
    });
</script>
</body>
</html>