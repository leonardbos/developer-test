<?php namespace App\Console\Commands;

use App\TestInterface;
use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature = 'run:test';

    protected TestInterface $test;

    public function __construct(TestInterface $test)
    {
        parent::__construct();
        $this->test = $test;

    }

    public function handle()
    {
        dump($this->test->returnFullNameOfPeopleWithGender('male'));
        dump($this->test->returnAllBrandNamesWithModelContaining('03'));
        dump($this->test->returnSumAllNumbersGreaterOrEqualThan(500));
        dump($this->test->returnPhoneNumberEndingIn('73'));
    }
}
