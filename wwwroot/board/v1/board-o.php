<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="PHP 게시판 v1. 가장 간단한 CRUD 를 구현한 게시판입니다.">
	<meta name="author" content="Hana Lee">
	<meta name="keywords" content="PHP, board">
	<link rel="icon" href="/icon/favicon.ico">

	<title>PHP 게시판 v1</title>

	<!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Custom styles for this template -->
	<link href="/css/board.css" rel="stylesheet">
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
			<a class="navbar-brand" href="/main.php">PHP Portfolio</a>
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
	</div>
</div>

<div class="container">
	<div class="page-header">
		<h1>PHP 게시판 <small>v1</small></h1>
	</div>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading hide"></div>
		<div class="panel-body">
			<h4>게시판 제목 테스트 입니다.</h4>
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					<span class="label label-info">작성자 : 관리자</span>
					<span class="">&nbsp;</span>
					<span class="label label-info">작성일 : <time datetime="2010-10-16 11:30">2010-10-16</time></span>
				</div>
				<div class="panel-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem corporis debitis dolor earum eveniet incidunt,
						magnam maxime minima minus nisi quas sit voluptate! Alias autem facilis id necessitatibus ratione.</p>

					<p>Aspernatur assumenda commodi excepturi expedita fugit molestiae molestias pariatur repellendus! Adipisci
						architecto, esse facilis fugiat illum inventore necessitatibus nisi nostrum praesentium quas quasi ullam
						voluptates! Debitis deleniti ex exercitationem sed!</p>

					<p>Consectetur dolor dolorum et ipsum magnam molestiae quis reiciendis voluptatibus! Accusantium alias aliquam amet
						cupiditate est, in itaque magnam odio perferendis placeat quam recusandae temporibus vel velit voluptas. Harum,
						officia.</p>

					<p>Accusamus architecto aspernatur aut blanditiis culpa cumque dicta ducimus enim, eos est iste maiores minima
						molestias natus, nostrum numquam pariatur placeat quibusdam quis recusandae reprehenderit sequi similique
						voluptatem. Deleniti, eveniet!</p>
				</div>
			</div>
			<ul class="pager">
				<li class="previous disabled"><a href="#">&larr; 이전글</a></li>
				<li><a href="#">수정</a></li>
				<li><a href="#">삭제</a></li>
				<li><a href="board.php">글목록</a></li>
				<li class="next disabled"><a href="#">다음글 &rarr;</a></li>
			</ul>
		</div>
		<table class="board-list table">
			<thead>
			<tr class="header">
				<th width="50px" class="text-center">번호</th>
				<th width="*" class="text-left">제목</th>
				<th width="110px" class="text-center">작성자</th>
				<th width="90px" class="text-center">일자</th>
				<th width="50px" class="text-center">조회</th>
			</tr>
			</thead>
			<tbody>
			<tr class="selected">
				<td class="no">10</td>
				<td class="title"><a href="#">게시판 제목 테스트 입니다.</a></td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 07:33">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">9</td>
				<td class="title"><a href="#">게시판 제목 테스트 입니다. 테스트를 해봅시다.</a></td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 09:22">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">8</td>
				<td class="title"><a href="board-o.php">세번째 테스트용 게시글 입니다.</a></td>
				<td class="author">관리자</td>
				<td class="date">2014-10-16</td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">7</td>
				<td class="title">
					<a href="#">게시판 제목 테스트 입니다.</a>
				</td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 07:33">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">6</td>
				<td class="title"><a href="#">게시판 제목 테스트 입니다. 테스트를 해봅시다.</a></td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 09:22">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">5</td>
				<td class="title"><a href="board-o.php">세번째 테스트용 게시글 입니다.</a></td>
				<td class="author">관리자</td>
				<td class="date">2014-10-16</td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">4</td>
				<td class="title"><a href="#">게시판 제목 테스트 입니다.</a></td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 07:33">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">3</td>
				<td class="title"><a href="#">게시판 제목 테스트 입니다. 테스트를 해봅시다.</a></td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 09:22">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">2</td>
				<td class="title"><a href="board-o.php">세번째 테스트용 게시글 입니다.</a></td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 12:33">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			<tr>
				<td class="no">1</td>
				<td class="title"><a href="board-o.php">세번째 테스트용 게시글 입니다.</a></td>
				<td class="author">관리자</td>
				<td class="date"><time datetime="2014-10-16 11:11">2014-10-16</time></td>
				<td class="count">1</td>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="board-page text-center">
		<ul class="pagination">
			<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li class=""><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
		</ul>
	</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>