<?php
namespace Application\Model;

use TCPDF;

class Pdf extends TCPDF{
    public $headerStop = 30;

    public function header()
    {
        // Add the logo to the header.
        //$this->addLogo();

        // Add the date to the op of the page(above the logo).
        $datetime = new \DateTime(null, new \DateTimeZone('Europe/Brussels'));
        $this->Cell(0,
                20,
                $datetime->format('Y-m-d'),
                0,
                false,
                'R',
                0,
                '',
                0,
                false,
                'T',
                'M');
    }

    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Page number
        $this->Cell(0,
                    10,
                    'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),
                    0,
                    false,
                    'R',
                    0,
                    '',
                    0,
                    false,
                    'T',
                    'M');
    }

    public function SetTitle($title)
    {
        // At page 1 we need to add a title.
        $this->setPage(1);

        /*
         * We set the font and color and size
        * and write the title.
        */
        $this->SetTextColor(8, 5, 123);
        $this->SetFont('helvetica', 'B', 19);
        $this->write(25, $title);

        parent::SetTitle($title);
    }

//     // Add the client logo with a set height and appropriate width
//     protected function addLogo()
//     {
//         $logoFile = $this->config['paths']['imagesPath'].'emsys.jpg';
//         $iHeight = 16; // The ideal height
//         list($width, $height, $type, $attr) = getimagesize($logoFile);
//         // Scale image so we always get ideal height with a correct aspect ratio.
//         $scaleFactor = $iHeight / $height;
//         $width*=$scaleFactor;
//         $height*=$scaleFactor;
//         $this->Image( $logoFile , 210 - $this->rMargin - $width , $this->rMargin , $width , $height );
//     }
}