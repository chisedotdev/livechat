<?php

namespace Controllers;

require_once('BaseController.php');

class DashboardController extends BaseController
{
    public function showDashboard()
    {
        $this->render('base', [
            "content" => "dashboard/dashboard", 
            "title" => "Dashboard",
        ]);
    }
}