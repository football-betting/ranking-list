<?php
declare(strict_types=1);

namespace App\Frontend\Communication\Controller;

use App\Frontend\Business\rankingListBusinessFacade;
use App\Frontend\Business\RankingListBusinessFacadeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;



/**
 * @Route("/ranking_list")
 */

class rankingListController extends AbstractController
{
    /**
     * @var \App\Frontend\Business\RankingListBusinessFacadeInterface $rankingListBusinessFacade
     */
    private RankingListBusinessFacadeInterface $rankingListBusinessFacade;

    public function __construct(RankingListBusinessFacadeInterface $rankingListBusinessFacade )
    {
        $this->rankingListBusinessFacade = $rankingListBusinessFacade;
    }
    /**
     * @Route("/list", name="ranking_list_general", methods={"GET"})
     * @throws \Exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(): Response
    {
        return $this->render('placeholder.html.twig', [
            'rankingList' => $this->rankingListBusinessFacade->getRankingList(),
            'winnerOfTheDay' => $this->rankingListBusinessFacade->getWinnerOfTheDay()
        ]);

    }



}