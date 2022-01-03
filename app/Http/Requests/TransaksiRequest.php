<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            'transaction_status' => 'required|string|in:IN_CART,PENDING,SUCCESS,CANCEL,FAILED,in_cart,pending,success,cancel,failed,
            In_Cart,Pending,Success,Cancel,Failed'
        ];
    }
}
