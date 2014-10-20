/**
 * Created by voyaging on 14. 10. 20..
 */
function getContextPath() {
	return "http://portfolio.dev/board/v1/";
}

function getCurrentPageNum() {
	var p_num = document.getElementById("p_num");
	return p_num.value;
}

function showBoardList(page_no) {
	var article_no = "";
	var url = getContextPath() + "board.php?no=" + article_no + "&m=r" + "&p=" + page_no;
	location.href = url;
}

function deleteArticle(article_no) {
	var result = confirm("정말 삭제 하시겠습니까?");
	if (result === true) {
		var url = getContextPath() + "board.php?no=" + article_no + "&m=d" + "&p=" + getCurrentPageNum();
		location.href = url;
	}
}

function editArticle(article_no) {
	var url = getContextPath() + "board.php?no=" + article_no + "&m=m" + "&p=" + getCurrentPageNum();
	location.href = url;
}

function cancelEditArticle(article_no) {
	var url = getContextPath() + "board.php?no=" + article_no + "&m=r" + "&p=" + getCurrentPageNum();
	location.href = url;
}

function writeArticle() {
	var article_no = "";
	var url = getContextPath() + "board.php?no=" + article_no + "&m=w" + "&p=" + getCurrentPageNum();
	location.href = url;
}