<?php
namespace Bihin\Forteroche\src\DAO;

use Bihin\Forteroche\src\DAO\DbConnect;
use Bihin\Forteroche\src\model\Episode;

class EpisodeManager extends DbConnect
{
	public function getEpisodes(){
		$req = $this->db->query('SELECT id, chapter, title, content, DATE_FORMAT(creationDate, "%d/%m/%Y") AS creationDate, DATE_FORMAT(updateDate, "%d/%m/%Y") AS updateDate FROM episodes ORDER BY chapter');
		while ($data = $req->fetch()) {
			$episodes[] = new Episode($data);
		}
		return $episodes;
	}

	public function getEpisode($chapter){
		$req = $this->db->prepare('SELECT * FROM episodes WHERE chapter = ?');
		$req->execute([
			$chapter
		]);
		$data = $req->fetch();
		$episode = new Episode($data);
		return $episode;
	}

	public function addEpisode($post){
		$req = $this->db->prepare('INSERT INTO episodes (chapter, title, content, creationDate, userId) VALUES (:chapter, :title, :content, NOW(), 1)');
		$newEpisode = new Episode($post);
		$req->execute([
			':chapter' => $newEpisode->getChapter(),
			':title' => $newEpisode->getTitle(),
			':content' => $newEpisode->getContent()
		]);
	}

	public function updateEpisode($post, $chapter){
		$episode = new Episode($post);
		$req = $this->db->prepare('UPDATE episodes SET title = :title, content = :content, updateDate = NOW() WHERE chapter = :chapter');
		$req->execute([
			':title' => $episode->getTitle(),
			':content' => $episode->getContent(),
			':chapter' => $chapter
		]);
	}

	public function deleteEpisode($chapter){
		$req = $this->db->prepare('DELETE FROM episodes WHERE chapter = ? ');
		$req->execute([
			$chapter
		]);
	}
}
