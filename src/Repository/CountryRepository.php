<?php

namespace WithLoveScotland\Repository;

use WithLoveScotland\Exception\CountryException;
use WithLoveScotland\Entity\Country;
use WithLoveScotland\Factory\CountryList;

class CountryRepository
{
    /** @var Country[] $countries */
    private $countries;

    /**
     * CountryRepository constructor.
     */
    public function __construct()
    {
        $list = new CountryList();
        $this->countries = $list->getCountries();
    }

    /**
     * @return Country[]
     */
    public function findAllCountries(): array
    {
        $countries = [];

        foreach ($this->countries as $country) {
            $countries[] = $this->createFromArray($country);
        }

        return $countries;
    }

    /**
     * @param string $id
     * @return Country
     * @throws CountryException
     */
    public function findCountryByIsoCode(string $id): Country
    {
        if (isset($this->countries[$id])) {
            return $this->createFromArray($this->countries[$id]);
        }

        throw new CountryException(CountryException::ERROR_NOT_FOUND);
    }

    /**
     * @param string $id
     * @return Country
     * @throws CountryException
     */
    public function findCountryBy(string $key, string $value): Country
    {
        foreach ($this->countries as $country) {
            if ($country[$key] === $value) {
                return $this->createFromArray($this->countries[$id]);
            }
        }

        throw new CountryException(CountryException::ERROR_NOT_FOUND);
    }

    /**
     * @param array $data
     * @return Country
     */
    public function createFromArray(array $data): Country
    {
        $country = new Country();
        $country->setId($data['id']);
        $country->setIso($data['iso']);
        $country->setName($data['name']);
        $country->setNumCode($data['numcode']);
        $country->setFlag($data['flag']);

        return $country;
    }
}