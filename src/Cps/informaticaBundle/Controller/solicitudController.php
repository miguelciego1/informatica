<?php

namespace Cps\informaticaBundle\Controller;

use Cps\informaticaBundle\Entity\solicitud;
use Cps\informaticaBundle\Entity\remitente;
use Cps\informaticaBundle\Entity\Asignar;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use CpsinformaticaBundle\Form\remitenteType;
use CpsinformaticaBundle\Form\asignarType;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Solicitud controller.
 *
 * @Route("solicitud")
 */
class solicitudController extends Controller
{
    /**
     * Lists all solicitud entities.
     *
     * @Route("/", name="solicitud_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $searchQuery = $request->get('query');
        $em = $this->getDoctrine()->getManager();
        $solicituds = $em->getRepository('CpsinformaticaBundle:solicitud')->spendiente($searchQuery);
        $lista = array(); $cont=0;
        foreach ($solicituds as $value) {
            $solicitud_id = $value['id'];
            $lista[$cont]['id']= $solicitud_id;
            $lista[$cont]['fecha']= $value['fecha'];
            $lista[$cont]['ruta']= $value['ruta'];
            $lista[$cont]['cite']= $value['cite'];
            $lista[$cont]['nombre']= $value['nombre'];
            $lista[$cont]['referencia']= $value['referencia'];
            $nombus =$em->getRepository('CpsinformaticaBundle:solicitud')->busPersonal($solicitud_id);
            if ($nombus == null) {
                $nombre = "Sin Asignar";
            }
            foreach ($nombus as $v) {
                $nombre= $v['nom'];
            }
            $lista[$cont]['personal']= $nombre;
            $lista[$cont]['estado']= $value['estado'];
            $cont=$cont + 1;
        }
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $lista,$request->query->getInt('page',1),11
        );
        return $this->render('solicitud/index.html.twig', array(
            'pagination' => $pagination,
        ));    
    }
    /**
     * Lists all solicitud entities.
     *
     * @Route("/reporte", name="reporte")
     * @Method("GET")
     */
    public function reporteAction(Request $request)
    {
        $searchQuery = $request->get('query');
        $em = $this->getDoctrine()->getManager();
        $solicituds = $em->getRepository('CpsinformaticaBundle:solicitud')->rnombre($searchQuery);
        $lista = array(); $cont=0;
        foreach ($solicituds as $value) {
            $solicitud_id = $value['id'];
            $lista[$cont]['id']= $solicitud_id;
            $lista[$cont]['fecha']= $value['fecha'];
            $lista[$cont]['ruta']= $value['ruta'];
            $lista[$cont]['cite']= $value['cite'];
            $lista[$cont]['nombre']= $value['nombre'];
            $lista[$cont]['referencia']= $value['referencia'];
            $nombus =$em->getRepository('CpsinformaticaBundle:solicitud')->busPersonal($solicitud_id);
            if ($nombus == null) {
                $nombre = "Sin Asignar";
            }
            foreach ($nombus as $v) {
                $nombre= $v['nom'];
            }
            $lista[$cont]['personal']= $nombre;
            $lista[$cont]['estado']= $value['estado'];
            $cont=$cont + 1;
        }
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $lista,$request->query->getInt('page',1),11
        );
        return $this->render('solicitud/reporte.html.twig', array(
            'pagination' => $pagination,
        ));    
    }
    /**
     * Lists all solicitud entities.
     *
     * @Route("/proceso", name="solicitud_proceso")
     * @Method("GET")
     */
    public function procesoAction(Request $request)
    {
        
        $searchQuery = $request->get('query');
        $em = $this->getDoctrine()->getManager();
        $solicituds = $em->getRepository('CpsinformaticaBundle:solicitud')->sproceso($searchQuery);
        $lista = array(); $cont=0;
        foreach ($solicituds as $value) {
            $solicitud_id = $value['id'];
            $lista[$cont]['id']= $solicitud_id;
            $lista[$cont]['fecha']= $value['fecha'];
            $lista[$cont]['ruta']= $value['ruta'];
            $lista[$cont]['cite']= $value['cite'];
            $lista[$cont]['nombre']= $value['nombre'];
            $lista[$cont]['referencia']= $value['referencia'];
            $nombus =$em->getRepository('CpsinformaticaBundle:solicitud')->busPersonal($solicitud_id);
            if ($nombus == null) {
                $nombre = "Sin Asignar";
            }
            foreach ($nombus as $v) {
                $nombre= $v['nom'];
            }
            $lista[$cont]['personal']= $nombre;
            $lista[$cont]['estado']= $value['estado'];
            $cont=$cont + 1;
        }
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $lista,$request->query->getInt('page',1),11
        );

        return $this->render('solicitud/proceso.html.twig', array(
              'pagination' => $pagination,
        ));    }

    /**
     * Lists all solicitud entities.
     *
     * @Route("/realizado", name="solicitud_realizado")
     * @Method("GET")
     */
    public function realizadoAction(Request $request)
    {
      $searchQuery = $request->get('query');
      $em = $this->getDoctrine()->getManager();
      $solicituds = $em->getRepository('CpsinformaticaBundle:solicitud')->srealizado($searchQuery);
      $lista = array(); $cont=0;
        foreach ($solicituds as $value) {
            $solicitud_id = $value['id'];
            $lista[$cont]['id']= $solicitud_id;
            $lista[$cont]['fecha']= $value['fecha'];
            $lista[$cont]['ruta']= $value['ruta'];
            $lista[$cont]['cite']= $value['cite'];
            $lista[$cont]['nombre']= $value['nombre'];
            $lista[$cont]['referencia']= $value['referencia'];
            $nombus =$em->getRepository('CpsinformaticaBundle:solicitud')->busPersonal($solicitud_id);
            if ($nombus == null) {
                $nombre = "Sin Asignar";
            }
            foreach ($nombus as $v) {
                $nombre= $v['nom'];
            }
            $lista[$cont]['personal']= $nombre;
            $lista[$cont]['estado']= $value['estado'];
            $cont=$cont + 1;
        }
        $paginator=$this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $lista,$request->query->getInt('page',1),11
        );

      return $this->render('solicitud/realizado.html.twig', array(
            'pagination' => $pagination,
      ));    }
//------------------------------------------------------------------------------------------------------------------------
  /**
   * @Route("/procesar/{id}", name="procesar")
   * @Method("GET")
   */
   public function procesarAction(Request $request, solicitud $solicitud)
   {
        $searchQuery = $request->get('query');
        $em = $this->getDoctrine()->getManager();
        $this->getDoctrine()->getManager()->flush();
        $solicitud->setEstado(2);
        $em->persist($solicitud);
        $flush = $em->flush();
        return $this->redirectToRoute('solicitud_index');
   }

   /**
    * @Route("/realizar/{id}", name="realizar")
    * @Method("GET")
    */
    public function realizarAction(Request $request, solicitud $solicitud)
    {
        $searchQuery = $request->get('query');
        $em = $this->getDoctrine()->getManager();
        $this->getDoctrine()->getManager()->flush();
        $solicitud->setEstado(3);
        $em->persist($solicitud);
        $flush = $em->flush();
        return $this->redirectToRoute('solicitud_proceso');
    }
// ------------------------------------------------------------------------------------------------------------------------

    /**
     * Creates a new solicitud entity.
     *
     * @Route("/new", name="solicitud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); //traer sesion
        $username = $this->get('security.context')->getToken()->getUser();
        $usuario = $username->getId();

        if ($usuario != 'anon.') {
            $objusuario = $em->getRepository('CpschequeBundle:User')->find($usuario);
        }else {
            return $this->redirectToRoute('homepage');
        }
        $solicitud = new Solicitud();
        $Solicitudform=array('ruta'=>null,'fecha'=>null,'cite'=>null,'referencia'=>null,
                             'estado'=>null,'usuario'=>null,'remitente'=>null);
                $form = $this->createFormBuilder($Solicitudform)
                ->add('ruta')
                ->add('cite')
                ->add('fecha', 'genemu_jquerydate', array(
                        'widget' => 'single_text'
                    ))
                ->add('referencia')
                ->add('remitente', 'genemu_jqueryautocomplete_entity', array(
                'class' => 'Cps\informaticaBundle\Entity\remitente',
                'route_name' => 'ajax_remitente'
                        ))->getForm();
                $form->handleRequest($request);



        $remitente = new Remitente();
        $formb = $this->createForm('Cps\informaticaBundle\Form\remitenteType', $remitente);
        $formb->handleRequest($request);


        if ($formb->isSubmitted() && $formb->isValid()) {
            $data=$formb->getData();
            $nombre=$data->getNombre();
            $em = $this->getDoctrine()->getManager();
            $em->persist($remitente);
            $em->flush($remitente);
            $this->addFlash('mensaje','Se ha registrado ha '.$nombre.' correctamente.');

            return $this->redirect($request->getUri());
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $datad=$form->getData();
            $ruta=$datad['ruta'];
            $cite=$datad['cite'];
            $fechaD=$datad['fecha'];
            $referencia=$datad['referencia'];
            $idRemitente = $datad['remitente'];
            $RemitenteID =$em->getRepository('CpsinformaticaBundle:remitente')->findOneById($idRemitente);

            $solicitud->setRuta($ruta);
            $solicitud->setCite($cite);
            $solicitud->setFecha($fechaD);
            $solicitud->setReferencia($referencia);
            $solicitud->setRemitente($RemitenteID);
            $solicitud->setUsuario($objusuario);
            $solicitud->setEstado(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($solicitud);
            $em->flush($solicitud);

            return $this->redirectToRoute('solicitud_index');
        }

        return $this->render('solicitud/new.html.twig', array(
            'solicitud' => $solicitud,
            'form' => $form->createView(),
            'formb' => $formb->createView(),
        ));
    }

    /**
     * Finds and displays a solicitud entity.
     *
     * @Route("/{id}", name="solicitud_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(solicitud $solicitud,Request $request)
    {
      $solicitud_id = $solicitud->getId();
      $em = $this->getDoctrine()->getManager();
      $asignar = new Asignar();
      $form = $this->createForm('Cps\informaticaBundle\Form\asignarType', $asignar);
      $form->handleRequest($request);
      $valor=0;
      if ($solicitud_id != null) {
          $lista =$em->getRepository('CpsinformaticaBundle:solicitud')->busPersonal($solicitud_id);
          $valor=1;
      }
      if ($lista ==  null) {
        $valor = 2;
      }
      if ($form->isSubmitted() && $form->isValid()) {
          $idd = $em->getRepository('CpsinformaticaBundle:solicitud')->find($solicitud_id);
          $asignar->setSolicitud($idd);
          $em = $this->getDoctrine()->getManager();
          $em->persist($asignar);
          $em->flush();
          return $this->redirect($request->getUri());
      }
        return $this->render('solicitud/show.html.twig', array(
            'solicitud' => $solicitud,
            'lista' => $lista,
            'valor' => $valor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing solicitud entity.
     *
     * @Route("/{id}/edit", name="solicitud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, solicitud $solicitud)
    {
        // $deleteForm = $this->createDeleteForm($solicitud);
        // $editForm = $this->createForm('Cps\informaticaBundle\Form\solicitudType', $solicitud);
        // $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        $editRuta = $solicitud->getRuta();
        $editCite = $solicitud->getCite();
        $editFecha = $solicitud->getFecha();
        $editReferencia = $solicitud->getReferencia();
        $editRemitente = $solicitud->getRemitente();

        $editFor=array('ruta'=>$editRuta,'cite'=>$editCite,'fecha'=>$editFecha,'referencia'=>$editReferencia,
                             'remitente'=>null);
                $editForm = $this->createFormBuilder($editFor)
                ->add('ruta')
                ->add('cite')
                ->add('fecha', 'genemu_jquerydate', array(
                        'widget' => 'single_text'
                    ))
                ->add('referencia')
                ->add('remitente', 'genemu_jqueryautocomplete_entity', array(
                'class' => 'Cps\informaticaBundle\Entity\remitente',
                'route_name' => 'ajax_remitente'
                        ))->getForm();
                $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $data=$editForm->getData();
            $rutaData=$data['ruta'];
            $citeData=$data['cite'];
            $fechaData=$data['fecha'];
            $referenciaData=$data['referencia'];
            $RemitenteID =$em->getRepository('CpsinformaticaBundle:remitente')->findOneById($data['remitente']);

            $solicitud->setRuta($rutaData);
            $solicitud->setCite($citeData);
            $solicitud->setFecha($fechaData);
            $solicitud->setReferencia($referenciaData);
            $em->persist($solicitud);
            $em->flush($solicitud);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('mensaje','Se ha modificado correctamente.');
            return $this->redirectToRoute('solicitud_edit', array('id' => $solicitud->getId()));
        }

        return $this->render('solicitud/edit.html.twig', array(
            'solicitud' => $solicitud,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a solicitud entity.
     *
     * @Route("/{id}", name="solicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, solicitud $solicitud)
    {
        $form = $this->createDeleteForm($solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($solicitud);
            $em->flush($solicitud);
        }

        return $this->redirectToRoute('solicitud_index');
    }

    /**
     * Creates a form to delete a solicitud entity.
     *
     * @param solicitud $solicitud The solicitud entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(solicitud $solicitud)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('solicitud_delete', array('id' => $solicitud->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

     /**
     * @Route("/ajax/remitente/", name="ajax_remitente")
     */
    public function ajaxAction(Request $request)
    {
        $value = $request->get('term');
        $em = $this->getDoctrine()->getManager();
        $remitentes = $em->getRepository('CpsinformaticaBundle:remitente')->findAjaxValue($value);
        $json = array();
        foreach ($remitentes as $remitente) {

            $json[] = array(
                'label' => $remitente->getNombre(),
                'value' => $remitente->getId() ." ".$remitente->getNombre()
            );
        }
        $response = new Response(json_encode($json));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
}
