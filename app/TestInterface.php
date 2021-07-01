<?php namespace App;

interface TestInterface
{
    /**
     * The following method will return an array of concatenated first and last names of people with names matching the specified gender
     * @param string $gender
     * @return array
     */
    public function returnFullNameOfPeopleWithGender(string $gender): array;

    /**
     * The following method will return all car brand names that have a model that contains the specificied string
     * @param string $string
     * @return array
     */
    public function returnAllBrandNamesWithModelContaining(string $string): array;

    /**
     * The following method will return the sum of all numbers greater than or equal to the specified number
     * @param int $number
     * @return int
     */
    public function returnSumAllNumbersGreaterOrEqualThan(int $number): int;

    /**
     * The following method will return an array of phone numbers ending with the specified string
     * @param string $string
     * @return array
     */
    public function returnPhoneNumberEndingIn(string $string): array;
}
