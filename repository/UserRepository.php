<?php

class UserRepository {
    public function createUser($user){
        require_once("../inc/pdo.php");
        $req = $pdo->prepare("INSERT INTO user(nom, email, pwd) VALUES (:nom,:email,:pwd)");
        $req->execute([
            ':nom'=>$user->getNom(),
            ':email'=>$user->getEmail(),
            ':pwd'=>$user->getPwd()
        ]);
    }
}