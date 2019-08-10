<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use Spipu\Html2Pdf\Html2Pdf;
use App\Service\T_HTML2PDF;
use App\Repository\FactureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/facture")
 */
class FactureController extends AbstractController
{
    /**
     * @Route("/", name="facture_index", methods={"GET"})
     */
    public function index(FactureRepository $factureRepository): Response
    {
        $userFactures = $factureRepository->findBy(['user' => $this->getUser()]);

        return $this->render('facture/index.html.twig', [
            'factures' => $userFactures,
        ]);
    }

    /**
     * @Route("/new", name="facture_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $facture = new Facture();
        $facture->setUser($this->getUser());

        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('facture_index');
        }

        return $this->render('facture/new.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/guest_new", name="guest_facture_new", methods={"GET","POST"})
     */
    public function guestnew(Request $request): Response
    {
        $facture = new Facture();
        //$facture->setUser($this->getUser());

        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

          return $this->redirectToRoute('facture_pdf');
        }

        return $this->render('guest/new.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);


    }

    /**
     * @Route("/{id}", name="facture_show", methods={"GET"})
     */
    public function show(Facture $facture): Response
    {
        return $this->render('facture/show.html.twig', [
            'facture' => $facture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="facture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Facture $facture): Response
    {
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('facture_index', [
                'id' => $facture->getId(),
            ]);
        }

        return $this->render('facture/edit.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="facture_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Facture $facture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($facture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('facture_index');
    }

    /**
   * @Route("facture_pdf/{id}", name="facture_pdf", methods={"GET"})
     */
    public function showPdf(Facture $facture): Response
    {
        $template = $this->render('facture/pdf.html.twig', [
            'facture' => $facture,
        ]);

      $html2pdf = new T_Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
      $html2pdf->create('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));

      return $html2pdf->generatePdf($template, "facture");
    }

}
