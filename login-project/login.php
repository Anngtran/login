<?php
    session_start();

    if(isset( $_POST['login'])){
        require('./config/db.php');

        $userEmail = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


        $stmt = $pdo -> prepare('SELECT * from users WHERE email = ?');
        $stmt->execute([$userEmail]);
        
        $user = $stmt -> fetch();

        if( isset($user) ) {
            if( password_verify($password, $user -> password )) {
                echo "Mật khẩu đúng";
                $_SESSION['userId'] = $user -> id;
                header('Location: http://localhost/login-project/index.php');
            } else {
                $wrongLogin = "Đăng nhập sai, xin vui lòng thử lại";
            }
        }
    }
?>

    <?php require('./inc/header.html'); ?>



    <div class="container mt-4">
      <div class="card">
        <div class="card-header">
          <h3>Đăng nhập</h3> 
        </div>
        <div class="card-body">
            <form action="login.php" method="POST">
                <div class="form-group">
                <label for="userEmail">User Email</label>
                    <input required type="email" name="userEmail" class="form-control" />
                    <br />
                    <?php if(isset($wrongLogin)) { ?>
                    <p style= "background-color: red"><?php echo $wrongLogin ?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required type="password" name="password" class="form-control" />
                </div>
                <button name="login" type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
        </div>
    </div>
     
    <?php require('./inc/footer.html'); ?>

