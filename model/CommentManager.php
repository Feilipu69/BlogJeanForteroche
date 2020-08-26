<?php
/*
namespace Bihin\Forteroche\model;

use Bihin\Forteroche\model\Comment;
*/

class CommentManager extends DbConnect
{
	public function getComments($chapter){
		$comments = [];
		$req = $this->db->query('SELECT id, author, episodeId, comment, DATE_FORMAT(dateComment, "%d/%m/%Y à %H:%i:%s") AS dateComment, rudeComment FROM comments WHERE episodeId = ' . $chapter);
		while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
			$comments[] = new Comment($datas);
		}
		return $comments; 
	}

	public function getComment($episodeId){
		$req = $this->db->query('SELECT * FROM comments WHERE episodeId = ' . $episodeId);
		$datas = $req->fetch(PDO::FETCH_ASSOC);
		$comment = new Comment($datas);
		return $comment;
	}

	public function addComment($post, $chapter){
		$req = $this->db->prepare('INSERT INTO comments(author, episodeId, comment, dateComment) VALUES(:author, :episodeId, :comment, NOW())');
		$newComment = new Comment($post);
		$req->execute([
			':author' => $newComment->getAuthor(),
			':episodeId' => $chapter,
			':comment' => $newComment->getComment()
		]);
	}

	public function rudeComment($id){
		$req = $this->db->exec('UPDATE comments SET rudeComment=rudeComment + 1 WHERE id = ' . $id);
	}

	public function getRudeComments(){
		$rudeComments = [];
		$req = $this->db->query('SELECT * FROM comments WHERE rudeComment > 0');
		while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
			$rudeComments[] = new Comment($datas);
		}
		return  $rudeComments;
	}

	public function deleteComment($id){
		$req = $this->db->exec('DELETE FROM comments WHERE id = ' . $id);
		header('Location:administration');
	}
}
