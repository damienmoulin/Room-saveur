<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 19:45
 */

namespace AppBundle\Controller;

use AppBundle\Entity\UserAddress;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/dashboard/user/address", name="appbundle_dashboard_useraddress")
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

        $form = $this->get('form.factory')->create('AppBundle\Form\UserAddressType', $address);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_useraddress'));
        }

        return $this->render('Dashboard/UserAddress/add.html.twig',
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

        return $this->render('Dashboard/UserAddress/add.html.twig',
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
        $address = $this->getDoctrine()->getRepository('AppBundle:UserAddress')
            ->findAll();

        return $this->render('Dashboard/UserAddress/index.html.twig',
            [
                'address' => $address
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
}