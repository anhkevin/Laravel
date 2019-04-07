<?php

namespace App\ValidateRequest;

use Illuminate\Http\Request;
/*****************************************************************************
* Helper
****************************************************************************
* Executes the validate request, which is the baseclass
*
**************************************************************************
* @author: Anh
****************************************************************************/

abstract class ValidateRequest
{
	protected static $_arr_rule = [];
	protected function __construct(){
    }

    // Set rule for array
   	public static function setRule($p_arrRule){
   		foreach ($p_arrRule as $key => $value) {
   			if(!isset(self::$_arr_rule[$key])){
   				self::$_arr_rule[$key] = "";
          self::$_arr_rule[$key] = $value;
   			}else{
   				self::$_arr_rule[$key] .= "|";
          self::$_arr_rule[$key] .= $value;
   			}
   			
   		}
   	}

  // Re new array rule
  protected static function reNew(){
    self::$_arr_rule = [
      ];
  }

  // Validate request with array rule
	public static function validate(Request $request){
		$request->validate(self::$_arr_rule);
	}
}
