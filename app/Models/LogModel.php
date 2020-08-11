<?php

namespace App\Models;

use CodeIgniter\Model;
   
class LogModel extends Model
{
    protected $table = 'log';
        protected $primaryKey = 'id' ;

        protected $allowedFields = [
             'car_id'
        ];
}