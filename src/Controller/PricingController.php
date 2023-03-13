<?php

namespace App\Controller;

use App\Repository\PricingPlanRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PricingPlanBenefitRepository;
use App\Repository\PricingPlanFeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PricingController extends AbstractController
{

    private $pp;
    private $ppf;

  
    public function __construct(PricingPlanRepository $pp, PricingPlanFeatureRepository $ppf)
    {

        $this->pp = $pp;
        $this->ppf = $ppf;


    }

    #[Route('/pricing', methods: ['GET'], name: 'pricing')]
    public function index(): Response
    {

        return $this->render('pricing/pricing.html.twig', [
            'pricing_plans' => $this->pp->FindAll(),
            'features' => $this->ppf->FindAll()
        ]);

    }
}
