<?php

namespace JosKolenberg\EloquentEmptyDateNullifier\Tests;

use Illuminate\Database\Eloquent\Model;
use JosKolenberg\EloquentEmptyDateNullifier\NullifiesEmptyDates;

class TestModel extends Model
{
    use NullifiesEmptyDates;

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $guarded = [];

    protected $casts = [
        'date_one' => 'date',
        'date_three' => 'date',
    ];

    protected $dates = [
        'date_two',
        'date_three',
        'date_four',
    ];

}
