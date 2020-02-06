<?php

class userController
{
    use Render;
    
    private $responce=[];

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->post = $_POST;
        $this->requestType = $_SERVER['REQUEST_METHOD'];
    }

    public function login()
    {
        if ($this->requestType === 'GET') {
            $this->render('UserLoginForm', '');
        }
        else if($this->requestType === 'POST'){
            $this->checkUserLogin();
            echo json_encode($this->responce);
        }
        else{
            http_response_code(404);
        }
    }

    public function account(){
        if ($this->requestType === 'GET') {
            $this->render('UserRegisterationForm', '');
        }
        else if($this->requestType === 'POST'){
            $this->createAccount();
        }
        else{
            http_response_code(404);
        }
    }

    public function product(){
        if ($this->requestType === 'GET') {
            $this->render('ProductSellForm', '');
        }
        else if($this->requestType === 'POST'){
            $this->createProduct();
        }
        else{
            http_response_code(404);
        }
    }

    public function home($param){
        if ($this->requestType === 'GET') {
            if($param[0] === 'products'){
                $this->getHomePageData();
            }else{
                $this->viewHomePage();
            }
        } else if($this->requestType === 'POST'){
            
        }
        else{
            http_response_code(404);
        }
    }

    public function checkUserLogin()
    {
        $userData = $this->userModel->checkMailIdIsAvailaple($this->post['loginMailId']);
        if ($userData) {
            $this->userModel->setSesstionData($userData);
            $status['status code']=200;
            $this->responce['status']=$status;
        } else {
            $status['status code']=500;
            $status['message']='Mail Id and password do not match';
            $this->responce['status']=$status;
        }
    }

    public function viewHomePage()
    {
        if ($_SESSION['accounttype'] == 'b') {
            $this->render('buyerPage', '');
        } else {
            $this->render('sellerPage', '');
        }
    }

    function createAccount()
    {
        if ($this->userModel->checkMailIdIsAvailaple($this->post['mailid'])) {
            http_response_code(409);
        } else {
            $this->userModel->insertDetails($this->post);
            $status['status code']=201;
            $status['message']='Account created succcessfully';
            $this->responce['status']=$status;
            echo json_encode($this->responce);        
        }
    }

    public function createProduct()
    {
        if($this->userModel->insertSellingFormData($this->post)){
            $status['status code']=201;
            $this->responce['status']=$status;
            echo json_encode($this->responce);
        }
    }
    
    function getHomePageData(){
        if ($_SESSION['accounttype'] == 'b') {
            $buyerPageData = $this->userModel->getBuyerPageData();
            while ($dbdata = pg_fetch_assoc($buyerPageData)) {
                $dataArray[]=$dbdata; 
            }
            $status['status code']=200;
            $data['roll']='b';
            $data['dataArray']=$dataArray;
            $this->responce['status']=$status;
            $this->responce['data']=$data;
            echo (json_encode($this->responce));
        } else {
            $sellerPageData = $this->userModel->getSellerPageData();
            while ($dbdata = pg_fetch_assoc($sellerPageData)) {
                unset($dbdata['sellerid']);
                $dataArray[]=$dbdata; 
            }
            $status['status code']=200;
            $data['roll']='s';
            $data['dataArray']=$dataArray;
            $this->responce['status']=$status;
            $this->responce['data']=$data;
            echo (json_encode($this->responce)) ;         
        }   
    }
}