<?php

namespace App\Services;

use Google_Client;

class notificationsService
{
    public function getServerKeyToken()
    {
        // Path to your service account key file
       	$keyFilePath = '/home/hstgr-hamdy-srv599157/htdocs/hamdy.srv599157.hstgr.cloud/app/Services/hamdy-ca1c2-firebase-adminsdk-fbsvc-982a77c268.json';

        // Create a Google client
        $client = new Google_Client();
        $client->setAuthConfig($keyFilePath);

        // Set the scopes required for your application
        $client->setScopes([
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/firebase.database',
            'https://www.googleapis.com/auth/firebase.messaging',
        ]);

        // Fetch the access token
        try {
            $client->fetchAccessTokenWithAssertion();
            $accessToken = $client->getAccessToken()['access_token'];

            // Output the Access Token
            // echo "Access Token: " . $accessToken;

            return $accessToken;
        } catch (\Exception $e) {
            echo 'Error getting access token: ',  $e->getMessage();
            return null;
        }
    }
}
