<?php

namespace App\Http\Requests;

use App\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'id' => 'required|integer|exists:orders,id',
            'client_email' => 'required|string|email',
            'partner_id' => 'required|integer|exists:partners,id',
            'status' => 'required|integer|in:' . Order::ORDER_STATUS_NEW . ',' . Order::ORDER_STATUS_CONFIRMED . ',' . Order::ORDER_STATUS_COMPLETED
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Order not found',
            'partner_id.exists' => 'Partner not found'
        ];
    }
}
