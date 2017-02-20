<?php
function include_all_php($folder)
{
    foreach (glob("{$folder}/*.php") as $filename) {
        include_once $filename;
    }
}

function validarUsuario($id_user, $key)
{
    if ($id_user == '')
        throw new Exception("Id User is empty! $id_user");
    if (empty($key))
        throw new Exception("Key is empty!");

    for ($i = 0; $i < strlen(UserUtil::WORD_KEY); $i++) {
        $key -= ord(UserUtil::WORD_KEY[$i]);
    }

    if ($key != $id_user)
        throw new Exception("Key is not valid!");

}

?>