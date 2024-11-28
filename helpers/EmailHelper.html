<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailHelper {
    private $mailer;
    private $config;

    public function __construct() {
        $this->config = require_once __DIR__ . '/../config/mail_config.php';
        $this->mailer = new PHPMailer(true);
        
        // Server settings
        $this->mailer->SMTPDebug = 0; // Disable debug output
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'ih134857@gmail.com';
        $this->mailer->Password = 'wgqx macg ytgh udlr';
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = 587;
        
        // Default sender
        $this->mailer->setFrom('ih134857@gmail.com', 'BD Adventures');
        $this->mailer->addReplyTo($this->config['reply_to_email'], $this->config['reply_to_name']);
    }

    public function sendPasswordResetEmail($email, $token) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($email);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Reset Your Password - BD Adventures';
            
            $resetLink = "http://" . $_SERVER['HTTP_HOST'] . "/travel-website-main/reset_password.php?token=" . $token;
            
            error_log("Reset link generated: " . $resetLink);
            
            $this->mailer->Body = $this->getPasswordResetEmailTemplate($resetLink);
            
            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Email sending error: " . $e->getMessage());
            throw new Exception('Email could not be sent. Mailer Error: ' . $this->mailer->ErrorInfo);
        }
    }

    private function getPasswordResetEmailTemplate($resetLink) {
        return "
            <div style='max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;'>
                <h2 style='color: #446A46; text-align: center;'>Reset Your Password</h2>
                <p>Hello,</p>
                <p>You have requested to reset your password for your BD Adventures account. Click the button below to reset it:</p>
                <p style='text-align: center; margin: 30px 0;'>
                    <a href='{$resetLink}' 
                       style='display: inline-block; padding: 12px 25px; background-color: #FF8038; 
                              color: white; text-decoration: none; border-radius: 5px;
                              font-weight: bold;'>
                        Reset Password
                    </a>
                </p>
                <p>If you did not request a password reset, please ignore this email or contact us if you have concerns.</p>
                <p>This password reset link will expire in 24 hours.</p>
                <hr style='margin: 30px 0; border: 1px solid #eee;'>
                <p style='font-size: 12px; color: #666; text-align: center;'>
                    This email was sent by BD Adventures<br>
                    If you have any questions, please contact us at {$this->config['reply_to_email']}
                </p>
            </div>
        ";
    }
} 