<?php

use Sglms\CountryList\Country;

require_once __DIR__ . "/../vendor/autoload.php";

$countries = Country::all();
echo $country   = Country::find('US');
echo "<hr/>";
echo $country   = Country::find('US', 'es');
echo "<hr/>";
echo $country   = Country::find('US', 'de');
echo "<hr/>";

