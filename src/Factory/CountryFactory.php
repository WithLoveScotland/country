<?php

namespace WithLoveScotland\Factory;

use WithLoveScotland\Entity\Country;
use WithLoveScotland\Repository\CountryRepository;

class CountryFactory
{
    /**
     * @var CountryRepository $countryRepository
     */
    private $countryRepository;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @param string $id
     * @return Country
     */
    public static function generate(string $id): Country
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new CountryFactory();
            $inst->countryRepository = new CountryRepository();
        }

        return $inst->countryRepository->findCountryByIsoCode($id);
    }

    /**
     * @param CountryRepository $countryRepository
     */
    public function setCountryRepository(CountryRepository $countryRepository): void
    {
        $this->countryRepository = $countryRepository;
    }
}
