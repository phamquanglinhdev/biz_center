<?php

namespace App\Common;

class EntryCrud
{
    public array $fields = [];
    public string $name;
    public string $label;
    public ?string $id;

    public function __construct(string $name, $label, $id = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id ?? null;
    }

    public function addFiled(array $field): void
    {
        $this->fields[] = $field;
    }
}
