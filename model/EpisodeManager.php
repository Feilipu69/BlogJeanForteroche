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
}
