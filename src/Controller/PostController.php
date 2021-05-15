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

class PostController extends AbstractController
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
     * @Route("/new", name="Preporty.crud.new")
     */
    public function new (Request $request): Response
    {
        $property= new Property();
        $form=$this -> createForm ( PropertyType :: class , $property );
        $form -> handleRequest($request); 
        if ($form -> isSubmitted () && $form -> isValid() )
                    {
                    // informe Doctrine que l’on veut ajouter cet objet dans la base de donnees. 
                    $this -> em -> persist($property);
                    //permet d’executer la requ ´ ete et d’envoyer tout ce qui a eté  persist avant a la base de donnees.
                    $this -> em -> flush () ;  
                    return $this -> redirectToRoute('Preporty.crud.index');
                    }
        return $this->render('crud/new.html.twig',
    [
        'property' => $property , 
        'form' => $form -> createView()


    ]);
    }


 



}
