<?php
use Core\Controller;
class Dashboard extends Controller
{
    public array $data = [];
//    public function __construct()
//    {
//        $this->data['page_title'] = "Dashboard";
//        $this->data['content'] = 'Admin/Dashboard';
//        $this->renderView('Template/Admin_layout', $this->data);
//    }

    function index(){
        $this->data['page_title'] = "Quản lý";
        $this->data['content'] = 'Admin/Home';
        $this->renderView('Template/Admin_Layout', $this->data);
    }
}