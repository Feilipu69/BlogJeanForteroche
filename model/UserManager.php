<?php
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

	public function getUSers(){
		$req = $this->db->query('SELECT * FROM users');
		while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {
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
}
