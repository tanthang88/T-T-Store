<?php

use \Core\{Controller, Request, Session};
use \App\Model\{SiteForm};

class Form extends Controller
{
    public array $data = [];
    private SiteForm $model;
    private Request $__request;

    public function __construct()
    {
        $this->model = new SiteForm();
        $this->__request = new Request();
    }

    public function loadViewLogin()
    {
        $this->data['page_title'] = 'Đăng Nhập';
        $this->data['content'] = 'Site/Login';
        $this->renderView('Template/Form', $this->data);
    }

    public function loadViewRegister()
    {
        $this->data['page_title'] = 'Đăng Kí';
        $this->data['content'] = 'Site/Register';
        $this->renderView('Template/Form', $this->data);
    }

    public function checkLogin()
    {
        $req = $this->__request;
        $request = $req->getFields();
        if (!empty($request)) {
            if (isset($request['remember']) && $request['remember'] == 'on') {
                /*Check remember account, Cookie tồn tại trong 30p*/
                setcookie('username', $request['username'], time() + (86400 * 30), '/', '', 0, 0);
                setcookie('password', $request['password'], time() + (86400 * 30), '/', '', 0, 0);
            }
            $result = $this->model->checkAccount($request['username'], $request['password']);
            if (empty($result)) {
                $this->data['error'] = 'Đăng nhập tài khoản không thành công, vui lòng kiểm tra lại.';
                $this->data['redirect'] = 'login';
                $this->data['page_title'] = 'Đăng nhập không thành công';
            } else {
                Session::data('account', $result);
                $this->data['message'] = 'Đăng nhập tài khoản thành công!';
                $this->data['page_title'] = 'Đăng nhập thành công';
            }
            $this->data['content'] = 'Site/Message';
            $this->renderView('Template/SiteCustomOne', $this->data);
        }
    }

    public function checkAddUser()
    {
        $req = $this->__request;
        $data = $req->getFields();
        if (!empty($data)) {
            $image = '';
            $data['gender'] == "Nam" ? $image = 'male.png' : $image = 'female.png';
            $dataSubmit = array(
                'name' => $data['name'],
                'username' => $data['username'],
                'password' => md5($data['password']),
                'gender' => $data['gender'],
                'image' => $image
            );
            $resultAddUser = $this->model->addUser($dataSubmit);
            if ($resultAddUser) {
                $this->data['page_title'] = 'Đăng kí thành công';
                $this->data['message'] = 'Đăng kí tài khoản mới thành công!';
                $this->data['redirect'] = 'login';
            } else {
                $this->data['page_title'] = 'Đăng kí không thành công';
                $this->data['error'] = 'Đăng kí tài khoản không thành công, vui lòng kiểm tra lại các trường đã nhập.';
                $this->data['redirect'] = 'register';
            }
            $this->data['content'] = 'Site/Message';
            $this->renderView('Template/SiteCustomOne', $this->data);
        }
    }
}