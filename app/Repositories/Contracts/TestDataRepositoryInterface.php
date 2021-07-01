<?php

namespace App\Repositories\Contracts;

interface TestDataRepositoryInterface
{
    public function getCars(): array;

    public function getPeople(): array;

    public function getNumbers(): array;

    public function getPhoneNumbers(): array;
}
