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
                <p>Verify Your Email</p>
                <small>Please verify your email address to continue</small>
            </div>

            <!-- Body -->
            <div class="content">
                <h2>Hello {{ $user->name }} {{ $user->middle_name }} {{ $user->last_name }},</h2>
                <p>
                    Thanks for signing up for {{ config('app.name') }}! To complete your registration
                    and access all features, please verify your email address by entering the
                    verification code below:
                </p>

                <div class="code-box">
                    {{ $user->email_code }}
                </div>

                <div class="important">
                    <strong>Important:</strong> This code will expire in 60 minutes for security reasons.
                    If you don't verify your email within this time, you'll need to request a new code.
                </div>

                <p>
                    If you didn’t create an account with {{ config('app.name') }}, please ignore this
                    email or contact our support team if you have any questions.
                </p>

                <p>This is an automated message, please do not reply to this email.</p>
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
