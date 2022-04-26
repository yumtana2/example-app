<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'tweet' => 'required|max:140',
            'images' => 'array|max:4',
            // images配列の中身に対しての制約は[.*]を使って宣言する
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function tweet(): string
    {
        return $this->input('tweet');
    }

    // Requestクラスのuser関数でログインしてるユーザーが取得できる
    public function userId(): int
    {
        return $this->user()->id;
    }

    public function images(): array
    {
        // ファイル投稿なので、inputではなくfileで取得する
        return $this->file('images', []);
    }
}
