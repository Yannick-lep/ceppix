<?php
// creation d'une class User
class User
{
    public function __construct($nom,$email,$pwd)
    {
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setPwd($pwd);
    }
    private $nom;
    private $role = "ROLE_USER";
    private $email;
    private $pwd;
    protected function setNom ($nom){
        if(strlen($nom)>20){
            throw new Exception('Nom doit être inferieur à 20 caractères.');
            return;
        }
        if(strlen($nom)<2){
            throw new Exception('Nom doit être supérieur à 2 caractères.');
            return;
        }
        $this->nom = $nom;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setEmail($email)
    {
        //setter qui sert a controler les données attribuées aux
        // propriétés de la class
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //$this represente la class elle-meme
            $this->email = $email;
        }
    }
        //getter qui sert a retourner la valeur d'une propriété private
    public function getEmail(){
        return $this->email;
    }
    //setter pwd
    public function setPwd($pwd){
        /* if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{15,}$/',$pwd,)){
            return;
        } */

        $this->pwd = password_hash($pwd,PASSWORD_BCRYPT);
    }
    public function getPwd(){
        return $this->pwd;
    }
}