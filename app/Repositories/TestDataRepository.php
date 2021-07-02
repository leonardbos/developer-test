<?php namespace App\Repositories;

use App\Repositories\Contracts\TestDataRepositoryInterface;

class TestDataRepository implements TestDataRepositoryInterface
{
    private array $decoded = [''];

    public function getCars(): array
    {
        return $this->_getFromFile('cars');
    }

    public function getPeople(): array
    {
        return $this->_getFromFile('people');
    }

    public function getNumbers(): array
    {
        return $this->_getFromFile('numbers');
    }

    public function getPhoneNumbers(): array
    {
        return $this->_getFromFile('phone-numbers');
    }

    private function _getFromFile(string $key): array
    {
        if ( ! $this->decoded ) {
            $this->decoded = json_decode(resource_path('resources/test-data/test-data.json'), true);
        }

        return $this->decoded[ $key ] ?? [];
    }
}
