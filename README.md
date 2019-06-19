[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/badges/build.png?b=master)](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/build-status/master)
[![Total Downloads](https://poser.pugx.org/joskolenberg/eloquent-empty-date-nullifier/downloads)](https://packagist.org/packages/joskolenberg/eloquent-empty-date-nullifier)
[![Latest Stable Version](https://poser.pugx.org/joskolenberg/eloquent-empty-date-nullifier/v/stable)](https://packagist.org/packages/joskolenberg/eloquent-empty-date-nullifier)
[![License](https://poser.pugx.org/joskolenberg/eloquent-empty-date-nullifier/license)](https://packagist.org/packages/joskolenberg/eloquent-empty-date-nullifier)

# Eloquent Empty Date Nullifier
Little trait to convert "0000-00-00" dates in the database to null when you access them using Eloquent models, useful when you have to deal with (legacy) polluted data.

## Installation
```
composer require joskolenberg/eloquent-empty-date-nullifier
```

## Usage
Add the ```JosKolenberg\EloquentEmptyDateNullifier\NullifiesEmptyDates``` trait to your model, and all your 0000-00-00 dates will be converted to null when accessing them using your eloquent model and during serialization.
```php
use Illuminate\Database\Eloquent\Model;
use JosKolenberg\EloquentEmptyDateNullifier\NullifiesEmptyDates;

class Person extends Model
{
    use NullifiesEmptyDates;

    protected $dates = [
        'date_of_birth',
    ];
}
```
Example:
```php
$person = new Person();

$person->setRawAttributes([
	'date_of_birth' => '0000-00-00',
]);

$person->date_of_birth; // = null
```

## Notes
"0000-00-00" dates can be present in a database when empty values are stored but the column is not set to be nullable. The recommended approach is to make the column nullable and convert all the empty values to null in the database. However, this might not always be possible e.g. when other (external) applications rely on the same data. In that case this package may come in handy.

That's it! Any suggestions or issues? Please contact me!

Happy coding!

Jos Kolenberg <jos@kolenberg.net>
