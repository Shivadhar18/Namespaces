<?php

include("core/model.php");

$model = new TodoModel();

$model->create_table();
$model->autoload();

if($_POST){
    $id = $_POST['id']?$_POST['id']:"";
    if($id==""){
        $date_time = $_POST['date_time'];
        $todo = $_POST['schedule'];
        $status = $_POST['schedule'];
        $model->insert($date_time, $todo, $status);   
    }
    else{
        $date_time = $_POST['date_time'];
        $todo = $_POST['schedule'];
        $status = $_POST['status'];
        $model->update_by_id($id,$date_time,$todo,$status);
    }
}

$todo_list = $model->get_all_data();

?>
<html lang="en-US">
<head>
    <title>NameSpace</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css"/>
</head>

<body>
    <div class="contanier text-center">
        <div class="col-lg-8">
            <h2><caption>TODO LIST</caption></h2>
            <table class="table table-bordered table-striped table-hovered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date Time</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Date Time</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $num=0;
                        while($row = $todo_list->fetch_assoc()) {
                            $num++;
                            ?>
                            <tr>
                                <td><?php echo $num;?></td>
                                <td><?php echo $row['date_time'];?></td>
                                <td><?php echo $row['todo'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <td>
                                    <a href="javascript:edit(<?php echo $row['id']; ?>,'<?php echo $row['date_time']; ?>','<?php echo $row['todo']; ?>','<?php echo $row['status']; ?>')"><i class="glyphicon glyphicon-edit action" data-toggle="tooltip" title="Edit"></i></a>
                                    &nbsp;/&nbsp;
                                    <a href="javascript:delete_todo(<?php echo $row['id'];?>)"><i class="glyphicon glyphicon-trash action" data-toggle="tooltip" title="Delete"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-success" data-toggle="modal" data-target="#add-todo-modal">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Add New Todo
                </button>
            </div>       
        </div>
    </div>
<script type="text/javascript" src="assets/jquery-2.1.4.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<!-- Modal -->
  <div class="modal fade" id="add-todo-modal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->

        <form method="post" action="index.php">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New Todo</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id"/>
                <input type="hidden" name="action"/>
                <table class="table table-responsive">
                    <tr>
                        <td>Date Time</td>
                        <td><input type="input" name="date_time"/></td>
                    </tr>
                    <tr>
                        <td>Schedule</td>
                        <td><input type='input' name="schedule"/></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><input type="input" name="status"/></td>
                    </tr>
                </table>

            </div>
        
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Save"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>  
            </div>               
      </form>
    </div>
  </div>

  <div class="modal fade" id="edit-todo-modal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
        <form method="post" action="index.php">
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Todo</h4>
                 </div>
                <div class="modal-body">
                    <input type="hidden" id="todo_id" name="id"/>
                    <input type="hidden" name="action"/>
                    <table class="table table-responsive">
                    <tr>
                        <td>Date Time</td>
                        <td><input type="input" id="date_time" name="date_time"/></td>
                    </tr>
                    <tr>
                        <td>Schedule</td>
                        <td><input type='input' id="schedule" name="schedule"/></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><input type="input" id="status" name="status"/></td>
                    </tr>
                    </table>
                </div>        
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Save"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>   
        </div>              
      </form>
    </div>
  </div>

