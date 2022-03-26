<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class DocumentController extends Controller
{
    public function convertWordToPDF()
    {
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('result.docx'));

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('new-result.pdf'));
        echo 'File has been successfully converted';
    }

    public function convertWordToPDFChangable($enrollment, $filename)
    {
        $filename="app/".$filename;
        /* Set the PDF Engine Renderer Path

        ${title} ${firstname} ${lastname}

         */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        /*@ Reading doc file */
        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path($filename));

        /*@ Replacing variables in doc file */
        $template->setValue('name', $enrollment->name);
        $template->setValue('email', $enrollment->email);
        $template->setValue('tel', $enrollment->tel);
        $template->setValue('todaysdate', Carbon::now()->format('Y-m-d'));
        $template->setValue('4weeksdate', Carbon::now()->addWeekdays(4)->format('Y-m-d'));

        $new_filename="app/admissionletter/";
        $new_filename.=str_replace(" ", "",$enrollment->name);
        $new_filename.=rand();

        /*@ Save Temporary Word File With New Name */
        $saveDocPath = storage_path($new_filename.'.docx');
        $template->saveAs($saveDocPath);

        // Load temporarily create word file
        $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath);

        //Save it into PDF
        $savePdfPath = storage_path($new_filename.'.pdf');

        /*@ If already PDF exists then delete it */
        if ( file_exists($savePdfPath) ) {
            unlink($savePdfPath);
        }

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save($savePdfPath);

        /*@ Remove temporarily created word file */
        if ( file_exists($saveDocPath) ) {
            unlink($saveDocPath);
        }

        return $savePdfPath;
    }

    public function convertWordToPDFChangableDemo()
    {
        /* Set the PDF Engine Renderer Path

        ${title} ${firstname} ${lastname}

         */

        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        /*@ Reading doc file */
        $template = new\PhpOffice\PhpWord\TemplateProcessor(public_path('result.docx'));

        /*@ Replacing variables in doc file */
        $template->setValue('date', date('d-m-Y'));
        $template->setValue('title', 'Mr.');
        $template->setValue('firstname', 'Scratch');
        $template->setValue('lastname', 'Coder');

        /*@ Save Temporary Word File With New Name */
        $saveDocPath = public_path('new-result.docx');
        $template->saveAs($saveDocPath);

        // Load temporarily create word file
        $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath);

        //Save it into PDF
        $savePdfPath = public_path('new-result.pdf');

        /*@ If already PDF exists then delete it */
        if ( file_exists($savePdfPath) ) {
            unlink($savePdfPath);
        }

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save($savePdfPath);
        echo 'File has been successfully converted';

        /*@ Remove temporarily created word file */
        if ( file_exists($saveDocPath) ) {
            unlink($saveDocPath);
        }
    }
}
