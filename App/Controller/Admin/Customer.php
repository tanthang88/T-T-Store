<?php
use Core\Controller;
use App\Model\{AdminCustomer};
class Customer extends Controller
{
    public array $data;
    public AdminCustomer $__model;
    public function __construct()
    {
        $this->__model = new AdminCustomer();
    }
    public function listCustomer(){
        $listCustomer = $this->__model->listCustomer();
        $this->data['listCustomer'] = $listCustomer;
        $this->data['page_title'] = 'Danh Sách Khách Hàng';
        $this->data['content'] = 'Admin/ListCustomer';
        $this->renderView('Template/Admin_Layout',$this->data);
    }
    public function deleteCustomer($id_user){
        $this->__model->deleteCustomer($id_user);
        $this->data['message'] = 'Xóa thành công';
        $this->data['page_title'] = 'Xóa thành công';
        $this->data['redirect'] = '/admin/list-customer';
        $this->data['content'] = 'Admin/Message';
        $this->renderView('Template/Admin_Layout', $this->data);
    }
    public function editCustomer($id_user){
        echo $id_user;
    }
}