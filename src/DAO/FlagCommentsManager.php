<?php
namespace Bihin\Forteroche\src\DAO;
use Bihin\Forteroche\src\DAO\DbConnect;
use Bihin\Forteroche\src\model\FlagComments;

class FlagCommentsManager extends DbConnect
{
	public function getFlagComments($commentId){
		$req = $this->db->prepare('SELECT * FROM flagComments WHERE commentId = ?');
		$req->execute([
			$commentId
		]);
		while ($data = $req->fetch()) {
			$flagComments = new FlagComments($data);
		}
		return $flagComments;
	}
}
