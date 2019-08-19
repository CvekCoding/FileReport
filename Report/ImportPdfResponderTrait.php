<?php

declare(strict_types=1);

namespace App\Utils\ExportService;

trait ImportPdfResponderTrait
{
	/** @var PdfFileResponder */
	protected $pdfFileResponder;

	/**
	 * @required
	 *
	 * @param PdfFileResponder $pdfFileResponder
	 */
	public function setPdfFileResponder(PdfFileResponder $pdfFileResponder): void
	{
		$this->pdfFileResponder = $pdfFileResponder;
	}
}
