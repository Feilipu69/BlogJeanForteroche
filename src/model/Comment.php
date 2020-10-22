<?php
namespace Bihin\Forteroche\src\model;

class Comment
{
	private $id;
	private $login;
	private $episodeId;
	private $comment;
	private $dateComment;
	private $nbreComment;

	public function __construct(array $data){
		$this->hydrate($data);
	}

	public function hydrate(array $data){
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	public function getId(){
		return $this->id;
	}

	public function getLogin(){
		return $this->login;
	}

	public function getEpisodeId(){
		return $this->episodeId;
	}

	public function getComment(){
		return $this->comment;
	}

	public function getDateComment(){
		return $this->dateComment;
	}

	public function getNbreComment(){
		return $this->nbreComment;
	}

	public function setId(int $id){
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function setLogin(string $login){
		$this->login = $login;
	}

	public function setEpisodeId(int $episodeId){
		$this->episodeId = $episodeId;
	}

	public function setComment(string $comment){
		$this->comment = $comment;
	}

	public function setDateComment($dateComment){
		$this->dateComment = $dateComment;
	}

	public function setNbreComment($nbreComment){
		$this->nbreComment = $nbreComment;
	}
}
