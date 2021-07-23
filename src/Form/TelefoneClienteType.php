<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\Operadora;
use App\Entity\Telefone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TelefoneClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cliente', ClienteType::class)
            ->add('ddd')
            ->add('numero')
            ->add('operadora', EntityType::class,[
                'class' => Operadora::class,
                'choice_label' => 'nome'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Telefone::class,
        ]);
    }
}
