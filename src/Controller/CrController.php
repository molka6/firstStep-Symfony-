<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Property;
use App\Repository\PropertyRepository;
use App\Form\PropertyType;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;



class CrController extends AbstractController
{

  
    /**
     * @var PropertyRepository
     */

    public function __construct(PropertyRepository $repository , EntityManagerInterface $em)
    {
        $this-> repository= $repository;
        $this -> em =$em ;
    }
  

    /**
     * @Route("/crud", name="Preporty.crud.index")
     */
    public function index(): Response
    {
        $property=$this->repository->findall(); 
        return $this->render('crud/index.html.twig', compact('property'));
    }


 /**
     * @Route("/edit/{id}/edit", name="Preporty.crud.edit")
     */

public function edit(Property $property , Request $request): Response
{
    $form=$this -> createForm ( PropertyType :: class , $property );
    $form -> handleRequest($request); 
    if ($form -> isSubmitted () && $form -> isValid() )
    {
        $this -> em -> flush() ;
        $this -> addFlash('success' , 'bien modifié');
        return $this -> redirectToRoute('Preporty.crud.index') ; 
    }
    return $this->render('crud/edit.html.twig', [
        'property' => $property , 
        'form' => $form -> createView()
    ]

);
}



}
