﻿<?php
 // web/backend.php

 // carga del modelo y los controladores
 require_once '../app/Config.php';
 require_once '../app/Model.php';
 require_once '../app/ModelDonante.php';
 require_once '../app/ModelEntidad.php';
 require_once '../app/ModelAlimento.php';
 require_once '../app/ModelLogin.php';
 require_once '../app/ControllerBack.php';

 // enrutamiento
 $map = array(
     'inicio' => array('controller' =>'ControllerBack', 'accion' =>'inicio'),

     'listarDonantes' => array('controller' =>'ControllerBack', 'accion' =>'listarDonantes'),
     'altaDonante' => array('controller' =>'ControllerBack', 'accion' =>'altaDonante'),
     'modificarDonante' => array('controller' =>'ControllerBack', 'accion' =>'modificarDonante'),
     'bajaDonante' => array('controller' =>'ControllerBack', 'accion' =>'bajaDonante'),

     'listarEntidades' => array('controller' =>'ControllerBack', 'accion' =>'listarEntidades'),
     'altaEntidad' => array('controller' =>'ControllerBack', 'accion' =>'altaEntidad'),
     'modificarEntidad' => array('controller' =>'ControllerBack', 'accion' =>'modificarEntidad'),
     'bajaEntidad' => array('controller' =>'ControllerBack', 'accion' =>'bajaEntidad'),

     'listarAlimentos' => array('controller' =>'ControllerBack', 'accion' =>'listarAlimentos'),
     'altaAlimento' => array('controller' =>'ControllerBack', 'accion' =>'altaAlimento'),
     'modificarAlimento' => array('controller' =>'ControllerBack', 'accion' =>'modificarAlimento'),
     'bajaAlimento' => array('controller' =>'ControllerBack', 'accion' =>'bajaAlimento'),

     'quienesSomos' => array('controller' =>'ControllerBack', 'accion' =>'quienesSomos'),
     'contacto' => array('controller' =>'ControllerBack', 'accion' =>'contacto'),
 );
/*
if (!isset($_SESSION['usuario'])) {
	echo "<script>window.alert('El usuario no está logueado'); window.location = './index.php';</script>";
	
	//header('Location:./index.php');
	//die;
}
*/
 // Parseo de la ruta
 if (isset($_GET['accion'])) {
     if (isset($map[$_GET['accion']])) {
         $ruta = $_GET['accion'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['accion'] .
                 '</p></body></html>';
         exit;
     }
 } else {
     $ruta = 'inicio';
 }

 if (isset($_GET['id'])) {
	$id = $_GET['id'];
 } else {
     $id = -1;
 }
 
 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta




 if (method_exists($controlador['controller'],$controlador['accion'])) {
    call_user_func(array(new $controlador['controller'], $controlador['accion']), $id);
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['accion'] .
             '</i> no existe</h1></body></html>';
 }