<?php
if (isset($_POST['mail_submit'])) {
    
    $fields = array('name' => 'Имя: ?',
                    'email' => 'E-mail: ?',
                    'phone' => 'Телефон: ?'
    );

    $site_name = "landing.milsdev.com";
    $address = "landing@milsdev.com";
    $mail_type = $_POST['type'];

    $body = "";

    if (!empty($_POST)) {
        foreach ($fields as $key => $value) {
            if (!isset($_POST[$key]) || $key == 'mail_submit' || $key == 'type') continue;
            $body .= str_replace("?", $_POST[$key], $value)." <br>";
        }
    }


    switch ($mail_type) {
        case 1:
            $subject = 'Запрос обратного звонка';
            $returnHash = 'success';
            break;
        case 2:
            $subject = 'Заказ Обрантного письма';
            $returnHash = 'success';
            break;
        default:
            $subject = 'Запрос';
            $returnHash = 'success';
    }

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML($body);

    header("Location: ".$_SERVER['HTTP_REFERER']."#error");
    //echo "Mailer Error: " . $mail->ErrorInfo;
    // header("Location: ".$_SERVER['HTTP_REFERER']."#".$returnHash);
}
