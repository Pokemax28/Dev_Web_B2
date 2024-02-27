<?php

require_once '../../vendor/autoload.php';

use App\Page;

$page = new Page();

if(isset($_POST['send']))
{
    $page->Ban($_POST['id']);
}

header("Location: /admin/users.php");