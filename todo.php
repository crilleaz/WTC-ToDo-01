<!doctype html>
<html>
<head>
    <?php include_once("./cfg.php"); ?>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Todo-list</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="style.css">
</head>
    <body oncontextmenu='return false' class='snippet-body'>
    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <h4 class="card-title">Awesome Todo list</h4>
                        <form action="add.php" method="post">
                        <div class="add-items d-flex"> <input type="text"  class="form-control todo-list-input" name="todo_text" placeholder="What do you need to do today?"> 
                        <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button></form> </div>
                        <div class="list-wrapper">
                            <ul class="d-flex flex-column-reverse todo-list">
                            <?php $result = mysqli_query($con,"SELECT * FROM list"); ?>
                            <?php while($row = mysqli_fetch_array($result))
                            {
                             if($row['completed'] == 0){
                                    echo "<li>";
                                    echo "<div class='form-check'>";
                                    echo "<label class='form-check-label'>";
                                    echo "<input class='checkbox' type='checkbox'>";
                                    echo $row['todo']; 
                                    echo "<i class='input-helper'></i></label></div>";
                                    echo "<a href='complete.php?id=". $row['id'] ."'class='remove mdi mdi-close-circle-outline' title='Finish task!'></i></a>";
                                    echo "</li>";
                                }elseif($row['completed'] == 1){
                                    echo "<li class='completed'>";
                                    echo "<div class='form-check'>";
                                    echo "<label class='form-check-label'>";
                                    echo "<input class='checkbox' type='checkbox' checked=''>";
                                    echo $row['todo']; 
                                    echo "<i class='input-helper'></i></label></div>";
                                    echo "<a href='complete.php?re=". $row['id'] ."'class='remove mdi mdi-close-circle-outline' title='Remove task!'></i></a>";
                                    echo "</li>";
                                }
                            } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="container">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Show completed tasks</button>
            <div class="row">
            <div id="demo" class="collapse">
                        <div class="col-md-12">
                            <div class="card px-3">
                                <div class="card-body">
                                    <h4 class="card-title">Finished Tasks</h4>
                                    <div class="list-wrapper">
                                        <ul class="d-flex flex-column-reverse todo-list">
                                        <?php $result = mysqli_query($con,"SELECT * FROM list"); ?>
                                        <?php while($row = mysqli_fetch_array($result))
                                        {
                                            if($row['completed'] == 4){
                                                echo "<li>";
                                                echo "<div class='form-check'>";
                                                echo "<label class='form-check-label'>";
                                                echo "<input class='checkbox' type='checkbox'>";
                                                echo $row['todo']; 
                                                echo "<i class='input-helper'></i></label></div>";
                                                echo "<a href='complete.php?readd=". $row['id'] ."'class='remove mdi mdi-close-circle-outline' title='Add to tasklist'></i></a>";
                                                echo "</li>";
                                            }
                                        } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script type='text/Javascript'>(function($) {
        'use strict';
        $(function() {
        var todoListItem = $('.todo-list');
        var todoListInput = $('.todo-list-input');
        $('.todo-list-add-btn').on("click", function(event) {
        event.preventDefault();

        var item = $(this).prevAll('.todo-list-input').val();

        if (item) {
        todoListItem.append("<li>
            <div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox' />" + item + "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i>
        </li>");
        todoListInput.val("");
        }
        });
        todoListItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
        $(this).removeAttr('checked');
        } else {
        $(this).attr('checked', 'checked');
        }

        $(this).closest("li").toggleClass('completed');

        });

        todoListItem.on('click', '.remove', function() {
        $(this).parent().remove();
        });

        });
        })(jQuery);
</script>
</body>
</html>