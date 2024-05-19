<?php
include("conn.php");
require 'vendor/autoload.php'; // autoload do composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$query = "SELECT Email_Especialista FROM Especialista";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                       
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'mohammedalporkir@gmail.com';                   
            $mail->Password   = 'oprg pdiy rjwb jcnr';                        
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;                                 

            // Remetente e destinatário
            $mail->setFrom('faunderofc@proton.me', 'Seu Nome');
            $mail->addAddress($row['Email_Especialista']);

            // Conteúdo do e-mail
            $mail->isHTML(false);                                       // configuração para enviar e-mail no formato texto
            $mail->Subject = 'E-mail de validação';
            $mail->Body    = 'Um novo post foi criado no fórum.';

            // Envia o e-mail
            $mail->send();
            echo "Email enviado para: " . $row['Email_Especialista'] . "<br>";
        } catch (Exception $e) {
            echo "Falha ao enviar email para: " . $row['Email_Especialista'] . ". Erro: {$mail->ErrorInfo}<br>";
        }
    }
} else {
    echo "Erro ao executar a consulta: " . mysqli_error($conn);
}

header("Location: forum.php");

exit;
?>
