<?php
$username=$_SESSION['username'];
$get_user="select * from `user_table` where user_name='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];

?>
<h3 class="text-success">All my Orders</h3>
<table class="table table-bordered mt-5">
    <?php
    $get_order_details="select * from `user_orders` where user_id=$user_id";
    $result_orders=mysqli_query($con,$get_order_details);
    while($row_order=mysqli_fetch_assoc($result_orders)){
        $order_id=$row_data['order_id'];
        
    }
    ?>
    <thead class="bg-info">
    <tr>
        <th>Sl no</th>
        <th>Amount Due</th>
        <th>Total products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <tr>
            <td>1</td>
            <td>100</td>
            <td>3</td>
            <td>25481</td>
            <td>1234510</td>
            <td>Complete</td>
            <td>Confirm</td>
        </tr>
    </tbody>
</table>