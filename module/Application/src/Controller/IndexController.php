<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Services\Covid19Service;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use \Application\Interfaces\Covid19Api;


class IndexController extends AbstractActionController
{
    private $covid19ApiService;
    private $covid19Service;

    public function __construct(Covid19Api $covid19Api, Covid19Service $covid19Service)
    {
        $this->covid19ApiService = $covid19Api;
        $this->covid19Service = $covid19Service;
    }

    public function indexAction()
    {
        $casos = $this->covid19ApiService->getLastSixMonthsCase();
        $mediasMoveis = $this->covid19Service->getMediaMovelUltimasDuasSemanas($casos);
        dd($mediasMoveis);
        return new ViewModel(['medias' => $mediasMoveis]);
    }
}
