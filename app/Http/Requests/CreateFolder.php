<?php

namespace App\Http\Requests;

//FormRequestクラス＝バリデーション等のルール設定するクラス
use Illuminate\Foundation\Http\FormRequest;

class CreateFolder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *とりあえずトゥルー
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * バリデーションルールを定義する
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:20'
            //
        ];
    }

    //attributesで表示の名前を定義する
    public function attributes()
    {

        return [
            'title' => 'フォルダ名',
        ];
    }


}
