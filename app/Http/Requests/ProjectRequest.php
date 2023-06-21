<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'min:3|max:255|required',
            'type_id' => 'required',
            'description' => 'required|min:3',
            'project_link' => 'max:255',
            'collaborators' => 'max:255',
            'image_path' => 'max:255',
            'frameworks' => 'max:255',
            'prog_languages' => 'max:255',
            'date_started' => 'date',
            'date_ended' => 'date',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri',
            'title.max' => 'Il titolo può contenere al massimo :max caratteri',
            'type_id.required' => 'Il tipo di progetto è un campo obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'description.min' => 'La descrizione deve contenere almeno :min caratteri',
            'collaborators.max' => 'Il campo può contenere al massimo :max caratteri',
            'frameworks.max' => 'Il campo può contenere al massimo :max caratteri',
            'prog_languages.max' => 'Il campo può contenere al massimo :max caratteri',
            'image_path.max' => 'Il campo può contenere al massimo :max caratteri',
            'date_started.date' => 'La data di inizio deve essere in un formato corretto',
            'date_ended.date' => 'La data di fine deve essere in un formato corretto'

        ];
    }
}
