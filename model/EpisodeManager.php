<?php
class EpisodeManager extends DbConnect
{
	public function getEpisodes(){
		$req = $this->db->query('SELECT * FROM episodes');
		while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
			$episodes[] = new Episode($datas);
		}
		return $episodes;
	}

	public function getEpisode($chapter){
		$req = $this->db->query('SELECT * FROM episodes WHERE chapter = ' . $chapter);
		$datas = $req->fetch(PDO::FETCH_ASSOC);
		$episode = new Episode($datas);
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
		header('Location:home');
	}
}
