<?php

namespace Application\Models;

use Carbon\Carbon;

class CovidCase
{
    private string $country;
    private string $countryCode;
    private ?string $province = null;
    private ?string $city = null;
    private ?string $cityCode = null;
    private string $lat;
    private string $lon;
    private int $cases;
    private ?int $dailyCases = 0;
    private string $status;
    private Carbon $date;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCityCode(): string
    {
        return $this->cityCode;
    }

    /**
     * @param string $cityCode
     */
    public function setCityCode(string $cityCode): void
    {
        $this->cityCode = $cityCode;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLon(): string
    {
        return $this->lon;
    }

    /**
     * @param string $lon
     */
    public function setLon(string $lon): void
    {
        $this->lon = $lon;
    }

    /**
     * @return int
     */
    public function getCases(): int
    {
        return $this->cases;
    }

    /**
     * @param int $cases
     */
    public function setCases(int $cases): void
    {
        $this->cases = $cases;
    }

    /**
     * @return int
     */
    public function getDailyCases(): int
    {
        return $this->dailyCases;
    }

    /**
     * @param int $cases
     */
    public function setDailyCases(int $dailyCases): void
    {
        $this->dailyCases = $dailyCases;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }

    /**
     * @param Carbon $date
     */
    public function setDate(Carbon $date): void
    {
        $this->date = $date;
    }

}