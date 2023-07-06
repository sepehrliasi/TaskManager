<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/DeadlineFilter.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width-device-width,initial-scale1.0" charset="UTF-8">
<head>
    <title>Tasks</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="padding-top: 15px; padding-bottom: 15px;">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/TaskManager/server/Task/viewTasks.php">My Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/TaskManager/client/Task/CreateTask.html">Create Task</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/TaskManager/client/user/EditProfile.html">Edit Profile</a>
                    </li>
                    <a href="/TaskManager/server/user/logout.php">
                        <button class="btn btn-danger">Logout</button>
                    </a>
            </div>
        </nav>
    </div>

    <div class="container-sm p-4 my-3 bg-dark text-white" style="border-radius: 5px;">
        <div class="container my-5">
            <h3>📌My Tasks</h3>
            <hr>
            <table class="table table-dark table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Row number</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Begin Date</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(is_array($fetchData)){      
                        $sn=1;
                        foreach($fetchData as $data){
                    ?>
                        <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $data['title']??''; ?></td>
                        <td><?php echo $data['description']??''; ?></td>
                        <td><?php echo $data['beginDate']??''; ?></td>
                        <td><?php echo $data['deadline']??''; ?></td>
                        <td>
                            <div id="actions" style="display: flex; justify-content:space-between;">
                                <div style="display: flex; justify-content:space-between;">
                                    <a href="/TaskManager/server/database/ToggleStatus.php?id=<?php echo $data['taskid'] ?>">
                                        <button type="submit" class="btn btn-info">
                                            <?php if ($data['isComplete'] == true){
                                                echo "Completed";
                                                }else{ echo "Ongoing";
                                            }; ?>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <th>
                            <div style="display: flex; justify-content:space-between;">
                                <a href="/TaskManager/server/Task/TaskDetails.php?id=<?php echo $data['taskid'] ?>">
                                    <button class="btn btn-light">View</button>
                                </a>
                                <a href="/TaskManager/server/Task/EditTask.php?id=<?php echo $data['taskid'] ?>">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <a href="/TaskManager/server/database/DeleteTask.php?id=<?php echo $data['taskid'] ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </a>
                            </div>
                        </th>
                       </tr>
                       <?php
                        $sn++;
                        }}else{ ?>
                            <tr>
                            <td colspan="8">
                                <?php echo $fetchData; ?>
                            </td>
                        <tr>
                      <?php
                      }?>
                </tbody>
            </table>
        </div>
        <hr>

        <div style="display: flex; justify-content: space-between;">
            <a href="/TaskManager/server/Task/viewTasksPriority.php">
                <button class="btn btn-secondary">Filter by <b style="color: chartreuse;">Priority</b></button>
            </a>
            <a href="/TaskManager/server/Task/viewCompletedTasks.php">
                <button class="btn btn-secondary"><b style="color: chartreuse;">Completed</b> tasks</button>
            </a>
            <a href="/TaskManager/server/Task/viewTasksDeadline.php">
                <button class="btn btn-secondary">Filter by <b style="color: chartreuse;">Deadline</b></button>
            </a>
        </div>
    </div>
</body>