<?php namespace App;

use App\Repositories\Contracts\TestDataRepositoryInterface;

class Test implements TestInterface
{
    /**
     * @var TestDataRepositoryInterface
     */
    protected TestDataRepositoryInterface $testDataRepository;

    /**
     * Test constructor.
     * @param TestDataRepositoryInterface $testDataRepository
     */
    public function __construct(TestDataRepositoryInterface $testDataRepository)
    {
        $this->testDataRepository = $testDataRepository;
    }

    /**
     * @param string $gender
     * @return array
     */
    public function returnFullNameOfPeopleWithGender(string $gender): array
    {
        // TODO: Implement returnFullNameOfPeopleWithGender() method.
        //Retrieve all people from the mock function (instead of the actual JSON file)
        $people = $this->testDataRepository->getPeople();
        //Array to eventually save the people in with the specified gender
        $names = array();

        //Loop through all people and check the gender of every single person
        foreach ($people as $person) {
            //Is de gender matching with the specified gender, then save the person in the names array
            if($person['gender'] == $gender) {
                array_push($names, $person['first-name'] . ' ' . $person['last-name']);
            }
        }

        //Return the list of names of people with the specified gender
        return $names;
    }

    /**
     * @param string $string
     * @return array
     */
    public function returnAllBrandNamesWithModelContaining(string $string): array
    {
        // TODO: Implement returnAllCarModelsContaining() method.
        //Retrieve all cars from the mock function (instead of the actual JSON file)
        $cars = $this->testDataRepository->getCars();
        //Array to eventually save the car brands in with the specified model
        $brands= array();
        //Loop through all cars and check the models of every single car brand
        foreach($cars['brands'] as $i => $car) {
            foreach ($cars['brands'][$i]['models'] as $model){
                //Is a car model of the current brand matching with the specified model? Then save the car brand to the brands array
                if(strpos($model, $string) !== false){
                    array_push($brands, $i);
                }
            }
        }
        //Return the list of car brands that have cars of the specified model.
        return $brands;
    }

    /**
     * @param int $number
     * @return int
     */
    public function returnSumAllNumbersGreaterOrEqualThan(int $number): int
    {
        // TODO: Implement returnAllNumbersGreaterOrEqualThan() method.
        //Retrieve all numbers from the mock function (instead of the actual JSON file)
        $numbers = $this->testDataRepository->getNumbers();
        //Array to eventually save the numbers is which are greater or equal than the specified number
        $numbersGreaterThan = array();

        //Loop through all numbers and check if the number is greater of equal to the specified number
        foreach ($numbers as $num){
            if ($num >= $number){
                //Is the number greater than the specified number? Then save the number to the numbersGreaterThan array
                array_push($numbersGreaterThan, $num);
            }
        }

        //Save the sum of all the numbers that are greater or equal in a variable
        $sum = array_sum($numbersGreaterThan);

        //Return the sum of the numbers
        return $sum;
    }

    /**
     * @param string $string
     * @return array
     */
    public function returnPhoneNumberEndingIn(string $string): array
    {
        // TODO: Implement returnPhoneNumberEndingIn() method.
        //Retrieve all phonenumbers from the mock function (instead of the actual JSON file)
        $phoneNumbers = $this->testDataRepository->getPhoneNumbers();

        //Loop through all phonenumbers and check if the phonenumber is ending with the specified string
        foreach ($phoneNumbers as $i => $phoneNumber) {
            //Save the length of the specified string
            $length = strlen($string);

            //Use the substr function to compare the last characters with the specified string
            //Does the remaining substring NOT match with the specified string? Then remove the phonenumber from the phoneNumbers array.
            if (substr( $phoneNumber, -$length ) != $string){
                unset($phoneNumbers[$i]);
            }
        }

        //Return the remaining list of phonenumbers that are ending with the specified string.
        return $phoneNumbers;
    }
}
