<?php
namespace App\Controllers;
use App\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        // Constructor logic
    }
    public function index()
    {
        require __DIR__ . '/../../resources/views/home.php';
        exit;
    }
}
