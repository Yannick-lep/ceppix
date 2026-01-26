<?php

class MainRepository {
    // quelle table ?
    // ...
    public function getBy( ?array $value, ){
        var_dump($value);
        //$value ["user","email","azerty@azerty.com"]

        //$req = $pdo->prepare("SELECT * FROM user WHERE email = 'azerty@azerty.com'");
        global $pdo;
        $req = $pdo->prepare("SELECT * FROM ".$value[0]." WHERE ".$value[1]." = :valeur");
        $req->execute([":valeur"=>$value[2]]);
        return $req->fetchAll();    
    }
}