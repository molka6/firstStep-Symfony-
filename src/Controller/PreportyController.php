<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Property;
use App\Repository\PropertyRepository;

class PreportyController extends AbstractController
{
   
    /**
     * @var PropertyRepository
     */
    public function __construct(PropertyRepository $repository)
    {
        $this-> repository= $repository;
    }
  
 /**
     * @Route("/biens", name="Preporty.index")
     */
    public function index():Response
    {
        $property=$this->repository->find("id"); 
        dump($property);
        return $this->render('pages/index.html.twig');
     
        
    }
}
?>