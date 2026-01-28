<?php

class UserController
{
    // le static me permet d'appeler une propriété ou une methode de class
    // sans avoir besoin d'instancier cette dernière
    public static function register()
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {

            foreach ($_POST as $key => $value) {
                $_POST[$key] = htmlspecialchars($value);
                if (empty($value)) return;
            }
            if ($_POST['confpwd'] !== $_POST['pwd']) return;
            $date = new DateTime();
            $date = $date->format("Y-m-d H:i:s");
            $user = new User($_POST['nom'], $_POST['email'], $_POST['pwd'],"ROLE_USER",$date,$date);
            $userRepository = new UserRepository;
            $arrayUser = [
                "nom"=>$user->getNom(),
                "email"=>$user->getEmail(),
                "pwd"=>$user->getPwd(),
                "roles"=>$user->getRoles(),
                "createdAt"=>$user->getCreatedAt(),
                "updatedAt"=>$user->getUpdatedAt()
            ];
            $lastId = $userRepository->create($arrayUser,"user");
            var_dump($_FILES);
            // appel de la methode uploadAvatar
            UserController::uploadAvatar($lastId);
        }
    }
    public static function getUserByEmail(){
        $userRepository = new UserRepository;
        var_dump($userRepository->getBy(["user","email","azerty@azerty.com"]));
        $userRepository->create(["nom"=>"Bob","email"=>"baob@bob.com","pwd"=>"azerty"],"user");
    }
    public static function login (){
        if(isset($_POST['submit']) && !empty($_POST['submit'])){
            $userRepository = new UserRepository;

            $newUser = $userRepository->getBy(['user','email',UserController::nettoyage($_POST['email'])]);
            //...test
            if(sizeof($newUser)>0){
                if(password_verify($_POST['pwd'],$newUser[0]['pwd'])){
                    var_dump($newUser);
                    $user = new User($newUser[0]['nom'],
                    $newUser[0]['email'],
                    $newUser[0]['pwd'],
                    $newUser[0]['roles'],
                    $newUser[0]['createdAt'],
                    $newUser[0]['updatedAt']);
                    $_SESSION['userid'] = $newUser[0]['id_user'];
                    $_SESSION['usernom'] = $newUser[0]['nom'];
                    
                }
            }
        }
    }
    public static function logout(){
        session_destroy();
    }
    public static function nettoyage($postValue){
        return htmlspecialchars($postValue);
    }
    public static function uploadAvatar($lastId){
        /* 'name' => string 'XenonBally.jpg' (length=14)
            'full_path' => string 'XenonBally.jpg' (length=14)
            'type' => string 'image/jpeg' (length=10)
            'tmp_name' => string 'C:\wamp64\tmp\php3407.tmp' (length=25)
            'error' => int 0
            'size' => int 57658 */
        //filtres
        if(!isset($_FILES['avatar'])) return "pas de fichier";
        if($_FILES['avatar']['error'] > 0) return "error";
        if(!preg_match("/(jpg)|(jpeg)|(png)|(webp)|(gif)/",$_FILES['avatar']['type'])) return "type mime";
        if(!file_exists("./public/assets/avatar"))mkdir("./public/assets/avatar",0755);
        move_uploaded_file($_FILES['avatar']['tmp_name'],"./public/assets/avatar/".$_FILES['avatar']['full_path']);
        //integration Bundle 
        $image = new \Gumlet\ImageResize("./public/assets/avatar/".$_FILES['avatar']['full_path']);
        var_dump($image);
        $image->resizeToWidth(300);
        $image->save("./public/assets/avatar/".$lastId.".webp", IMAGETYPE_WEBP);
        if(!file_exists("./public/assets/avatar/thumbnail"))mkdir("./public/assets/avatar/thumbnail",0755);
        $image->resizeToWidth(50);
        $image->save("./public/assets/avatar/thumbnail/".$lastId.".webp", IMAGETYPE_WEBP);

        return "c'est tout bon";    
    }
}
