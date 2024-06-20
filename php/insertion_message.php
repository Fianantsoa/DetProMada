<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){
        
        require 'vendor/autoload.php';
        $mail = new PHPMailer; // Activer les exceptions
        
        try {
            // Configuration SMTP
            include("php/connexionBDD.php");
            
            // Requête SQL pour vérifier les informations de connexion
            $sql = "SELECT * FROM smtp LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $host = $row['host'];
                $username = $row['username'];
                $password = $row['password'];
                $senderName = $row['sender_name'];
                $mailReceiver = $row['mail_receiver'];
                $nameMailReceiver = $row['name_mail_receiver'];
            }
            $conn->close();

            $mail->isSMTP();
            $mail->Host = $host;
            $mail->SMTPAuth = true;
            $mail->Username = $username;
            $mail->Password = base64_decode($password); 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Configurer l'expéditeur et le destinataire
            $mail->setFrom($senderName, 'DetProMada'); //expediteur
            $mail->addAddress($mailReceiver, $nameMailReceiver); //Recepteur

            // Ajouter un sujet et un corps au message
            $mail->Subject = "DetProMada : " . $subject;
            $mail->Body = "<b>Nom : </b>" . $name . "<br>". 
                            "<b>Email : </b>" . $email . "<br>".
                            "<b>Sujet : </b>" . $subject . "<br>".
                            "<b>Message : </b>" . $message;
            // Envoyer le message
            $mail->IsHTML(true);
            $mail->send();
            echo '<div id="form-message-success" style="display:block;color:green;text-align: center;">'
                    . 'Votre message a bien été envoyé, merci!' .
                '</div>';
        } catch (Exception $e) {
            echo 'Erreur lors de l\'envoi du message : ' . $e->getMessage();
        }
    }else{
        echo '<div id="form-message-success" style="display:block;color:red;text-align: center;">'
            . 'Rassurer vous que les champs n\'est pas vide.' .
            '</div>';
    }
    
    
?>
