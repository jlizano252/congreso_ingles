<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Selected Topics</title>
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
            /* Congreso blue */
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

        .topic-card {
            border: 1px solid #ddd;
            border-left: 5px solid #f57c00;
            /* Congreso orange */
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fafafa;
        }

        .topic-title {
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 5px;
        }

        .topic-expositor {
            font-style: italic;
            color: #555;
            margin-bottom: 10px;
        }

        .topic-abstract {
            font-size: 0.9rem;
            color: #333;
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
            <p>Thank you for registering! You have successfully enrolled in the following topics:</p>

            @foreach($topics as $topic)
            <div class="topic-card">
                <div class="topic-title">{{ $topic->title ?? 'Untitled Topic' }}</div>
                <div class="topic-expositor">{{ $topic->user->name ?? 'Unknown' }} {{ $topic->user->lastname ?? '' }}</div>
                <div class="topic-abstract">{{ $topic->abstract ?? 'No abstract provided.' }}</div>
            </div>
            @endforeach

            <table style="width:100%;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:12px;line-height:22px;color:#363636;margin-top: 20px">
                <tr>
                    <td style="text-align:center;font-size:11px;">
                        <p class="etc-orange" style="text-transform: uppercase; font-weight: bold; font-size: 12px; margin-bottom: 10px">Follow us on social media!</p>
                        <p style="margin:0">
                            <a target="_blank" href="https://www.facebook.com/VETC2025/" style="text-decoration:none; margin: 0 3px">
                                <img src="https://vetc.centroatenea.network/images/facebook.png" width="25" height="25" alt="f" style="display:inline-block;color:#cccccc;opacity: .5">
                            </a>
                            <a target="_blank" href="https://www.instagram.com/ivenglishteaching/ " style="text-decoration:none; margin: 0 3px">
                                <img src="https://vetc.centroatenea.network/images/instagram.png" width="25" height="25" alt="t" style="display:inline-block;color:#cccccc;opacity: .5">
                            </a>
                        </p>
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