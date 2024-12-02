<?php

declare(strict_types=1);

namespace App\Controller;

use App\DevTools\PHPStan\IKnowWhatImDoingThisIsAPublicRoute;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FindLocationController
{
    public function __construct(private HttpClientInterface $httpClient, private string $googleMapsApiKey)
    {
    }

    #[Route('/nearby-places', name: 'nearby_places', methods: ['POST'])]
    #[IKnowWhatImDoingThisIsAPublicRoute]
    public function index(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if (!$data) {
            return new JsonResponse(['error' => 'Invalid JSON'], Response::HTTP_BAD_REQUEST);
        }

        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $radius = 1000;

        if (!$latitude || !$longitude) {
            return new JsonResponse(['error' => 'Latitude and longitude are required'], Response::HTTP_BAD_REQUEST);
        }

        $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json';

        $response = $this->httpClient->request('GET', $url, [
            'query' => [
                'location' => "{$latitude},{$longitude}",
                'radius' => $radius,
                'key' => $this->googleMapsApiKey,
            ],
        ]);

        $data = $response->toArray();

        $places = [];

        foreach ($data['results'] ?? [] as $result) {
            $places[] = [
                'id' => $result['place_id'],
                'name' => $result['name'],
                'latitude' => $result['geometry']['location']['lat'],
                'longitude' => $result['geometry']['location']['lng'],
            ];
        }

        /* ---- For testing purpose ----- */
        /*
        $data['results'] = [1,2,3,4,5,6,7,8,9,10];

        $places = [];
        $i = 1;
        foreach($data['results'] ?? [] as $result) {
            $places[] = [
                'id' => $result['place_id'] ?? $i,
                 'name' => $result['name'] ?? $i.' Address found by google search',
                 'latitude' => $result['geometry']['location']['lat'] ?? 51.509865,
                 'longitude' => $result['geometry']['location']['lng'] ?? -0.118092
            ];
            $i++;
        }
        */

        return new JsonResponse($places);
    }
}
