<?php 
namespace App;
use App\Session;

require_once '../vendor/autoload.php';

$page = new Page();


$users = $page->getAllUsers();

echo $page->render('admin/users/list.html.twig', ['users' => $users]);
