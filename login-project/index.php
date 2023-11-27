<?php
    session_start();

    if( isset($_SESSION['userId'])) {
        require('./config/db.php');

        $userId = $_SESSION['userId'];

        $stmt = $pdo -> prepare('SELECT * from users WHERE id = ? ');
        $stmt -> execute([$userId]);

        $user = $stmt -> fetch();

        if ( $user->rolo === 'guest') {
            $message = "Vai trò của bạn là khách";
        }
    }


?>

    <?php require('./inc/header.html'); ?>

    <div class="container">
        <div class="card bg-light mb-3">
            <div class="card-header">
                <?php if(isset($user)) { ?>
                    <h5>Welcome <?php echo $user->name ?></h5>
                <?php } else { ?>
                    <h5>Chào mừng khách hàng </h5>
                <?php } ?>
            </div>
            <div class="card-body">
                
                <?php if (isset($user)) { ?>
                    <h5>Đây là nội dung siêu bí mật chỉ dành cho những người đã đăng nhập</h5>
                <?php } else { ?>
                    <h4>Vui lòng Đăng nhập/Đăng ký để mở khóa tất cả nội dung</h4>
                <?php } ?>
            </div>
        </div>
    </div>
     
    <?php require('./inc/footer.html'); ?>

