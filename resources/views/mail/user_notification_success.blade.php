<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f6f9;
                margin: 0;
                padding: 0;
                color: #333;
            }

            .container {
                max-width: 600px;
                margin: 40px auto;
                background: #fff;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .header {
                background: linear-gradient(135deg, #3c4ed1, #5b6ff5);
                color: #fff;
                text-align: center;
                padding: 24px;
            }

            .header h1 {
                margin: 0;
                font-size: 20px;
            }

            .header p {
                margin: 4px 0 0;
                font-size: 14px;
            }

            .content {
                padding: 24px;
            }

            .content h2 {
                margin-top: 0;
                font-size: 16px;
            }

            .code-box {
                text-align: center;
                background: #f8f9fd;
                padding: 20px;
                font-size: 28px;
                font-weight: bold;
                color: #3c4ed1;
                letter-spacing: 6px;
                border-radius: 6px;
                margin: 20px 0;
            }

            .important {
                background: #fff8e5;
                border-left: 4px solid #f7c948;
                padding: 12px;
                font-size: 14px;
                margin-bottom: 20px;
            }

            .footer {
                font-size: 12px;
                color: #777;
                border-top: 1px solid #e0e0e0;
                padding: 16px 24px;
                text-align: center;
                background: #fafafa;
            }

            .footer a {
                color: #3c4ed1;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <!-- Header -->
            <div class="header">
                <h1>{{ config('app.name') }}</h1>
            </div>

            <!-- Body -->
            <div class="content">
                <h2>Hello {{ $user->name }},</h2>

                <p>{{ $notification->description }}</p>

                <p>If you have any questions or need further assistance, please feel free to contact us.</p>
            </div>

            <!-- Footer -->
            <div class="footer">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
                If you have any questions, please contact
                <a href="mailto:{{ config('app.email') }}">{{ config('app.email') }}</a>.
            </div>
        </div>
    </body>

</html>
