<?php

namespace Cps\informaticaBundle\Controller;

use Cps\informaticaBundle\Entity\detallesol;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Detallesol controller.
 *
 * @Route("detallesol")
 */
class detallesolController extends Controller
{
    /**
     * Lists all detallesol entities.
     *
     * @Route("/", name="detallesol_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detallesols = $em->getRepository('CpsinformaticaBundle:detallesol')->findAll();

        return $this->render('detallesol/index.html.twig', array(
            'detallesols' => $detallesols,
        ));
    }

    /**
     * Creates a new detallesol entity.
     *
     * @Route("/new", name="detallesol_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detallesol = new Detallesol();
        $form = $this->createForm('Cps\informaticaBundle\Form\detallesolType', $detallesol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detallesol);
            $em->flush($detallesol);

            return $this->redirectToRoute('detallesol_show', array('id' => $detallesol->getId()));
        }

        return $this->render('detallesol/new.html.twig', array(
            'detallesol' => $detallesol,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detallesol entity.
     *
     * @Route("/{id}", name="detallesol_show")
     * @Method("GET")
     */
    public function showAction(detallesol $detallesol)
    {
        $deleteForm = $this->createDeleteForm($detallesol);

        return $this->render('detallesol/show.html.twig', array(
            'detallesol' => $detallesol,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detallesol entity.
     *
     * @Route("/{id}/edit", name="detallesol_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, detallesol $detallesol)
    {
        $deleteForm = $this->createDeleteForm($detallesol);
        $editForm = $this->createForm('Cps\informaticaBundle\Form\detallesolType', $detallesol);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detallesol_edit', array('id' => $detallesol->getId()));
        }

        return $this->render('detallesol/edit.html.twig', array(
            'detallesol' => $detallesol,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detallesol entity.
     *
     * @Route("/{id}", name="detallesol_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, detallesol $detallesol)
    {
        $form = $this->createDeleteForm($detallesol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detallesol);
            $em->flush($detallesol);
        }

        return $this->redirectToRoute('detallesol_index');
    }

    /**
     * Creates a form to delete a detallesol entity.
     *
     * @param detallesol $detallesol The detallesol entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(detallesol $detallesol)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallesol_delete', array('id' => $detallesol->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
