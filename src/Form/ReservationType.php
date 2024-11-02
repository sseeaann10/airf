<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\TicketType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('departureDateTime', null, [
                'widget' => 'single_text',
            ])
            ->add('departureCity')
            ->add('arrivalCity')
            ->add('ticketType', EntityType::class, [
                'class' => TicketType::class,
                'choice_label' => 'Name', // Display 'Name' from TicketType in the dropdown
                'placeholder' => 'Select a Ticket Type', // Optional placeholder
                'required' => true, // Make it required if necessary
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
