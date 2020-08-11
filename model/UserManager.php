<?php
class UserManager extends DbConnect
{
	public function register($post){
		$req = $this->db->prepare('INSERT INTO users(login, password, email, roleId) VALUES(:login, :password, :email, 2)');
		$newUser = new User($post);
		$req->execute([
			':login' => $newUser->getLogin(),
			':password' => password_hash($newUser->getPassword(), PASSWORD_DEFAULT),
			':email' => $newUser->getEmail()
		]);
	}
}
