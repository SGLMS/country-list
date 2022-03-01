<?php

namespace Sglms\CountryList;

class Country extends \Rinvex\Country\CountryLoader
{
    protected static $country = null;
    
    public function __construct($code)
    {
        return self::country($code);
    }

    public static function all($longlist = false, $hydrate = false): array
    {
        return self::countries($longlist, $hydrate);
    }

    public static function find($code)
    {
        return self::country($code, true);
    }
    
    public static function flag($code)
    {
        return (self::find($code, true))->getFlag();
    }
    
    public static function name($code, ?string $locale = null)
    {
        $locale = $locale ? strtolower(substr($locale, 0, 2)) : $code;
        $country = self::country($code, true);
        switch ($locale) {
            default:
                $countryName = $country->getOfficialName(); break;
            case 'en':
                $countryName = $country->getOfficialName(); break;
                break;
            case 'es':
                $countryName = $country->getTranslations()['spa']['common'] ?? $country->getName();
                break;
            case 'de':
                $countryName = $country->getTranslations()['deu']['common'] ?? $country->getName();
                break;
            case 'pt':
                $countryName = $country->getTranslations()['por']['common'] ?? $country->getName();
                break;
            case 'fr':
                $countryName = $country->getTranslations()['fra']['common'] ?? $country->getName();
                break;
            case 'it':
                $countryName = $country->getTranslations()['ita']['common'] ?? $country->getName();
                break;
        }
        return $countryName;
    }

    public static function getSelectOptions($locale = null)
    {
        $locale = $locale ? strtolower(substr($locale, 0, 2)) : 'en';
        $list = static::all();
        foreach ($list as $code => $country) {
            $options [$code] = static::name($code, $locale);
        }
        asort($options);
        return $options;
    }
}
