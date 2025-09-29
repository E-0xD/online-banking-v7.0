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
                background-color: #cc0000;
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
                color: #cc0000;
            }

            p {
                font-size: 16px;
                margin-bottom: 20px;
                line-height: 1.5;
            }

            .reason-box {
                background-color: #ffeeee;
                border-left: 4px solid #cc0000;
                padding: 15px;
                margin: 20px 0;
                border-radius: 4px;
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
                <h1>Card Application Rejected</h1>
            </div>

            <!-- Content -->
            <div class="content">
                <h2>Hello {{ $user->name }} {{ $user->last_name }},</h2>
                <p>We regret to inform you that your application for a <strong>{{ $card->card_type }} -
                        {{ $card->card_level }}</strong> card has been <strong>rejected</strong>.</p>

                <div class="reason-box">
                    <p><strong>Reason:</strong>
                        {{ 'Your application did not meet the required verification criteria.' }}</p>
                </div>

                <p>If you believe this is an error or would like to reapply, please contact our support team for further
                    assistance.</p>

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