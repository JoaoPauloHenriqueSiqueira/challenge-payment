<?php

namespace App\Services\External\Contract;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class RequestContract
{
    protected $client;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function request(string $method, string $url, ?array $body = null)
    {
        try {
            $bodyRequest = ['timeout' => 10];

            if ($body) {
                $bodyRequest['body'] = $body;
            }

            $client = new Client(
                [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ]
            );
            $response = $client->request(
                $method,
                $url,
                $bodyRequest
            );

            if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 299) {

                if ($method == 'DELETE') {
                    return $response->getStatusCode();
                }

                $result = json_decode($response->getBody()->getContents(), true);
                return $result;
            }
        } catch (ConnectException $e) {
            return $e;
        } catch (ClientException $e) {
            return $e;
        } catch (RequestException $e) {
            return $e;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
