<?php
$routes['default_controller'] = 'Home';
/*
*    Đường dẫn ảo => Đường dẫn thật
*/
//ROUTES ADMIN CATEGORY
$routes['admin/dashboard'] = 'admin/dashboard';
$routes['admin/add-category'] = 'admin/category/loadViewAddCategory';
$routes['admin/add-category/message'] = 'admin/category/addCategory';
$routes['admin/list-category'] = 'admin/category/listCategory';
$routes['admin/edit-category'] = 'admin/category/loadViewEditCategory';
$routes['admin/edit-category/message'] = 'admin/category/editCategory';
$routes['admin/delete-category'] = 'admin/category/deleteCategory';
//ROUTE ADMIN PRODUCT
$routes['admin/add-product'] = 'admin/product/loadViewAddProduct';
$routes['admin/add-product/message'] = 'admin/product/addProduct';
$routes['admin/list-product'] = 'admin/product/loadListProduct';
$routes['admin/edit-product'] = 'admin/product/loadViewEditProduct';
$routes['admin/delete-product'] = 'admin/product/deleteProduct';
$routes['admin/update-product'] = 'admin/product/updateProduct';
$routes['admin/delete-related-image'] = 'admin/product/deleteRelatedImage';
//ROUTE ADMIN ORDER
$routes['admin/list-order'] = 'admin/order/listOrder';
$routes['admin/order'] = 'admin/order/orderDetail';
//ROUTE ADMIN CUSTOMER
$routes['admin/list-customer'] = 'admin/customer/listCustomer';
$routes['admin/edit-customer'] = 'admin/customer/editCustomer';
$routes['admin/delete-customer'] = 'admin/customer/deleteCustomer';
//ROUTES HOME SITE
$routes['product-detail'] = 'home/productDetail';
/*$routes['san-pham'] = 'home/product';
$routes['tin-tuc/.+(\d+).html'] = 'news/category/$1';
$routes['test'] = 'test/index';*/
/*ROUTE CART*/
$routes['add-cart'] = 'cart/addCart';
$routes['view-cart'] = 'cart/viewCart';
$routes['payment'] = 'cart/Payment';
$routes['payment-check'] = 'cart/PaymentCheck';
/*ROUTE LOGIN & REGISTER*/
$routes['login'] = 'Form/loadViewLogin';
$routes['register'] = 'Form/loadViewRegister';
$routes['check-login'] = 'Form/checkLogin';
$routes['check-adduser'] = 'Form/checkAddUser';
/*ROUTER USER ACTION*/
$routes['logout'] = 'User/logout';

