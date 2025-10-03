<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f6f9;
                margin: 0;
                padding: 0;
                color: #333;
            }

            .container {
                max-width: 650px;
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
                color: #3c4ed1;
                font-size: 18px;
                margin-top: 10px;
            }

            .content p {
                line-height: 1.6;
                font-size: 14px;
            }

            .box {
                background: #f8f9fd;
                border-radius: 6px;
                padding: 16px;
                margin: 20px 0;
            }

            .box h3 {
                margin-top: 0;
                font-size: 14px;
                font-weight: bold;
            }

            .details {
                border: 1px solid #e0e0e0;
                border-radius: 6px;
                margin-top: 10px;
                overflow: hidden;
            }

            .details-header {
                background: #3c4ed1;
                color: #fff;
                padding: 10px;
                font-weight: bold;
                font-size: 14px;
            }

            .details table {
                width: 100%;
                border-collapse: collapse;
            }

            .details td {
                padding: 10px;
                font-size: 13px;
                border-top: 1px solid #eee;
            }

            .details td:first-child {
                font-weight: bold;
                width: 35%;
                background: #fafafa;
            }

            .cta {
                text-align: center;
                margin: 20px 0;
            }

            .cta a {
                background: #3c4ed1;
                color: #fff;
                text-decoration: none;
                padding: 12px 24px;
                border-radius: 6px;
                font-size: 14px;
                display: inline-block;
            }

            .important {
                background: #fff8e5;
                border-left: 4px solid #f7c948;
                padding: 12px;
                font-size: 14px;
                margin: 20px 0;
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
                <p>Welcome to {{ config('app.name') }}</p>
                <small>Your Financial Journey Begins Today</small>
            </div>

            <!-- Body -->
            <div class="content">
                <p>Welcome, {{ $user->name }} {{ $user->middle_name }} {{ $user->last_name }},</p>
                <h2>Your Account Is Ready</h2>
                <p>
                    We're thrilled to have you join our community of valued customers.
                </p>
                <p>
                    Thank you for choosing {{ config('app.name') }} as your trusted financial partner.
                    We are committed to providing exceptional service and innovative financial solutions
                    tailored to your unique financial needs.
                </p>
                <p>
                    Your journey toward financial success begins now, and we're here to support you every step of the
                    way.
                </p>

                <!-- What's Next -->
                <div class="box">
                    <h3>What's Next?</h3>
                    <ul>
                        <li>Log in with your credentials</li>
                        <li>Review your account details</li>
                        <li>Explore available financial services</li>
                    </ul>
                </div>

                <!-- Account Details -->
                <div class="details">
                    <div class="details-header">Your Account Details</div>
                    <table>
                        <tr>
                            <td>Account Name</td>
                            <td>{{ $user->name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>{{ $user->account_number }}</td>
                        </tr>
                        <tr>
                            <td>Account Type</td>
                            <td>{{ $user->account_type }}</td>
                        </tr>
                        <tr>
                            <td>Currency</td>
                            <td>{{ currency($user->currency, 'code') }}</td>
                        </tr>
                        <tr>
                            <td>Created On</td>
                            <td>{{ formatDateTime($user->created_at) }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Online Banking Access -->
                <div class="details">
                    <div class="details-header">Online Banking Access</div>
                    <table>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>Your chosen password</td>
                        </tr>
                    </table>
                </div>

                <!-- Call to Action -->
                <div class="cta">
                    <a href="{{ route('login') }}">Access Your Account Now</a>
                </div>

                <!-- Important -->
                <div class="important">
                    <strong>Personalized Support:</strong>
                    For detailed information about our products or services, please visit our website or contact our
                    dedicated support team at
                    <a href="mailto:{{ config('app.email') }}">{{ config('app.email') }}</a>.
                </div>

                <p><strong>Our Commitment to You</strong><br>
                    {{ config('app.name') }} is dedicated to being your reliable financial institution, with a mission
                    to make your financial goals achievable.
                    Our services are designed with you in mind, providing security, innovation, and customer-focused
                    solutions to help you thrive financially.</p>

                <p>Thank you for banking with us<br>
                    <strong>The {{ config('app.name') }} Team</strong>
                </p>
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
