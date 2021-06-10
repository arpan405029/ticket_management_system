<?php

namespace App\Http\Requests;

class SellerPassRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
                return [
                 
                    'password' => 'required|between:3,32',
                    'password_confirm' => 'required|same:password',
                    
                  
                    
                ];
           
     }

}

