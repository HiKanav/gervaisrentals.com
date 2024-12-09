<?php

namespace App\Helpers;

class MetricsHelper
{
    public static function fetchQueryParam($metrics)
    {
        $queryParams = array_diff_key($metrics, ['source_referrer' => true, 'lead_type' => true, 'entry_url' => true,  'ip' => true, 'anycast' => true, 'hostname' => true, 'bogon' => true, 'city' => true, 'region' => true, 'country' => true, 'loc' => true, 'postal' => true, 'timezone' => true, 'org' => true, 'readme' => true]);
        if(count($queryParams) == 1 && isset($queryParams['source'])) return [];
        return $queryParams;
    }

    public static function fetchLocationDetails($metrics) 
    {
        return array_intersect_key($metrics, array_flip(['ip', 'city', 'region', 'country', 'loc', 'postal', 'timezone', 'anycast', 'hostname', 'org']));
    }

    public static function getKeyValue($obj)
    {
        return (key($obj) . ': ' . substr(current($obj), 0, 25));
    }

    public static function getLeadTypes()
    {
        return [
            'Google' => [
                'urls' => ['www.google.com', 'syndicatedsearch.goog', 'www.google.ca'],
                'possible_matches' => ['gclid', 'keyword']
            ],
            'Instagram' => [
                'urls' => ['l.instagram.com'],
                'possible_matches' => ['fbclid']
            ],
            'Bing' => [
                'urls' => ['www.bing.com']
            ],
            'DuckDuckGo' => [
                'urls' => ['duckduckgo.com']
            ],
            'Yahoo' => [
                'urls' => ['nz.search.yahoo.com']
            ],
        ];
    }

    public static function getLeadType($sourceReferrer, $queryParams)
    {
        $leadTypes = self::getLeadTypes();

        $domain = $sourceReferrer ? parse_url($sourceReferrer, PHP_URL_HOST) : '';

        return array_reduce(array_keys($leadTypes), function($carry, $key) use ($leadTypes, $domain) {
            return $carry ?: ((in_array($domain, $leadTypes[$key]['urls']) || in_array('www.' . $domain, $leadTypes[$key]['urls'])) ? $key : null);
        }, null);

    }

    public static function checkDomainForAdParams($queryParams, $array = []) {
        return count(array_filter($array, function($value, $key) use ($array, $queryParams) {
                return isset($queryParams[$value]);
            }, ARRAY_FILTER_USE_BOTH));
    }

    public static function formatOutput($leadType, $location, $referrerDomain = null, $adParam = null)
    {
        return collect(["Lead Type: " . $leadType, $location, ( $referrerDomain ? "Referrer: " . (substr($referrerDomain, 0, 25)) : null ), $adParam])
            ->filter()
            ->implode('</br>');
    }

    public static function formatLabel($value, $storeMetrics = false) 
    {
        $sourceReferrer = $value['source_referrer'] ?? $value['source'] ?? null;
        
        $locationDetails = self::fetchLocationDetails($value);

        $location = !empty($locationDetails) ? (isset($locationDetails['city']) ? 'City: ' . $locationDetails['city'] : self::getKeyValue($locationDetails)) : '';

        $queryParams = self::fetchQueryParam($value);

        $domain = $sourceReferrer ? ( parse_url($sourceReferrer, PHP_URL_HOST) ?? $sourceReferrer ) : '';

        $lead = self::getLeadType($sourceReferrer, $queryParams);

        $referrerDomain = $lead ?? $sourceReferrer;

        // if(count($queryParams) == 0 && isset($value['source'])) return collect(["Lead Type: Organic Lead", $location, "Referrer: " . ( substr($referrerDomain, 0, 25) ?? 'Not Captured')])->filter()->implode('</br>'); 

        if (is_null($sourceReferrer) && empty($queryParams)) {
            if($storeMetrics) return 'Direct Lead';
            return self::formatOutput('Direct Lead', $location);
        }

        if (!empty($queryParams)) {
            $adParam = array_key_exists('keyword', $queryParams) 
                ? 'Keyword: ' . $value['keyword'] 
                : self::getKeyValue($queryParams);

            $adLeadType = self::checkDomainForAdParams($queryParams, $lead ? self::getLeadTypes()[$lead]['possible_matches'] : []) ? $lead . ' Ads' : 'Unknown';
            $isLeadGmb = ($queryParams['utm_campaign'] ?? '') === 'local' && $lead == 'Google';
            $leadType = $isLeadGmb ? 'GMB' : $adLeadType;
            if($storeMetrics) {
                return  $isLeadGmb ? 'GMB' : ($isLeadGmb !== 'Unknown' ? 'Ads' : null)  ;
            }

            return self::formatOutput($leadType, $location, $referrerDomain, $adParam);
        }

        if($storeMetrics) return 'Organic Lead';
        return self::formatOutput('Organic Lead', $location, $referrerDomain);
    }
}
