<?php

interface IFindable
{
    public function getColumns();

    public function getTable();

    public function whereClause();

    public function whereArgs();

    public function getLimitRows();
}

?>