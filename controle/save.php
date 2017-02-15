<?php
if($_GET['action'] === "save" && $_POST){
    $siteKey = $_POST['key'];
    $id_user= $_POST['id_user'];
    $key = $siteKey;
    try {
        if(empty($id_user))
            throw new Exception("Id User is empty!");
        if(empty($key))
            throw new Exception("Key is empty!");

        for ($i = 0; $i < strlen(UserUtil::WORD_KEY); $i++) {
            $key -= ord(UserUtil::WORD_KEY[$i]);
        }
        
        if ($key != $id_user)
            throw new Exception("Key is not valid!");



    }catch (Exception $e){
        include_once "500.php";
        echo "Erro: ".$e->getMessage();
    }
}
?>