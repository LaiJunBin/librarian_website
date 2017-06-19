<?php
    $class_td_txt= array("首頁","新書推薦","進階查詢","閱讀心得","統計資訊","活動訊息","回報問題");
    $class_td_url= array("index","newBook","proSelect","reading","count","activity","reply");
    if(empty($_GET['mod']) || !in_array($_GET['mod'],$class_td_url))
        header('location:?mod=index');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>圖書管理系統</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="./dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="./dist/css/bootstrap.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="./dist/js/bootstrap.js"></script>
</head>
<body style="background:#eee;padding-bottom:60px;">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">圖書管理系統</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left">
        <div class="form-group">
        搜尋書籍：
          <input type="text" class="form-control" required placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">搜尋</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">使用者專區 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"   data-toggle="modal" data-target="#loginModal">登入</a></li>
            <li><a href="#">借閱紀錄</a></li>
            <!--<li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>-->
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <!--logo-->
<div style="width:100%;">
    <img src="http://jpndbs.lib.ntu.edu.tw/DB/NTUlib_logo.jpg" width="100%" alt="logo">
</div>
<div style="width:100%">
    <table width="100%" border="1">
        <tr align="center" class="classTb">
            <?php 
                for ($i=0;$i<count($class_td_txt);$i++){
                    if(isset($_GET['mod'])&& $_GET['mod']==$class_td_url[$i])
                        $class_td_class="tdSelected";
                    else
                        $class_td_class="";
            ?>
            <td width="1" class="<?php echo $class_td_class;?>">
                <?php if($class_td_class==""){ ?>
                    <a href="?mod=<?php echo $class_td_url[$i];?>">
                <?php } ?>
                        <div style="width:100%"><?php echo $class_td_txt[$i];?></div>
                <?php if($class_td_class==""){ ?>
                    </a>
                <?php } ?>
            </td>
            <?php } ?>
        </tr>
    </table>
</div>
</nav>
<!--content-->
<div style="padding:0px 30px;">
    <?php
        if($_GET['mod']=="index")
            include_once('./main_index.php');
    ?>
</div>
<!--頁尾-->
<nav class="navbar navbar-default navbar-fixed-bottom">
  <div class="container">
    <center>
        <font color="#333" style="line-height:50px;">Power By <a href="https://github.com/xyz607xx">Lai</a></font>
    </center>
  </div>
</nav>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->

<!--login-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">使用者登入</h4>
            </div>
            <div class="modal-body">
                
                    <center>
                        <div class="pag">
                            <div class="panel panel-info">
                                <div class="panel-heading">登入</div>
                                <div class="panel-body">
                                    <form action="#" method="post">
                                        <input type="text" name="user" class="form-contorl my-input" style="font-size:20px;" placeholder="學號" required>
                                        <input type="password" name="pwd" class="form-contorl my-input" style="font-size:20px;" placeholder="身分證" required><br><br>
                                        <button type="submit" class="btn btn-warning">登入</button>　
                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>