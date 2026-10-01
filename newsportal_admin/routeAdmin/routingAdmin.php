<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host,'/');
$path = explode('/', $host)[$num];

if ($path == '' OR $path == 'index.php')
{
    // Главная страница -
    $response = controllerAdmin::formLoginSite();
}
// ------ ВХОД -------------
elseif ($path == 'login')
{
    // Форма входа
    $response = controllerAdmin::loginAction();
}
elseif ($path == 'logout')
{
    // Выход
    $response = controllerAdmin::logoutAction();
}
elseif ($path == 'newsAdmin')
{
    // Список новостей
    $response = controllerAdminNews::NewsList();
}
elseif ($path == 'newsAdd')
{
    $response = controllerAdminNews::NewsAddForm();
}
elseif ($path == 'newsAddResult')
{
    $response = controllerAdminNews::NewsAddResult();
}

else
{   // Страница не существует
    $response = controllerAdmin::error404();
}