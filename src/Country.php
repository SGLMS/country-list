<?php

namespace Sglms\CountryList;

class Country extends \Rinvex\Country\CountryLoader {

    public function __construct($code)
    {
        return self::country($code);
    }

    public static function find($code, ?string $locale = null)
    {
        $locale = $locale ? strtolower(substr($locale, 0, 2)) : $code;
        $country = self::country($code, true);
        switch($locale) {
            default:
                $countryName = $country->getNativeOfficialName(); break;
            case 'en':
                $countryName = $country->getOfficialName(); break;
                break;
            case 'es':
                $countryName = $country->getTranslations()['spa']['official'];
                break;
            case 'de':
                $countryName = $country->getTranslations()['deu']['official'];
                break;
        }
        return $countryName;
    }

    public static function all(): array
    {
        return self::countries();
    }
}
