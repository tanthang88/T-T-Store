<?php
    use Core\{Controller,Request,Response,Session};
    use App\Model\{SiteHome,AdminCategory, AdminProduct};
class Home extends Controller
    {
        public array $data = [];
        private SiteHome $__model;
        private AdminCategory $__category;
        private AdminProduct $__product;
        public function __construct()
        {
            $this->__model = new SiteHome();
            $this->__category = new AdminCategory();
            $this->__product = new AdminProduct();
        }

    public function index()
        {
            $list=[];
            $listCate = $this->__category->getListCategory();
            foreach ($listCate as $key => $value){
                $list[$value->name_category] =$this->__model->getListProductHome($value->id_category);
            }
            $this->data['dataProduct'] = $list;
            $this->data['listCate'] = $listCate;
            $this->data['content'] = 'Site/Home';
            $this->data['page_title'] = "Trang Chủ";
            $this->renderView('Template/SiteHome', $this->data);
        }

        public function productDetail($ID_Product)
        {
            $dataProductDetail = $this->__product->getOneProduct($ID_Product);
            $listImageRelated = $this->__product->getListRelatedImage($ID_Product);
            foreach ($dataProductDetail as $val){
                $proName = $val->name;
            }
            $this->data['breadcrumb'] = array(
                'Trang chủ' => ROOT_URL,
                'Sản phẩm' => '',
                $proName => '/'
            );
            $this->data['product'] = $dataProductDetail;
            $this->data['listImageRelated'] = $listImageRelated;
            $this->data['page_title'] = $proName;
            $this->data['content'] = 'Site/ProductDetail';
            $this->renderView('Template/SiteCustomOne',$this->data);
        }
/*        public function test(){
            $req = new Request();
            $dataMethod = $req->getFields();
            echo '<pre>';
            print_r($dataMethod);
            $res = new Response();
            $res->Redirect('http://fb.com');
        }*/
    }

