<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {

    }
}
