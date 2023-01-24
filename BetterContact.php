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

namespace BetterContact;

use Propel\Runtime\Connection\ConnectionInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator;
use Thelia\Model\Base\MessageQuery;
use Thelia\Model\Message;
use Thelia\Module\BaseModule;

class BetterContact extends BaseModule
{
    /** @var string */
    const DOMAIN_NAME = 'bettercontact';
    const FORM_NAME    = 'bettercontact_form';
    const MESSAGE_NAME = 'bettercontact.mail_template';

    public function postActivation(ConnectionInterface $con = null): void
    {
        // Create messages from templates, if not already defined
        $email_templates_dir = __DIR__.DS.'I18n'.DS.'email-templates'.DS;

        if (null === MessageQuery::create()->findOneByName(self::MESSAGE_NAME)) {
            $message = new Message();

            $message
                ->setName(self::MESSAGE_NAME)

                ->setLocale('en_US')
                ->setTitle('Contact form message')
                ->setSubject('A new contact message was just sent')
                ->setHtmlMessage(file_get_contents($email_templates_dir.'en.html'))
                ->setTextMessage(file_get_contents($email_templates_dir.'en.txt'))

                ->setLocale('fr_FR')
                ->setTitle('Message de contact')
                ->setSubject('Un nouveau message de contact vient d\'être expédié')
                ->setHtmlMessage(file_get_contents($email_templates_dir.'fr.html'))
                ->setTextMessage(file_get_contents($email_templates_dir.'fr.txt'))

                ->save()
            ;
        }
    }

    public static function configureServices(ServicesConfigurator $servicesConfigurator): void
    {
        $servicesConfigurator->load(self::getModuleCode().'\\', __DIR__)
            ->exclude([THELIA_MODULE_DIR . ucfirst(self::getModuleCode()). "/I18n/*"])
            ->autowire(true)
            ->autoconfigure(true);
    }
}
