<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 12/10/16
 * Time: 10:55
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Order;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

/**
 * @Route("/order", name="appbundle_order")
 */
class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/add", name="appbundle_order")
     */
    public function addOrderAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $order = new Order();

        $form = $this->createFormBuilder($order)
            ->add('address', EntityType::class,
                [
                    'label' => 'Addresse',
                    'class' => 'AppBundle\Entity\UserAddress',
                    'choice_label' => 'address',
                    'query_builder' => function(EntityRepository $er) use ($user)
                    {
                        return $er->createQueryBuilder('a')
                            ->where('a.user = :user')
                            ->setParameter('user', $user);
                    },
                ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $order->setStatus(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);

            $link = sha1(uniqid(mt_rand(), true));
            $order->setLink($link);
            $order->setCreatedAt(new \DateTime());
            $order->setUpdatedAt(new \DateTime());

            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_order_complete', ['key' => $order->getLink(), 'id' => $order->getId()]));
        }

        return $this->render('FrontOffice/Order/add.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @param Request $request
     * @param $key
     * @param Order $order
     * @return Response
     * @Route("/complete/{key}/{id}", name="appbundle_order_complete")
     */
    public function completeOrderAction(Request $request, $key, Order $order)
    {
        if ($key == $order->getLink() && !$order->getStatus()) {

            $form = $this->get('form.factory')->create('AppBundle\Form\OrderType', $order);

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($order);

                $em->flush();

                return $this->redirect($this->generateUrl('appbundle_order_complete', ['key' => $order->getLink(), 'id' => $order->getId()]));

            }

            return $this->render('FrontOffice/Order/complete.html.twig',
                [
                    'form' => $form->createView()
                ]);
        }
        else {
            return $this->redirect($this->generateUrl('appbundle_order'));
        }
    }

    /**
     * @param Order $order
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/validate/{id}", name="appbundle_order_valiadate")
     */
    public function validateOrderAction(Order $order)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        if( $order->getAddress()->getUser() == $user && $order->getStatus() == 0) {
            $order->setCreatedAt(new \DateTime());
            $order->setStatus(1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);

            $em->flush();
        }
        else {
            return $this->redirect($this->generateUrl('appbundle_order'));
        }
    }
}