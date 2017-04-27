<?php

if(isset($_POST['course'])){
    $to = 'mail@test1.organica.pp.ua,alkv84@yandex.ru';
    $subject = 'Запись на курс - ' . $_POST['course-title'];
    $message = '
        <html>
            <head>
                <title>Запись на курс - '. $_POST['course-title'] .'</title>
            </head>
            <body>
                <p><strong>Имя отправителя:</strong> '. $_POST['name'] .'</p>
                <p><strong>E-mail отправителя:</strong> '. $_POST['email'] .'</p>
                <p><strong>Телефон отправителя:</strong> '. $_POST['phone'] .'</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Veronika+\r\n";
    mail($to, $subject, $message, $headers);
    echo $message;
}

if(isset($_POST['question'])){
    $to = 'mail@test1.organica.pp.ua,alkv84@yandex.ru';
    $subject = 'Необходима консультация';
    $message = '
        <html>
            <head>
                <title>Необходима консультация</title>
            </head>
            <body>
                <p><strong>Имя отправителя:</strong> '. $_POST['name'] .'</p>
                <p><strong>E-mail отправителя:</strong> '. $_POST['email'] .'</p>
                <p><strong>Телефон отправителя:</strong> '. $_POST['phone'] .'</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Veronika+\r\n";
    mail($to, $subject, $message, $headers);
    echo $message;
}

if(isset($_POST['contact'])){
    $to = 'mail@test1.organica.pp.ua,alkv84@yandex.ru';
    $subject = 'Перезвоните - мне необходима консультация';
    $message = '
        <html>
            <head>
                <title>Перезвоните - мне необходима консультация</title>
            </head>
            <body>
                <p><strong>Имя отправителя:</strong> '. $_POST['name'] .'</p>
                <p><strong>E-mail отправителя:</strong> '. $_POST['email'] .'</p>
                <p><strong>Телефон отправителя:</strong> '. $_POST['phone'] .'</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Veronika+\r\n";
    mail($to, $subject, $message, $headers);
    echo $message;
}

if(isset($_POST['subscription__email'])){
    $to = 'mail@test1.organica.pp.ua,alkv84@yandex.ru';
    $subject = 'Почтовый аддресс для рассылки';
    $message = '
        <html>
            <head>
                <title>Почтовый аддресс для рассылки</title>
            </head>
            <body>
                <p><strong>E-mail отправителя:</strong> '. $_POST['subscription__email'] .'</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Veronika+\r\n";
    mail($to, $subject, $message, $headers);
    echo $message;
}

if(isset($_POST['bron'])){
    $to = 'mail@test1.organica.pp.ua,alkv84@yandex.ru';
    $subject = 'Хочу встретится';
    $message = '
        <html>
            <head>
                <title>Хочу встретится</title>
            </head>
            <body>
                <p><strong>Имя отправителя:</strong> '. $_POST['name'] .'</p>
                <p><strong>Телефон отправителя:</strong> '. $_POST['phone'] .'</p>
                <p><strong>Услуга:</strong> '. $_POST['service'] .'</p>
                <p><strong>Желаемая дата:</strong> '. $_POST['date'] .'</p>
            </body>
        </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Veronika+\r\n";
    mail($to, $subject, $message, $headers);
    echo $message;
}