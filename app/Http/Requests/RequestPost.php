<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class RequestPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validate = [
            'name' => [
                'required',
                Rule::unique('post')->ignore($this->id),
            ]
        ];
        if(!$this->id){
            $validate['created_at'] = 'required|date|after:'.Carbon::now()->subDay()->format('Y-m-d');
            $validate['image'] = 'required|file|mimes:jpeg,png';
            $validate['description'] = 'required';
        }
        return $validate;
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng điền dữ liệu cho tên danh mục',
            'image.required' => 'Vui lòng thêm ảnh chỉ mục',
            'description.required' => 'Vui lòng thêm miêu tả',
            'image.mimes' => 'Chỉ chấp nhận file ảnh jpg , png',
            'name.unique' => 'Tiêu đề đã tồn tại, vui lòng chọn tiêu đề khác',
            'created_at.required' => 'Vui lòng điền dữ liệu cho thời gian',
            'created_at.after' => 'Vui lòng không nhập thời gian nhỏ hơn hiện tại 1 ngày'

        ];
    }
}
