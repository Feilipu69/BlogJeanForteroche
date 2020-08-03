<?php
class CommentManager extends DbConnect
{
	public function getComments($chapter){
		$req = $this->db->query('SELECT * FROM comments WHERE episodeId = ' . $chapter);
		while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
			$comments[] = new Comment($datas);
		}
		return $comments; // retourne bien l'array ad hoc
	}
}
