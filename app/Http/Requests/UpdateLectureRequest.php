<?php

namespace App\Http\Requests;

use App\Models\Lecture;
use Illuminate\Validation\Rule;

class UpdateLectureRequest extends ApiFormRequest
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
            'topic' => ['string', 'required', 'max:255', Rule::unique(Lecture::class, 'topic')],
            'description' => ['string', 'required', 'max:255'],
        ];
    }
}
