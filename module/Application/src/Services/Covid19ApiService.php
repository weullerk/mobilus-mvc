<?php

declare(strict_types=1);

namespace Application\Services;

use Carbon\Carbon;
use Laminas\Http\Client;
use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\Hydrator\NamingStrategy\MapNamingStrategy;

use Application\Interfaces\Covid19Api;
use Application\Models\CovidCase;

class Covid19ApiService implements Covid19Api
{
    private $lastSixMonthsUri = 'https://localhost:7235/last-six-months';

    private $httpClientOptions = array(
        'adapter' => 'Zend\Http\Client\Adapter\Socket',
        'persistent' => false,
        'sslverifypeer' => false,
        'sslallowselfsigned' => false,
        'sslusecontext' => false,
        'ssl' => array(
            'verify_peer' => false,
            'allow_self_signed' => true,
            'capture_peer_cert' => true,
        ),
        'useragent' => 'Mobilus MVC',
    );

    public function getLastSixMonthsCase(): array {
        $client = new Client($this->lastSixMonthsUri, $this->httpClientOptions);

        $response = $client->send();

        return $this->mapCovidCases($response->getBody());
    }

    private function mapCovidCases(string $cases): array {
        $covidCasesArray = [];
        $casesArray = json_decode($cases, true);

        foreach ($casesArray as $case) {
            $covidCase = new CovidCase();
            $covidCase->setCountry($case['country']);
            $covidCase->setCountryCode($case['countryCode']);
            $covidCase->setProvince($case['province']);
            $covidCase->setCity($case['city']);
            $covidCase->setCityCode($case['cityCode']);
            $covidCase->setLat($case['lat']);
            $covidCase->setLon($case['lon']);
            $covidCase->setCases($case['cases']);
            $covidCase->setStatus($case['status']);
            $covidCase->setDate(new Carbon($case['date']));

            $covidCasesArray[] = $covidCase;
        }

        return $covidCasesArray;
    }
}
