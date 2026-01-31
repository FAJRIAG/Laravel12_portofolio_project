<?php

namespace App\Traits;

trait Translatable
{
    public function translate($field)
    {
        $locale = app()->getLocale();

        // If generic English, return the default column
        if ($locale == 'en') {
            return $this->$field;
        }

        // Construct the column name for the current locale
        $localizedField = $field . '_' . $locale;

        // Return localized value if it exists and is not empty, otherwise fallback to default
        if (!empty($this->$localizedField)) {
            return $this->$localizedField;
        }

        return $this->$field;
    }
}
