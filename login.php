<html>
<head>
    <style type="text/css">
        body, html {
            height: 100%;
            background-color:#ebf0f5
        }

        .card-container.card {
            max-width: 350px;
            padding: 40px 40px;
        }

        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }

        .card {
            background-color: #F7F7F7;
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 50px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .profile-img-card {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
        }

        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin #inputUser,
        .form-signin #inputPassword {
            direction: ltr;
            height: 44px;
            font-size: 16px;
        }

        .form-signin input[type=email],
        .form-signin input[type=password],
        .form-signin input[type=text],
        .form-signin button {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .btn.btn-signin {
            background-color: #b8cadc;
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: #c9d7e4;
        }
    </style>
</head>

<body>
     <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//s-media-cache-ak0.pinimg.com/originals/57/43/47/574347ddf6be999e0027de121104f2ff.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post" autocomplete="off" id="form">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputUser" class="form-control" placeholder="Username" name ="user" required autofocus>
                <input type="password" id="inputPassword"  name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit"> Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>


<?php
    require_once('mysql_connect.php');
    if(isset($_POST['submit'])){
        $user= $_POST['user'];
        $pw=$_POST['password'];
        $query="SELECT COUNT(NAME) FROM USERS WHERE username = '{$user}'";
        $res=mysqli_query($dbc,$query);
        $check=mysqli_fetch_array($res);

        $query2="SELECT COUNT(NAME) FROM USERS WHERE username = '{$user}' AND  password ='{$pw}'";


        if($check[0]==1){
            
            $res2=mysqli_query($dbc,$query2);
            $check2=mysqli_fetch_array($res2);
            if($check2[0]==1){
                echo "<script> alert('yay!'); </script>";
                //HI PAUL PLEASE CHANGE THE PAGE NAME NA LANG AND PACOMMENT OUT YUNG "YAY" TY
                //echo "<script> document.location.href = 'PAGENAME HERE'; </script>";
            }
            else{
                echo "<script> alert('Incorrect Password!'); </script>";
            }
           
        }
        else{
            echo "<script> alert('Username does not exist!'); </script>";
        }
    }


?>