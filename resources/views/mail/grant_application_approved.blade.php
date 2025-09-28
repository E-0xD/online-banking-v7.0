<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Grant Application Approved</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f7f9fc;
                color: #333;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 30px auto;
                background: #ffffff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
            }

            .header {
                text-align: center;
                border-bottom: 2px solid #eee;
                padding-bottom: 15px;
                margin-bottom: 20px;
            }

            .header h2 {
                color: #28a745;
            }

            .btn {
                display: inline-block;
                background: #28a745;
                color: #fff !important;
                padding: 12px 20px;
                border-radius: 6px;
                text-decoration: none;
                font-weight: bold;
                margin-top: 20px;
            }

            .footer {
                margin-top: 30px;
                font-size: 13px;
                color: #777;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <h2>Grant Application Approved</h2>
            </div>

            <p>Dear {{ $user->name }},</p>

            <p>
                Congratulations! We are pleased to inform you that your <strong>grant application</strong> has been
                successfully approved.
            </p>

            <p>
                You may now access your grant benefits from your account dashboard.
            </p>

            <p style="text-align:center;">
                <a href="{{ route('user.dashboard') }}" class="btn">Go to Dashboard</a>
            </p>

            <p>
                If you require further assistance, please feel free to
                <a href="{{ route('user.support.index') }}">contact our support team</a>.
            </p>

            <p>Thank you for being with us.</p>

            <div class="footer">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </body>

</html>
