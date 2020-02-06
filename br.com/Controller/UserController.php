<?php

class userController
{
    use Render;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->post = $_POST;
        $this->requestType = $_SERVER['REQUEST_METHOD'];
    }

    public function login()
    {
        $userData = $this->userModel->checkMailIdIsAvailaple($this->post['loginMailId']);
        if ($userData) {
            $this->userModel->setSesstionData($userData);
            $status['status code'] = 200;
            $this->responce['status'] = $status;
        } else {
            $status['status code'] = 500;
            $status['message'] = 'Mail Id and password do not match';
            $this->responce['status'] = $status;
        }
        echo json_encode($this->responce);
    }

    public function viewLoginPage()
    {
        $this->render('UserLoginForm', '');
    }

    public function viewUserRegistrationForm()
    {
        $this->render('UserRegisterationForm', '');
    }

    public function viewHomePage()
    {
        if ($_SESSION['accounttype'] == 'b') {
            $this->render('buyerPage', '');
        } else {
            $this->render('sellerPage', '');
        }
    }

    public function create()
    {
        if ($this->userModel->checkMailIdIsAvailaple($this->post['mailid'])) {
            $this->userModel->insertDetails($this->post);
            $status['status code'] = 409;
            $status['message'] = 'Account already exists';
            $this->responce['status'] = $status;
            echo json_encode($this->responce);
        } else {
            $this->userModel->insertDetails($this->post);
            $status['status code'] = 201;
            $status['message'] = 'Account created succcessfully';
            $this->responce['status'] = $status;
            echo json_encode($this->responce);
        }
    }

    public function delete()
    {
    }

    public function update()
    {
    }

    public function getDatas()
    {
    }

    public function getData()
    {
    }
}
