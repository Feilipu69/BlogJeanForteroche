<?php
namespace Bihin\Forteroche\src\DAO;

use Bihin\Forteroche\src\DAO\DbConnect;
use Bihin\Forteroche\src\model\Comment;

class FlagCommentManager extends DbConnect
{
	/*
	public function flagCommentPlus($commentId){
		$req = $this->db->prepare('INSERT INTO flagComments (userId, commentId) VALUES(:userId, :commentId)');
		$req->execute([ 
			':userId' => $_SESSION['userId'],
			':commentId' => $commentId 
		]);
	}
	*/
	public function flagCommentPlus($commentId){
		$req = $this->db->prepare('INSERT INTO flagComments (commentId, userIdFlagged, episodeId, userId) SELECT id, userId, episodeId, dislike FROM comments WHERE id = ?');
		$req->execute([ 
			$commentId 
		]);
	}

	public function flagCommentLess($commentId){
		$req = $this->db->prepare('DELETE FROM flagComments WHERE userId = ? AND commentId = ?');
		$req->execute([
			$_SESSION['userId'],
			$commentId
		]);
	}

	public function countFlag($commentId){
		$req = $this->db->prepare('SELECT COUNT(*) FROM flagComments WHERE userId = ? AND commentId = ?');
		$req->execute([
			$_SESSION['userId'],
			$commentId
		]);
		$data = $req->fetch();
		return $data;
	}

	public function countAllFlags($commentId){
		$req = $this->db->prepare('SELECT COUNT(*) FROM flagComments WHERE commentId = ?');
		$req->execute([
			$commentId
		]);
		$flagsNumber = $req->fetch();
		return $flagsNumber;
	}

	public function getFlagsComments(){
		$req = $this->db->query('SELECT comments.id, comments.login, comments.episodeId, comments.comment, flagComments.commentId FROM comments INNER JOIN flagComments ON comments.id = flagComments.commentId GROUP BY flagComments.commentId');
		while ($flags = $req->fetch()) {
			$data[] = new Comment($flags);
		}
		if (!empty($data)) {
			return $data;
		}
	}

	public function deleteFlagComment($commentId){
		$req = $this->db->prepare('DELETE FROM flagComments WHERE commentId = ?');
		$req->execute([
			$commentId
		]);
	}

	public function deleteFlagCommentsByEpisode($chapter){
		$req = $this->db->prepare('DELETE FROM flagComments WHERE episodeId = ?');
		$req->execute([
			$chapter
		]);
	}

	public function deleteFlaggedCommentsByUser($userId){
		$req = $this->db->prepare('DELETE FROM flagComments WHERE userIdFlagged = ?');
		$req->execute([
			$userId
		]);
	}
}
