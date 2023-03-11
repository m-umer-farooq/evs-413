<?php include('header.php');
//https://www.javatpoint.com/php-pagination

//----Pagination Setup----
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$results_per_page = 10;
$page_first_result = ($page-1) * $results_per_page;  

$sql        = "SELECT * FROM `users`";
$result     = mysqli_query($conn,$sql);
$number_of_result   = mysqli_num_rows($result);

$number_of_page = ceil ($number_of_result / $results_per_page); 
//----Pagination Setup----

$sql = "SELECT * FROM `users` LIMIT " . $page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn,$sql);


?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
        <h3>Users</h3>
        </div>
    </div>

    <?php if(isset($_REQUEST['message']) &&  $_REQUEST['message'] != ''){?>
    <div class="row">
        <div class="col-md-6">
            <?php if(isset($_REQUEST['type']) &&  $_REQUEST['type'] == 'success'){
                echo '<div class="alert alert-success">'.$_REQUEST['message'].'</div>';
             }?>

             <?php if(isset($_REQUEST['type']) &&  $_REQUEST['type'] == 'error'){
                echo '<div class="alert alert-danger">'.$_REQUEST['message'].'</div>';
             }?>
        </div>
    </div>
    <?php }?>


    <div class="row">
        <div class="col-md-12">
             <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            if($number_of_result  > 0){
                                
                                while($row = $result->fetch_object()){
                        ?>
                            <tr>
                                <th scope="row"><?=$row->id?></th>
                                <td><?=$row->first_name?></td>
                                <td><?=$row->last_name?></td>
                                <td><?=$row->username?></td>
                                <td><?=$row->email?></td>
                                <td><?=($row->is_active == 1) ? 'Yes':'No'?></td>
                                <td>
                                    <a href="user_edit.php?id=<?=$row->id?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a onclick="return deleteRec()" href="user_delete.php?id=<?=$row->id?>" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php
                            } 
                        }else{
                        ?>

                            <tr><td colspan="7" align="center">No Record Found</td></tr>
                        <?php }?>
                    </tbody>
                    </table>

             </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php
                for($page = 1; $page<= $number_of_page; $page++) {  
                    echo '<a href = "users_list.php?page=' . $page . '">' . $page . ' </a>';  
                }
            ?>
        </div>
    </div>

</div>
<script>

    function deleteRec(){
        if (window.confirm("Do you really want to delete?")) {
            return true;
        }else{
            return false;
        }
    }

</script>

<?php include('footer.php');?>