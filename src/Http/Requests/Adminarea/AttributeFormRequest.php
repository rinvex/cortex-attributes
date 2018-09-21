<?php

declare(strict_types=1);

namespace Cortex\Attributes\Http\Requests\Adminarea;

use Rinvex\Support\Traits\Escaper;
use Illuminate\Foundation\Http\FormRequest;

class AttributeFormRequest extends FormRequest
{
    use Escaper;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     *
     * @return void
     */
    public function withValidator($validator): void
    {
        // Sanitize input data before submission
        $this->replace($this->escape($this->all()));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $attribute = $this->route('attribute') ?? app('rinvex.attributes.attribute');
        $attribute->updateRulesUniques();
        $rules = $attribute->getRules();
        $rules['entities'] = 'nullable|array';

        return $rules;
    }
}
