<?php

namespace JosKolenberg\EloquentEmptyDateNullifier\Tests;

use Illuminate\Support\Carbon;
use JosKolenberg\EloquentEmptyDateNullifier\EmptyDateServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            EmptyDateServiceProvider::class,
        ];
    }

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

    public function getModel()
    {
        $model = new TestModel();

        $model->setRawAttributes([
            'date_one' => '0000-00-00 00:00:00',
            'date_two' => '0000-00-00',
            'date_three' => '0000-00-00 00:00:00',
            'date_four' => '2019-01-01 12:34:56',
        ]);

        return $model;
    }
}
