<style>
    * {
        padding: 0;
        margin: 0;
        font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }
    body {
        background-image: url("https://cms.centroatenea.app/images/pattern-min.png");
        background-repeat: repeat;
        background-position: center center;
        background-size: auto;
    }
    .etc-darkblue { color: #005285; }
    .etc-lightblue { color: #27A8E0; }
    .etc-regblue { color: #1E75BB; }
    .etc-orange { color: #F79420; }

</style>

<div class="container" style="box-shadow: 0 0 5px 0px rgba(0,0,0,0.25); width: 100%; max-width: 600px; background-color: whitesmoke; min-height: 500px; margin: 0 auto; padding: 35px 20px">
    <div>
        <img src="https://cms.centroatenea.app/images/ivetc-brand-footer.png" alt="ivetc-brand" style="max-width: 100px; height: auto; margin: 0 auto; display: block;">
    </div>

    <p style="margin-top: 20px">Dear participant: <strong style="text-transform: capitalize">{{ $params['name'] }}</strong></p>

    <h4 class="etc-darkblue" style="font-weight: bold; margin: 20px 0; text-align: center; text-transform: uppercase">Welcome to the IV English Teaching Congress of Huetar Northern Region 2022!</h4>
    <p style="text-align: center">You have been officially registered in the Moodle platform, which will be the Learning Management
        System (LMS) for the congress.</p>

    <p style="margin-top: 20px; margin-bottom: 10px"><strong>This is your access information:</strong></p>
    <ul style="font-size: 14px; text-align: justify; margin-top: 10px; margin-left: 20px; padding: 0;">
        <li style="margin-bottom: 5px"><strong class="etc-lightblue">Username:</strong> <span style="color: dimgrey"> {{ $params['username'] }} </span></li>
        <li style="margin-bottom: 5px"><strong class="etc-lightblue">Password:</strong> <span style="color: dimgrey"> {{ $params['password'] }}</span></li>
        <li style="margin-bottom: 5px"><strong class="etc-lightblue">Url:</strong> <span style="color: dimgrey"> <a href="https://cms.centroatenea.app/ui/">https://cms.centroatenea.app/ui/</a></span></li>
    </ul>

    <h4 class="etc-regblue" style="font-weight: bold; margin: 20px 0 10px 0">Please take into account the following instructions to use Moodle.</h4>

    <ul style="font-size: 14px; text-align: justify; margin-top: 10px; margin-left: 20px; padding: 0;">
        <li style="margin-bottom: 5px">Click on the following link to access Moodle: <a href="https://cms.centroatenea.app/ui/">Link</a></li>
        <li style="margin-bottom: 5px">Log in using the username and password officially assigned to you.</li>
        <li style="margin-bottom: 5px">Once in the platform, make sure to get familiar with the different blocks.</li>
        <li style="margin-bottom: 5px">In the welcoming block, you will find the congress program and the book of abstracts as well as
            the book of biographies of the organizing committee.</li>
        <li style="margin-bottom: 5px">There will be four main blocks (weeks) where you will find the concurrent sessions.</li>
        <li style="margin-bottom: 5px">In each block, you must register for the sessions you want to attend. Do not forget to save your
            choices.</li>
        <li style="margin-bottom: 5px">Feel free to get familiar with the platform in advance.</li>
        <li style="margin-bottom: 5px">If you have any questions, please contact us at: <b>englishteachingcongress4@gmail.com</b></li>
    </ul>

    <table style="width:100%;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:12px;line-height:22px;color:#363636;margin-top: 20px">
        <tr>
            <td style="text-align:center;font-size:11px;">
                <p class="etc-orange" style="text-transform: uppercase; font-weight: bold; font-size: 12px; margin-bottom: 10px">Follow us!</p>
                <p style="margin:0">
                    <a href="https://www.facebook.com/IVETC2022" style="text-decoration:none; margin: 0 3px">
                        <img src="https://cms.centroatenea.app/images/facebook.png" width="25" height="25" alt="f" style="display:inline-block;color:#cccccc;opacity: .5">
                    </a>
                    <a href="https://www.instagram.com/ivenglishteaching/ " style="text-decoration:none; margin: 0 3px">
                        <img src="https://cms.centroatenea.app/images/instagram.png" width="25" height="25" alt="t" style="display:inline-block;color:#cccccc;opacity: .5">
                    </a>
                </p>
            </td>
        </tr>
    </table>

</div>
