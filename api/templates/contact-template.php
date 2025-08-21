<?php
function contactEmailTemplate($name, $email, $subject, $message) {
    return "
    <html>
    <head>
      <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #eee; border-radius: 8px; background: #fafafa; }
        h2 { color: #444; }
        p { margin: 8px 0; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; text-align: center; }
      </style>
    </head>
    <body>
      <div class='container'>
        <h2> New Contact Form Submission</h2>
        <p><strong>Name:</strong> " . htmlspecialchars($name, ENT_QUOTES) . "</p>
        <p><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES) . "</p>
        <p><strong>Subject:</strong> " . htmlspecialchars($subject, ENT_QUOTES) . "</p>
        <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message, ENT_QUOTES)) . "</p>
        <div class='footer'>
          <p>This message was sent from your website contact form.</p>
        </div>
      </div>
    </body>
    </html>
    ";
}
