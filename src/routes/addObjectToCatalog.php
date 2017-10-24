<?php

$app->post('/api/ThreadGenius/addObjectToCatalog', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','catalogId','imageObject']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'apiKey','catalogId'=>'catalogId','imageObject'=>'imageObject'];
    $optionalParams = ['metadata'=>'metadata'];
    $bodyParams = [
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);


    $client = $this->httpClient;
    $query_str = "https://api.threadgenius.co/v1/catalog/{$data['catalogId']}/object";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['auth'] = [$data['apiKey'],''];

    foreach($data['imageObject'] as $key => $value)
    {
        $image  = '';
        if(!empty($value['imageUrl']))
        {
            $image['image'] = ['url' => $value['imageUrl']];
        }


        if(!empty($value['cropX2']) && !empty($value['cropX1']) && !empty($value['cropY2']) && !empty($value['cropY1']))
        {

            $image['image']['crop'] = array(floatval($value['cropX1']),floatval($value['cropX2']),floatval($value['cropY1']),floatval($value['cropY2']));
        }

        $requestParams['json']['objects'][] = $image;
    }

    if(!empty($data['metadata']))
    {
        $requestParams['json']['metadata'] = $data['metadata'];
    }


    try {
        $resp = $client->post($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});