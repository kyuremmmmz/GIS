<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleAnalyticsService
{
    protected $client;
    protected $trackingId;

    public function __construct()
    {
        $this->client = new Client();
        $this->trackingId = 'YOUR_TRACKING_ID'; // Replace with your Google Analytics Tracking ID
    }

    public function trackEvent($category, $action, $label = null, $value = null)
    {
        $url = 'https://www.google-analytics.com/collect';
        $payload = [
            'v' => '1',
            'tid' => $this->trackingId,
            'cid' => uniqid(),
            't' => 'event',
            'ec' => $category,
            'ea' => $action,
            'el' => $label,
            'ev' => $value,
        ];

        $response = $this->client->post($url, [
            'form_params' => $payload,
        ]);

        return $response->getStatusCode(); // Return the status code
    }
}
