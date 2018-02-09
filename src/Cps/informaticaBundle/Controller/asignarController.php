<?php

namespace Cps\informaticaBundle\Controller;

use Cps\informaticaBundle\Entity\asignar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Asignar controller.
 *
 * @Route("asignar")
 */
class asignarController extends Controller
{
    /**
     * Lists all asignar entities.
     *
     * @Route("/", name="asignar_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $asignars = $em->getRepository('CpsinformaticaBundle:asignar')->findAll();

        return $this->render('asignar/index.html.twig', array(
            'asignars' => $asignars,
        ));
    }

    /**
     * Creates a new asignar entity.
     *
     * @Route("/new", name="asignar_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $asignar = new Asignar();
        $form = $this->createForm('Cps\informaticaBundle\Form\asignarType', $asignar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignar);
            $em->flush();

            return $this->redirectToRoute('asignar_show', array('id' => $asignar->getId()));
        }

        return $this->render('asignar/new.html.twig', array(
            'asignar' => $asignar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a asignar entity.
     *
     * @Route("/{id}", name="asignar_show")
     * @Method("GET")
     */
    public function showAction(asignar $asignar)
    {
        $deleteForm = $this->createDeleteForm($asignar);

        return $this->render('asignar/show.html.twig', array(
            'asignar' => $asignar,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing asignar entity.
     *
     * @Route("/{id}/edit", name="asignar_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, asignar $asignar)
    {
        $deleteForm = $this->createDeleteForm($asignar);
        $editForm = $this->createForm('Cps\informaticaBundle\Form\asignarType', $asignar);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('asignar_edit', array('id' => $asignar->getId()));
        }

        return $this->render('asignar/edit.html.twig', array(
            'asignar' => $asignar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a asignar entity.
     *
     * @Route("/{id}", name="asignar_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, asignar $asignar)
    {
        $form = $this->createDeleteForm($asignar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($asignar);
            $em->flush();
        }

        return $this->redirectToRoute('asignar_index');
    }

    /**
     * Creates a form to delete a asignar entity.
     *
     * @param asignar $asignar The asignar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(asignar $asignar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('asignar_delete', array('id' => $asignar->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
