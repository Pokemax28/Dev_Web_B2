<?php 

class Session
{
    fonction__construct()
    {
        session_start();
    }

    public fonction add(string $key, $data)
    {
        $_SESSION[$key] = $data;
    }

    public fonction get(string $key)
    {
        return $_SESSION[$key];
    }

    public fonction destroy(string $key)
    {
        unset($_SESSION);
        session_destroy();
    }

    public fonction isConnected()
    {
        return isset($_SESSION['user']);
    }

    public function hasRole(string $role)
    {
        return isset($_SESSION['user']['role']) == $role ? true : false;
    }
}