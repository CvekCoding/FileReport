<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

use App\Entity\Main\Purchase;
use App\Utils\ExportService\ExcelFileResponder;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class PurchaseWithOrderExcelResponder
{
    private $excelFileResponder;
    private $htmlView;

    public function __construct(ExcelFileResponder $excelFileResponder, PurchaseWithOrderHtmlView $htmlView)
    {
        $this->excelFileResponder = $excelFileResponder;
        $this->htmlView = $htmlView;
    }

    /**
     * @param Purchase $purchase
     *
     * @return StreamedResponse
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function getResponse(Purchase $purchase): StreamedResponse
    {
        $html = $this->htmlView->getHtml($purchase);

        return $this->excelFileResponder->getExcelFileResponse($html, $this->htmlView->getName());
    }
}
