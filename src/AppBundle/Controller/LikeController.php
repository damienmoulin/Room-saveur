<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 20:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Like;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/like", name="appbundle_like")
 */
class LikeController extends Controller
{
    /**
     * @param Product $product
     * @Route("/add/{id}", name="appbundle_like_add")
     * @return bool
     */
    public function addLikeAction(Product $product)
    {
        $like = new Like();

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $today = new \DateTime();

        $em = $this->getDoctrine()->getManager();
        $lastPublished = $em->getRepository('AppBundle:Like')->findOneBy(
            [
                'user' => $user
            ],
            [
                'createdAt' => 'DESC'
            ]
        );

        $response = false;

        if ($today->format('d') !== $lastPublished->getCreatedAt()->format('d')) {

            $like->setProduct($product);
            $like->setUser($user);
            $like->setCreatedAt(new \DateTime());
            $like->setUpdatedAt(new \DateTime());

            $em->persist($like);

            $em->flush();

            $response = true;
        }



        return $response;
    }
    
}