<?php
namespace Bihin\Forteroche\src\DAO;

use Bihin\Forteroche\src\DAO\DbConnect;
use Bihin\Forteroche\src\model\FlagComment;

class FlagCommentManager extends DbConnect
{
	public function flagComment($commentId){
		$req = $this->db->prepare('INSERT INTO flagComments (userId, commentId) VALUES(:userId, :commentId)');
		$req->execute([ 
			':userId' => $_SESSION['userId'],
			':commentId' => $commentId 
		]);
	}

	public function deleteFlagComment($commentId){
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
}
