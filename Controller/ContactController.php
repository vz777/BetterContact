<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : info@thelia.net                                                      */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*	    along with this program. If not, see <http://www.gnu.org/licenses/>.         */
/*                                                                                   */
/*************************************************************************************/

namespace BetterContact\Controller;

use BetterContact\BetterContact;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Log\Tlog;
use Thelia\Model\ConfigQuery;

/**
 * Class ContactController
 * @package Thelia\Controller\Front
 * @author Manuel Raynaud <manu@thelia.net>
 */
class ContactController extends BaseFrontController
{
    /**
     * send contact message
     */
    public function sendAction()
    {
        $contactForm = $this->createForm(BetterContact::FORM_NAME);

        try {
            $form = $this->validateForm($contactForm);
            
            $data = $form->getData();
            
            $data['date'] = new \DateTime();
            
            $fullName = $data['firstname'] . ' ' . $data['lastname'];
            
            $message = $this->getMailer()->createEmailMessage(
                BetterContact::MESSAGE_NAME,
                //[ConfigQuery::getStoreEmail() => $fullName],
                // If the line below is leaved, i found the fullname(firstname+lastname) use by the controller to fill the field email and found on  
                //  submit form : Email "" does not comply with addr-spec of RFC 2822.

                //Maybe there is something change on thelia 2.5 on this side

                //There is certainly better to do but for the moment it works with the following line

                [ConfigQuery::getStoreEmail() => ConfigQuery::getStoreName()],
                [ConfigQuery::getStoreEmail() => ConfigQuery::getStoreName()],
                $data
            );

            $message->addReplyTo($data['email'], $fullName);

            $this->getMailer()->send($message);

            // If a success URL is defined, redirect to it.
            if ($contactForm->hasSuccessUrl()) {
                return $this->generateRedirect($this->retrieveSuccessUrl($contactForm));
            }
    
            // Otherwise, use the Front module router to process success.
            return $this->generateRedirect(
                $this->getRouteFromRouter(
                    'router.front',
                    'contact.success'
                )
            );
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
        }

        Tlog::getInstance()->error(sprintf('BetterContact: Error during sending contact mail : %s', $error_message));

        $contactForm->setErrorMessage($error_message);

        $this->getParserContext()
            ->addForm($contactForm)
            ->setGeneralError($error_message);
    
        // Redirect to error URL if defined, otherwise rely on the _view parameter in the current route.
        if ($contactForm->hasErrorUrl()) {
            return $this->generateErrorRedirect($contactForm);
        }
    }
}
