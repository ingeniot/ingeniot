<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php
if(!isset($titulo) || empty($titulo)){
    $titulo="Bienvenido";
}
echo "<title>$titulo</title>";
?>
  <meta name="description" content="IngenIoT,IOT" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../imagenes/logo_sm.svg">
  <meta name="apple-mobile-web-app-title" content="IngenIoT">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../imagenes/logo_sm.svg">

  <!-- style -->
  <link rel="stylesheet" href="../estilos/estilos.css" >
  <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/animate.css/animate.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/glyphicons/glyphicons.css" type="text/css">
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css">
  <link rel="stylesheet" href="../assets/styles/app.min.css">
  <link rel="stylesheet" href="../assets/styles/font.css" type="text/css">

<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>-->
</head>
