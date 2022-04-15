<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'             => 'required|max:255',
            'materials'         => 'required|max:255',
            'dimensions'        => 'required|max:255',
            'collage_image.*'   => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function getData()
    {
        return $this->only(['title', 'materials', 'dimensions', 'description']);
    }
}
