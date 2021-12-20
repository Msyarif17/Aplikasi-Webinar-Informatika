<?php

namespace App\Http\Controllers;

use Imagick;
use SVG\SVG;
use setasign\Fpdi\Fpdi;
use App\Mail\WebinarMail;
use Illuminate\Http\Request;
use SVG\Nodes\Shapes\SVGRect;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use App\Http\Controllers\ZoomOauthController;
use App\Mail\Sertif;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
class WebinarMailController extends Controller
{
    protected $tokenx;
    public function sendMailReg($name, $email, $webinar, $token)
    {
        $details = [
            'title' => $webinar->judul,
            'name' => $name,
            'url' => $webinar->link,
            'date' => $webinar->jadwal,
            'thumbnail' => $webinar->thumbnail
        ];
        $this->tokenx = $token;
        Mail::to($email)->send(new WebinarMail($details,$this->tokenx));
        return 1;
    }
    public function sendMailSertif($user, $webinar,$token)
    {
        $details = [
            'title' => $webinar->judul,
            'pelaksanaan' => $webinar->jadwal,
            'name' => $user->name,
        ];
        $this->tokenx = $token;
        $this->proses($user->name,$webinar->judul,$token);
        Mail::to($user->email)->send(new Sertif($details , $this->tokenx));
       
        return 1;
    }
    public function proses($name,$judul,$token){
        
        $nama = $name;
        $webinar = $judul;
       
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create(route('cek',$token))
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        
        $label = Label::create('Cek Keasliannya')
            ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode,$logo=null, $label);
        
        $output_file2 = "/public/sertif/qr/" . $this->tokenx . ".png";
        
        Storage::disk('local')->put($output_file2, $result);
        $result->saveToFile("storage/sertif/qr/" . $this->tokenx . ".png");
        
        $output = public_path()."sertifikat.pdf";
        Storage::disk('local')->put("/public/sertif/" . $this->tokenx . ".pdf", $output);
        $this->createSertifikat(public_path()."/sertif/sertifikat.pdf",$output,$nama,$webinar,"storage/sertif/qr/" . $this->tokenx . ".png");
        

        return response()->file($output);
    }
    public function createSertifikat($file, $output,$nama,$w,$img){
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top = 140;
        $right = 278;
        $a = -76;
        $name = $nama;
        $fpdi->SetFont('helvetica',"BU",24);
        $fpdi->SetTextColor(25,25,25);
        $fpdi->Cell($right,$top,$name,0,1,"C");
        $fpdi->SetFont('helvetica',"B",14);
        $fpdi->SetTextColor(25,25,25);
        $fpdi->Cell($right,$a,$w,0,1,"C");
        $fpdi->Image($img,260,174,-300);
        return $fpdi->Output("storage/sertif/" . $this->tokenx . ".pdf",'F');
    }
}
