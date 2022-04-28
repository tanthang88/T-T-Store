<?php

use Core\{Controller, Request};
use App\Model\{AdminProduct, AdminCategory};

class Product extends Controller
{
    public array $data = [];
    private AdminProduct $__model;
    private AdminCategory $__category;

    public function __construct()
    {
        $this->__model = new AdminProduct();
        $this->__category = new AdminCategory();
    }

    public function loadViewAddProduct()
    {
        $listCategory = $this->__category->getListCategory();
        $this->data['listCategory'] = $listCategory;
        $this->data['page_title'] = 'Add Product';
        $this->data['content'] = 'Admin/AddProduct';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function addProduct()
    {
        $request = new Request();
        $dataRequest = $request->getFields();
        $dataSubmitProduct = array();
        $resultMainImage = $this->uploadFile('public/products/', $_FILES['image']);
        if (!empty($resultMainImage['error'])) {
            $this->data['error'] = $resultMainImage['error'];
        }
        //Check and insert product
        if (!empty($resultMainImage['file_name'])) {
            $imageName = $resultMainImage['file_name'];
            $dataSubmitProduct = [
                'category' => $dataRequest['category'],
                'name' => $dataRequest['name'],
                'price' => $dataRequest['price'],
                'image' => $imageName,
                'detail' => $_POST['detail']
            ];
        }
        $insertProduct = $this->__model->addProduct($dataSubmitProduct);
        $idProductLastInsert = $this->__model->getIDLastIndex();
        //Upload related image
        $resultRelImg = $this->uploadMultipleFiles('public/products/related/', $_FILES['imageRelated']);
        if (!empty($resultRelImg['file_name'])) {
            foreach ($resultRelImg['file_name'] as $value) {
                $dataImgRelated = array(
                    'product_id' => $idProductLastInsert,
                    'image' => $value
                );
                $rsRelated = $this->__model->addImageRelated($dataImgRelated);
            }
        }
        if (!empty($resultRelImg['error'])) {
            foreach ($resultRelImg['error'] as $val) {
                $this->data['errArray'] = $resultRelImg['error'];
            }
        }
        if ($insertProduct) {
            $this->data['message'] = 'Add Product Success &#10084;';
        } else {
            $this->data['failed'] = "Add Product Failed, Please Check Again &#127775;";
        }
        $this->data['redirect'] = '/admin/add-product/';
        $this->data['content'] = 'Admin/Message';
        $this->renderView('Template/Admin_Layout', $this->data);



        /*
        $resultUploadRelatedImage = $this->uploadMultiFile('public/products/related', $_FILES['imageRelated']);
        if (empty($resultMainImage['image_main'])) {
            $this->data['failed'][] = "Please Upload Image!";
        } else {
            $imageMain = $resultMainImage['image_main'];
        }
        if (!empty($resultMainImage['failed'])) {
            $this->data['failed'][] = $resultMainImage['failed'][0];
        }
        if (!empty($resultUploadRelatedImage["error"])) {
            $this->data['error'] = $resultUploadRelatedImage['error'][0];
        }
        if (!empty($resultMainImage['image_main']) && !empty($resultUploadRelatedImage['image_related']) && empty($resultMainImage['failed']) && empty($resultUploadRelatedImage['error'])) {
            $dataSubmitProduct = array(
                'category' => $dataRequest['category'],
                'name' => $dataRequest['name'],
                'image' => $imageMain,
                'detail' => $dataRequest['detail']
            );
            $insertProduct = $this->__model->addProduct($dataSubmitProduct);



            foreach ($resultUploadRelatedImage['image_related'] as $key => $value) {
                $imageRelated = [
                    'product_id' => $idProductLastInsert,
                    'image' => $resultUploadRelatedImage['image_related'][$key]
                ];
                $insertRelatedImage = $this->__model->addImageRelated($imageRelated);
            }


            if ($insertProduct && $insertRelatedImage) {
                $this->data['success'] = 'Add Product Success &#10084;';
            } else {
                $this->data['failed'] = "Add Product Failed, Please Check Again &#127775;";
                $this->data['error'] = $resultUploadRelatedImage['error'][0];
            }
        } else {
            $this->data['failed'] = "Add Product Failed, Please Check Again &#127775;";
        }*/
    }

    public function deleteProduct($ID,$Name_image)
    {
        $pathImage = 'public/products/'.$Name_image;
        $result = $this->__model->deleteProduct($ID);
        if ($result) {
            if (file_exists("public/products/".$Name_image)) {
                if (unlink($pathImage)) {
                    $this->data['message'] = 'Delete Product Success!';
                }
            }
        } else {
            $this->data['failed'] = 'Delete Product Failed!';
        }
        $this->data['page_title'] = 'Delete Success';
        $this->data['redirect'] = '/admin/list-product';
        $this->data['content'] = 'Admin/Message';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function loadListProduct()
    {
        $listProducts = $this->__model->getListProducts();
        $this->data['page_title'] = 'List Product';
        $this->data['listProducts'] = $listProducts;
        $this->data['content'] = 'Admin/ListProduct';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function loadViewEditProduct($id)
    {
        $this->data['listProduct'] = $this->__model->getOneProduct($id);
        $this->data['listCategory'] = $this->__category->getListCategory();
        $this->data['listRelatedImage'] = $this->__model->getListRelatedImage($id);
        $this->data['page_title'] = 'Edit Product';
        $this->data['content'] = 'Admin/EditProduct';
        $this->renderView('Template/Admin_Layout', $this->data);
    }

    public function deleteRelatedImage($name_img, $idProduct, $idImage)
    {
        $pathImageRelated = 'public/products/related/'.$name_img;
        $result = $this->__model->deleteRelatedImage($idImage);
        if ($result) {
            if (file_exists("public/products/related/".$name_img)) {
                if (unlink($pathImageRelated)) {
                    $this->data['message'] = 'Delete image related image success!';
                }
            }
        } else {
            $this->data['error'] = 'Delete image related image failed, please check again!';
        }
        $this->data['redirect'] = '/admin/edit-product/'.$idProduct;
        $this->data['content'] = 'Admin/Message';
        $this->renderView("Template/Admin_Layout", $this->data);
    }

    public function updateProduct()
    {
        $request = new Request();
        $formData = $request->getFields();
        $price = $formData['price'];
        $price = str_replace(array('!', '@', '#', '$', '%', ','), '', $price);
        //Main Form
        $imgMain = $formData['imgMainDefault'];
        if (strlen($_FILES['imageMain']['name']) > 0) {
            $resultMain = $this->uploadFile('public/products/', $_FILES['imageMain']);
            if (!empty($resultMain['file_name'])) {
                $imgMain = $resultMain['file_name'];
            }
            if (!empty($resultMain['error'])) {
                $this->data['errArray'] = $resultMain['error'];
            }
        }
        //Insert Image Related
        if (count($_FILES['imageRelated']['name']) >= 0) {
            $resultRelatedImage = $this->uploadMultipleFiles('public/products/related/', $_FILES['imageRelated']);
            if (!empty($resultRelatedImage['file_name'])) {
                foreach ($resultRelatedImage['file_name'] as $value) {
                    $dataImgRelated = array(
                        'product_id' => $formData['ID_Product'],
                        'image' => $value
                    );
                    $this->__model->addImageRelated($dataImgRelated);
                }
            }
            if (!empty($resultRelatedImage['error'])) {
                foreach ($resultRelatedImage['error'] as $val) {
                    $this->data['errArray'] = $resultRelatedImage['error'];
                }
            }
        }

        //Insert update
        $dataSubmitProduct = array(
            'category' => $formData['category'],
            'name' => $formData['name'],
            'price' => $price,
            'image' => $imgMain,
            'detail' => $_POST['detail']
        );
        $updateProduct = $this->__model->updateProduct($dataSubmitProduct, $formData['ID_Product']);

        //Message
        if ($updateProduct) {
            $this->data['message'] = "Update Product Success!";
        } else {
            $this->data['error'] = "Update Product Failed, Please Check Again!";
        }
        $this->data['redirect'] = '/admin/edit-product/'.$formData['ID_Product'];
        $this->data['content'] = 'Admin/Message';
        $this->renderView('Template/Admin_Layout', $this->data);
    }
}