<?php

namespace App\ValidateRequest;

use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginValidate extends ValidateRequest
{
	/*****************************************************************************
    * Created: 
    * Validate Login
    ***************************************************************************
    * @author: Anh. If get error, it returns an error message and stop.
    ****************************************************************************/
    public static function validateLogin(Request $p_request){
        $arr_rule = [
            "txtUsername" => 'required',
            "txtPassword" => 'required',
        ];
        self::reNew();
        self::setRule($arr_rule);
        self::validate($p_request);
    }
}