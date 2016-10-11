<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 16:43
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Stock;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/dashboard/stock", name="appbundle_dashboard_stock")
 */
class StockController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("", name="appbundle_dashboard_stock")
     */
    public function listStockAction()
    {
        $stocks = $this->getDoctrine()->getRepository('AppBundle:Stock')
            ->findAll();

        return $this->render('Dashboard/Stock/index.html.twig',
            [
                'stocks' => $stocks
            ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="appbundle_dashboard_stock_add")
     */
    public function addStockAction(Request $request)
    {
        $stock = new Stock();

        $form = $this->get('form.factory')->create('AppBundle\Form\StockType', $stock);

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);

            $stock->setCreatedAt(new \DateTime('NOW'));
            $stock->setUpdatedAt(new \DateTime('NOW'));

            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_stock'));
        }

        return $this->render('Dashboard/Stock/add.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @param Request $request
     * @param Stock $stock
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{id}", name="appbundle_dashboard_stock_edit")
     */
    public function editStockAction(Request $request, Stock $stock)
    {
        $form = $this->get('form.factory')->create('AppBundle\Form\StockType', $stock);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);

            $stock->setUpdatedAt(new \DateTime('NOW'));

            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_stock'));
        }

        return $this->render(
            'Dashboard/Stock/add.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @param Stock $stock
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/remove/{id}", name="appbundle_dashboard_stock_remove")
     */
    public function removeStockAction(Stock $stock)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($stock);
        $em->flush();

        return $this->redirect($this->generateUrl('appbundle_dashboard_stock'));
    }
}