<?php
declare(strict_types=1);

namespace CakePdf\Pdf\Engine;

use CakePdf\Pdf\CakePdf;
use Dompdf\Dompdf;

class DomPdfEngine extends AbstractPdfEngine
{
    /**
     * Generates Pdf from html
     *
     * @return string raw pdf data
     */
    public function output(): string
    {
        $defaults = [
            'fontCache' => TMP,
            'tempDir' => TMP,
        ];
        $options = (array)$this->getConfig('options') + $defaults;

        $DomPDF = $this->_createInstance($options);
        $DomPDF->setPaper($this->_Pdf->pageSize(), $this->_Pdf->orientation());
        $DomPDF = $this->_render($this->_Pdf, $DomPDF);

        return $this->_output($DomPDF);
    }

    /**
     * Creates the Dompdf instance.
     *
     * @param array $options The engine options.
     * @return \Dompdf\Dompdf
     */
    protected function _createInstance(array $options): Dompdf
    {
        return new Dompdf($options);
    }

    /**
     * Renders the Dompdf instance.
     *
     * @param \CakePdf\Pdf\CakePdf $Pdf The CakePdf instance that supplies the content to render.
     * @param \Dompdf\Dompdf $DomPDF The Dompdf instance to render.
     * @return \Dompdf\Dompdf
     */
    protected function _render(CakePdf $Pdf, Dompdf $DomPDF): Dompdf
    {
        $DomPDF->loadHtml($Pdf->html());
        $DomPDF->render();

        return $DomPDF;
    }

    /**
     * Generates the PDF output.
     *
     * @param \Dompdf\Dompdf $DomPDF The Dompdf instance from which to generate the output from.
     * @return string
     */
    protected function _output(Dompdf $DomPDF): string
    {
        return (string)$DomPDF->output();
    }
}
