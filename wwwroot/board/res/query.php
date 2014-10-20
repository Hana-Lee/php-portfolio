<?php
/**
 * Created by PhpStorm.
 * User: voyaging
 * Date: 14. 10. 20.
 * Time: 오후 8:11
 */

$query['selectAllArticle'] = 'SELECT * FROM board INNER JOIN
(SELECT * FROM board ORDER BY no DESC LIMIT :start, :count) AS b USING(no)';

$query['selectArticleByNo'] = 'SELECT * FROM board WHERE no = :no';

$query['createArticle'] = 'INSERT INTO board VALUES (
NULL, :title, :content, :user_id, :c_date, 0, 0, 1, 1
)';

$query['updateArticle'] = 'UPDATE board SET
														title = :title, content = :content, modified_date = :m_date
														WHERE no = :no AND user_id = :user_id';

$query['deleteArticle'] = 'DELETE FROM board WHERE no = :no AND user_id = :user_id';

$query['selectArticleCount'] = 'SELECT COUNT(*) AS CNT FROM board';
?>