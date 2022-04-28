<?php

use Core\Controller;
use App\Model\SiteOrder;
class Order extends Controller
{
    public array $data = array();
    private SiteOrder $__model;
    public function __construct()
    {
        $this->__model = new SiteOrder();
    }
    public function listOrder(){
        $data = $this->__model->listOrder();
        $this->data['listOrder'] = $data;
        $this->data['page_title'] = 'Đơn đặt hàng';
        $this->data['content'] = 'Admin/ListOrder';
        $this->renderView('Template/Admin_Layout', $this->data);
    }
    public function orderDetail($idOrder){
        $dataOrderDetail = $this->__model->orderDetail($idOrder);
        $this->data['order'] = $dataOrderDetail;
        $this->data['page_title'] = 'Chi tiết đơn hàng';
        $this->data['content'] = 'Admin/OrderDetail';
        $this->renderView('Template/Admin_Layout', $this->data);
    }
}