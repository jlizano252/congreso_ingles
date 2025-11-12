<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registered Sessions</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .content {
            padding: 20px;
        }

        .greeting {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .session-card {
            border: 1px solid #ddd;
            border-left: 5px solid #f57c00;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fafafa;
        }

        .session-title {
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 5px;
        }

        .session-expositor {
            font-style: italic;
            color: #555;
            margin-bottom: 10px;
        }

        .session-abstract {
            font-size: 0.9rem;
            color: #333;
        }

        .session-info {
            font-size: 0.85rem;
            color: #333;
            margin-top: 5px;
        }

        .footer {
            background-color: #f1f1f1;
            text-align: center;
            font-size: 0.8rem;
            padding: 15px;
            color: #555;
        }

        a.button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #f57c00;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>V English Teaching Congress 2025</h1>
        </div>

        <div class="content">
            <p class="greeting">Hello {{ $participant->user->name }},</p>
            <p>Thank you for registering! You have successfully enrolled in the following sessions:</p>

            @foreach($sessions as $session)
            <div class="session-card">
                <div class="session-title">{{ $session->applicantForm->title ?? 'Untitled Session' }}</div>
                <div class="session-expositor">
                    {{ $session->applicantForm->applicant->user->name ?? 'Unknown' }}
                    {{ $session->applicantForm->applicant->user->lastname ?? '' }}
                </div>
                <div class="session-abstract">{{ $session->applicantForm->abstract ?? 'No abstract provided.' }}</div>
                <div class="session-info">
                    <strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($session->date)->format('d/m/Y') }}
                    {{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}<br>
                    <strong>Room:</strong> {{ $session->room->name ?? 'Unknown' }}
                </div>
            </div>
            @endforeach

            <table style="width:100%;border:none;border-spacing:0;text-align:center;font-family:Arial,sans-serif;font-size:12px;line-height:22px;color:#363636;margin-top: 20px">
                <tr>
                    <td>
                        <p style="text-transform: uppercase; font-weight: bold; font-size: 12px; margin-bottom: 10px">Follow us on social media!</p>
                        <a target="_blank" href="https://www.facebook.com/VETC2025/">
                            <img src="https://vetc.centroatenea.network/images/facebook.png" width="25" height="25" alt="Facebook">
                        </a>
                        <a target="_blank" href="https://www.instagram.com/ivenglishteaching/">
                            <img src="https://vetc.centroatenea.network/images/instagram.png" width="25" height="25" alt="Instagram">
                        </a>
                    </td>
                </tr>
            </table>

            <p>If you have any questions, feel free to <a href="mailto:vetc@centroatenea.network" class="button">Get in Touch</a></p>
        </div>

        <div class="footer">
            &copy; 2025 V English Teaching Congress. All rights reserved.
        </div>
    </div>
</body>

</html>