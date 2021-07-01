<?php

use App\Repositories\Contracts\TestDataRepositoryInterface;
use App\Test;
use Mockery\MockInterface;

class BaseTest extends TestCase
{
    private MockInterface $testDataRepository;

    private Test          $sut;

    public function setUp(): void
    {
        $this->testDataRepository = Mockery::mock(TestDataRepositoryInterface::class);
        $this->sut = new Test($this->testDataRepository);
    }

    public function test_brands()
    {
        $this->testDataRepository->shouldReceive('getCars')->once()->andReturn($this->_getCars());
        $result = $this->sut->returnAllBrandNamesWithModelContaining('03');
        $this->assertEquals(['car1', 'car2'], $result);
    }

    public function test_people_with_gender()
    {
        $this->testDataRepository->shouldReceive('getPeople')->once()->andReturn($this->_getPeople());
        $result = $this->sut->returnFullNameOfPeopleWithGender('male');
        $this->assertEquals(['James Brown'], $result);
    }

    public function test_phonenumbers()
    {
        $this->testDataRepository->shouldReceive('getPhoneNumbers')->once()->andReturn($this->_getPhoneNumbers());
        $result = $this->sut->returnPhoneNumberEndingIn('73');
        $this->assertEquals([4 => '+1-202-555-0173', 5 => '+1-202-521-0173',], $result);
    }

    public function test_numbers()
    {
        $this->testDataRepository->shouldReceive('getNumbers')->once()->andReturn($this->_getNumbers());
        $result = $this->sut->returnSumAllNumbersGreaterOrEqualThan(400);
        $this->assertEquals(1552, $result);
    }

    private function _getCars(): array
    {
        return [
            'brands' => [
                'car1' => [
                    'models' => [
                        'model 01',
                        'model 02',
                        'model 03',
                    ],
                ],
                'car2' => [
                    'models' => [
                        '01 model',
                        '02 model',
                        '03 model',
                    ],
                ],
                'car3' => [
                    'models' => [
                        'model A',
                        'model B',
                        'model C',
                    ],
                ],
            ],
        ];
    }

    private function _getPeople(): array
    {
        return [
            [
                'last-name'  => 'Brown',
                'first-name' => 'James',
                'gender'     => 'male',
            ],
            [
                'last-name'  => 'Patricia',
                'first-name' => 'Patterson',
                'gender'     => 'female',
            ],
        ];
    }

    private function _getPhoneNumbers(): array
    {
        return [
            '+1-202-555-0189',
            '+1-202-102-0157',
            '+1-202-555-0162',
            '+1-202-555-0176',
            '+1-202-555-0173',
            '+1-202-521-0173',
            '+1-202-555-0101',
            '+1-202-555-0174',
        ];
    }

    private function _getNumbers(): array
    {
        return [
            1152,
            200,
            400,
        ];
    }
}
