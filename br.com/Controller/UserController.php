<?php

class userController
{
    use Render;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->post = $_POST;
    }

    public function login()
    {
        if (isset($this->post['userLoginSubmition'])) {
            $userData = $this->userModel->checkMailIdIsAvailaple($this->post['loginMailId']);
            if ($userData) {
                $this->userModel->setSesstionData($userData);
                if ($_SESSION['accounttype'] == 'b') {
                    $buyerPageData = $this->userModel->getBuyerPageData();
                    $this->render('buyerPage', $buyerPageData);
                } else {
                    $sellerData = $this->userModel->getSellePageData();
                    $this->render('sellerPage', $sellerData);
                }
            } else {
                echo 'You Have No Account';
            }
        } else {
            $this->render('UserLoginForm', '');
        }
    }

    public function createAccount()
    {
        if (isset($this->post['CreateAccount'])) {
            if ($this->userModel->checkMailIdIsAvailaple($this->post['mailid'])) {
                echo 'Account is availaple';
            } else {
                if ($this->userModel->insertDetails($this->post)) {
                    echo 'inserted';
                };
            }
        } else
            $this->render('UserRegisterationForm', '');
    }

    public function addProduct()
    {
        if (isset($this->post['SellProduct'])) {
            if ($this->userModel->insertSellingFormData($this->post)) {
                echo 'Product Posted Successfully...';
            }
        } else {
            $this->render('ProductSellForm', '');
        }
    }
}
