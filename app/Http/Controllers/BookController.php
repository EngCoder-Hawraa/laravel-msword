<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;


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

    public function wordExport($id)
    {
        $book = Book::findOrFail($id);
        $templateProcessor = new TemplateProcessor('word-template/book.docx');
        $templateProcessor->setValue('id', $book->id);
        $templateProcessor->setValue('creator', $book->creator);
        $templateProcessor->setValue('depNameEn', $book->depNameEn);
        $templateProcessor->setValue('depName', $book->depName);
        $templateProcessor->setValue('toPerson', $book->toPerson);
        $templateProcessor->setValue('variableName', $book->variableName);
        $templateProcessor->setValue('signDate', $book->signDate);
        $templateProcessor->setValue('content', $book->content);
        $templateProcessor->setValue('thanks', $book->thanks);
        $templateProcessor->setValue('greeting', $book->greeting);
        $templateProcessor->setValue('toDo', $book->toDo);
        $templateProcessor->setValue('attach', $book->attach);
        $templateProcessor->setValue('signatory', $book->signatory);
        $templateProcessor->setValue('image', $book->image);
        $templateProcessor->setValue('position', $book->position);
        $fileName = $book->creator;
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}


