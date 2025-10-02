<?php

function currency($currency, $type = 'symbol')
{

    $explodeCurrency = explode('-', $currency);

    switch ($type) {
        case 'name':
            return @$explodeCurrency[0];
            break;
        case 'code':
            return @$explodeCurrency[1];
        case 'symbol':
            return @$explodeCurrency[2];
        default:
            return @$explodeCurrency[2];
            break;
    }
}

function formatAmount($amount, $decimals = 2)
{
    return number_format($amount, $decimals);
}

function generateReferenceId()
{
    return random_int(100000000, 999999999);
}

function getAccountNumber()
{
    $fixedPrefix = "300";

    // Generate random 7-digit suffix
    $suffix = rand(0, 9999999);
    $suffix = str_pad($suffix, 7, '0', STR_PAD_LEFT);

    // Concatenate prefix and suffix to form the account number
    $accountNumber = $fixedPrefix . $suffix;

    return $accountNumber;
}

function getRandomNumber($length = 2)
{
    // Define the characters to be used in the random number
    $characters = '0123456789';
    // Initialize an empty string to store the random number
    $randomNumber = '';
    // Loop to generate each digit of the random number
    for ($i = 0; $i < $length; $i++) {
        // Append a random digit to the random number
        $randomNumber .= $characters[rand(0, strlen($characters) - 1)];
    }
    // Return the generated random number
    return $randomNumber;
}

function generateTransferCode($length, $isAlphanumeric = true)
{
    // Define the character set based on the code type
    $characters = $isAlphanumeric ? '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' : '0123456789';

    // Define an empty string to store the generated code
    $code = '';

    // Calculate the length of the character set
    $charLength = strlen($characters);

    // Generate the code by selecting random characters from the character set
    for ($i = 0; $i < $length; $i++) {
        // Select a random index within the character set
        $randomIndex = rand(0, $charLength - 1);

        // Get the character at the random index from the character set
        $randomCharacter = $characters[$randomIndex];

        // Append the random character to the code string
        $code .= $randomCharacter;
    }

    return $code;
}

function limitText($text, $limit = 20)
{
    return str()->limit($text, $limit);
}

function formatDate($date)
{
    return date('d M Y', strtotime($date));
}

function formatTime($time)
{
    return date('h:i A', strtotime($time));
}

function formatDateTime($datetime)
{
    return date('d M Y h:i A', strtotime($datetime));
}

function uploadPath($path, $type = 'user')
{
    return '/uploads/dashboard/' . $type . '/' . $path . '/';
}

/**
 * Generate a random card number with prefix based on card type.
 */
function generateCardNumber($type)
{
    switch ($type) {
        case 'Visa':
            $prefix = '4'; // Visa usually starts with 4
            break;
        case 'Mastercard':
            $prefix = '5'; // Mastercard starts with 5
            break;
        case 'American Express':
            $prefix = '3'; // Amex starts with 3
            break;
        default:
            $prefix = '9';
    }

    // Generate 16-digit number
    $number = $prefix;
    for ($i = 0; $i < 15; $i++) {
        $number .= rand(0, 9);
    }

    return $number;
}

function cardCurrency($currency, $type = 'symbol')
{

    $explodeCurrency = explode(' - ', $currency);

    switch ($type) {
        case 'code':
            return @$explodeCurrency[0];
            break;
        case 'name':
            return @$explodeCurrency[1];
        case 'symbol':
            return @$explodeCurrency[2];
        default:
            return @$explodeCurrency[2];
            break;
    }
}

function cardFee($cardLevel)
{
    $cardLevelsFees = config('setting.cardLevelFees');

    $cardLevelPrice = (int) $cardLevelsFees[$cardLevel];

    return $cardLevelPrice;
}

function cardExpiryDateFormat($date)
{
    return date('m/y', strtotime($date));
}

function getCryptoPriceUSD($id)
{
    // e.g. $id = 'bitcoin' or 'ethereum'
    $url = "https://api.coingecko.com/api/v3/simple/price?ids={$id}&vs_currencies=usd";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    if (isset($data[$id]['usd'])) {
        return $data[$id]['usd'];
    }
    return null;
}
