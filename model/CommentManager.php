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

	public function getComment($episodeId){
		$req = $this->db->query('SELECT * FROM comments WHERE id = ' . $episodeId);
		$datas = $req->fetch(PDO::FETCH_ASSOC);
		$comment = new Comment($datas);
		return $comment;
	}

	public function addComment($chapter){
		if (!empty($_POST['author'] && !empty($_POST['comment']))) {
			$req = $this->db->prepare('INSERT INTO comments(author, episodeId, comment, dateComment) VALUES(:author, :episodeId, :comment, NOW())');
			$req->execute([
				':author' => $_POST['author'],
				':episodeId' => $chapter,
				':comment' => $_POST['comment']
			]);
		}
	}

	public function rudeComment($id){
		$req = $this->db->exec('UPDATE comments SET rudeComment=rudeComment + 1 WHERE id = ' . $id);
	}
}
