<?php
/**
 * Created by PhpStorm.
 * User: voyaging
 * Date: 14. 10. 18.
 * Time: 오전 9:47
 */
require_once('../res/query.php');
require_once('../models/article.class.php');
require_once('board.service.class.php');

class BoardController {
	function readArticle($b_no) {
		global $query;
		$params = array(
			'no' => array('value' => $b_no, 'type' => PDO::PARAM_INT)
		);
		return BoardService::query($query['selectArticle'], $params, 'BoardArticle');
	}

	function readAllArticle($page_no=1) {
		global $query;
		$start_num = ($page_no==1) ? 0 : ($page_no - 1) * 10;
		$count = 10;

		$params = array(
			'start' => array('value' => $start_num, 'type' => PDO::PARAM_INT),
			'count' => array('value' => $count,     'type' => PDO::PARAM_INT)
		);

		$result = array();
		foreach (BoardService::query($query['selectAllArticle'], $params, 'BoardArticle') as $article) {
			$result[$article->no] = $article;
		}
		return $result;
	}

	function createArticle($article) {
		if ($article) {
			global $query;
			$params = array(
				'title'   => array('value' => $article->title,   'type' => PDO::PARAM_STR),
				'content' => array('value' => $article->content, 'type' => PDO::PARAM_STR),
				'user_id' => array('value' => $article->user_id, 'type' => PDO::PARAM_STR),
				'c_date'  => array('value' => time(),            'type' => PDO::PARAM_INT)
			);
			return BoardService::update($query['createArticle'], $params);
		}
	}

	function updateArticle($article) {
		if ($article) {
			global $query;
			$params = array(
				'title'   => array('value' => $article->title,   'type' => PDO::PARAM_STR),
				'content' => array('value' => $article->content, 'type' => PDO::PARAM_STR),
				'user_id' => array('value' => $article->user_id, 'type' => PDO::PARAM_STR),
				'no'      => array('value' => $article->no,      'type' => PDO::PARAM_INT),
				'm_date'  => array('value' => time(),            'type' => PDO::PARAM_INT)
			);
			return BoardService::update($query['updateArticle'], $params);
		}
	}

	function deleteArticle($article) {
		if ($article) {
			global $query;
			$params = array(
				'user_id' => array('value' => $article->user_id, 'type' => PDO::PARAM_STR),
				'no'      => array('value' => $article->no,      'type' => PDO::PARAM_INT)
			);
			return BoardService::update($query['deleteArticle'], $params);
		}
	}

	function getTotalArticleCount() {
		global $query;
		$result = BoardService::query($query['selectArticleCount'])[0];

		return empty($result) ? 0 : (int) $result['CNT'];
	}
}