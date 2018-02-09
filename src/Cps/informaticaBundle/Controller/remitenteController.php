<?php

namespace Cps\informaticaBundle\Controller;

use Cps\informaticaBundle\Entity\remitente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Remitente controller.
 *
 * @Route("remitente")
 */
class remitenteController extends Controller
{
    /**
     * Lists all remitente entities.
     *
     * @Route("/", name="remitente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $remitentes = $em->getRepository('CpsinformaticaBundle:remitente')->findAll();

        return $this->render('remitente/index.html.twig', array(
            'remitentes' => $remitentes,
        ));
    }

    /**
     * Creates a new remitente entity.
     *
     * @Route("/new", name="remitente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $remitente = new Remitente();
        $form = $this->createForm('Cps\informaticaBundle\Form\remitenteType', $remitente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($remitente);
            $em->flush($remitente);

            return $this->redirectToRoute('remitente_show', array('id' => $remitente->getId()));
        }

        return $this->render('remitente/new.html.twig', array(
            'remitente' => $remitente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a remitente entity.
     *
     * @Route("/{id}", name="remitente_show")
     * @Method("GET")
     */
    public function showAction(remitente $remitente)
    {
        $deleteForm = $this->createDeleteForm($remitente);

        return $this->render('remitente/show.html.twig', array(
            'remitente' => $remitente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing remitente entity.
     *
     * @Route("/{id}/edit", name="remitente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, remitente $remitente)
    {
        $deleteForm = $this->createDeleteForm($remitente);
        $editForm = $this->createForm('Cps\informaticaBundle\Form\remitenteType', $remitente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('remitente_edit', array('id' => $remitente->getId()));
        }

        return $this->render('remitente/edit.html.twig', array(
            'remitente' => $remitente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a remitente entity.
     *
     * @Route("/{id}", name="remitente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, remitente $remitente)
    {
        $form = $this->createDeleteForm($remitente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($remitente);
            $em->flush($remitente);
        }

        return $this->redirectToRoute('remitente_index');
    }

    /**
     * Creates a form to delete a remitente entity.
     *
     * @param remitente $remitente The remitente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(remitente $remitente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('remitente_delete', array('id' => $remitente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
