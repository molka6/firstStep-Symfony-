<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;







class CrController extends AbstractController
{

  
    /**
     * @var PropertyRepository
     */

    public function __construct(PropertyRepository $repository)
    {
        $this-> repository= $repository;
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

public function edit(Property $property): Response
{
    return $this->render('crud/edit.html.twig', compact('property'));
}



}
