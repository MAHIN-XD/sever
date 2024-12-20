<?php
// Initialize cURL session
$curl = curl_init();

// Get user ID from the URL parameter
$uid = $_GET['uid'] ?? '';

// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => "https://shop.garena.sg/api/auth/player_id_login",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        "app_id" => 100067,
        "login_id" => $uid
    ]),
    CURLOPT_HTTPHEADER => [
        "Host: shop.garena.sg",
        "Connection: keep-alive",
        "Content-Type: application/json",
        "User-Agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 7 Pro Build/QKQ1.190915.002) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.6723.107 Mobile Safari/537.36",
        "Accept: application/json, text/plain, */*",
        "sec-ch-ua: \"Chromium\";v=\"130\", \"Android WebView\";v=\"130\", \"Not?A_Brand\";v=\"99\"",
        "sec-ch-ua-mobile: ?1",
        "sec-ch-ua-platform: \"Android\"",
        "Origin: https://shop.garena.sg",
        "Referer: https://shop.garena.sg/",
        "Accept-Encoding: gzip, deflate, br",
        "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8",
        "Cookie: source=mb; region=SG; mspid2=997c3d23769df022fe5ff9e2d38eada8; datadome=kBP4V~6nihMR7D8f6IPzr2ek2IKcwI~l_nYcF38JvTw9UGvb2lIBXydQREn73bCRq_xqAoG8_0NZaCKCApfsGLHW2JUby7g0tp6K0d3vnXQwZGEVKNhDp8HHCPSv5QfU; session_key=rz3qjto41le6epfifek6tvissnsn1xpe"
    ],
    CURLOPT_ENCODING => "", // Automatically handle compressed response
]);

// Execute the request and capture the response
$response = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo json_encode([
        "error" => curl_error($curl),
        "Api By" => "@dm_xyz"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    // Decode the JSON response
    $decodedResponse = json_decode($response, true);

    // Check if the response is valid JSON
    if (is_array($decodedResponse)) {
        $decodedResponse["Api By"] = "@ShinChan7x";

        // Return formatted JSON response
        echo json_encode($decodedResponse, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        // Return raw response if not JSON
        echo json_encode([
            "response" => $response,
            "Api By" => "@dm_xyz"
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

// Close the cURL session
curl_close($curl);
?>
