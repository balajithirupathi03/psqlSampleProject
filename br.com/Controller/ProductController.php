<?php
class ProductController
{

    use Render;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->post = $_POST;
        $this->requestType = $_SERVER['REQUEST_METHOD'];
    }

    public function viewSellerForm()
    {
        $this->render('ProductSellForm', '');
    }

    public function create()
    {
        if ($this->userModel->insertSellingFormData($this->post)) {
            $status['status code'] = 201;
            $this->responce['status'] = $status;
            echo json_encode($this->responce);
        }
    }

    public function getDatas()
    {
        if ($_SESSION['accounttype'] == 'b') {
            $buyerPageData = $this->userModel->getBuyerPageData();
            while ($dbdata = pg_fetch_assoc($buyerPageData)) {
                $dataArray[] = $dbdata;
            }
            $status['status code'] = 200;
            $data['roll'] = 'b';
            $data['dataArray'] = $dataArray;
            $this->responce['status'] = $status;
            $this->responce['data'] = $data;
            echo (json_encode($this->responce));
        } else {
            $sellerPageData = $this->userModel->getSellerPageData();
            while ($dbdata = pg_fetch_assoc($sellerPageData)) {
                unset($dbdata['sellerid']);
                $dataArray[] = $dbdata;
            }
            $status['status code'] = 200;
            $data['roll'] = 's';
            $data['dataArray'] = $dataArray;
            $this->responce['status'] = $status;
            $this->responce['data'] = $data;
            echo (json_encode($this->responce));
        }
    }

    public function update()
    {
    }
    public function delete()
    {
    }
}
