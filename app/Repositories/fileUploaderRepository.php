<?php 

namespace App\Repositories;

use App\Imports\CeleCsvImport;
use App\Repositories\Interfaces\fileUploaderInterface;
use Maatwebsite\Excel\Facades\Excel;

class fileUploaderRepository implements fileUploaderInterface{
    
    public function csvUpload($file)
    {
        
        try {
            Excel::import(new CeleCsvImport , $file);
             return 200;

        } catch (\Throwable $th) {
            return 500;
        }
    }
}