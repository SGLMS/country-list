<?php

/**
 * Class: Country
 *
 * PHP version  8.2
 *
 * @category  SGLMS_Framework
 * @package   SglmsFramework
 * @author    Jaime C. Rubin-de-Celis <james@sglms.com>
 * @copyright 2020 - 2023, Jaime C. Rubin-de-Celis
 * @license   https://www.sglms.com/ All rights reserved
 * @link      https://www.sglms.com/
 */

namespace Sglms\CountryList;

/**
 * Class: Country
 *
 * @category  SGLMS_Framework
 * @package   SglmsFramework
 * @author    Jaime C. Rubin-de-Celis <james@sglms.com>
 * @copyright 2020 - 2023, Jaime C. Rubin-de-Celis
 * @license   https://www.sglms.com/ All rights reserved
 * @link      https://www.sglms.com/
 */
class Country extends \Rinvex\Country\CountryLoader
{
    protected static $country = null;

    /**
     * Constructor
     *
     * @param mixed $code Country code
     */
    public function __construct($code)
    {
        return self::country($code);
    }

    /**
     * Get all countries
     *
     * @param mixed $longlist Long list
     * @param mixed $hydrate  Hydrate
     *
     * @return array
     */
    public static function all($longlist = false, $hydrate = false): array
    {
        return self::countries($longlist, $hydrate);
    }

    /**
     * Find
     *
     * @param mixed $code Country Code
     *
     * @return (ountry
     */
    public static function find($code)
    {
        return self::country($code, true);
    }

    /**
     * Get country flag
     *
     * @param mixed $code Country code
     *
     * @return string
     */
    public static function flag($code)
    {
        return (self::find($code, true))->getFlag();
    }

    /**
     * Get country name
     *
     * @param mixed   $code   Country code
     * @param ?string $locale Locale
     *
     * @return string
     */
    public static function name($code, ?string $locale = null): string
    {
        $locale = $locale ? strtolower(substr($locale, 0, 2)) : $code;
        $country = self::country($code, true);
        switch ($locale) {
            default:
                $countryName = $country->getName();
                break;
            case 'en':
                $countryName = $country->getName();
                break;
                break;
            case 'es':
            case 'cl':
            case 'co':
            case 'pe':
            case 'mx':
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

    /**
     * Get select options
     *
     * @param mixed $locale Locale
     *
     * @return abbay
     */
    public static function getSelectOptions($locale = null): array
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
