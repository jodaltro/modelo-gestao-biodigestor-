<?php
/**
 * Created by PhpStorm.
 * User: jodal
 * Date: 10/11/2016
 * Time: 22:35
 */
require_once "dadosModelo.php";
error_reporting(0);
session_start();
if(isset($_SESSION['animals']))
    $dados3 = unserialize($_SESSION['animals']);
session_destroy();