<?php
namespace Bihin\Forteroche\src\DAO;

use Bihin\Forteroche\src\DAO\{
	DbConnect,
	UserManager
};
use Bihin\Forteroche\src\model\Comment;

class CommentManager extends DbConnect
{
	public function getComments($episodeId){
		$comments = [];
		$req = $this->db->prepare('SELECT id, login, episodeId, comment, DATE_FORMAT(dateComment, "%d/%m/%Y à %H:%i:%s") AS dateComment, rudeComment FROM comments WHERE episodeId = ? ORDER BY id DESC');
		$req->execute([
			$episodeId
		]);
		while ($data = $req->fetch()) {
			$comments[] = new Comment($data);
		}
		return $comments; 
	}

	public function getComment($commentId){
		$req = $this->db->prepare('SELECT * FROM comments WHERE id = ?');
		$req->execute([
			$commentId
		]);
		$data = $req->fetch();
		$comment = new Comment($data);
		return $comment;
	}

	public function addComment($post, $episodeId){
		$req = $this->db->prepare('INSERT INTO comments(login, userId, episodeId, comment, dateComment) VALUES(:login, :userId, :episodeId, :comment, NOW())');
		$newComment = new Comment($post);
		$req->execute([
			':login' => $newComment->getLogin(),
			':userId' => $_SESSION['userId'],
			':episodeId' => $episodeId,
			':comment' => $newComment->getComment()
		]);
	}

	public function commentFlagged($commentId){
		$req = $this->db->prepare('UPDATE comments SET dislike = ? WHERE id = ?');
		$req->execute([
			$_SESSION['userId'],
			$commentId
		]);
	}

	public function commentUnflagged($commentId){
		$req = $this->db->prepare('UPDATE comments SET dislike = 0 WHERE id = ?');
		$req->execute([
			$commentId
		]);
	}


	public function deleteComment($commentId){
		$req = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$req->execute([
			$commentId
		]);
	}

	public function deleteCommentByEpisode($chapter){
		$req = $this->db->prepare('DELETE FROM comments WHERE episodeId = ?');
		$req->execute([
			$chapter
		]);
	}

	public function deleteCommentsByUser($userId){
		$req = $this->db->prepare('DELETE FROM comments WHERE userId = ?');
		$req->execute([
			$userId
		]);
	}
}
