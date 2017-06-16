<?php

declare(strict_types=1);

namespace Cortex\Attributable\Http\Requests\Backend;

use Cortex\Attributable\Models\Attribute;
use Rinvex\Support\Http\Requests\FormRequest;

class AttributeFormRequest extends FormRequest
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
        $attribute = $this->route('attribute') ?? new Attribute();
        $attribute->updateRulesUniques();

        return $attribute->getRules();
    }
}
