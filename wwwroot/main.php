<?php
define('BASEPATH', dirname(__FILE__).'/');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="PHP+bootstrap를 이용한 포트폴리오들을 모아놓은 웹사이트 입니다.">
	<meta name="author" content="Hana Lee">
	<meta name="keywords" content="PHP, bootstrap">
	<link rel="icon" href="icon/favicon.ico">

	<title>PHP 포트폴리오</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Custom styles for this template -->
	<link href="css/board.css" rel="stylesheet">
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="main.php">PHP Portfolio</a>
		</div>
		<div class="navbar-collapse collapse">
			<form class="navbar-form navbar-right hide" role="form">
				<div class="form-group">
					<input type="text" placeholder="Email" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" placeholder="Password" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Sign in</button>
			</form>
		</div>
		<!--/.navbar-collapse -->
	</div>
</div>

<div class="jumbotron">
	<div class="container">
		<h1>PHP 포트폴리오 입니다.</h1>

		<p>PHP 를 이용한 다양한 개발을 해봄으로써 PHP 에 대해 제대로 이해하고, 사용할 수 있기 위해 본 사이트를 만들었습니다.</p>

		<p><a class="btn btn-primary btn-lg" role="button" href="http://sgdev.tistory.com/category/포트폴리오/PHP-게시판"
					target="_blank">블로그 &raquo;</a></p>
	</div>
</div>

<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="col-md-4">
			<h2>게시판 v1</h2>

			<p>CRUD 의 기본이 되는 게시판을 만들어 봄으로써 PHP에서 CRUD 를 처리하는 방법을 익히고자 만들게 되었습니다.</p>

			<p>단일 유저를 사용하며 게시글 작성, 수정, 삭제, 목록보기 의 최소한의 기능만을 가지고 있는 게시판입니다.</p>

			<p><a class="btn btn-default" href="board/v1/board.php?no=&m=r&p=1" role="button">자세히보기 &raquo;</a></p>
		</div>
		<div class="col-md-4 hide">
			<h2>Heading</h2>

			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
				condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec
				sed odio dui. </p>

			<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
		<div class="col-md-4 hide">
			<h2>Heading</h2>

			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta
				felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum
				massa justo sit amet risus.</p>

			<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
		</div>
	</div>

	<hr>

	<footer>
		<p>&copy; Hana Lee 2014. 10. 15.</p>
	</footer>
</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>

