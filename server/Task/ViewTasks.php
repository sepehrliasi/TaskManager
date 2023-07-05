<?php
include("developers.php");
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
    <div class="container-sm p-4 my-3 bg-dark text-white" style="border-radius: 5px;">
        <div class="container my-5">
            <h3>📌My Tasks</h3>
            <hr>
            <table class="table table-dark table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Begin Date</th>
                        <th>Deadline</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <!-- <tbody>
                    {% for item in items|paginate:request %}
                    <tr>
                        <th>{{ item.title }}</th>
                        <th>{{ item.trade_type }}</th>
                        <th>{{ item.available_to }}</th>
                        <th>{{item.price }}</th>
                        <th>
                            <div style="display: flex; justify-content:space-between;">
                                <a href="{% url 'items:bought_detail' item_id=item.id %}">
                                    <button class="btn btn-info">See Details</button>
                                </a>
                                <a href="{% url 'users:create_support_ticket' %}">
                                    <button class="btn btn-danger">Report</button>
                                </a>
                            </div>
                        </th>
                    </tr>
                    {% endfor %}
                </tbody> -->

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
                        <td><?php echo $data['begin_time']??''; ?></td>
                        <td><?php echo $data['deadline']??''; ?></td>
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

        <!-- <div style="display: flex; justify-content: space-between;">
            <a href="{% url 'items:trade_list' %}">
                <button class="btn btn-secondary">Go to <b style="color: chartreuse;">Items</b> page</button>
            </a>
        </div> -->
    </div>
</body>