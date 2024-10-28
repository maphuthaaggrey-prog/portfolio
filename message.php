<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Portfolio\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Portfolio\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Portfolio\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['send-message'])) {

    $firstname = $_POST['first-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

try {
    $mail->isSMTP();     
    $mail->SMTPAuth   = true; 
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->Username   = 'maphuthaaggrey83@gmail.com';                    
    $mail->Password   = 'vucirauepmsnisdh';           
    $mail->SMTPSecure = 'tls';           
    $mail->Port       = 587;                                
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom($email, $firstname);
    $mail->addReplyTo($email, $firstname);
    $mail->addAddress('maphuthaaggrey83@gmail.com', 'Aggrey');



    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Enquiry to Maphutha Aggrey';
    $mail->Body = "
    <div style='font-family: Arial, sans-serif; color: #333; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px;'>
        <h2 style='color: #c92828; border-bottom: 2px solid #c92828; padding-bottom: 10px;'>New Enquiry</h2>
        <p style='font-size: 16px; line-height: 1.5;'>
            <strong>Name:</strong> $firstname<br>
            <strong>Email:</strong> $email<br>
            <strong>Phone:</strong> $phone<br>
            <strong>Message:</strong> $message
        </p>
    </div>";


    if($mail->send()) {
        echo '<style>

        * {
            font-family: Open Sans;
            text-align: center;
            margin: 0;
        .wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #161515;
            height: 100vh;
        .container {
            margin: auto;
            width: 500px;
            height: 480px;
            border-radius: 8px;
            border: 2px solid #c92828;
            
            }
        .container h1{
            font-family: Open sans, sans-serif;
            color: white;
            padding-top: 1.5em;
            }
            h5 {
            color: grey;
            font-size: 1.2em;
            padding-top: 3em;
    }
        button {
            box-shadow: 3px 9px 15px rgba(0, 0, 0, .2);
            cursor: pointer;
            color: white;
            background-color: #c92828;
            font-weight: 600;
            border-radius: 5px;
            border: none;
            height: 52px;
            width: 220px;
        }
        button:hover {
        opacity: 84%;
        }
        .container p {
        font-size: 16px;
        color: white;
        margin: 2em auto;
            }
    .social-icons  {
        display: flex;
        align-items: center;
        width: 300px;
        justify-content: space-between;
        margin: 4em auto;
}
    .social-icons svg {
        margin: 0;
        color: #c92828;
        padding: .6em;
        border-radius: 6px;
        border: 2px solid;
        transition: transform .2s ease-in-out;
}
    .social-icons svg:hover {
        transform: scale(1.1);
}
    </style>';
        echo "
        <div class='wrap'>
            <div class='container'>
                <h5>I see you ".$firstname. "</h5>
                <h1>Thank you for reaching out!</h1>
                <p>We will get back to you as soon as possible.</p>

                <a href='index.php'><button>Go Home</button></a>
            
        
        <div class='social-icons'>
                <a href='mailto:maphuthaaggrey83@gmail.com'><i class='icon'><svg xmlns='ttp://www.w3.org/2000/svg'
                            fill='currentcolor' viewBox='0 0 24 24' width='38px' height='38px'>
                            <path
                                d='M 4 4 C 2.895 4 2 4.895 2 6 L 2 18 C 2 19.105 2.895 20 4 20 L 20 20 C 21.105 20 22 19.105 22 18 L 22 6 C 22 4.895 21.105 4 20 4 L 4 4 z M 5.5976562 6 L 18.402344 6 L 12 10 L 5.5976562 6 z M 5 8.6269531 L 12 13 L 19 8.6269531 L 19 18 L 5 18 L 5 8.6269531 z' />
                        </svg></i>
                </a>
                <a href='https://wa.link/hxnh0o'><i class='icon'><svg xmlns='http://www.w3.org/2000/svg'
                            fill='currentcolor' viewBox='0 0 24 24' width='38px' height='38px'>
                            <path
                                d='M19.077,4.928C17.191,3.041,14.683,2.001,12.011,2c-5.506,0-9.987,4.479-9.989,9.985 c-0.001,1.76,0.459,3.478,1.333,4.992L2,22l5.233-1.237c1.459,0.796,3.101,1.215,4.773,1.216h0.004 c5.505,0,9.986-4.48,9.989-9.985C22.001,9.325,20.963,6.816,19.077,4.928z M16.898,15.554c-0.208,0.583-1.227,1.145-1.685,1.186 c-0.458,0.042-0.887,0.207-2.995-0.624c-2.537-1-4.139-3.601-4.263-3.767c-0.125-0.167-1.019-1.353-1.019-2.581 S7.581,7.936,7.81,7.687c0.229-0.25,0.499-0.312,0.666-0.312c0.166,0,0.333,0,0.478,0.006c0.178,0.007,0.375,0.016,0.562,0.431 c0.222,0.494,0.707,1.728,0.769,1.853s0.104,0.271,0.021,0.437s-0.125,0.27-0.249,0.416c-0.125,0.146-0.262,0.325-0.374,0.437 c-0.125,0.124-0.255,0.26-0.11,0.509c0.146,0.25,0.646,1.067,1.388,1.728c0.954,0.85,1.757,1.113,2.007,1.239 c0.25,0.125,0.395,0.104,0.541-0.063c0.146-0.166,0.624-0.728,0.79-0.978s0.333-0.208,0.562-0.125s1.456,0.687,1.705,0.812 c0.25,0.125,0.416,0.187,0.478,0.291C17.106,14.471,17.106,14.971,16.898,15.554z'/>
                        </svg></i></a>
                <a href='https://www.linkedin.com/in/maphutha-chikane-717559282/'><i class='icon'><svg
                            xmlns='http://www.w3.org/2000/svg' fill='currentcolor' viewBox='0 0 24 24' width='38px'
                            height='38px'>
                            <path
                                d='M19,3H5C3.895,3,3,3.895,3,5v14c0,1.105,0.895,2,2,2h14c1.105,0,2-0.895,2-2V5C21,3.895,20.105,3,19,3z M9,17H6.477v-7H9 V17z M7.694,8.717c-0.771,0-1.286-0.514-1.286-1.2s0.514-1.2,1.371-1.2c0.771,0,1.286,0.514,1.286,1.2S8.551,8.717,7.694,8.717z M18,17h-2.442v-3.826c0-1.058-0.651-1.302-0.895-1.302s-1.058,0.163-1.058,1.302c0,0.163,0,3.826,0,3.826h-2.523v-7h2.523v0.977 C13.93,10.407,14.581,10,15.802,10C17.023,10,18,10.977,18,13.174V17z'/>
                        </svg></i></a>
                <a href='http://m.me/maphutha.agree'><i class='icon'><svg width='38' height='38' viewBox='0 0 48 48'
                            fill='currentcolor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd'
                                d='M0 24C0 37.2548 10.7452 48 24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24ZM14.8573 38.3643V33.2415C11.6489 30.7999 9.6 27.0813 9.6 22.9168C9.6 15.5621 15.99 9.6 23.8726 9.6C31.7556 9.6 38.1451 15.5621 38.1451 22.9168C38.1451 30.271 31.7556 36.2336 23.8726 36.2336C22.402 36.2336 20.9826 36.0259 19.6474 35.6411L14.8573 38.3643Z'
                                fill='currentcolor' />
                            <path
                                d='M22.3485 19.2694L14.6514 27.419L21.6564 23.5756L25.3164 27.419L32.9701 19.2694L26.0428 23.0455L22.3485 19.2694Z'
                                fill='currentcolor' />
                        </svg>
                </a>

                </div>
                </div>
            </div>";

    }
    else {
        $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: {$_SERVER["HTTP_REFERER"]}");
         exit(0);
    }

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
} 
else {
    header('Location: index.html');
    exit(0);
}
?>