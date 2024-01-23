<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasFields
{
    public function getFieldChilds($field)
    {
        $arr = [];

        if (!$field) {
            return null;
        }

        foreach ($this->fields as $f) {
            if ($f->parent_id == $field->id) {
                $arr[] = $f;
            }
        }

        return sizeof($arr) ? collect($arr) : null;
    }

    public function fields()
    {
        return $this->hasMany($this->fieldModel);
    }

    public function getField($identifier)
    {
        $attr = $this->fields->where('name', $identifier)->first();

        return $attr ? $attr->value : null;
    }

    public function field($identifier, $languageId = false, $decodeJson = false)
    {
        $field = $this->fields->where('name', $identifier);

        return $field->first();
    }

    public function getFieldValue($identifier, $languageId = null)
    {
        $field = $this->field($identifier, false);

        return isset($field) ? $field->value : null;
    }

    public static function whereField($name, $value)
    {
        return self::whereHas('fields', function ($q) use ($name, $value) {
            $q->where('name', $name);
            $q->where('value', $value);
        });
    }

    public function getFieldByIdentifier($identifier)
    {
        $field = null;
        foreach ($this->fields as $f) {
            if ($identifier == $f->name) {
                if ($field != null) {
                    if (is_array($field)) {
                        $field[] = $f;
                    } else {
                        $field = [$field, $f];
                    }
                } else {
                    $field = $f;
                }
            }
        }

        return $field;
    }

    public function scopeByField(Builder $query, $name, $value, $operator = '=', $boolean = 'and')
    {
        if ($boolean == 'or') {
            return $query->orWhereHas('fields', function ($q) use ($name, $value, $operator, $boolean) {
                $q
                    ->where('name', $name)
                    ->where('value', $operator, $value);
            });
        }

        return $query->whereHas('fields', function ($q) use ($name, $value, $operator, $boolean) {
            $q
                ->where('name', $name)
                ->where('value', $operator, $value);
        });
    }

    public function scopeWhereFields(Builder $query, $arr, $boolean = 'and')
    {
        if (!$arr) {
            return $query;
        }

        if (!is_array($arr[0])) {
            if (sizeof($arr) > 2) {
                return $query->byField($arr[0], $arr[2], $arr[1], $boolean);
            } else {
                return $query->byField($arr[0], '=', $arr[1], $boolean);
            }
        }

        $condition = 'and';
        foreach ($arr as $k => $v) {
            if (is_array($v)) {
                if (sizeof($v) > 2) {
                    $query->byField($v[0], $v[2], $v[1], $condition);
                } else {
                    $query->byField($v[0], '=', $v[1], $condition);
                }
                $condition = 'and';
            } else {
                $condition = strtolower($v);
            }
        }

        return $query;
    }
}
