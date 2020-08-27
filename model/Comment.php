<?php
class Comment
{
	private $id;
	private $author;
	private $episodeId;
	private $comment;
	private $dateComment;
	private $rudeComment;

	public function __construct(array $datas){
		$this->hydrate($datas);
	}

	public function hydrate(array $datas){
		foreach ($datas as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function getAuthor(){
		return $this->author;
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

	public function getRudeComment(){
		return $this->rudeComment;
	}

	public function setId(int $id){
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function setAuthor(string $author){
		$this->author = $author;
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

	public function setRudeComment($rudeComment){
		$this->rudeComment = $rudeComment;
	}
}
