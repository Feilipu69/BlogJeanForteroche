<?php

namespace Bihin\Forteroche\src\DAO;

use Bihin\Forteroche\src\DAO\DbConnect;
use Bihin\Forteroche\src\model\User;

require_once 'src/model/User.php';

class UserManager extends DbConnect
{
	public function register($post){
		$newUser = new User($post);
		$req = $this->db->prepare('INSERT INTO users(login, password, email, roleId) VALUES(:login, :password, :email, 2)');
		$req->execute([
			':login' => $newUser->getLogin(),
			':password' => password_hash($newUser->getPassword(), PASSWORD_DEFAULT),
			':email' => $newUser->getEmail()
		]);
	}

	public function getUserDatas(){
		$req = $this->db->prepare('SELECT users.*, role.* FROM role INNER JOIN users ON users.roleId = role.id WHERE login = ?');
		$req->execute([
			$_SESSION['login']
		]);
		while($datas =  $req->fetch()){
			$userDatas = new User($datas);
		};
		return $userDatas;
	}

	public function getUSers(){
		$req = $this->db->query('SELECT * FROM users');
		while ($datas = $req->fetch()) {
			$users[] = new User($datas);
		}
		return $users;
	}

	public function checkUser($post){
		$user = new User($post);
		$req = $this->db->prepare('SELECT COUNT(login) FROM users WHERE login = ?');
		$req->execute([
			$user->getLogin()
		]);
		$newUser = $req->fetchColumn();
		return $newUser;	
	}

	public function checkPassword($post){
		$user = new User($post);
		$req = $this->db->prepare('SELECT id, login, password FROM users WHERE login = ?');
		$req->execute([
			$user->getLogin()
		]);
		$datas = $req->fetch();
		$_SESSION['userId'] = $datas['id'];
		$userPassword = password_verify($user->getPassword(), $datas['password']);
		return $userPassword;
	}

	public function updateDatas($post){
		$user = new User($post);
		$req = $this->db->prepare('UPDATE users SET login = :login, password = :password, email = :email WHERE id = :id');
		$req->execute([
			':login' => $user->getLogin(),
			':password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
			':email' => $user->getEmail(),
			':id' => $_SESSION['userId']
		]);
	}

	public function deleteCount($login){
		$req = $this->db->prepare('DELETE FROM users WHERE login = ?');
		$req->execute([
			$login
		]);
	}
}
