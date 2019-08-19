<?php
/**
 * This file is part of the Diningedge package.
 *
 * (c) Sergey Logachev <svlogachev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controller\PurchaseExport;

use App\Controller\AbstractFileExportAction;
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
     * @param $data
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
