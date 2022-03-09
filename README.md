# SGLMS Country List

This is a very simple country-list wrapper for php based on [rinvex/countries](https://github.com/rinvex/countries).

We use it for out own projects that require localization.

## Usage

We included localization (translations) as a second parameter for convenience.

```php
$country     = Country::find('us');  // Country Object
$countryName = Country::name('us', 'de');  // Vereinigte Staaten von Amerika
$countryFlag = Country::flag('us');
```

```php
$countrySelectOptionsArray = Country::getSelectOptions('de');
\\ [..., 'us' => "Vereinigte Staaten von Amerika"]
```