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
}
