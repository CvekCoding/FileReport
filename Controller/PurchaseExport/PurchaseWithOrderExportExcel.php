<?php

declare(strict_types=1);

namespace App\Controller\PurchaseExport;

use App\Entity\Main\Purchase;
use App\Utils\ExportService\Document\Purchase\PurchaseWithOrderExcelResponder;
use Symfony\Component\HttpFoundation\Response;

final class PurchaseWithOrderExportExcel
{
    private $responder;

    public function __construct(PurchaseWithOrderExcelResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * @param Purchase $data
     *
     * @return Response
     *
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function __invoke(Purchase $data): Response
    {
        return $this->responder->getResponse($data);
    }
}
