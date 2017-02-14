<?php

interface IFindable
{
    public function getColumns():string;

    public function getTable():string;

    public function whereClause():array;

    public function whereArgs():array;

    public function getLimitRows():int;
}

?>