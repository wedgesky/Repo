<?php

namespace App\Controller;

use App\Entity\Billrow;
use App\Entity\Bill;
use App\Form\BillrowType;
use App\Repository\BillrowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/billrow")
 */
class BillrowController extends Controller
{
    /**
     * @Route("/", name="billrow_index", methods={"GET"})
     */
    public function index(BillrowRepository $billrowRepository, Request $request): Response
    {
        $id = $request->request->get('id');
        
        return $this->render('billrow/index.html.twig', [
            'id' => $id,
            'billrows' => $billrowRepository->findByIdBill($id),
        ]);
    }

    /**
     * @Route("/new", name="billrow_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $id = $request->request->get('id');
        
        $billrow = new Billrow();
        $billrow->setIdbill($id);
        $form = $this->createForm(BillrowType::class, $billrow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($billrow);
            $entityManager->flush();

            return $this->redirectToRoute('billrow_index');
        }

        return $this->render('billrow/new.html.twig', [
            'billrow' => $billrow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="billrow_show", methods={"GET"})
     */
    public function show(Billrow $billrow): Response
    {
        return $this->render('billrow/show.html.twig', [
            'billrow' => $billrow,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="billrow_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Billrow $billrow): Response
    {
        $form = $this->createForm(BillrowType::class, $billrow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('billrow_index');
        }

        return $this->render('billrow/edit.html.twig', [
            'billrow' => $billrow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="billrow_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Billrow $billrow): Response
    {
        if ($this->isCsrfTokenValid('delete'.$billrow->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($billrow);
            $entityManager->flush();
        }

        return $this->redirectToRoute('billrow_index');
    }
}
