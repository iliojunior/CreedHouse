<?php

class FindById implements IFindable
{

    private $id_user;

    public function __construct($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getColumns()
    {
        return "*";
    }

    public function getTable()
    {
        return "users";
    }

    public function whereClause()
    {
        return array(
            0 => "`id_user` = :id_user"
        );
    }

    public function whereArgs()
    {
        return array(
            "id_user" => $this->id_user
        );
    }

    public function getLimitRows()
    {
        return 1;
    }
}

?>