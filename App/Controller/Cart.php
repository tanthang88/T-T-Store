<?php
use Core\{Controller, Request, Session, Response};
use App\Model\SiteOrder;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;

class Cart extends Controller
{
    private SiteOrder $__model;
    public function __construct()
    {
        $this->__model = new SiteOrder();
    }

    #[NoReturn] public function addCart(){
        $req = new Request();
        $dataCart = $req->getFields();
        $ID_PRODUCT = $dataCart['id'];
        $getCart = Session::data('cart');
        if (empty($getCart) || !array_key_exists($ID_PRODUCT,$getCart)){
            if (!isset($dataCart['quantity'])){
                $dataCart['quantity'] = 1;
            }
        } else {
            $dataCart['quantity'] = $getCart[$ID_PRODUCT]['quantity'] + 1;
        }
        $_SESSION[Session::isInvalid()]['cart'][$ID_PRODUCT] = $dataCart;
        $redirect = new Response();
        $redirect->Redirect($this->viewCart());
    }
    public function viewCart(){
        $dataCart = $this->getDataCart();
        $this->data['listCart'] = $dataCart['listCart'];
        $this->data['breadcrumb'] = array(
            'Trang chủ' => ROOT_URL,
            'Sản phẩm' => '',
            'Giỏ hàng' => '/'
        );
        $this->data['content'] = 'Site/Cart';
        $this->renderView('Template/SiteCustomOne',$this->data);
    }
    public function Payment(){
        $dataCart = $this->getDataCart();
        $this->data['totalCartPrice'] = $dataCart['totalCartPrice'];
        $this->data['totalCartPayment'] = $dataCart['totalCartPayment'];
        $this->data['discount'] = $dataCart['discount'];
        $this->data['listCart'] = $dataCart['listCart'];
        $this->data['page_title'] = 'Thanh toán đơn hàng';
        $this->data['breadcrumb'] = array(
            'Trang chủ' => ROOT_URL,
            'Sản phẩm' => '',
            'Giỏ hàng' => ROOT_URL.'/view-cart',
            'Thanh toán' => ''
        );
        $this->data['content'] = 'Site/CartPayment';
        $this->renderView('Template/SiteCustomOne', $this->data);
    }
    #[ArrayShape([
        'listCart' => "bool|mixed|void", 'totalCartPrice' => "float|int", 'totalCartPayment' => "float|int",
        'discount' => "int"
    ])] private function getDataCart(): array
    {
        $getCart = Session::data('cart');
        $totalCartPrice = 0;
        if (isset($getCart)){
            foreach ($getCart as $item=>$value){
                $totalCartPrice += $value['price'] * $value['quantity'];
            }
            $discount = 0;
            $totalCartPayment = ($totalCartPrice - $discount);
            $this->data['totalCartPrice'] = $totalCartPrice;
            $this->data['totalCartPayment'] = $totalCartPayment;
            $this->data['discount'] = $discount;
        } else {
            $totalCartPayment = 0;
            $discount = 0;
        }
        return array(
            'listCart'=>$getCart,
            'totalCartPrice'=>$totalCartPrice,
            'totalCartPayment' => $totalCartPayment,
            'discount' => $discount
        );
    }
    public function PaymentCheck(){
        $request = new Request();
        $dataSubmit = $request->getFields();
        $id_user = Session::data('account')[0]->id_user;
        $dataOrderInfo = json_encode($dataSubmit, JSON_UNESCAPED_UNICODE);
        $dataCart = json_encode(Session::data('cart'),JSON_UNESCAPED_UNICODE);
        $dataAccount = json_encode(Session::data('account'),JSON_UNESCAPED_UNICODE);
        $data = array(
            '`user_id`' => $id_user,
            '`order_info`'=> $dataOrderInfo,
            '`order`'=> $dataCart,
            '`account`'=>$dataAccount
        );
        $result = $this->__model->addOrder($data);
        if ($result){
            Session::deleteSession('cart');
            $this->data['message'] = "Đặt hàng thành công!";
            $this->data['redirect'] = ROOT_URL.'/';
            $this->data['content'] = 'Site/Message';
            $this->renderView('Template/SiteCustomOne', $this->data);
        }
    }
}