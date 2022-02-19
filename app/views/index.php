<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../../public/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/fonts/font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/comons.css">

    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/css/bootstrap/js/bootstrap.min.js"></script>

    <script>
        $(function() {
            var a = false;
            $(".control>li>a").click(function() {
                if (a == false) {
                    a = true;
                } else {
                    a = false
                }
                console.log(a);
                if (a == true) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });
            $(".control>li").click(function() {
                $(this).children('ul').slideToggle();

            });


        });
    </script>
</head>

<body>
    <header>
        <div class="row">
            <div class="col-sm-2 header__logo">
                <a href="<?= '' ?>">Web News</a>
            </div>
            <div class="col-sm-10">
                <div class="float-right">
                    <?php
                    $myuser = json_decode($_SESSION['user']);
                    $path = 'http://' . $_SERVER['HTTP_HOST'];
                    ?>
                    <img src="<?= $path . '/images/uploaded/' . $myuser->avatar  ?>" alt="" class="avatar">
                    <?php
                    echo $myuser->fullname;
                    ?>
                    <a href="<?= '/admin/logout' ?>">LOGOUT</a>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-sm-2 sidebar">
            <ul class="control col-xs-12">
                <li class="active"><a href="/admin'">Dashboard</a></li>
                <li><a href="#">Category</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/category/add">┗ Add new</a></li>
                        <li><a href="/admin/category">┗ List category</a></li>
                    </ul>
                </li>
                <li><a href="#">Post</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/posts/add">┗ Add new</a></li>
                        <li><a href="/admin/posts">┗ List post</a></li>
                    </ul>
                </li>
                <li><a href="#">Profile</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/profile/edit">┗ Edit Information</a></li>
                        <li><a href="/admin/profile/editemail">┗ Edit Email</a></li>
                        <li><a href="/admin/profile/editpassword">┗ Edit Password</a></li>
                    </ul>
                </li>
                <li><a href="#">Setting</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/site/setting">┗ SEO Setting</a></li>
                    </ul>
                </li>
            </ul>
        </div>
</body>

</html>