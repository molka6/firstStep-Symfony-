<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class HomeController extends AbstractController
{
/** 
         * @var Environment
		  */

	 /**
     * @Route("/", name="home")
     */
    private $twig; 


	public function __construct(Environment $twig)
	{
		$this->twig = $twig;
	}


	public function index():Response
	{
		return $this->render('pages/Home.html.twig');
	}

}