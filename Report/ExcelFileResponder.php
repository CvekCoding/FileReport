<?php

declare(strict_types=1);

namespace App\Utils\ExportService;

use App\Utils\Tools\Normalizer;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Yectep\PhpSpreadsheetBundle\Factory;

/**
 * @internal
 */
final class ExcelFileResponder
{
    public const DEFAULT_WRITER = 'Xlsx';
    public const FILE_EXTENSION = 'xlsx';

    private $excelFactory;

    public function __construct(Factory $excelFactory)
    {
        $this->excelFactory = $excelFactory;
    }

    /**
     * @param string $html
     * @param string $fileName
     *
     * @return StreamedResponse
     *
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function getExcelFileResponse(string $html, string $fileName): StreamedResponse
    {
        $spreadsheet = $this->createSpreadsheetFromHtml($html);
        $streamedResponse = $this->excelFactory->createStreamedResponse($spreadsheet, self::DEFAULT_WRITER);
        $fullFileName = $this->getFullFileName($fileName);

        return $this->makeResponseDownloadable($streamedResponse, $fullFileName);
    }

    /**
     * Name of file to be downloaded.
     *
     * @param string $fileName
     *
     * @return string
     */
    private function getFullFileName(string $fileName): string
    {
        return Normalizer::snakeString($fileName).'.'.self::FILE_EXTENSION;
    }

    /**
     * @param string $html
     *
     * @return Spreadsheet
     *
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    private function createSpreadsheetFromHtml(string $html): Spreadsheet
    {
        $filesystem = new Filesystem();
        $tempFile = $filesystem->tempnam('/tmp', '');
        $filesystem->dumpFile($tempFile, $html);

        return $this->excelFactory->createSpreadsheet($tempFile);
    }

    /**
     * @param StreamedResponse $streamedResponse
     * @param string           $fileName
     *
     * @return StreamedResponse
     */
    private function makeResponseDownloadable(StreamedResponse $streamedResponse, string $fileName): StreamedResponse
    {
        $disposition = $streamedResponse->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $fileName
        );

        $streamedResponse->headers->set('Content-Disposition', $disposition);
        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        return $streamedResponse;
    }
}
