<?php

declare(strict_types=1);

namespace App\Controller\PurchaseExport;

use App\Entity\Main\Purchase;
use App\Utils\ExportService\Document\Purchase\PurchaseWithOrderPdfResponder;
use Symfony\Component\HttpFoundation\Response;

final class PurchaseWithOrderExportPdf
{
    private $responder;

    public function __construct(PurchaseWithOrderPdfResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * @param Purchase $data
     *
     * @return Response
     */
    public function __invoke(Purchase $data): Response
    {
        return $this->responder->getResponse($data);
    }
}
