<?php
// // enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// // function to parse the .env file manually
function loadEnv($path) {
    if (!file_exists($path)) {
        return null;
    }
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $env = [];
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $env[trim($name)] = trim($value);
    }
    return $env;
}

// // load environment variables
$env = loadEnv(__DIR__ . '/.env');

// // fallback if .env is empty or missing (using the credentials you provided)
$apiKey = $env['MAILJET_USERNAME'] ?? '76412a0bebbda4bbfafb039588641e7e';
$apiSecret = $env['MAILJET_PASSWORD'] ?? '99e62f73a6cca783d0750c87c30382c6';
$senderEmail = $env['MAIL_FROM_ADDRESS'] ?? 'amine.mourali77@gmail.com';
$senderName = $env['MAIL_FROM_NAME'] ?? 'PORTFOLIO';

// // check if request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // // retrieve and sanitize inputs
    $entreprise = htmlspecialchars(strip_tags(trim($_POST['entreprise'] ?? '')));
    $email_client = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $contrat = htmlspecialchars(strip_tags(trim($_POST['contrat'] ?? '')));
    $gratification = htmlspecialchars(strip_tags(trim($_POST['gratification'] ?? '')));
    $message_content = htmlspecialchars(strip_tags(trim($_POST['message'] ?? '')));

    // // validate email
    if (!filter_var($email_client, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Email invalide.";
        exit;
    }

    // // prepare the email content
    $subject = "Nouvelle proposition : $entreprise ($contrat)";
    $textContent = "Entreprise: $entreprise\nEmail: $email_client\nContrat: $contrat\nGratification: $gratification\n\nMessage:\n$message_content";
    
    // // mailjet api payload (v3.1)
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => $senderEmail,
                    'Name' => $senderName
                ],
                'To' => [
                    [
                        'Email' => 'amine.aissyne06@icloud.com', // // your destination email
                        'Name' => 'Amine Aissyne'
                    ]
                ],
                'ReplyTo' => [
                    'Email' => $email_client,
                    'Name' => $entreprise
                ],
                'Subject' => $subject,
                'TextPart' => $textContent,
                // // optional: add an HTML part for better styling
                'HTMLPart' => "<h3>Nouvelle offre de $entreprise</h3>
                               <p><strong>Email:</strong> $email_client</p>
                               <p><strong>Type de contrat:</strong> $contrat</p>
                               <p><strong>Gratification:</strong> $gratification</p>
                               <hr>
                               <p>" . nl2br($message_content) . "</p>"
            ]
        ]
    ];

    // // initialize curl
    $ch = curl_init();

    // // configure curl options for mailjet api
    curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    // // basic auth with api key and secret
    curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:$apiSecret");

    // // execute request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // // check for curl errors
    if (curl_errno($ch)) {
        http_response_code(500);
        echo 'Erreur cURL: ' . curl_error($ch);
    } else {
        curl_close($ch);
        
        // // check mailjet response status
        if ($httpCode >= 200 && $httpCode < 300) {
            http_response_code(200);
            echo "Message envoyé avec succès !";
        } else {
            http_response_code(500);
            // // decode response to see detailed error
            $jsonResp = json_decode($response, true);
            $errorMsg = $jsonResp['ErrorMessage'] ?? 'Erreur inconnue Mailjet';
            echo "Erreur lors de l'envoi ($httpCode): $errorMsg";
        }
    }

} else {
    http_response_code(403);
    echo "Méthode non autorisée.";
}
?>