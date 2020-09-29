<?php
namespace Bihin\Forteroche\src\DAO;

use Bihin\Forteroche\src\DAO\DbConnect;
use Bihin\Forteroche\src\model\Comment;

class CommentManager extends DbConnect
{
	public function getComments($parameter){
		$comments = [];
		$req = $this->db->prepare('SELECT id, author, episodeId, comment, DATE_FORMAT(dateComment, "%d/%m/%Y à %H:%i:%s") AS dateComment, rudeComment FROM comments WHERE episodeId = ? ORDER BY id DESC');
		$req->execute([
			$parameter
		]);
		while ($data = $req->fetch()) {
			$comments[] = new Comment($data);
		}
		return $comments; 
	}

	public function getComment($parameter){
		$req = $this->db->prepare('SELECT * FROM comments WHERE id = ?');
		$req->execute([
			$parameter
		]);
		$data = $req->fetch();
		$comment = new Comment($data);
		return $comment;
	}

	public function addComment($post, $parameter){
		$req = $this->db->prepare('INSERT INTO comments(author, episodeId, comment, dateComment) VALUES(:author, :episodeId, :comment, NOW())');
		$newComment = new Comment($post);
		$req->execute([
			':author' => $newComment->getAuthor(),
			':episodeId' => $parameter,
			':comment' => $newComment->getComment()
		]);
	}

	public function rudeCommentPlus($parameter){
		$req = $this->db->prepare('UPDATE comments SET rudeComment=rudeComment + 1, disliker = ? WHERE id = ?');
		$req->execute([
			$_SESSION['login'],
			$parameter
		]);
	}

	public function rudeCommentLess($parameter){
		$req = $this->db->prepare('UPDATE comments SET rudeComment=rudeComment - 1, disliker = "nemo"  WHERE id = ?');
		$req->execute([
			$parameter
		]);
	}

	public function getRudeComments(){
		$rudeComments = [];
		$req = $this->db->query('SELECT * FROM comments WHERE rudeComment > 0');
		while ($data = $req->fetch()) {
			$rudeComments[] = new Comment($data);
		}
		return  $rudeComments;
	}

	public function deleteComment($parameter){
		$req = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$req->execute([
			$parameter
		]);
	}

	public function deleteComments($parameter){
		$req = $this->db->prepare('DELETE FROM comments WHERE episodeId = ?');
		$req->execute([
			$parameter
		]);
	}
}
