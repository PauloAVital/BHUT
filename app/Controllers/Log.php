<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogModel;

class Log extends BaseController {
    
    protected $logModel;

    public function __construct(){        
        $this->logModel = new LogModel();
    }

    public function findAll() {
                
        $logs = $this->logModel->findAll();
        return $this->response->setStatusCode(200)
                              ->setJSON($logs);

    }
}