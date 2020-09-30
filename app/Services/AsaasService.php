<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Helpers\Util;
use GuzzleHttp\Exception\RequestException;

class AsaasService
{

    public static function createCustomer($customer)
    {
        $data = [
            'name' => $customer->name,
            'email' => $customer->email,
            'phone' => Util::sanitizeString($customer->phone),
            'mobilePhone' => Util::sanitizeString($customer->mobile_phone),
            'cpfCnpj' => Util::sanitizeString($customer->cpf_cnpj),
            'postalCode' => Util::sanitizeString($customer->zipcode),
            'address' => $customer->address,
            'addressNumber' => $customer->address_number,
            'complement' => $customer->address_complement,
            'province' => $customer->province,
            'externalReference' => $customer->id,
            'municipalInscription' => $customer->municipal_inscription,
            'stateInscription' => $customer->state_inscription,
            'observations' => $customer->observatinos
        ];

        return self::AsaasRequest('post', '/customers', $data);
    }

    public static function AsaasRequest($method, $endpoint, $payload)
    {
        $client = new Client();
        $url = env('ASAAS_SB_URL') . $endpoint;

        try {
            $request = $client->request($method, $url, [
                'headers' => [
                    'access_token' => env('ASAAS_SB_KEY')
                ],
                'json' => $payload
            ]);

            $response = $request->getBody()->getContents();

            $responseData = json_decode($response);

            return [
                'object' => $responseData,
                'success' => true,
                'message' => null
            ];
        } catch (RequestException $e) {

            $errors = json_decode($e->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            return [
                'object' => $errors,
                'success' => false,
                'message' => null
            ];
        }
    }
}
