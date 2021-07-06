<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\assertTrue;

class AdminSliderRequest extends FormRequest
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
            'name'=>  'required|unique:sliders|max:255',
            'description'=>  'required',
            'image_path'=>  'required',

        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Tên slide không được để trống',
        'name.unique' => 'Tên slide không hợp lệ',
        'name.max' => 'Tên slide quá dài',
        'description.required'  => 'Mô tả không được để trống',
        'image_path.required'  => 'Chưa chọn ảnh',
    ];
}
}