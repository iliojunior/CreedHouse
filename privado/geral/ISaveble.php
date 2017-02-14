<?php

interface ISaveble
{
    function getTableName();
    function getArrayColumns();
    function getArrayValues();
    function getFilter();
}

?>