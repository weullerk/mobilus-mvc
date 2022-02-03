<?php

declare(strict_types=1);

namespace Application\Services;

use Carbon\Carbon;
use Laminas\Http\Client;
use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\Hydrator\NamingStrategy\MapNamingStrategy;

use Application\Interfaces\Covid19Api;
use Application\Models\CovidCase;

class Covid19Service
{
    public function parseCases(array $covidCasesArray): array {
        foreach($covidCasesArray as $key => &$case) {
            if ($key === 0)
                $case->setDailyCases(0);
            else
                $case->setDailyCases($case->getCases() - $covidCasesArray[$key - 1]->getCases());
        }

        return array_reverse($covidCasesArray);
    }

    public function getMediaMovel(array $casesArray): float {
        $cases = 0;

        foreach($casesArray as $case) {
            $cases += $case->getDailyCases();
        }

        return $cases / 7;
    }

    public function getMediaMovelUltimasDuasSemanas(array $covidCasesArray): array {
        $startDate = null;
        $covidCasesForMedia = [];

        $mediasMoveis = [];
        $weeksProccessed = 0;

        $parsedCovidCasesArray = $this->parseCases($covidCasesArray);

        foreach ($parsedCovidCasesArray as &$case) {
            if ($weeksProccessed > 1)
                break;

            if (abs($case->getDate()->diffInDays($startDate)) > 6) {
                $weeksProccessed += 1;

                $mediasMoveis[] = [
                    'media' => $this->getMediaMovel($covidCasesForMedia),
                    'casos' => $covidCasesForMedia,
                ];

                $startDate = null;
                $covidCasesForMedia = [];
            }

            if ($startDate == null) {
                $startDate = $case->getDate();
            }

            $covidCasesForMedia[] = &$case;
        }

        return $mediasMoveis;
    }
}
