<?php

namespace Blytd\Support;


class Central
{
    public function __construct(
        private HttpClient $client,
        private string $service_id,
        private string $lang
    ) {}

    public function getExhangeRatio(string $from, string $to)
    {
        return $this->exchange($from, $to, 1);
    }

    public function exchange(string $from, string $to, float $value)
    {
        $params = [
            'from' => $from,
            'to' => $to,
            'value' => $value
        ];

        $request = $this->client->getJson('/currencies/exchange', $params, $this->getHeaders());
        $content = json_decode($request->body->getContents());
        
        return $content->data->value;
    }

    public function exchangeUsingRatio(float $value, float $ratio)
    {
        return $value * $ratio;
    }

    public function getHeaders()
    {
        return [
            'Lang'       => $this->lang,
            'Service-ID' => $this->service_id
        ];
    }
}