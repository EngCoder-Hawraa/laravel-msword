<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use DOMDocument;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html as PhpWordHtml;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Text;
use Illuminate\Http\Response;
$table = new \PhpOffice\PhpWord\Element\Table();




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
//
//        // Load the Word document template
//        $templateProcessor = new TemplateProcessor(public_path('word-template/book.docx'));
//
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
////        dd($html);
//
////        $templateProcessor->setValue('content', $html);
//        // Convert HTML to plain text (strip HTML tags)
//        $plainText = strip_tags($html);
//
//        // Set the plain text content in place of the 'content' placeholder
//        $templateProcessor->setValue('content', $plainText);
//
//
//
//
//        // Save the filled-in document to a temporary file
//        $tempFile = public_path('word-template/temp.docx');
//        $templateProcessor->saveAs($tempFile);
//
//        // Download the Word document
//
//        return response()->download($tempFile, 'exported_document.docx')->deleteFileAfterSend(true);
//    }





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
//        try {
//            // Fetch the book data from the database
//            $book = Book::findOrFail($id);
//
//            // Load the Word template (make sure the template file exists)
//            $templatePath = public_path('word-template/book.docx');
//            $templateProcessor = new TemplateProcessor($templatePath);
//
//
//            // Replace placeholders in the template with data from the database
//            $templateProcessor->setValue('id', $book->id);
//            $templateProcessor->setValue('creator', $book->creator);
//            $templateProcessor->setValue('depNameEn', $book->depNameEn);
//            $templateProcessor->setValue('depName', $book->depName);
//            $templateProcessor->setValue('toPerson', $book->toPerson);
//            $templateProcessor->setValue('variableName', $book->variableName);
//            $templateProcessor->setValue('signDate', $book->signDate);
//            $templateProcessor->setValue('thanks', $book->thanks);
//            $templateProcessor->setValue('greeting', $book->greeting);
//            $templateProcessor->setValue('toDo', $book->toDo);
//            $templateProcessor->setValue('attach', $book->attach);
//            $templateProcessor->setValue('signatory', $book->signatory);
//            $templateProcessor->setValue('image', $book->image);
//            $templateProcessor->setValue('position', $book->position);
//
////            dd($templateProcessor);
//
//
//
//            // Get the HTML content from the Summernote editor
//            $html = $book->content;
//
//            // Create an instance of HTMLPurifier and configure it (if needed)
//            $config = HTMLPurifier_Config::createDefault();
//            $purifier = new HTMLPurifier($config);
//
//            // Clean and validate the HTML content using HTMLPurifier
//            $cleanedHtml = $purifier->purify($html);
//
//            // Clone the 'content' block in the template (if needed)
//            $templateProcessor->cloneBlock('content', 1, true);
//
//            // Find the cloned 'content' block
//            $clonedBlock = $templateProcessor->getBlockValues()['content'][1];
//
//            // Insert the cleaned HTML content into the cloned block
//            $clonedBlock->setValue('content', $cleanedHtml);
//
//
//
//            // Insert the cleaned HTML content into the cloned block
////            $templateProcessor->setValue('content', $cleanedHtml);
//
//
//
////            // Create a Word HTML renderer
////            $renderer = new PhpWordHtml();
////
////            // Render HTML content into the Word document section
////            $renderer->addHtml($section, $cleanedHtml);
////
////            // Find and format tables in the section
////            $elements = $section->getElements();
//
//
//
//            // Clone the 'content' block and add HTML content to it
////            $templateProcessor->cloneBlock('content', 1, true);
////            $templateProcessor->setValue('content', $cleanedHtml);
//
//
//
//            // Find and format tables in the section
////        $elements = $templateProcessor->getElements();
////        foreach ($elements as $element) {
////            if ($element instanceof \PhpOffice\PhpWord\Element\Table) {
////                // Style the table
////                $table = $element;
////                $table->getStyle()->setBorderSize(16);
////                $table->getStyle()->setBorderColor('#eeeeee');
////
//////                foreach ($table->getRows() as $row) {
//////                    foreach ($row->getCells() as $cell) {
//////                        $cell->getAlignment()->setHorizontal(\PhpOffice\PhpWord\SimpleType\Jc::CENTER);
//////                        $cell->getAlignment()->setVertical(\PhpOffice\PhpWord\SimpleType\JcTableVerticalAlignment::CENTER);
//////                    }
//////                }
////            }
////        }
//
//
//            // Set the file name
//            $fileName = $book->creator . '.docx';
//
//            // Debugging: Dump all the contents
////            dd([
////                'book' => $book,
////                'templateProcessor' => $templateProcessor,
////                'phpWord' => $phpWord,
////                'section' => $section,
////                'htmlContent' => $htmlContent,
////                'fileName' => $fileName,
////            ]);
//
//
//
//            // Save the Word document using PhpWordTemplate
//            $templateProcessor->saveAs($fileName);
//
//            // Set the encoding of the generated DOCX file to UTF-8
//            // Provide a download link for the generated document
//            return response()->download($fileName)->deleteFileAfterSend(true);
//        } catch (\Exception $e) {
//            // Handle any exceptions or errors
//            return response()->json(['error' => $e->getMessage()], 500);
//        }
//    }








//    public function wordExport($id)
//    {
////        try {
//            // Fetch the book data from the database
//            $book = Book::findOrFail($id);
//
//            // Load the Word template
//            $templatePath = 'word-template/book.docx';
//            $templateProcessor = new TemplateProcessor($templatePath);
//
//            // Replace placeholders in the template with data
//            $templateProcessor->setValue('id', $book->id);
//            $templateProcessor->setValue('creator', $book->creator);
//            $templateProcessor->setValue('depNameEn', $book->depNameEn);
//            $templateProcessor->setValue('depName', $book->depName);
//            $templateProcessor->setValue('toPerson', $book->toPerson);
//            $templateProcessor->setValue('variableName', $book->variableName);
//            $templateProcessor->setValue('signDate', $book->signDate);
//            $templateProcessor->setValue('thanks', $book->thanks);
//            $templateProcessor->setValue('greeting', $book->greeting);
//            $templateProcessor->setValue('toDo', $book->toDo);
//            $templateProcessor->setValue('attach', $book->attach);
//            $templateProcessor->setValue('signatory', $book->signatory);
//            $templateProcessor->setValue('image', $book->image);
//            $templateProcessor->setValue('position', $book->position);
//
//            // Set the custom file name
//            $fileName = $book->creator . '.docx';
//
//            // Save the modified template as a Word document
//            $outputPath = 'output/' . $fileName;
//            $templateProcessor->saveAs($outputPath);
//
//            // Create a new PhpWord instance for additional content
//            $phpWord = new \PhpOffice\PhpWord\PhpWord();
//
//            // Add a section for additional content
//            $section = $phpWord->addSection();
//
//            // Add content to the section (you can add text, tables, or other elements)
//            $section->addText('Additional content goes here.');
//
//            // Merge the additional content section with the template document
//            $phpWord->addDocument($outputPath);
//
//            // Save the final document
//            $phpWord->save($outputPath);
//
//            // Provide a download link for the generated document
//            return response()->download($outputPath, $fileName)->deleteFileAfterSend(true);
//        }
////        catch (\Exception $e) {
////            // Handle any exceptions, e.g., database query failure
////            return response('Error: ' . $e->getMessage(), 500);
////        }
////    }


    //Export word by using section and summernote editor
    public function wordExport($id)
    {
        // Fetch the book data from the database
        $book = Book::findOrFail($id);

        // Create a new PhpWord instance
        $phpWord = new PhpWord();


        $phpWord->setDefaultFontName('mylotus');
//        $phpWord->getSettings()->setZoom(100);

        // If here Errors in grammar and spelling display that
        $phpWord->getSettings()->setHideGrammaticalErrors(true);
        $phpWord->getSettings()->setHideSpellingErrors(true);

//OR that
//        $proofState = new \PhpOffice\PhpWord\ComplexType\ProofState();
//        $proofState->setGrammar(\PhpOffice\PhpWord\ComplexType\ProofState::CLEAN);
//        $proofState->setSpelling(\PhpOffice\PhpWord\ComplexType\ProofState::DIRTY);
//
//        $phpWord->getSettings()->setProofState($proofState);


        // Set the default paragraph style to right-to-left (RTL)
        $phpWord->setDefaultParagraphStyle(
            array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT),
        );


//        $phpWord->setDefaultFontSize(16);



        // Create a Word document section with the specified style
        $section = $phpWord->addSection();




// Add spacing between lines
//        $section->addTextBreak(1); // Adjust the number to control the spacing

        // Define section styles
        $sectionStyle = array(
            'orientation' => 'landscape', // You can adjust the orientation here
//            'left'   => 0,  // Left margin in twips
//            'right'  => 0,  // Right margin in twips
//            'top'    => 0,  // Top margin in twips
//            'bottom' => 0,  // Bottom margin in twips
//            'border' => 6,    // Border size in twips (adjust as needed)
//            'borderColor' => '000000', // Border color (adjust as needed)
//
//            'marginTop' => 0,
//            'marginRight' => 0,
//            'marginBottom' => 0,
//            'marginLeft' => 0,
        );

        // Set the section style
        $section->setPageSetup($sectionStyle);


        // Add header to the section
        $header = $section->addHeader();

        // Create a table with one row and one cell
        $table = $header->addTable();
        $table->addRow();
        $cell = $table->addCell(); // No need to set a specific cell width

        // Set the cell width to the maximum available width
        $cell->setWidth(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(21)); // 21 cm is approximately the width of an A4 page

        // Add the image within the cell and apply HTML centering style
        $cell->addImage('images/header.png', ['height' => 100]); // Adjust the width as needed
        $cell->addHtml('<div style="text-align:center;"><p>&nbsp;</p></div>'); // Center both the image and text using HTML style


        // Define the text you want to add
        $textToAdd = $book->depNameEn . ' ' . str_repeat(' ', 140) . $book->depName;
        // Create a paragraph and add the text with the specified size
        $paragraph = $section->addText($textToAdd, ['size' => 10]);
        // Set the line height for the paragraph
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed



        $textToAdd = '  ' . ' ' . str_repeat(' ', 140) . 'Ref. No.';
        $paragraph = $section->addText($textToAdd, ['size' => 10]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed


        $textToAdd = 'Date:' . ' ' . str_repeat(' ', 150) . ':التاريخ';
        $paragraph = $section->addText($textToAdd, ['size' => 10]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed




        $paragraph = $section->addTextRun();
        $paragraph->addText($book->toPerson, ['size' => 16, 'bold' => true,]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed
        // Set the alignment of the TextRun to center
        $paragraph->getParagraphStyle()->setAlignment('center');



        $paragraph = $section->addTextRun();
        $paragraph->addText($book->variableName, ['size' => 16, 'bold' => true,]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed
        // Set the alignment of the TextRun to center
        $paragraph->getParagraphStyle()->setAlignment('center');


//        $section->addText($book->toPerson, ['size' => 16]);
        // Replace placeholders in the template with data
        // Add Arabic text with "mylotus" font and specified formatting
        $text = "السلام عليكم ورحمة اللـ... وبركاته...";
        $paragraph = $section->addTextRun();
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed
        $paragraph->addText($text, ['rtl' => true, 'name' => 'mylotus', 'bold' => true, 'size' => 16]);





//        $section->addText("Greeting: " . $book->greeting);
//        $section->addText("To Do: " . $book->toDo);
//        $section->addText("Image: " . $book->image);
//





        // Get the HTML content from the Summernote editor
        $html = $book->content;


        // Create an instance of HTMLPurifier and configure it (if needed)
        $config = \HTMLPurifier_Config::createDefault();
        $purifier = new \HTMLPurifier($config);

        // Clean and validate the HTML content using HTMLPurifier
        $cleanedHtml = $purifier->purify($html);

        // Create a Word HTML renderer
        $renderer = new PhpWordHtml();

        // Define font size and line height
        $fontSize = 21.5;
        $lineHeight = 1;
        $marginRight = '50px'; // Adjust right margin as needed
        $paddingRight = '50px'; // Adjust right padding as needed


        // Set the font size, line height, right margin, and right padding in CSS styles
        $cssStyles = "font-size: {$fontSize}px; line-height: {$lineHeight}; margin-right: {$marginRight}; padding-right: {$paddingRight};";

// Add the CSS styles to the HTML content
        $cleanedHtmlWithStyles = '<div style="' . $cssStyles . '">' . $cleanedHtml . '</div>';

        // Render HTML content into the Word document section
        $renderer->addHtml($section, $cleanedHtmlWithStyles);


        // Render HTML content into the Word document section
//        $renderer->addHtml($section, $cleanedHtml);

        // Find and format tables in the section
        $elements = $section->getElements();
        foreach ($elements as $element) {
            if ($element instanceof \PhpOffice\PhpWord\Element\Table) {
                // Style the table
                $table = $element;
                $table->getStyle()->setBorderSize(16);
                $table->getStyle()->setBorderColor('#eeeeee');

                // You can also format the table cells if needed
                // foreach ($table->getRows() as $row) {
                //     foreach ($row->getCells() as $cell) {
                //         $cell->getAlignment()->setHorizontal(\PhpOffice\PhpWord\SimpleType\Jc::CENTER);
                //         $cell->getAlignment()->setVertical(\PhpOffice\PhpWord\SimpleType\JcTableVerticalAlignment::CENTER);
                //     }
                // }
            }
        }



        $paragraph = $section->addTextRun();
        $paragraph->addText($book->thanks, ['size' => 16, 'bold' => true]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed
        // Set the alignment of the TextRun to center
        $paragraph->getParagraphStyle()->setAlignment('center');



        $paragraph = $section->addTextRun();
        $paragraph->addText($book->attach, ['size' => 10]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed




        $paragraph = $section->addTextRun();
        $paragraph->addText($book->signatory, ['size' => 16, 'bold' => true]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed


        $paragraph = $section->addTextRun();
        $paragraph->addText($book->position, ['size' => 16, 'bold' => true]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed


        $paragraph = $section->addTextRun();
        $paragraph->addText($book->signDate, ['size' => 16, 'bold' => true]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed


        $paragraph = $section->addTextRun();
        $paragraph->addText($book->creator, ['size' => 10]);
        $paragraphStyle = $paragraph->getParagraphStyle();
        $paragraphStyle->setLineHeight(1); // Adjust line height as needed


        // Add footer to the section
        $footer = $section->addFooter();
        $footer->addImage('images/footer.png', ['height' => 50, 'width' => 450]);
        $footer->addHtml('<div style="text-align:center;"><p>&nbsp;</p></div>'); // Center both the image and text using HTML style



        // Set the file name
        $fileName = $book->creator . '.docx';

        // Save the Word document using PhpWord
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($fileName);

        // Provide a download link for the generated document
        return response()->download($fileName)->deleteFileAfterSend(true);
    }




//    //Export word by using section and summernote editor
//    public function wordExport($id)
//    {
//        // Fetch the book data from the database
//        $book = Book::findOrFail($id);
//
//        // Create a new PhpWord instance
//        $phpWord = new PhpWord();
//
//        // Create a Word document section
//        $section = $phpWord->addSection();
//
//        // Replace placeholders in the template with data
//        $section->addText("Book's Information:", ['bold' => true, 'size' => 16]);
//        $section->addText("ID: " . $book->id);
//        $section->addText("Creator: " . $book->creator);
//        $section->addText("Department Name (English): " . $book->depNameEn);
//        $section->addText("Department Name: " . $book->depName);
//        $section->addText("To Person: " . $book->toPerson);
//        $section->addText("Variable Name: " . $book->variableName);
//        $section->addText("Sign Date: " . $book->signDate);
//        $section->addText("Thanks: " . $book->thanks);
//        $section->addText("Greeting: " . $book->greeting);
//        $section->addText("ToDo: " . $book->toDo);
//        $section->addText("Attach: " . $book->attach);
//        $section->addText("Signatory: " . $book->signatory);
//        $section->addText("Image: " . $book->image);
//        $section->addText("Position: " . $book->position);
//
//        // Add a heading for the content section
//        $section->addText("Content:", ['bold' => true, 'size' => 14]);
//
//        // Get the HTML content from the Summernote editor
//        $html = $book->content;
//
//        // Create an instance of HTMLPurifier and configure it (if needed)
//        $config = HTMLPurifier_Config::createDefault();
//        $purifier = new HTMLPurifier($config);
//
//        // Clean and validate the HTML content using HTMLPurifier
//        $cleanedHtml = $purifier->purify($html);
////        echo $cleanedHtml;
//
//        // Create a Word HTML renderer
//        $renderer = new PhpWordHtml();
//
//        // Render HTML content into the Word document section
//        $renderer->addHtml($section, $cleanedHtml);
//
//        // Find and format tables in the section
//        $elements = $section->getElements();
//        foreach ($elements as $element) {
//            if ($element instanceof \PhpOffice\PhpWord\Element\Table) {
//                // Style the table
//                $table = $element;
//                $table->getStyle()->setBorderSize(16);
//                $table->getStyle()->setBorderColor('#eeeeee');
//
////                foreach ($table->getRows() as $row) {
////                    foreach ($row->getCells() as $cell) {
////                        $cell->getAlignment()->setHorizontal(\PhpOffice\PhpWord\SimpleType\Jc::CENTER);
////                        $cell->getAlignment()->setVertical(\PhpOffice\PhpWord\SimpleType\JcTableVerticalAlignment::CENTER);
////                    }
////                }
//            }
//        }
//
//        // Set the file name
//        $fileName = $book->creator . '.docx';
//
//        // Save the Word document using PhpWord
//        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
//        $objWriter->save($fileName);
//
//        // Provide a download link for the generated document
//        return response()->download($fileName)->deleteFileAfterSend(true);
//    }





    public function create()
    {
        return view('books.create');
    }



    public function store(Request $request)
    {
        // Load the cleaned HTML content into DOMDocument
        $dom = new DOMDocument();
        // Load the HTML content with appropriate options
        $loadOptions = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'), $loadOptions);

        // Get all image elements in the HTML
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            // Get the base64-encoded image data from the src attribute
            $imageData = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);

            // Generate a unique image name using a random string
            $image_name = 'upload/' . Str::random(10) . '.png';

            // Store the image data in the storage disk
            if (Storage::disk('public')->put($image_name, $imageData)) {
                // Update the image source URL in the HTML content
                $img->removeAttribute('src');
                $img->setAttribute('src', asset('storage/' . $image_name));
            } else {
                // Log an error if image storage fails
                Log::error('Image storage failed for ' . $image_name);
            }
        }


        // Save the updated HTML content
        $content = $dom->saveHTML();
//        var_dump($content);
//        die();

        // Create a new Book record with the updated HTML content
        Book::create([
            'creator' => $request->creator,
            'depNameEn' => $request->depNameEn,
            'depName' => $request->depName,
            'toPerson' => $request->toPerson,
            'variableName' => $request->variableName,
            'signDate' => $request->signDate,
            'content' => $content, // Updated HTML content with image URLs
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
        // Load the HTML content with appropriate options
        $loadOptions = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'), $loadOptions);


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




//    public function update(Request $request, $id)
//    {
//        $book = Book::findOrFail($id);
//
//        // Load the cleaned HTML content into DOMDocument
//        $config = HTMLPurifier_Config::createDefault();
//        $purifier = new HTMLPurifier($config);
//        $cleanedHtml = $purifier->purify($request->content);
//
//        $dom = new DOMDocument();
//        // Load the HTML content with appropriate options
//        $loadOptions = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
//        $dom->loadHTML(mb_convert_encoding($cleanedHtml, 'HTML-ENTITIES', 'UTF-8'), $loadOptions);
//
//        $images = $dom->getElementsByTagName('img');
//
//        foreach ($images as $key => $img) {
//            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
//                $image = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
//                $image_name = 'upload/' . time() . $key . '.png';
//                Storage::disk('public')->put($image_name, $image);
//
//                $img->removeAttribute('src');
//                $img->setAttribute('src', asset('storage/' . $image_name));
//            }
//        }
//
//        // Save the modified HTML content
//        $content = $dom->saveHTML();
//
//        // Update the Book model
//        $book->update([
//            'creator' => $request->creator,
//            'depNameEn' => $request->depNameEn,
//            'depName' => $request->depName,
//            'toPerson' => $request->toPerson,
//            'variableName' => $request->variableName,
//            'signDate' => $request->signDate,
//            'content' => $content,
//            'thanks' => $request->thanks,
//            'greeting' => $request->greeting,
//            'toDo' => $request->toDo,
//            'attach' => $request->attach,
//            'signatory' => $request->signatory,
//            'image' => $request->image,
//            'position' => $request->position,
//        ]);
//
//        return redirect('books');
//    }


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


