# Eloquent Empty Date Nullifier
Small trait to convert those 0000-00-00 dates to null when you access them using Eloquent models, useful when you have to deal with a (legacy) polluted database.

Simply add the ```JosKolenberg\EloquentEmptyDateNullifier\NullifiesEmptyDates``` trait to your model, and all your 0000-00-00 dates will be converted to null when accessing them using your eloquent model and during serialization.

That's it! Any suggestions or issues? Please contact me!

Happy coding!

Jos Kolenberg <jos@kolenberg.net>
