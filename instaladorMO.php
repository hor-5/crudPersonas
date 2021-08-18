<?php
include_once "config.php";
include_once "entidades/usuarioMO.php";

$usuario = new UsuarioMO();
$usuario->usuario = "admin";
$usuario->clave = $usuario->encriptarClave("admin123");
$usuario->nombre = "Horacio";
$usuario->apellido = "Capdevila";
$usuario->correo = "hc.horaciocapdevila@gmail.com";
$usuario->insertar();


?>