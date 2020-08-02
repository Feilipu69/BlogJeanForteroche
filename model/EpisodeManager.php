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
}
