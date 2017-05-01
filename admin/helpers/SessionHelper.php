<?php
/**
 * Created by PhpStorm.
 * User: alexj
 * Date: 10-04-2016
 * Time: 17:34
 */

function isSuperAdmin()
{
    if($_SESSION['ID_PERFIL'] == '-1')
        return true;
    else
        return false;
}