<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 13/10/16
 * Time: 10:24
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Like;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/dashboard", name="appbundle_dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Route("", name="appbundle_dashboard")
     */
    public function indexAction()
    {
        return $this->render('Dashboard/index.html.twig');
    }

    /**
     * @return Response
     * @Route("/statistiques", name="appbundle_dashboard_statistique")
     */
    public function statistiqueAction()
    {
        return $this->render('Dashboard/statistique.html.twig');
    }
}