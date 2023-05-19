<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class CourseSearchRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'course' => 'required|string',
        ];
    }

    public function search()
    {
        $course = $this->input('course');

        $courses = Course::where('name', 'like', "%$course%")
                            ->orWhere('course_code', 'like', "%$course%")
                            ->get();

        return $courses;
    }
}
