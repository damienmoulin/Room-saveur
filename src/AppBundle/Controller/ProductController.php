<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 15:34
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/dashboard/product", name="appbundle_dashboard_product")
 */
class ProductController extends Controller
{

    /**
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/detail/{id}", name="appbundle_dashboard_product_detail")
     */
    public function detailProductAction(Product $product)
    {
        return $this->render('Dashboard/Product/detail.html.twig',
            [
                'product' => $product
            ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("", name="appbundle_dashboard_product")
     */
    public function listProductAction(Request $request)
    {
        $form = $this->addProductAction($request);
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')
            ->findAll();

        return $this->render('Dashboard/Product/index.html.twig',
            [
                'products' => $products,
                'form' => $form->createView()
            ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="appbundle_dashboard_product_add")
     */
    public function addProductAction(Request $request)
    {
        $product = new Product();

        $form = $this->get('form.factory')->create('AppBundle\Form\ProductType', $product);

        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);


            $filename = sha1(uniqid(mt_rand(), true)).'.jpg';
            $product->setFilename($filename);
            $product->getPicture()->move($this->getParameter('picture_directory'), $filename);

            $product->setCreatedAt(new \DateTime('NOW'));
            $product->setUpdatedAt(new \DateTime('NOW'));

            $em->flush();

            unset($form);
            unset($product);

            $product = new Product();

            $form = $this->get('form.factory')->create('AppBundle\Form\ProductType', $product);
        }

        return $form;

        /**
        return $this->render('Dashboard/Product/add.html.twig',
            [
                'form' => $form->createView()
            ]);
         * */
    }

    /**
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/remove/{id}", name="appbundle_dashboard_product_remove")
     */
    public function removeProductAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        return $this->redirect($this->generateUrl('appbundle_dashboard_product'));
    }
}