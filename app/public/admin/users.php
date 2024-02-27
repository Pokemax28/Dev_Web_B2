<?php

require_once '../../vendor/autoload.php';

use App\Page;
$page = new Page();

$users = $page->getAllUsers();

//var_dump($users);

echo $page->render('admin/users/list.html.twig', [
    'users' => $users
]);
