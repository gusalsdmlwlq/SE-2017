<?php
session_start();
include 'db.php';
$ret=$_SESSION['is_login'];


if($ret){
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>게시판 메인 페이지 </title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href =# >Main page</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
<?php
 if( !isset($_SESSION['is_login']) || $_SESSION['is_login'] !=1){
?>
       
	 <form class="navbar-form navbar-right">
            <a href="http://cafemug.synology.me:8000/webapp/board/signup.php" /target="_blank" title="로그인" >
            <button type="button" class="btn btn-success">Sign up</button>

            </a>

         </form>
        <form class="navbar-form navbar-right" method=POST action="signin.php" >
            <div class="form-group">
              <input type="text" name= user_id placeholder="Id" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name = user_pw placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
	</form>
<?php
} else{
?>
<style>

#main_nav { 
             position: relative; 
             margin-top: 6px ;
	     margin-right: 5px;  
      } 
</style>
	<form class="navbar-form navbar-right" method=POST action="signout.php">

            <button type="submit" class="btn btn-success">Log out</button>
        </form>

	<form class="navbar-form navbar-right">
	<nav id="main_nav">
	<font size=4 color =#9d9d9d>
<?php
 echo "{$_SESSION['user_id']}님 ";
?> 
	</font>
	</nav>
	</form>
 
<?php
}
?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

<?php
$sql="select title from board where no={$_GET[no]}";
$ret=mysql_query($sql);
$title=mysql_fetch_row($ret);
$sqll="select text from board where no={$_GET[no]}";
$res=mysql_query($sqll);
$text=mysql_fetch_row($res);

?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, Seoul!</h1>
      </div>
    </div>
   <div class="container">
<form class="form-horizontal" >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">제목</label>
    <div class="col-sm-10">
	  <div class="form-group" >
<?php
echo $title[0];
?>
</div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3"  class="col-sm-2 control-label">게시글</label>
    <div class="col-sm-10">
	<div class='form-group' >
<?=
$text[0];
?>
</div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
    <footer>
        <p>&copy; Made by Naturalbornidiots</p>
      </footer>
      </div>
      </div>
        </form>
    </div> <!-- /container -->

  </body>
</html>
<?php
}else{
echo " <script> alert('로그인을 먼저 해주세요'); </script>";

?>
<meta http-equiv='refresh' content="0;url='http://cafemug.synology.me:8000/webapp/board/index.php'">

<?php
}
?>
