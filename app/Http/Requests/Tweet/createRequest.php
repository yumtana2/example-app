<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
            'tweet' => 'required|max:140'
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
}
