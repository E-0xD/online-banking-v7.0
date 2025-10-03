<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <style>
            body {
                background-color: #f4f4f7;
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .email-wrapper {
                width: 100%;
                padding: 20px;
                background-color: #f4f4f7;
            }

            .email-content {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
                padding: 30px;
                color: #333333;
            }

            h1 {
                font-size: 20px;
                margin-bottom: 20px;
                color: #111111;
            }

            p {
                line-height: 1.6;
                margin: 10px 0;
            }

            .code-box {
                background-color: #f0f0f0;
                border: 1px solid #dddddd;
                font-size: 22px;
                font-weight: bold;
                letter-spacing: 3px;
                text-align: center;
                padding: 15px;
                margin: 20px 0;
                border-radius: 6px;
            }

            .footer {
                font-size: 12px;
                color: #777777;
                margin-top: 30px;
                border-top: 1px solid #eeeeee;
                padding-top: 15px;
                text-align: center;
            }

            .important {
                font-weight: bold;
                color: #d9534f;
            }
        </style>
    </head>

    <body>
        <div class="email-wrapper">
            <div class="email-content">
                <h1>Two-Factor Authentication</h1>
                <p>Hello {{ $user->name }} {{ $user->middle_name }} {{ $user->last_name }},</p>
                <p>
                    You are receiving this email because you are attempting to log in to your account at
                    <strong>{{ config('app.name') }}</strong>.
                </p>
                <p>Please use the following code to complete your login:</p>
                <div class="code-box">{{ $user->email_code }}</div>
                <p>This code will expire in 10 minutes.</p>
                <p class="important">
                    Important: If you did not request this code, please ignore this email and consider changing
                    your password immediately.
                </p>
                <p>Thank you,<br>The {{ config('app.name') }} Team</p>
                <div class="footer">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
                    This is an automated message, please do not reply to this email.
                </div>
            </div>
        </div>
    </body>

</html>
