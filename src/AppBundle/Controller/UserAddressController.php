<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 19:45
 */

namespace AppBundle\Controller;

use AppBundle\Entity\UserAddress;
use AppBundle\Entity\UserFacturationAddress;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

/**
 * @Route("/user/address", name="appbundle_dashboard_useraddress")
 */
class UserAddressController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="appbundle_dashboard_useraddress_add")
     */
    public function addAddressAction(Request $request)
    {
        $address = new UserAddress();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $address->setUser($user);

        $form = $this->get('form.factory')->create('AppBundle\Form\UserAddressType', $address);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_useraddress'));
        }

        return $this->render('FrontOffice/UserAddress/add.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add/facturation", name="appbundle_dashboard_useraddress_add_facturation")
     */
    public function addFacturationAddress(Request $request)
    {
        $addressFacturation = new UserFacturationAddress();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $addressFacturation->setUser($user);

        $form = $this->get('form.factory')->create('AppBundle\Form\UserFacturationAddressType', $addressFacturation);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($addressFacturation);
            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_useraddress'));
        }

        return $this->render('FrontOffice/UserFacturationAddress/add.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @param Request $request
     * @param UserAddress $address
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{id}", name="appbundle_dashboard_useraddress_edit")
     */
    public function editAddressAction(Request $request, UserAddress $address)
    {
        $form = $this->get('form.factory')->create('AppBundle\Form\UserAddressType', $address);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();
            
            return $this->redirect($this->generateUrl('appbundle_dashboard_useraddress'));
        }

        return $this->render('FrontOffice/UserAddress/add.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @param Request $request
     * @param UserFacturationAddress $addressFacturation
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/facturation/{id}", name="appbundle_dashboard_useraddress_edit_facturation")
     */
    public function editAddressFacturationAction(Request $request, UserFacturationAddress $addressFacturation)
    {
        $form = $this->get('form.factory')->create('AppBundle\Form\UserFacturationAddressType', $addressFacturation);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($addressFacturation);
            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_useraddress'));
        }

        return $this->render('FrontOffice/UserFacturationAddress/add.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("", name="appbundle_dashboard_useraddress")
     */
    public function listAddressAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $address = $this->getDoctrine()->getRepository('AppBundle:UserAddress')
            ->findBy(
                [
                    'user' => $user
                ]
            );

        $addressFacturation = $this->getDoctrine()->getRepository('AppBundle:UserFacturationAddress')
            ->findBy(
                [
                    'user' => $user
                ]
            );

        return $this->render('FrontOffice/UserAddress/index.html.twig',
            [
                'address' => $address,
                'addressFacturations' => $addressFacturation
            ]);
    }

    /**
     * @param UserAddress $address
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/remove/{id}", name="appbundle_dashboard_useraddress_remove")
     */
    public function removeAddressAction(UserAddress $address)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($address);

        $em->flush();

        return $this->redirect($this->generateUrl('appbundle_dashboard_useraddress'));
    }

    /**
     * @param UserFacturationAddress $addressFacturation
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/remove/facturation/{id}", name="appbundle_dashboard_useraddress_remove")
     */
    public function removeAddressFacturationAction(UserFacturationAddress $addressFacturation)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($addressFacturation);

        $em->flush();

        return $this->redirect($this->generateUrl('appbundle_dashboard_useraddress'));
    }
}