<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JewelleryRequest extends FormRequest
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
            'type_id'           => 'nullable|integer',
            'title'             => 'required|max:255',
            'edition_type'      => 'required|max:255',
            'materials'         => 'required|max:255',
            'dimensions'        => 'required|max:255',
            'description'       => 'max:400',
            'jewellery_image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function getData()
    {
        return $this->only(['type_id', 'title', 'edition_type', 'materials', 'dimensions', 'description']);
    }
}
