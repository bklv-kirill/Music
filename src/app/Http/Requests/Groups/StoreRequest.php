<?php

namespace App\Http\Requests\Groups;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Style;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:255"],
            "style_id" => ["required", "integer", "min:1", "max:". Style::latest('id')->first()->id],
            "date" => ["required", "after:2024.01.01"],
        ];
    }
}
