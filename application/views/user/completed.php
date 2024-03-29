<?php 

if (isset($this->session->userdata['logged_in'])) {
    $userEmail = ($this->session->userdata['logged_in']['userEmail']);
    $userId = ($this->session->userdata['logged_in']['userId']);
} 
else {
    header("location: ".base_url()."user/login");
}


?>

<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('includes/header.php'); ?>


<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <!-- NAVBAR -->
        <?php $this->load->view('includes/navbar.php'); ?>
        <!-- END NAVBAR-->

        <!-- MENU SIDEBAR-->
        <?php $this->load->view('includes/sidebar.php'); ?>
        <!-- END MENU SIDEBAR-->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div style="padding-left:50%" class="content-header">
                <div class="container mt-5">
                    <div  class="d-flex justify-content-end">
                        <div id="signupIconMain" class="col-2 col-lg-1 text-center">
                            <i class="nav-icon fas fa-clipboard-check" style="font-size:35px;"></i>
                        </div>
                        <div class="col-10 col-lg-11">
                            <h1 id="signupTitle" class="m-0 text-dark text-bold">Completed</h1>
                            <span id="signupDesc">All your completed task is here!</span>
                        </div>
                        <div id="chart" class="pull-right">
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content mt-5">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="card ml-lg-5 mr-lg-5 mb-0">
                            <!-- DATA TABLE -->
                            <div class="card-header">
                                <h1 class="card-title mt-2 text-bold" style="font-size:1.5rem"><i
                                        class="fas fa-clipboard-list mr-1"></i> COMPLETED TASK
                                    LIST</h1>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <table id="taskTable" class="table" style="width:100%">
                                        <thead class="text-right">
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- view Task MODAL -->
    <div class="modal fade" id="viewTaskModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style=background-color:#46d4e0;>
                    <h4 class="modal-title" id="largeModalLabel" style=color:white;><strong>View Task</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="card-body card-block">
                        <form action="" method="post" name="viewTaskForm" id="viewTaskForm">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-trophy"></i>
                                    <label for="viewtaskTitle" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <input type="text" id="viewtaskTitle" name="viewtaskTitle" placeholder="Title"
                                        maxlength="50" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                        <i style =padding-right:16px; class="fa fa-users"></i>
                                            <label for="viewtaskCategory" class="form-control-label">Category</label>
                                        </div>
                                        <div class="col-4 col-md-8">
                                            <select name="viewtaskCategory" id="viewtaskCategory" class="form-control">
                                                <option value="Education" selected>Education</option>
                                                <option value="Personal">Personal</option>
                                                <option value="Work">Work</option>
                                            </select>
                                        </div>
                                    </div> -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-comment"></i>
                                    <label for="viewtaskDescription" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <textarea name="viewtaskDescription" id="viewtaskDescription" rows="12"
                                        placeholder="Description" class="form-control" maxlength="2000"></textarea>
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                        <i style =padding-right:16px; class="fa fa-calendar"></i>
                                            <label for="viewtaskDueDate" class=" form-control-label">Due Date</label>
                                        </div>
                                        <?php date_default_timezone_set('Asia/Manila');
                                        ?>
                                        <div class="col-4 col-md-8">
                                            <input type="datetime-local" 
                                            value=""
                                            id="viewtaskDueDate" name="viewtaskDueDate" class="form-control">
                                        </div>
                                    </div> -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END of view task MODAL -->

    <!-- Add Task MODAL -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style=background-color:#28a745;>
                    <h4 class="modal-title" id="largeModalLabel" style=color:white;><strong>Add Task</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="card-body card-block">
                        <form action="" method="post" name="addTaskForm" id="addTaskForm">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-trophy"></i>
                                    <label for="taskTitle" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <input type="text" id="taskTitle" name="taskTitle" placeholder="Title"
                                        maxlength="50" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-users"></i>
                                    <label for="taskCategory" class=" form-control-label">Category</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <select name="taskCategory" id="taskCategory" class="form-control">
                                        <option value="Education" selected>Education</option>
                                        <option value="Personal">Personal</option>
                                        <option value="Work">Work</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-comment"></i>
                                    <label for="taskDescription" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <textarea name="taskDescription" id="taskDescription" rows="12"
                                        placeholder="Description" class="form-control" maxlength="2000"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-comment"></i>
                                    <label for="taskFiles" class=" form-control-label">File Attached</label>
                                    
                                </div>
                                <div class="col-4 col-md-8">
                                    <input type="file" id="taskFiles" name="taskFiles" placeholder="Files"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-calendar"></i>
                                    <label for="taskDueDate" class=" form-control-label">Due Date</label>
                                </div>
                                <?php date_default_timezone_set('Asia/Manila');
                                $time = new DateTime();
                                $time->add(new DateInterval('P1D')); ?>
                                <div class="col-4 col-md-8">
                                    <input type="datetime-local" value="<?php echo $time->format('Y-m-d\TH:i') ?>"
                                        id="taskDueDate" name="taskDueDate" class="form-control">
                                </div>
                            </div>
                            <div style=float:right;>
                                <input type="submit" id="btnAddTask" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END task MODAL -->

    <!-- EDIT Task MODAL -->
    <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style=background-color:#ffc107;>
                    <h4 class="modal-title" id="largeModalLabel" style=color:white;><strong>Edit Task</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="card-body card-block">
                        <form action="" method="post" name="editTaskForm" id="editTaskForm">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-trophy"></i>
                                    <label for="edittaskTitle" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <input type="text" id="id" name="id" hidden>
                                    <input type="text" id="edittaskTitle" name="edittaskTitle" placeholder="Title"
                                        maxlength="50" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-users"></i>
                                    <label for="edittaskCategory" class=" form-control-label">Category</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <select name="edittaskCategory" id="edittaskCategory" class="form-control">
                                        <option value="Education" selected>Education</option>
                                        <option value="Personal">Personal</option>
                                        <option value="Work">Work</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-comment"></i>
                                    <label for="edittaskDescription" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <textarea name="edittaskDescription" id="edittaskDescription" rows="12"
                                        placeholder="Description" class="form-control" maxlength="2000"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-comment"></i>
                                    <label for="editaskFiles" class=" form-control-label">File Attached</label>
                                    
                                </div>
                                <div class="col-4 col-md-8">
                                <input type="file" id="edittaskFiles" name="edittaskFiles" placeholder="Files"
                                class="form-control">
                                <a id="filesAttached" name="filesAttached" href=""></a>
                                    <button id="filesAttachedButton" style="padding:5px" class="btn btn-sm bg-transparent btn_delete_files"></button>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <i style=padding-right:16px; class="fa fa-calendar"></i>
                                    <label for="edittaskDueDate" class=" form-control-label">Due Date</label>
                                </div>
                                <div class="col-4 col-md-8">
                                    <input type="datetime-local" value="" id="edittaskDueDate" name="edittaskDueDate"
                                        class="form-control">
                                </div>
                            </div>
                            <div style=float:right;>
                                <input type="submit" id="btnUpdateTask" value="Update" class="btn btn-sm btn-warning">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

<?php $this->load->view('includes/script.php'); ?>
<?php $this->load->view('includes/chart.php'); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script type="text/javascript">
function loadtable() {

    receivedTable = $("#taskTable").DataTable({
        initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var category = $('<select style="padding:3px;"><option value="">All Category</option></select>')
                            .appendTo( $(column.header()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
        
                                column
                                    .search(val)
                                    .draw();
                            } );
                            category.append( '<option value="Education">Education</option>' )
                            category.append( '<option value="Personal">Personal</option>' )
                            category.append( '<option value="Work">Work</option>' )
                    } );
                },
        
        ajax: {
            url: "<?php echo base_url() ?>user/completed/view_task/"+<?php echo $userId ?>,
            dataSrc: function(data) {
                

                var return_data = new Array();

                for (let i = 0; i < data.length; i++) {
                    listIcon = ``;
                    switch (data[i]["taskCategory"]) {
                        case "Education":
                            listIcon = `<i class="fas fa-book"></i>`;
                            taskCategory = `Education`;
                            break;

                        case "Work":
                            listIcon = `<i class="fas fa-briefcase"></i>`;
                            taskCategory = `Work`;
                            break;

                        case "Personal":
                            listIcon = `<i class="fas fa-running"></i>`;
                            taskCategory = `Personal`;
                            break;
                    }

                    task_status = data[i]["taskStatus"];

                    if (task_status == "1") {
                        task_due__date = moment(data[i]['taskDueDate']).diff(moment(), 'days');
                        task_due__hours = moment(data[i]['taskDueDate']).diff(moment(), 'hours');
                        checkbox = `<input type="checkbox" value="${data[i]['id']}" class="taskComplete" name="taskComplete" id="taskComplete${data[i]['id']}">
                        <label for="taskComplete${data[i]['id']}"></label>`

                        if (task_due__date <= 0 && task_due__hours < 0) {
                            task_status =
                                `<small class="ml-2 badge bg-gradient-dark d-inline" style="font-size:13px"><i class="far fa-clock mr-1"></i>Overdue - ${(moment(data[i]['taskDueDate']).diff(moment(), 'days') * -1)} Day/s late</small>`;
                        } else if (task_due__date == 0) {
                            // DUE TODAY
                            if (moment(data[i]['taskDueDate']).format("DD MM YYYY") == moment().format(
                                    "DD MM YYYY")) {
                                task_status =
                                    `<small class="ml-2 badge bg-gradient-red d-inline" style="font-size:13px"><i class="far fa-clock mr-1"></i>Due Today - ${moment(data[i]['taskDueDate']).diff(moment(), 'hours')} hour/s left</small>`;
                            } else if(task_due__hours > 0){
                                task_status =
                                    `<small class="ml-2 badge bg-gradient-yellow d-inline" style="font-size:13px"><i class="far fa-clock mr-1"></i>Almost Due - ${moment(data[i]['taskDueDate']).diff(moment(), 'hours')} hour/s left</small>`;
                            }
                        } else if (task_due__date >= 1 && task_due__date <= 3) {
                            // OVER DUE
                            task_status =
                                `<small class="ml-2 badge bg-gradient-red d-inline" style="font-size:13px"><i class="far fa-clock mr-1"></i>${moment().countdown(data[i]['taskDueDate'], countdown.DAYS | countdown.HOURS).toString()} left</small>`;

                        } else if (task_due__date >= 4 && task_due__date <= 7) {
                            // MODERATE
                            task_status =
                                `<small class="ml-2 badge bg-gradient-orange d-inline" style="font-size:13px"><i class="far fa-clock mr-1"></i>${moment().countdown(data[i]['taskDueDate'], countdown.DAYS | countdown.HOURS).toString()} left</small>`;
                        } else if (task_due__date >= 8) {
                            // MODERATE
                            task_status =
                                `<small class="ml-2 badge bg-gradient-green d-inline" style="font-size:13px"><i class="far fa-clock mr-1"></i>${moment().countdown(data[i]['taskDueDate'], countdown.DAYS | countdown.HOURS).toString()} left</small>`;
                        }
                    } else if (task_status == "2") {
                        task_status =
                            `<small class="ml-2 badge bg-gradient-green d-inline" style="font-size:13px"><i class="far fa-clock mr-1"></i> Completed</small>`;
                        checkbox = `<input checked type="checkbox" value="${data[i]['id']}" class="taskUncomplete" name="taskUncomplete" id="taskUncomplete${data[i]['id']}">
                        <label for="taskUncomplete${data[i]['id']}"></label>`
                        listIcon = `<i><button class="btn btn-danger btn-lg btn_delete" style="position:absolute; right:0px; top:10px" value="${data[i]['id']}" title="Delete" type="button" alt="Delete"> <i class="fa fa-trash"></i></button></i>`;
                        
                    }

                    list = `<div class="small-box mb-0" style=" overflow: hidden;">
                    <div class="inner p-2">
                       <div class="row mr-0 ml-0">
                          <div class="col-1">
                             <div class="icheck-primary ml-1 mt-2">
                                ${checkbox}
                             </div>
                          </div>
                          <div class="col-11 task-details">
                             <button class="btn btn_update text-left" style="padding:0;" title="Edit Task"
                             value="${data[i]['id']}">${data[i]['taskTitle']} ${task_status}<br>
                             <small style="color: #acacac; font-size:14px;">${data[i]['taskDueDateFormatted']} - ${taskCategory}</small>
                             <p class="mb-0" style="white-space: pre-wrap;">${data[i]['taskDescription']}</p></button>
                          </div>
                       </div>
                    </div>
                    <div class="icon">
                       ${listIcon}
                    </div>
                    </div>`
                    return_data.push({
                        DT_RowId: data[i]["id"],
                        taskDetails: list,
                    });
                    
                }

                return return_data;
            },
        },
        columns: [{
            data: "taskDetails",
        }],
        bSort: false,
        language: {
            info: "Showing _START_ to _END_ of _TOTAL_ Task",
            infoEmpty: "",
            infoFiltered: "(filtered from _TOTAL_ total Task)",
            lengthMenu: "Show _MENU_ Task per page",
            zeroRecords: "No Task available",
        },
        
        
    });
    
}


function refresh() {
    var url = "<?php echo base_url()?>user/completed/view_task/"+<?php echo $userId ?>;

    receivedTable.ajax.url(url).load();
}

loadtable()






// Create task
$('#addTaskForm').on('submit', function(e) {

    e.preventDefault();
    $("#btnAddTask").attr("disabled", true);

    var taskTitle = document.addTaskForm.taskTitle.value;
    var taskCategory = document.addTaskForm.taskCategory.value;
    var taskDescription = document.addTaskForm.taskDescription.value;
    var taskDueDate = document.addTaskForm.taskDueDate.value;

    var taskDueDate = new Date(taskDueDate);

    if (taskTitle == '' || taskDescription == '' || taskCategory == '' || taskDueDate == '') {
        Swal.fire({
            title: 'Warning!',
            text: 'Please fill out required field.',
            icon: 'warning',
            confirmButtonText: 'Ok'
        }).then((result) => {
            $("#btnAddTask").attr("disabled", false);
        })
        $("#btnAddTask").attr("disabled", false);
    } else {
        // ajax call
        var form = $('#addTaskForm');
        // ajax post
        $.ajax({
            url: '<?php echo base_url() ?>user/completed/add_task/'+<?php echo $userId?>,
            type: 'post',
            data: new FormData(this),
            processData:false,
            contentType:false,

            success: function() {
                $("#btnAddTask").attr("disabled", false);
                $('#addTaskModal').modal('hide');
                $('#addTaskModal form')[0].reset();
                refresh()
                get_dataset()
            }

        });
        $("#btnAddTask").attr("disabled", false);
        // end of ajax call
    }
});
// END OF // Create task

// PASS TASK 
$(document).on("click", ".btn_update", function() {
    var id = this.value;

    $.ajax({
        url: '<?php echo base_url() ?>user/completed/get_task/' + id,
        type: "GET",
        dataType: "JSON",

        success: function(data) {
            var parsedResponse = jQuery.parseJSON(JSON.stringify(data));
            var row = parsedResponse[0];
            var filesdir = "<?php echo base_url()?>resources/files/"+row.taskFiles;

            $('[name="id"').val(row.id);
            $('[name="edittaskTitle"]').val(row.taskTitle);
            $('[name="edittaskCategory"]').val(row.taskCategory);
            $('[name="edittaskDescription"]').val(row.taskDescription);
            $('#filesAttached').attr("href", filesdir);
            $('#filesAttached').html(row.taskFiles);
            if(row.taskFiles !== ""){
                $('#filesAttachedButton').val(row.id);
                $('#filesAttachedButton').html('Delete');
            }
            $('[name="edittaskDueDate"]').val(row.taskDueDate);
            $('#editTaskModal').modal(
                'show'); // show bootstrap modal when complete loaded
        }
    })

});
// END OF PASS TASK

// DELETE FILES ATTACHED 
$(document).on("click", ".btn_delete_files", function(e) {
    e.preventDefault()
    var id = this.value;

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Ajax call
            $.ajax({
                url: '<?php echo base_url() ?>user/completed/delete_files',
                data: {
                    id: id
                },
                success: function() {
                    refresh()
                    $('#filesAttached').html('');
                    $('#filesAttachedButton').html('');
                }
            });
            // End of ajax call
        }
    })

});
// END OF PASS TASK


// VIEW TASK 
$(document).on("click", ".btn_view", function() {
    var id = this.value;

    $.ajax({
        url: '<?php echo base_url() ?>user/completed/get_task/' + id,
        type: "GET",
        dataType: "JSON",

        success: function(data) {
            var parsedResponse = jQuery.parseJSON(JSON.stringify(data));
            var row = parsedResponse[0];
            $('[name="id"').val(row.id);
            $('[name="viewtaskTitle"]').val(row.taskTitle);
            $('[name="viewtaskCategory"]').val(row.taskCategory);
            $('[name="viewtaskDescription"]').val(row.taskDescription);
            $('[name="viewtaskDueDate"]').val(row.taskDueDate);
            $('#viewTaskModal').modal(
                'show'); // show bootstrap modal when complete loaded
        }
    })

});
// END OF VIEW TASK

// UPDATE TASK
$('#btnUpdateTask').on('click', function(e) {
    e.preventDefault();
    $("#btnUpdateTask").attr("disabled", true);

    var id = document.editTaskForm.id.value
    var editTaskTitle = document.editTaskForm.edittaskTitle.value;
    var editTaskCategory = document.editTaskForm.edittaskCategory.value;
    var editTaskDescription = document.editTaskForm.edittaskDescription.value;
    var editTaskDueDate = document.editTaskForm.edittaskDueDate.value;
    

    if(editTaskTitle == "" || editTaskDescription == ""){
        Swal.fire({
            title: 'Warning!',
            text: 'Please fill out required field.',
            icon: 'warning',
            confirmButtonText: 'Ok'
        }).then((result) => {
            $("#btnUpdateTask").attr("disabled", false);
        })
        $("#btnUpdateTask").attr("disabled", false);
    }
    else{
        let form = document.getElementById('editTaskForm');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ajax call
                $.ajax({
                    url: '<?php echo base_url() ?>user/completed/update_task/'+<?php echo $userId ?>,
                    type: 'post', 
                    data: new FormData(form),
                    processData:false,
                    contentType:false,

                    success: function() {
                        $("#btnUpdateTask").attr("disabled", false);
                        $('#editTaskModal').modal('hide');
                        $('#editTaskModal form')[0].reset();
                        refresh();
                        get_dataset()
                    }
                });
                // End of ajax call
            } else {
                $("#btnUpdateTask").attr("disabled", false);
            }
        })

    }

});
// END OF UPDATE TASK

// DELETE TASK
$(document).on("click", ".btn_delete", function() {
    var id = this.value;

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Ajax call
            $.ajax({
                url: '<?php echo base_url() ?>user/completed/delete_task',
                data: {
                    id: id
                },
                success: function() {
                    refresh()
                    get_dataset()
                }
            });
            // End of ajax call
        }
    })
})
// END OF DELETE TASK

// COMPLETE TASK
$(document).on("change", ".taskComplete", function() {
    var id = this.value;

    // Ajax call
    $.ajax({
        url: '<?php echo base_url() ?>user/completed/complete_task',
        data: {
            id: id
        },
        success: function() {
            refresh()
            get_dataset()
        }
    });
    // End of ajax call  
});
// END OF COMPLETE TASK

// UNCOMPLETE TASK
$(document).on("change", ".taskUncomplete", function() {
    var id = this.value;

    // Ajax call
    $.ajax({
        url: '<?php echo base_url() ?>user/completed/uncomplete_task',
        data: {
            id: id
        },
        success: function() {
            refresh()
            get_dataset()
        }
    });
    // End of ajax call  
});
// END OF COMPLETE TASK



// GET DATASET
function get_dataset(){
    $('#chart').html('')
    $.ajax({
        url: '<?php echo base_url() ?>user/home/get_dataset/'+<?php echo $userId ?>,
        type: "GET", 
        datatype: "JSON", 
        success: function(data) {
            var data = jQuery.parseJSON(data)
            var completedCount = data.completed
            var activeCount = data.active

            dataset = []
            dataset.push(completedCount)
            dataset.push(activeCount)

            if(dataset.length == 2){
                show_chart()
            }

        }
    });
}

get_dataset()

</script>

</html>