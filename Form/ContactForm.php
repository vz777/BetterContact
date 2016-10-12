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
            ->add('lastname', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Last name', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your last Name', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('firstname', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('First Name', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your first Name', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('company', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Company', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Name of your company', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('function', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Function', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your function in the company', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('address', 'textarea', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Address', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Address of your company', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('zipcode', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Zip Code', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Company zip code', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('city', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('City', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Company city', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('country', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Country', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Company country', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('email', 'email', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Email address', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your e-mail address', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('phone', 'text', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'label' => $this->translator->trans('Phone number', [], BetterContact::DOMAIN_NAME),
                'label_attr' => [
                    'placeholder' => $this->translator->trans('Your phone number', [], BetterContact::DOMAIN_NAME),
                ]
            ))
            ->add('message', 'textarea', array(
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
    public function getName()
    {
        return 'better_contact_form';
    }
}
