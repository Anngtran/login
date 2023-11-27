<?php 
    $stmt = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
    $query =mysqli_query($connect, $sql);
?>


<div class="container-fluid">
    <div class="card">
        <div class="card_header">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="card-body">
            <table  class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Thương hiệu</th>
                        <td>Sửa</td>
                        <td>Xóa</td>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)){ ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['prd_name']; ?></td>

                        <td>
                            <img style="width: 100px;" src="img/<?php echo $row['image']; ?>">
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['brand_id']; ?></td>
                        <td>
                            <a href="shopping.php?page_layout=sua&id=<?php echo $row['prd_id']; ?>">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return Del('<?php echo $row['prd_name'];?>')"href="shopping.php?page_layout=xoa&id=<?php echo $row['prd_id']; ?>">Xóa</a>
                        </td>
                        
                    </tr>   
                    <?php  } ?>
                </tbody>
            </table>
            <a class="brn btn-primary" href="shopping.php?page_layout=them">Thêm mới</a>    
        </div>
    </div>
</div>
<script>
    function Del(name){
        return confirm ("Bạn có chắc muốn xóa sản phẩm:" + name + " ?")
    }
</script>