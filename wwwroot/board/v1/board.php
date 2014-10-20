<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('Asia/Seoul');
require_once('../core/board.php');
$current_page_num = empty($_GET['p']) ? 1 : (int)$_GET['p'];
$controller = new BoardController();
$articles = $controller->readAllArticle($current_page_num);
$mode = empty($_GET['m']) ? 'r' : $_GET['m'];
$modified_content = empty($_POST['content']) ? '' : $_POST['content'];
$modified_title = empty($_POST['title']) ? '' : $_POST['title'];

$total_article_count = $controller->getTotalArticleCount();

if (!empty($modified_content) and !empty($modified_title)) {
	if ($mode == 'w') {
		$n_article = new BoardArticle();
		$n_article->title = strip_tags($modified_title);
		$n_article->content = strip_tags($modified_content);
		$n_article->user_id = 'admin';
		$controller->createArticle($n_article);

		header("Location: board.php?no=&m=r&p=" . $current_page_num);
	} else if ($mode == 'm') {
		$m_article = $articles[$_GET['no']];
		$m_article->title = strip_tags($modified_title);
		$m_article->content = strip_tags($modified_content);
		$controller->updateArticle($m_article);

		header("Location: board.php?no=" . $_GET['no'] . "&m=r&p=" . $current_page_num);
	}
}

if ($mode == 'd') {
	$delete_target_article = $articles[$_GET['no']];
	$controller->deleteArticle($delete_target_article);

	header("Location: board.php?no=&m=r&p=" . $current_page_num);
}

$show_article = FALSE;
$current_article = array();
$current_article_created_time = 0;
$current_article_modified_time = 0;
$previous_disabled = TRUE;
$next_disabled = TRUE;
$article_selected = FALSE;
$selected_article_no = 0;
if (!empty($_GET['no']) or $mode == 'w') {
	$selected_article_no = (int) $_GET['no'];
	if ($mode == 'w') {
		$current_article = new BoardArticle();
		$current_article->created_date = time();
	} else {
		$current_article = $articles[$selected_article_no];
		$previous_disabled = ($selected_article_no == 1);
		$next_disabled = ($selected_article_no == max($articles)->no);
	}

	$current_article_created_time = $current_article->created_date;
	$current_article_modified_time = $current_article->modified_date;

	$show_article = TRUE;
	$article_selected = TRUE;
}
?>
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
		<h1>PHP 게시판
			<small>v1</small>
		</h1>
	</div>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading hide"></div>

			<form method="post" class="<?php echo($show_article==TRUE)?'':'hide'?>">
				<div class="panel-body article">
					<h4>
						<?php
						if ($mode == 'r') {
							echo $current_article->title;
						} else if ($mode == 'm' or $mode == 'w') {
							echo '<input type="text" class="title" name="title" value="' . $current_article->title . '" />';
						}
						?>
					</h4>

					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="label label-info">작성자 : <?php echo $current_article->user_id; ?></span>
							<span class="">&nbsp;</span>
							<span class="label label-info">
								작성일 :
								<time datetime="<?php echo date('Y-m-d H:i:s', $current_article_created_time); ?>">
								<?php echo date('Y-m-d', $current_article_created_time); ?>
								</time>
							</span>
							<?php if (!empty($current_article_modified_time) and $current_article_modified_time > 0): ?>
							<span class="">&nbsp;</span>
							<span class="label label-info">
								수정일 :
								<time datetime="<?php echo date('Y-m-d H:i:s', $current_article_modified_time); ?>">
									<?php echo date('Y-m-d', $current_article_modified_time); ?>
								</time>
							</span>
							<?php endif; ?>
						</div>
						<div class="panel-body content">
							<?php
							if ($mode == 'r') {
								$content = $current_article->content;
								foreach (preg_split('/\n|\r\n?/', $content) as $line) {
									echo '<p>' . $line . '</p>';
								}
							} else if ($mode == 'm' or $mode == 'w') {
								echo '<textarea class="textarea" name="content">' . $current_article->content . '</textarea>';
							}
							?>
						</div>
					</div>
					<ul class="pager">
						<li class="previous <?php echo ($previous_disabled) ? 'disabled' : ''; ?>">
							<a<?php echo ($previous_disabled) ? '' : ' href="board.php?no=' . ($current_article->no - 1) . '"'; ?>>&larr; 이전글</a>
						</li>
						<?php if ($mode == 'm' or $mode == 'w'): ?>
							<li><button type="submit" class="btn btn-default">저장</button></li>
							<li>
								<button type="button" class="btn btn-default" onclick="cancelEditArticle(<?php echo $selected_article_no; ?>);">
									취소
								</button>
							</li>
						<?php elseif ($mode == 'r'): ?>
							<li>
								<button type="button" class="btn btn-default" onclick="editArticle(<?php echo $selected_article_no; ?>);">
									수정
								</button>
							</li>
							<li>
								<button type="button" class="btn btn-default" onclick="deleteArticle(<?php echo $selected_article_no; ?>);">
									삭제
								</button>
							</li>
						<?php endif; ?>
						<li>
							<button type="button" class="btn btn-default" onclick="showBoardList(<?php echo $current_page_num; ?>);">
								글목록
							</button>
						</li>
						<li class="next <?php echo ($next_disabled) ? 'disabled' : ''; ?>">
							<a<?php echo ($next_disabled) ? '' : ' href="board.php?no=' . ($current_article->no + 1) . '"'; ?>>
								다음글 &rarr;
							</a>
						</li>
					</ul>
				</div>
			</form>
		<table class="board-list table">
			<input id="p_num" type="hidden" value="<?php echo $current_page_num; ?>"/>
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
			<?php foreach ($articles as $article): ?>
				<tr class="<?php if ($article_selected) echo ($article->no == $selected_article_no) ? 'selected' : ''; ?>">
					<td class="no"><?php echo $article->no; ?></td>
					<td class="title">
						<?php echo '<a href="board.php?no=' . $article->no . '&m=r&p=' . $current_page_num . '">' . $article->title . '</a>' ?>
					</td>
					<td class="author"><?php echo $article->user_id; ?></td>
					<td class="date">
						<time datetime="<?php echo date('Y-m-d H:i:s', $article->created_date); ?>">
							<?php echo date('Y-m-d', $article->created_date); ?>
						</time>
					</td>
					<td class="count"><?php echo $article->readed_count; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<button type="button" class="btn btn-default" onclick="writeArticle();">글쓰기</button>
	<div class="board-page text-center">
		<ul class="pagination">
			<?php
			$total_page_count = (int)($total_article_count / 10);
			if (($total_article_count % 10) > 0) {
				$total_page_count++;
			}
			?>
			<li class="<?php echo ($current_page_num == 1) ? 'disabled' : ''; ?>">
				<a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
			</li>
			<?php for ($i = 1; $i <= $total_page_count; $i++): ?>
				<li>
					<a class="<?php echo ($i == $current_page_num) ? 'selected' : ''; ?>" href="board.php?no=&m=r&p=<?php echo $i; ?>">
						<?php echo $i; ?>
					</a>
				</li>
			<?php endfor; ?>
			<li class="<?php echo ($total_page_count == 1) ? 'disabled' : ''; ?>">
				<a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</li>
		</ul>
	</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="/js/board.js"></script>
</body>
</html>