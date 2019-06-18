[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/badges/build.png?b=master)](https://scrutinizer-ci.com/g/joskolenberg/eloquent-empty-date-nullifier/build-status/master)
[![Total Downloads](https://poser.pugx.org/joskolenberg/eloquent-empty-date-nullifier/downloads)](https://packagist.org/packages/joskolenberg/eloquent-empty-date-nullifier)
[![Latest Stable Version](https://poser.pugx.org/joskolenberg/eloquent-empty-date-nullifier/v/stable)](https://packagist.org/packages/joskolenberg/eloquent-empty-date-nullifier)
[![License](https://poser.pugx.org/joskolenberg/eloquent-empty-date-nullifier/license)](https://packagist.org/packages/joskolenberg/eloquent-empty-date-nullifier)

# Eloquent Empty Date Nullifier
Small trait to convert those 0000-00-00 dates to null when you access them using Eloquent models, useful when you have to deal with a (legacy) polluted database.

Simply add the ```JosKolenberg\EloquentEmptyDateNullifier\NullifiesEmptyDates``` trait to your model, and all your 0000-00-00 dates will be converted to null when accessing them using your eloquent model and during serialization.

That's it! Any suggestions or issues? Please contact me!

Happy coding!

Jos Kolenberg <jos@kolenberg.net>
