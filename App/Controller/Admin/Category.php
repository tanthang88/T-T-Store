<?php

use Core\{Controller, Request};
use App\Model\AdminCategory;

class Category extends Controller
{
    public array $data = [];
    private mixed $__model;
    private array $__col = ['name_category', 'code_category'];

    public function __construct()
    {
        $this->__model = new AdminCategory();
    }

    public function loadViewAddCategory()
    {
        $this->data['page_title'] = 'Add AdminCategory';
        $this->data['content'] = 'Admin/AddCategory';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function addCategory()
    {
        $req = new Request();
        $dataReq = $req->getFields();
        $dataSubmit = array(
            $this->__col[0] => $dataReq['name'],
            $this->__col[1] => $dataReq['code']
        );
        $result = $this->__model->addCategory($dataSubmit);
        if ($result) {
            $this->data['page_title'] = "Success";
            $this->data['message'] = "Add Category Success!";
        } else {
            $this->data['page_title'] = "Error";
            $this->data['error'] = "Sorry, something went wrong!";
        }
        $this->data['content'] = 'Admin/Message';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function listCategory()
    {
        $list = $this->__model->getListCategory();
        $this->data['listCategory'] = $list;
        $this->data['page_title'] = 'List Category';
        $this->data['content'] = 'Admin/ListCategory';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function loadViewEditCategory($ID)
    {
        $data = $this->__model->getOneCategory($ID);
        $this->data['list'] = $data;
        $this->data['page_title'] = 'Edit Category';
        $this->data['content'] = 'Admin/EditCategory';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function editCategory()
    {
        $request = new Request();
        $dataRequest = $request->getFields();
        $data = array(
            $this->__col[0] => $dataRequest['name'],
            $this->__col[1] => $dataRequest['code'],
        );
        $result = $this->__model->editCategory($data, 'id_category = '.$dataRequest['id']);
        if ($result){
            $this->data['page_title'] = "Edit Success";
            $this->data['message'] = "Edit Category Success!!!";
        } else {
            $this->data['page_title'] = "Edit Error";
            $this->data['error'] = "Edit Category Error, Please check again!";
        }
        $this->data['content'] = 'Admin/Message';
        $this->renderView('Template/Admin_Layout',$this->data);
    }
    public function deleteCategory($ID){
        $result = $this->__model->deleteCategory('id_category = '.$ID);
        if ($result){
            $this->data['message'] = 'Delete Category Success!!!';
            $this->listCategory();
        } else {
            $this->data['page_title'] = "Delete Error";
            $this->data['error'] = 'Delete Category Failed, Please Check Again';
            $this->data['content'] = 'Admin/ListCategory';
            $this->renderView('Template/Admin_Layout',$this->data);
        }


    }
}