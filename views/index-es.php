<?php
//session_start(); // Para recordar la selección de idioma

require_once 'vendor/autoload.php'; // Cargar Twig

//// Definir idioma (por GET, sesión o por defecto)
//$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'es';
//
//// Validar que el idioma existe
//if (!in_array($lang, ['es', 'en', 'fr'])) {
//    $lang = 'es';
//}
//
//// Guardar en sesión
//$_SESSION['lang'] = $lang;

// Cargar archivo de traducción
$langFile = __DIR__ . "/languages/es.php";


if (!file_exists($langFile)) {
    die("Error: Archivo de idioma no encontrado.");
}

$translations = require $langFile;

// Configurar Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader, ['cache' => false]);

// Renderizar plantilla con todas las variables
echo $twig->render('index_es.twig', [
    'la_camara' => 'La Cámara',
    'title' => 'Bienvenido a La Cámara',
    'description' => 'Una red de oportunidades para empresarios latinos',
    'web' => 'https://www.la-camara.com',
    't' => $translations // Pasar las traducciones a Twig
]);
