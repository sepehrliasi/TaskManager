<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/TaskManager/server/database/getTask.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width-device-width,initial-scale1.0" charset="UTF-8">
<head>
    <title>Edit Task</title>
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

    <section>
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-4-strong card-registration" style="border-radius: 5px; background-color: rgb(192, 203, 227);">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><b style="color: darkslategrey ;">Edit Task</b></h3>
                  <hr>
                  <form class="needs-validation" onsubmit="validate(form)" novalidate action="/TaskManager/server/database/TaskEdit.php?id=<?php echo $fetchData['taskid'] ?>" method="post">
      
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="title"><b>🔴Title</b></label>
                                <input id="title" type="text" class="form-control" placeholder="Enter name of the task" name="title" required
                                    value="<?php if(isset($fetchData['title'])){ echo $fetchData['title']; } ?>">
                                <div class="invalid-feedback">Please enter Title!</div>
                            </div>
                        </div>
    
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="description"><b>Description</b></label>
                                <input id="description" type="textarea" class="form-control" placeholder="Enter description of the task" name="description"
                                    value="<?php if(isset($fetchData['description'])){ echo $fetchData['description']; } ?>">
                                <div class="invalid-feedback">Must be less than 200 characters!</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="begin_time"><b>🔴Task begins on: </b></label>
                                <input class="form-control" id="begin_time" type="date" placeholder="Enter begin date" name="begin_time" required
                                    value="<?php if(isset($fetchData['beginDate'])){ echo $fetchData['beginDate']; } ?>">
                                <div class="invalid-feedback">Please choose a valid date!</div>
                            </div>
                        </div>
      
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="deadline"><b>🔴Deadline is: </b></label>
                                <input class="form-control" id="deadline" type="date" placeholder="Enter deadline" name="deadline" required
                                    value="<?php if(isset($fetchData['deadline'])){ echo $fetchData['deadline']; } ?>">
                                <div class="invalid-feedback">Please choose a valid date!</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="notif_time"><b>Notification Date: </b></label>
                                <input class="form-control" id="notif_time" type="date" placeholder="Enter begin date" name="notif_time"
                                    value="<?php if(isset($fetchData['notifDate'])){ echo $fetchData['notifDate']; } ?>">
                                <div class="invalid-feedback">Please choose a valid date!</div>
                            </div>
                        </div>
                    </div>
                    <hr>
    
                    <button type="submit" id="submit" class="btn btn-success" style="width: 100%;">Edit</button>
    
      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

        <script>
          const forms = document.querySelectorAll('.needs-validation')
    
          Array.from(forms).forEach(form => {
              form.addEventListener('submit', event => {
                  if (!form.checkValidity()) {
                      event.preventDefault()
                      event.stopPropagation()
                  }
    
                  form.classList.add('was-validated')
              }, false)
          });
        </script>
    
</body>
</html>