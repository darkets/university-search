<?php
declare(strict_types=1);

namespace App;

class Application
{
    private UniversityAPI $api;

    public function __construct()
    {
        $this->api = new UniversityAPI();
    }

    public function run(): void
    {
        while (true) {
            $country = readline('Enter country: ');

            $universities = $this->api->fetchUniversities($country);
            if (!$universities) {
                echo 'No universities were found' . PHP_EOL;
                continue;
            }

            $this->displayUniversities($universities);
        }
    }

    private function displayUniversities(UniversityCollection $universities): void
    {
        foreach ($universities->get() as $university) {
            /** @var University $university */
            echo "Name: {$university->getName()}" . PHP_EOL;
            foreach ($university->getDomains() as $domain) {
                echo "Domain: $domain" . PHP_EOL;
            }
            echo '---------------' . PHP_EOL;
        }
    }
}
