<?php
class Home extends DbConnect
{
	public function home(){
		$manager = new EpisodeManager($this->db);
		$episodes = $manager->getEpisodes();
	}
}
