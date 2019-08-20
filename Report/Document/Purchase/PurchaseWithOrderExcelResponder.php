<?php

declare(strict_types=1);

namespace App\Utils\ExportService\Document\Purchase;

use App\Entity\Main\Purchase;
use App\Utils\ExportService\ImportExcelResponderTrait;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class PurchaseWithOrderExcelResponder extends AbstractPurchaseWithOrderResponder
{
    use ImportExcelResponderTrait;
}
