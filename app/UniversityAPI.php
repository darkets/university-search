<?php
declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;

class UniversityAPI
{
    const API_URL = 'http://universities.hipolabs.com';

    private Client $client;
    private UniversityCollection $universityCollection;

    public function __construct()
    {
        $this->client = new Client;
        $this->universityCollection = new UniversityCollection();
    }

    public function fetchUniversities(string $country): ?UniversityCollection
    {
        $queryParams = http_build_query(['country' => $country]);
        $url = self::API_URL . '/search?' . $queryParams;

        $response = $this->client->get($url);

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        $data = json_decode((string)$response->getBody());

        if (empty($data)) {
            return null;
        }

        foreach ($data as $university) {
            $uni = new University($university->name, $university->domains);
            $this->universityCollection->add($uni);
        }

        return $this->universityCollection;
    }
}
