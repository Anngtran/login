<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM products where prd_id =$id";
    $query = mysqli_query($connect, $sql);
    header('location: shopping.php?page_layout=danhsach');
?>