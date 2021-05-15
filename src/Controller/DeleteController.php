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

class DeleteController extends AbstractController
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
     * @Route("/delete/{id}", name="Preporty.crud.delete" , methods="DELETE" )
     */

   
    public function delete(Property $property)
    {
      $this -> em -> remove ($property);
      $this -> em -> flush() ; 

      return $this -> redirectToRoute('Preporty.crud.index');
    }


 



}
