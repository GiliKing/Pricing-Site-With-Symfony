<?php


namespace App\Service;

use App\ValueObject\ContactForm;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class EmailSender
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;

    }
    

    public function sendContactUsForm(ContactForm $contactForm): void
    {

        // $email = (new Email())
        // ->to('chrisogili12@gmail.com')
        // ->from('christianogili@zohomail.com')
        // ->subject('You got new message!')
        // ->text('This is your message!');

        $email = (new TemplatedEmail())
            ->to('chrisogili12@gmail.com')
            ->from('christianogili@zohomail.com')
            ->subject('You got new message!')
            ->htmlTemplate('emails/contact_form.html.twig')
            ->context([
                'name' => $contactForm->name,
                'customer_email' => $contactForm->email,
                'subject' => $contactForm->subject,
                'message' => $contactForm->message,

            ]);

        $this->mailer->send($email);
    }
}