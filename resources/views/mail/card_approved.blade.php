<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .header {
                background-color: #003366;
                color: #ffffff;
                padding: 20px;
                text-align: center;
            }

            .logo {
                text-align: center;
                margin-bottom: 20px;
            }

            .logo img {
                max-width: 200px;
            }

            .content {
                padding: 30px;
                color: #333;
            }

            h2 {
                font-size: 24px;
                margin-bottom: 20px;
                color: #003366;
            }

            p {
                font-size: 16px;
                margin-bottom: 20px;
                line-height: 1.5;
            }

            .button {
                display: inline-block;
                padding: 12px 24px;
                background-color: #4CAF50;
                color: #fff;
                text-decoration: none;
                border-radius: 4px;
                font-size: 16px;
            }

            .button:hover {
                background-color: #45a049;
            }

            .footer {
                background-color: #f5f5f5;
                padding: 20px;
                text-align: center;
                font-size: 14px;
                color: #777;
                line-height: 1.5;
            }

            .footer p {
                margin: 0;
            }

            .signature {
                margin-top: 30px;
                text-align: left;
                color: #888;
                font-style: italic;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <!-- Header -->
            <div class="header">
                <div class="logo">
                    <img src="{{ asset(config('app.assets.logo')) }}" alt="Logo">
                </div>
                <h1>Card Approved</h1>
            </div>

            <!-- Content -->
            <div class="content">
                <h2>Hello {{ $user->name }} {{ $user->last_name }},</h2>
                <p>We are pleased to inform you that your <strong>{{ $card->card_type }} -
                        {{ $card->card_level }}</strong> card has been successfully <strong>approved</strong>.</p>

                <p>Here are the details of your card:</p>
                <ul>
                    <li><strong>Reference ID:</strong> #{{ $card->reference_id }}</li>
                    <li><strong>Card Number:</strong> **** **** **** {{ substr($card->card_number, -4) }}</li>
                    <li><strong>Expiry Date:</strong> {{ formatDate($card->expiry_date) }}</li>
                    <li><strong>Currency:</strong> {{ cardCurrency($card->currency, 'name') }}</li>
                    <li><strong>Daily Limit:</strong>
                        {{ cardCurrency($card->currency) }}{{ formatAmount($card->daily_limit) }}</li>
                </ul>

                <p>You can now start using your card for secure online and offline transactions.</p>

                <p style="text-align: center;">
                    <a href="{{ route('user.card.show', $card->uuid) }}" class="button">View Card Details</a>
                </p>

                <div class="signature">
                    <p>Best regards,<br>
                        {{ config('app.name') }} Team</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </body>

</html>
