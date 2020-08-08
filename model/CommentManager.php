<?php
class CommentManager extends DbConnect
{
	public function getComments($chapter){
		$comments = [];
		$req = $this->db->query('SELECT * FROM comments WHERE episodeId = ' . $chapter);
		while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
			$comments[] = new Comment($datas);
		}
		return $comments; 
	}

	public function addComment($chapter){
		$req = $this->db->prepare('INSERT INTO comments(author, episodeId, comment, dateComment) VALUES(:author, :episodeId, :comment, NOW())');
		$req->execute([
			':author' => $_POST['author'],
			':episodeId' => $chapter,
			':comment' => $_POST['comment']
		]);
	}
}
