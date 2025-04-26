<?php
    
    use Google\Auth\Credentials\ServiceAccountCredentials;
    use Google\Auth\HttpHandler\HttpHandlerFactory;
    
    // echo "<pre>";
    // print_r(array_slice($argv, 5));
    // die();

    $title = $argv[1]; //
    $message = $argv[2]; // Address
    $click_action = $argv[3];
    $image_url = $argv[4];
    $app_icon = $argv[5];
    $pvKey_path = $argv[6];
    $merged_notification_tokens_array = array_slice($argv, 7); // All tokens in array
    

    // $deviceTokens = array('device_token_1', 'device_token_2', 'device_token_3');

    $deviceTokens = $merged_notification_tokens_array;

    // print_r($deviceTokens);
    

    $client_id = '741021253190-2adgfafh3pb5d8gm1cc6od3dlhpkt6a5.apps.googleusercontent.com';
    $client_secret = 'wfmhuj1IB7k3JfiYJa75NUbt';
    $redirect_uri = 'https://doncen-1.firebaseapp.com/__/auth/handler';


    require('vendor/autoload.php');

        $credential = new ServiceAccountCredentials(
            "https://www.googleapis.com/auth/firebase.messaging",
            json_decode(file_get_contents($pvKey_path), true)
        );

        foreach ($deviceTokens as $token) 
        {
            $data = array(
                "message" => array(
                    "token" => $token,
                    "notification" => array(
                        "title" => $title,
                        "body" => $message,
                        "image" => $image_url
                    ),
                    "webpush" => array(
                        "fcm_options" => array(
                            "link" => $click_action
                        )
                    )
                )
            );


            // // Send the notification using the FCM API
            

             $json_data = json_encode($data);
            
            $token = $credential->fetchAuthToken(HttpHandlerFactory::build());

            $ch = curl_init("https://fcm.googleapis.com/v1/projects/doncen-1/messages:send");

                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$token['access_token']
                ]);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "post");

            $response = curl_exec($ch);

            curl_close($ch);

            // echo $response;

            // // Validate the response
            // $decoded_response = json_decode($response, true);
            // if (isset($decoded_response['failure']) || !isset($decoded_response['success'])) {
            //     echo "Failed to send notifications: " . $response;
            // } else {
            //     echo "Successfully sent notifications (message IDs: " . implode(', ', $decoded_response['results']) . ")";
            // }
        }


?>