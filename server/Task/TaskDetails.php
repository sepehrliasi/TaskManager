<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/getTask.php";
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

    <div class="container m-3 p-4">
        <div class="card p-4" style="width:600px;">
            <h2>Task Details</h2>
            <hr>

            <label for="title"><b>Title</b></label>
            <p name="title"><?php echo $fetchData['title']??''; ?></p>
            <hr>
            <label for="description"><b>Description</b></label>
            <p name="description"><?php echo $fetchData['description']??''; ?></p>
            <hr>
            <label for="begin_date"><b>Task begins on</b></label>
            <p name="begin_date"><?php echo $fetchData['beginDate']??''; ?></p>
            <hr>
            <label for="deadline"><b>Task deadline</b></label>
            <p name="deadline"><?php echo $fetchData['deadline']??''; ?></p>
            <hr>
            <label for="notification_date"><b>Notification date</b></label>
            <p name="notification_date"><?php echo $dafetchDatata['notifDate']??''; ?></p>
            <hr>
            <label for="priority"><b>Priority</b></label>
            <p name="priority"><?php echo $fetchData['priority']??''; ?></p>
            <hr>
            <label for="isComplete"><b>Status</b></label>
            <div id="actions" style="display: flex; justify-content:space-between;">
                <div style="display: flex; justify-content:space-between;">
                    <a href="/TaskManager/server/database/ToggleStatus.php?id=<?php echo $fetchData['taskid'] ?>">
                        <button type="submit" class="btn btn-info">
                            <?php if ($fetchData['isComplete'] == true){
                                echo "Completed";
                            }else{ echo "Ongoing";
                            }; ?>
                        </button>
                    </a>
                </div>
            </div>
            <hr>
            <label for="actions"><b>Actions</b></label>


            <div id="actions" style="display: flex; justify-content:space-between;">
                <div style="display: flex; justify-content:space-between;">
                    <a href="/TaskManager/server/Task/EditTask.php?id=<?php echo $data['taskid'] ?>">
                        <button class="btn btn-warning">Edit</button>
                    </a>
                    <a href="/TaskManager/server/database/DeleteTask.php?id=<?php echo $data['taskid'] ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </a>
                </div>
            </div>
            <hr>
            <a href="/TaskManager/server/Task/viewTasks.php">
                <button class="btn btn-dark">Go to <b style="color: chartreuse;">Tasks</b></button>
            </a>
        </div>

    </div>
</body>