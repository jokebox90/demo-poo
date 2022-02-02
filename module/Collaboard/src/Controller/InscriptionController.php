<?php

declare(strict_types=1);

namespace Collaboard\Controller;


use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class InscriptionController extends AbstractActionController
{
    public function indexAction()
    {
        /**
         * @var Laminas\Http\Request $request
         * @var Laminas\View\Model\ViewModel $viewModel
         * @var Laminas\Stdlib\Parameters $postData
         */

        $request   = $this->getRequest();
        $viewModel = new ViewModel();

        if (! $request->isPost()) {
            return $viewModel;
        }

        $postData = $request->getPost();
        $viewData = [
            'nom'            => $postData->get('nom'),
            'prenom'         => $postData->get('prenom'),
            'genre'          => $postData->get('genre'),
            'date_naissance' => $postData->get('date_naissance'),
        ];
        $viewModel->setVariable('collaborateur', $viewData);

        return $viewModel;
    }
}
