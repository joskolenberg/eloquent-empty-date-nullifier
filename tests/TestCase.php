<?php

namespace JosKolenberg\EloquentEmptyDateNullifier\Tests;

use Illuminate\Support\Carbon;

class TestCase extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function it_converts_dates_from_the_blacklist_to_null_when_accessing_the_attribute()
    {
        $model = $this->getModel();
        $this->assertNull($model->date_one);
        $this->assertNull($model->date_two);
        $this->assertNull($model->date_three);
        $this->assertInstanceOf(Carbon::class, $model->date_four);
        $this->assertEquals('2019-01-01 12:34:56', $model->date_four->format('Y-m-d H:i:s'));
    }

    /** @test */
    public function it_converts_dates_from_the_blacklist_to_null_when_serializing_to_array()
    {
        $modelArray = $this->getModel()->toArray();
        $this->assertNull($modelArray['date_one']);
        $this->assertNull($modelArray['date_two']);
        $this->assertNull($modelArray['date_three']);
        $this->assertEquals('2019-01-01 12:34:56', $modelArray['date_four']);
    }

    /** @test */
    public function it_converts_dates_from_the_blacklist_to_null_when_serializing_to_json()
    {
        $modelArray = $this->getModel()->toJson();
        $this->assertEquals('{"date_one":null,"date_two":null,"date_three":null,"date_four":"2019-01-01 12:34:56"}', $modelArray);
    }

    /** @test */
    public function it_converts_dates_from_the_blacklist_to_null_when_setting_an_attribute()
    {
        $model = $this->getModel();
        $this->assertEquals('0000-00-00 00:00:00', $model->getAttributes()['date_three']);
        $model->date_three = '0000-00-00 00:00:00';
        $this->assertNull($model->attributesToArray()['date_three']);

        $model = $this->getModel();
        $this->assertEquals('0000-00-00 00:00:00', $model->getAttributes()['date_three']);
        $model->date_three = '2019-02-03 12:34:56';
        $this->assertEquals('2019-02-03 12:34:56', $model->date_three->format('Y-m-d H:i:s'));
    }

    /** @test */
    public function it_converts_dates_from_the_blacklist_to_null_when_filling_an_attribute()
    {
        $model = $this->getModel();
        $this->assertEquals('0000-00-00 00:00:00', $model->getAttributes()['date_three']);
        $model->fill([
            'date_three' => '0000-00-00 00:00:00',
        ]);
        $this->assertNull($model->attributesToArray()['date_three']);

        $model = $this->getModel();
        $this->assertEquals('0000-00-00 00:00:00', $model->getAttributes()['date_three']);
        $model->fill([
            'date_three' => '2019-02-03 12:34:56',
        ]);
        $this->assertEquals('2019-02-03 12:34:56', $model->date_three->format('Y-m-d H:i:s'));
    }

    public function getModel()
    {
        $model = new TestModel();

        $model->setRawAttributes([
            'date_one' => '0000-00-00',
            'date_two' => '0000-00-00',
            'date_three' => '0000-00-00 00:00:00',
            'date_four' => '2019-01-01 12:34:56',
        ]);

        return $model;
    }
}
