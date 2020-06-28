<?php

namespace WithLoveScotland\Exception;

use Exception;

class CountryException extends Exception
{
    const ERROR_NOT_FOUND = 'Country not found.';
}