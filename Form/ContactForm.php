<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace BetterContact\Form;

use BetterContact\BetterContact;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Thelia\Core\Translation\Translator;
use Thelia\Form\FirewallForm;

/**
 * Class ContactForm
 * @package Thelia\Form
 * @author Manuel Raynaud <manu@thelia.net>
 */
class ContactForm extends FirewallForm
{
    protected function buildForm()
    {
        $this->formBuilder
            ->add('lastname', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Last name', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your last Name', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('firstname', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('First Name', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your first Name', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('company', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Company', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Name of your company', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('function', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Function', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your function in the company', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('address', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Address', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Address of your company', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('zipcode', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Zip Code', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Company zip code', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('city', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('City', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Company city', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('country', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Country', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Company country', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('email', EmailType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Email address', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your e-mail address', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('phone', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Phone number', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your phone number', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('message', TextareaType::class, array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Your Message', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Please enter your message here.', [], BetterContact::DOMAIN_NAME),
                ]
            ))
        ;
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public static function getName()
    {
        return 'better_contact_form';
    }
}
