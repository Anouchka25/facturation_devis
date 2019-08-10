<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisType;
use Spipu\Html2Pdf\Html2Pdf;
use App\Service\T_HTML2PDF;
use App\Repository\DevisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/devis")
 */
class DevisController extends AbstractController
{
    /**
     * @Route("/", name="devis_index", methods={"GET"})
     */
    public function index(DevisRepository $devisRepository): Response
    {
        $userDeviss = $devisRepository->findBy(['user' => $this->getUser()]);

        return $this->render('devis/index.html.twig', [
            'deviss' => $userDeviss,
        ]);
    }

    /**
     * @Route("/new", name="devis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $devis = new Devis();
        $devis->setUser($this->getUser());

        $form = $this->createForm(DevisType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($devis);
            $entityManager->flush();

            return $this->redirectToRoute('devis_index');
        }

        return $this->render('devis/new.html.twig', [
            'devis' => $devis,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="devis_show", methods={"GET"})
     */
    public function show(Devis $devis): Response
    {
        return $this->render('devis/show.html.twig', [
            'devis' => $devis,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="devis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Devis $devis): Response
    {
        $form = $this->createForm(DevisType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('devis_index', [
                'id' => $devis->getId(),
            ]);
        }

        return $this->render('devis/edit.html.twig', [
            'devis' => $devis,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="devis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Devis $devis): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devis->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($devis);
            $entityManager->flush();
        }

        return $this->redirectToRoute('devis_index');
    }

    /**
   * @Route("devis_pdf/{id}", name="devis_pdf", methods={"GET"})
     */
    public function showPdf(Devis $devis): Response
    {
        $template = $this->render('devis/pdf.html.twig', [
            'devis' => $devis,
        ]);

      $html2pdf = new T_Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
      $html2pdf->create('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));

      return $html2pdf->generatePdf($template, "devis");
    }
}
