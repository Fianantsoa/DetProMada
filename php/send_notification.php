<?php
// Inclure la bibliothèque PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php'; // Assurez-vous d'ajuster le chemin selon votre configuration
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      // Récupérer l'adresse e-mail soumise dans le formulaire
        $email = $_GET["email"];
        $email_service = $_GET["email_service"];
         // Configurez PHPMailer pour envoyer l'e-mail
        $mail = new PHPMailer(true);
        try {
            include('php/connexionBDD.php');
            $sql = "SELECT * FROM smtp LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $host = $row['host'];
                $username = $row['username'];
                $password = $row['password'];
                $senderName = $row['sender_name'];
            }
            
         // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = $host;
            $mail->SMTPAuth = true;
            $mail->Username = $username;
            $mail->Password = base64_decode($password);  // Votre mot de passe
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;// Port SMTP
                // Destinataire
            $mail->setFrom($senderName, 'DetProMada');
            if(!empty($email_service)){
                $mail->addAddress($email_service);
            }
            if(!empty($email)){
                $mail->addAddress($email);
            }
            
            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Nouveau produit';
            $mail->Body    = '
            <div style="border: 1px solid black; width: 700px;border-radius: 0 5px 5px 5px; ">
                <div style="padding: 20px;">
                <div style="display: flex;">
                    <img src="https://previews.123rf.com/images/babkinasvetlana/babkinasvetlana1708/babkinasvetlana170800017/84850664-black-silhouette-of-man-cutting-grass-in-garden-with-grass-cutter.jpg" 
                    alt="" style="width:46px;height: 60px;">
                    <p><b>DetProMada</b></p>
                </div>
                <div style="border: 1px solid #999;height: 100px;margin-top: 36px;border-radius: 14px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/891/891448.png" alt="" style="float: right;width:64px;">
                    <p style="margin: 31px 0 0 18px;font-size: 13px;">Des nouveaux produits <br>sont disponible dans notre boutique en ligne.</p>
                </div>
                <p style="margin-top: 50px;font-size: 13px;">Vous pouvez les consulter en cliquant <a href="localhost/DétecteurMada/index.php">ici</a>.</p>
                </div>
                <div style="background-color: #9e5f2b;width: 100%;height: 130px;">
                    <div style="padding: 20px; color: white;font-size: 12px;">
                        <p><span>Bureau : </span>Tsimialonjafy Mahamasina</p>
                        <p><span>Telephone : </span>+ 261 34 05 891 97</p>
                        <p><span>Site : </span><a href="https://www.briqueweb.com/">Brique web</a></p>
                    </div>
                </div>
            </div>';
            

          // Envoyer l'e-mail
        $mail->send();

        $name = "visiteur"; // Remplacez par le nom
            // Requête d'insertion
        $sql = "INSERT INTO customer (name, email) VALUES ('$name', '$email')";
        $conn->query($sql);
        $conn->close();
        echo '<p style="font: size 13px;color:green;">L\'e-mail a été envoyé avec succès</p>';
        } catch (Exception $e) {
            
        }
    }
?>