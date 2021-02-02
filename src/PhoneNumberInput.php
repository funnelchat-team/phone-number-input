<?php

namespace FunnelchatTeam\PhoneNumberInput;

use Laravel\Nova\Fields\Field;

class PhoneNumberInput extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'phone-number-input';

    public function disabled($disabled = true)
    {
        return $this->withMeta([
            'disabled' => $disabled
        ]);
    }
}
