<?php

require 'vendor/autoload.php';

use Oscorp\Pet\Model\Owner;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

$form = <<<FORM
    <form method="get">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="phone">Phone-number:</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        <input type="submit" name="pressedButton" value="Submit">
    </form>
FORM;



if(isset($_GET['pressedButton'])) {

    $owner = new Owner($_GET['name'],$_GET['phone']);

    $data = $owner->toString();

    $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data($data)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
        //->logoPath(__DIR__.'/assets/symfony.png')
        ->labelText('Find the Owner')
        ->labelFont(new NotoSans(20))
        ->labelAlignment(new LabelAlignmentCenter())
        ->build();

// Directly output the QR code
    header('Content-Type: ' . $result->getMimeType());
    echo $result->getString();
} else {
    echo $form;
}