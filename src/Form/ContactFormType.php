<?php

namespace App\Form;

use App\ValueObject\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group',
                ],
                'label_attr' => [
                    'class' => 'col-form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Name is mandatory"
                    ]),
                ],
                "required" => false
            ])
            ->add('email', EmailType::class, [
                'row_attr' => [
                    'class' => 'form-group',
                ],
                'label_attr' => [
                    'class' => 'col-form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Email is mandatory"
                    ]),
                ],
                "required" => false
            ])
            ->add('subject', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group',
                ],
                'label_attr' => [
                    'class' => 'col-form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Subject is mandatory"
                    ]),
                ],
                "required" => false
            ])
            ->add('message', TextareaType::class, [
                'row_attr' => [
                    'class' => 'form-group',
                ],
                'label_attr' => [
                    'class' => 'col-form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Message is mandatory"
                    ]),
                ],
                "required" => false
            ])
            ->add('button', ButtonType::class, [
                'attr' => [
                    'class' => 'btn btn-secondary',
                    'data-dismiss' => 'modal',
                ],
                'row_attr' => [
                    'class' => 'w-25 d-inline-block',
                ],
                'label' => 'Close'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
                'row_attr' => [
                    'class' => 'w-50 d-inline-block',
                ],
                'label' => 'Send Message',

            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
