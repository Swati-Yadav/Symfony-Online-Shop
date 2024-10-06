<?php
// src/Form/CheckoutType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\CustomerOrder;

class CheckoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customerName', TextType::class, [
                'label' => 'Your Name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('customerAddress', TextType::class, [
                'label' => 'Shipping Address',
                'attr' => ['class' => 'form-control']
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CustomerOrder::class,
        ]);
    }
}
