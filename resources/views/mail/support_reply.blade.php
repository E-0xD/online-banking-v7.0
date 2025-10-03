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
                <p>Support Ticket Reply</p>
            </div>

            <!-- Body -->
            <div class="content">
                <p>Hi {{ $user->name }} {{ $user->middle_name }} {{ $user->last_name }},</p>
                <h2>Your Support Ticket Has Been Updated</h2>
                <p>
                    Thank you for reaching out to {{ config('app.name') }} Support. Below is our response to your recent
                    ticket:
                </p>

                <!-- Admin Reply -->
                <div class="box">
                    <h3>Admin Response:</h3>
                    <p>{{ $replyMessage }}</p>
                </div>

                <!-- Ticket Details -->
                <div class="details">
                    <div class="details-header">Support Ticket Details</div>
                    <table>
                        <tr>
                            <td>Ticket ID</td>
                            <td>{{ $support->uuid }}</td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>{{ $support->title }}</td>
                        </tr>
                        <tr>
                            <td>Priority</td>
                            <td>{{ $support->priority }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $support->description }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $support->status }}</td>
                        </tr>
                        <tr>
                            <td>Last Updated</td>
                            <td>{{ formatDateTime($support->updated_at) }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Important Note -->
                <div class="important">
                    If you need further assistance or have additional questions, please reply directly to this email.
                </div>

                <p>We’re always here to help.<br>
                    <strong>The {{ config('app.name') }} Support Team</strong>
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
