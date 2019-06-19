<?php

namespace JosKolenberg\EloquentEmptyDateNullifier;

trait NullifiesEmptyDates
{
    /**
     * Add the date attributes to the attributes array.
     *
     * @param array $attributes
     * @return array
     */
    protected function addDateAttributesToArray(array $attributes)
    {
        foreach ($this->getDates() as $key) {
            if (! isset($attributes[$key])) {
                continue;
            }

            /**
             * Additional check for valid date.
             */
            if (! $this->isValidDate($attributes[$key])) {
                $attributes[$key] = null;

                continue;
            }

            $attributes[$key] = $this->serializeDate($this->asDateTime($attributes[$key]));
        }

        return $attributes;
    }

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    protected function castAttribute($key, $value)
    {
        /**
         * Additional check for valid date if it needs casting
         * to a date. Proceed to normal behaviour otherwise.
         */
        if (in_array($this->getCastType($key), [
                'date',
                'datetime',
                'custom_datetime',
                'timestamp',
            ]) && ! $this->isValidDate($value)) {
            return null;
        }

        return parent::castAttribute($key, $value);
    }

    /**
     * Check if the given value is not on the empty dates blacklist.
     *
     * @param $value
     * @return bool
     */
    protected function isValidDate($value)
    {
        return ! in_array($value, [
            '0000-00-00 00:00:00',
            '0000-00-00',
        ]);
    }

    /**
     * Get a plain attribute (not a relationship).
     *
     * Additional check for valid date. Proceed to
     * normal behaviour when date is valid.
     *
     * @param string $key
     * @return mixed
     */
    public function getAttributeValue($key)
    {
        $value = $this->getAttributeFromArray($key);

        if (in_array($key, $this->getDates()) && ! $this->isValidDate($value)) {
            return null;
        }

        return parent::getAttributeValue($key);
    }

    /**
     * Convert a DateTime to a storable string.
     *
     * Additional check for valid date. Proceed to
     * normal behaviour when date is valid.
     *
     * @param  mixed  $value
     * @return string|null
     */
    public function fromDateTime($value)
    {
        if (! $this->isValidDate($value)) {
            return null;
        }

        return parent::fromDateTime($value);
    }
}