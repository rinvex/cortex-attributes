<?php

declare(strict_types=1);

namespace Cortex\Attributes\Transformers\Adminarea;

use League\Fractal\TransformerAbstract;
use Rinvex\Attributes\Models\Attribute;

class AttributeTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(Attribute $attribute): array
    {
        return [
            'id' => (int) $attribute->getKey(),
            'name' => (string) $attribute->name,
            'type' => (string) trans('cortex/attributes::common.'.$attribute->type),
            'slug' => (string) $attribute->slug,
            'group' => (string) $attribute->group,
            'is_collection' => (bool) $attribute->is_collection,
            'default' => (string) $attribute->default,
            'created_at' => (string) $attribute->created_at,
            'updated_at' => (string) $attribute->updated_at,
        ];
    }
}
