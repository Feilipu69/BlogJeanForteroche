<?php
namespace Bihin\Forteroche\src\model;

class FlagComments
{
	private $id;
	private $commentId;
	private $dislikeId;
	private $userLogin;
	private $flagged;

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

	public function getId(){
		return $this->id;
	}

	public function getCommentId(){
		return $this->commentId;
	}
	
	public function getDislikeId(){
		return $this->dislikeId;
	}

	public function getUserLogin(){
		return userLogin;
	}

	public function getFlagged(){
		return flagged;
	}

	public function setId(int $id){
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function setCommentId(int $commentId){
		if ($commentId > 0) {
			$this->commentId = $commentId;
		}
	}

	public function setDislikeId(int $dislikeId){
		if ($dislikeId > 0) {
			$this->dislikeId = $dislikeId;
		}
	}

	public function setUserLogin(string $userLogin){
		$this->userLogin = $userLogin;
	}

	public function setFlagged(int $flagged){
		if ($flagged > 0) {
			$this->flagged = $flagged;
		}
	}
}
