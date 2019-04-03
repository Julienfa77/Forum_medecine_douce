<?php

namespace App\Form;

use App\Entity\Message;
use App\Entity\Topic;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('contenu',TextareaType::class)
            ->add('user',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'name'
            ])
            ->add('topic',EntityType::class,[
                'class'=>Topic::class,
                'choice_label'=>'titre'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
            'label_format'=>'message.%name%'
        ]);
    }
}
