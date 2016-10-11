<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/10/16
 * Time: 14:38
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/dashboard/room", name="appbundle_dashboard_room")
 */
class RoomController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("", name="appbundle_dashboard_room")
     */
    public function listRoomAction()
    {
        $rooms = $this->getDoctrine()->getRepository('AppBundle:Room')
            ->findAll();

        return $this->render('Dashboard/Room/index.html.twig',
            [
                'rooms' => $rooms
            ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="appbundle_dashboard_room_add")
     */
    public function addRoomAction(Request $request)
    {
        $room = new Room();

        $form = $this->get('form.factory')->create('AppBundle\Form\RoomType', $room);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($room);
            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_room'));
        }

        return $this->render('Dashboard/Room/add.html.twig',
            [
                'form' => $form->createView()
            ]);

    }

    /**
     * @param Request $request
     * @param Room $room
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{id}", name="appbundle_dashboard_room_edit")
     */
    public function editRoomAction(Request $request, Room $room)
    {
        $form = $this->get('form.factory')->create('AppBundle\Form\RoomType', $room);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($room);
            $em->flush();

            return $this->redirect($this->generateUrl('appbundle_dashboard_room'));
        }

        return $this->render('Dashboard/Room/add.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @param Room $room
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/remove/{id}",name="appbundle_dashboard_room_remove")
     */
    public function removeRoomAction(Room $room)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($room);
        $em->flush();

        return $this->redirect($this->generateUrl('appbundle_dashboard_room'));
    }


}