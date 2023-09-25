<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Text;




class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }




//    public function wordExport($id)
//    {
//        $book = Book::findOrFail($id);
//        // Create an HTMLPurifier configuration
//        $config = HTMLPurifier_Config::createDefault();
//
//        // Create an HTMLPurifier instance
//        $purifier = new HTMLPurifier($config);
//
//        // Sanitize the HTML content
////        $cleanedContent = $purifier->purify($book->content);
//
//
//        $templateProcessor = new TemplateProcessor('word-template/book.docx');
//        // Retrieve the content of the placeholder (e.g., {content})
//        $placeholder = $templateProcessor->getTemplateVariables()['content'];
//
//        // Replace the placeholder with your sanitized HTML content
//        $templateProcessor->setValue('content', ''); // Clear the
//        // Sanitize the HTML content
//        $cleanedContent = $purifier->purify($book->content);
//        $templateProcessor->setValue('content', $cleanedContent); // Replace it with HTML
//
//        $templateProcessor->setValue('id', $book->id);
//        $templateProcessor->setValue('creator', $book->creator);
//        $templateProcessor->setValue('depNameEn', $book->depNameEn);
//        $templateProcessor->setValue('depName', $book->depName);
//        $templateProcessor->setValue('toPerson', $book->toPerson);
//        $templateProcessor->setValue('variableName', $book->variableName);
//        $templateProcessor->setValue('signDate', $book->signDate);
////        $templateProcessor->setValue('content', $book->content);
//        $templateProcessor->setValue('thanks', $book->thanks);
//        $templateProcessor->setValue('greeting', $book->greeting);
//        $templateProcessor->setValue('toDo', $book->toDo);
//        $templateProcessor->setValue('attach', $book->attach);
//        $templateProcessor->setValue('signatory', $book->signatory);
//        $templateProcessor->setValue('image', $book->image);
//        $templateProcessor->setValue('position', $book->position);
//
//        // Set the sanitized content
////        $templateProcessor->setValue('content', $cleanedContent, ['html' => true]);
//
////        $templateProcessor->setValue('content', $cleanedContent);
//
//
//        // Add the Summernote content to the Word document as HTML
////        $htmlContent = $book->content; // Assuming that $book->content contains HTML
////        dd($htmlContent);
//
//        // Clean and sanitize HTML content
////        $config = HTMLPurifier_Config::createDefault();
////        $purifier = new HTMLPurifier($config);
////        $cleanedContent = $purifier->purify($htmlContent);
//
//        // Clean and sanitize the HTML content
////        $cleanedContent = HTMLPurifier::getInstance()->purify($htmlContent);
////        dd($cleanedContent);
//
//        // Replace placeholders
////        $templateProcessor->setValue('content', $cleanedContent, ['html' => true]);
//
////        $templateProcessor->setValue('content', $cleanedContent, 0, ['html' => true]);
//
//        $fileName = $book->creator;
//        $templateProcessor->saveAs($fileName . '.docx');
//        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
//    }



//    public function wordExport($id)
//    {
//        // Fetch the book data from the database
//        $book = Book::findOrFail($id);
//
//        // Load the Word template
//        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('word-template/book.docx');
//
//        // Replace placeholders in the template with data
//        $templateProcessor->setValue('id', $book->id);
//        $templateProcessor->setValue('creator', $book->creator);
//        $templateProcessor->setValue('depNameEn', $book->depNameEn);
//        $templateProcessor->setValue('depName', $book->depName);
//        $templateProcessor->setValue('toPerson', $book->toPerson);
//        $templateProcessor->setValue('variableName', $book->variableName);
//        $templateProcessor->setValue('signDate', $book->signDate);
//        $templateProcessor->setValue('thanks', $book->thanks);
//        $templateProcessor->setValue('greeting', $book->greeting);
//        $templateProcessor->setValue('toDo', $book->toDo);
//        $templateProcessor->setValue('attach', $book->attach);
//        $templateProcessor->setValue('signatory', $book->signatory);
//        $templateProcessor->setValue('image', $book->image);
//        $templateProcessor->setValue('position', $book->position);
//
//        // Get the HTML content from the Summernote editor
//        $html = $book->content;
//
//        // Clean and validate the HTML content using HTMLPurifier
//        $config = HTMLPurifier_Config::createDefault();
//        $purifier = new HTMLPurifier($config);
//        $cleanedHtml = $purifier->purify($html);
//
//        // Replace a placeholder for the HTML content
//        $templateProcessor->setValue("content", $cleanedHtml);
//
//        // Set the file name
//        $fileName = $book->creator . '.docx';
//
//        // Save the modified Word document
//        $templateProcessor->saveAs($fileName);
//
//        // Provide a download link for the generated document
//        return response()->download($fileName)->deleteFileAfterSend(true);
//    }






    public function wordExport($id)
    {
        // Fetch the book data from the database
        $book = Book::findOrFail($id);

        // Create a new PhpWord instance
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // Create a Word document section
        $section = $phpWord->addSection();

        // Replace placeholders in the template with data
        $section->addText("Book's Information:", ['bold' => true, 'size' => 16]);
        $section->addText("ID: " . $book->id);
        $section->addText("Creator: " . $book->creator);
        $section->addText("Department Name (English): " . $book->depNameEn);
        $section->addText("Department Name: " . $book->depName);
        $section->addText("To Person: " . $book->toPerson);
        $section->addText("Variable Name: " . $book->variableName);
        $section->addText("Sign Date: " . $book->signDate);

        // Add a heading for the content section
        $section->addText("Content:", ['bold' => true, 'size' => 14]);

        // Get the HTML content from the Summernote editor
        $html = $book->content;

        // Create an instance of HTMLPurifier and configure it (if needed)
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        // Clean and validate the HTML content using HTMLPurifier
        $cleanedHtml = $purifier->purify($html);

        // Create a Word HTML renderer
        $renderer = new \PhpOffice\PhpWord\Shared\Html();

        // Render HTML content into the Word document section
        $renderer->addHtml($section, $cleanedHtml);

        // Find and format tables in the section
        $elements = $section->getElements();
        foreach ($elements as $element) {
            if ($element instanceof \PhpOffice\PhpWord\Element\Table) {
                // Style the table
                $table = $element;
                $table->getStyle()->setBorderSize(6);
                $table->getStyle()->setBorderColor('000000'); // Border color (black)

                // You can iterate through the rows and cells here for more customization if needed
            }
        }

        // Set the file name
        $fileName = $book->creator . '.docx';

        // Save the Word document using PhpWord
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($fileName);

        // Provide a download link for the generated document
        return response()->download($fileName)->deleteFileAfterSend(true);
    }







    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Load the cleaned HTML content into DOMDocument
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $cleanedHtml = $purifier->purify($request->content);

        $dom = new DOMDocument();
        $dom->loadHTML($cleanedHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);


        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img){
            $image = base64_decode(explode(',',explode(';', $img-> getAttribute('src'))[1])[1]);
            $image_name = 'upload/' . time() . $key . '.png';
            Storage::disk('public')->put($image_name, $image);

            $img->removeAttribute('src');
            $img->setAttribute('src', asset('storage/' . $image_name));
        }

// this problem for appear images in page this code in terminal
//        php artisan storage:link

        $content = $dom->saveHTML();

        Book::create([
            'creator' => $request->creator,
            'depNameEn' => $request->depNameEn,
            'depName' => $request->depName,
            'toPerson' => $request->toPerson,
            'variableName' => $request->variableName,
            'signDate' => $request->signDate,
            'content' => $content,
            'thanks' => $request->thanks,
            'greeting' => $request->greeting,
            'toDo' => $request->toDo,
            'attach' => $request->attach,
            'signatory' => $request->signatory,
            'image' => $request->image,
            'position' => $request->position,
        ]);

        return redirect('books');
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Load the cleaned HTML content into DOMDocument
        $dom = new DOMDocument();
        $dom->loadHTML($request->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $image = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = 'upload/' . time() . $key . '.png';
                Storage::disk('public')->put($image_name, $image);

                $img->removeAttribute('src');
                $img->setAttribute('src', asset('storage/' . $image_name));
            }
        }

        // Save the modified HTML content
        $content = $dom->saveHTML();

        // Update the Book model
        $book->update([
            'creator' => $request->creator,
            'depNameEn' => $request->depNameEn,
            'depName' => $request->depName,
            'toPerson' => $request->toPerson,
            'variableName' => $request->variableName,
            'signDate' => $request->signDate,
            'content' => $content,
            'thanks' => $request->thanks,
            'greeting' => $request->greeting,
            'toDo' => $request->toDo,
            'attach' => $request->attach,
            'signatory' => $request->signatory,
            'image' => $request->image,
            'position' => $request->position,
        ]);

        return redirect('books');
    }


    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Load the cleaned HTML content into DOMDocument
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $cleanedHtml = $purifier->purify($book->content);

        $dom = new DOMDocument();
        $dom->loadHTML($cleanedHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $imageSrc = $img->getAttribute('src');
            // Check if the image source is from the public storage
            if (Str::startsWith($imageSrc, asset('storage/'))) {
                $imagePath = str_replace(asset('storage/'), '', $imageSrc);
                // Delete the image from storage
                Storage::disk('public')->delete($imagePath);
            }
        }

        $book->delete();
        return redirect()->back();
    }


}


