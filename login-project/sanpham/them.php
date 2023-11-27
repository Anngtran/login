<?php
    $sql_brand ="SELECT * FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);

    if(isset($_POST['sbm'])){
        $prd_name =  $_POST['prd_name'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $price =  $_POST['price'];
        $quantity =  $_POST['quantity'];
        $description =  $_POST['description'];
        $brand_id =  $_POST['brand_id'];

        $sql = "INSERT INTO products (prd_name, image, price, quantity, description, brand_id )
        VALUES ('$prd_name','$image', $price, $quantity,'$description', $brand_id )";
        $query = mysqli_query($connect, $sql);
        move_uploaded_file($image_tmp, 'img/'.$image);
        header('location: shopping.php?page_layout=danhsach');
    }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm sản phẩm</h2>
        </div>
        <div class="card-body">
            <from method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <lable for="">Tên sản phẩm</lable>
                    <input type="text" name="prd_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <lable for="">Ảnh sản phẩm</lable><br>
                    <input type="file" name="image"> 
                </div>

                <div class="form-group">
                    <lable for="">Giá sản phẩm</lable>
                    <input type="number" name="price" class="form-control"  required>
                </div>

                <div class="form-group">
                    <lable for="">Số lượng sản phẩm</lable>
                    <input type="number" name="quantity" class="form-control" required>
                </div>

                <div class="form-group">
                    <lable for="">Mô tả sản phẩm</lable>
                    <input type="text" name="description" class="form-control" required >
                </div>

                <div class="form-group">
                    <lable for="">Thương hiệu</lable>
                    <select class="form-control" name="brand_id">
                        <?php 
                            while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                                 <option value ="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                            <?php } ?>
                           
                            
                    </select>
                </div> 
                <a class="brn btn-success" href="shopping.php?page_layout=danhsach">Thêm</a>          
            </from>
        </div>
    </div>
</div>
