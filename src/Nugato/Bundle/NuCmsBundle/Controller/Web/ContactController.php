<?php

/*
 * This file is part of the NuCms package.
 *
 * (c) Jacek Bednarek
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nugato\Bundle\NuCmsBundle\Controller\Web;

use Nugato\Bundle\NuCmsBundle\Component\Contact\Form\ContactFormType;
use Sylius\Component\Mailer\Sender\Sender;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ContactController extends Controller
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Sender
     */
    private $mailer;

    public function __construct(FormFactoryInterface $formFactory, Sender $mailer)
    {
        $this->formFactory = $formFactory;
        $this->mailer = $mailer;
    }

    public function renderForm(Request $request): Response
    {
        $form = $this->formFactory->create(
            ContactFormType::class,
            null,
            [
                'action' => $this->generateUrl('nucms_web_contact_send'),
                'method' => 'POST',
            ]
        );

        return $this->render(
            '@NugatoNuCms/Web/Contact/_contact_form.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    public function sendForm(Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);

        if ($form->handleRequest($request)->isValid()) {
            $receivers = [$this->getParameter('nucms_email_receiver')];

            $this->mailer->send('contact_form', $receivers, $form->getData());

            $this->addFlash('success', 'nucms.web.form.contact_form.success');

            return $this->redirect($request->headers->get('referer'));
        }

        return $this->redirectToRoute('nucms_web_homepage');
    }
}
