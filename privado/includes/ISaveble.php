<?php

interface ISaveble
{
    function getTableName():string;

    function getArrayColumns():array;

    function getArrayValues():array;

    function getFilter():string;

    function isNewRecord():boolean;
}

?>