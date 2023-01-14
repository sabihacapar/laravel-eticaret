<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $returnUrl;
    public $fileRepo;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /** 
     * @param $request
     * @param $fillables
     * @return array
    */

    public function prepare($request,$fillables) 
    {
        $data = array();
        foreach($fillables as $fileable){
            if($request->has($fileable)){
                $data[$fileable] = $request->get($fileable);
            }
        }
        return $data;

    }


}
