<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

use App\Entity\Main\Purchase;
use App\Utils\ExportService\ImportExcelResponderTrait;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class PurchaseWithOrderExcelResponder extends AbstractPurchaseWithOrderResponder
{
    use ImportExcelResponderTrait;

    /**
     * @param Purchase $purchase
     *
     * @return StreamedResponse
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function getResponse(Purchase $purchase): StreamedResponse
    {
        $html = $this->purchaseWithOrderHtmlView->getHtml($purchase);

        return $this->excelFileResponder->getExcelFileResponse($html, $this->getName());
    }
}
