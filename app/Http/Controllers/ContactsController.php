<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ContactsController extends Controller
{

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Skip the first row (header)
        array_shift($rows);

        foreach ($rows as $row) {
            // Assuming the columns are in the order: ID, Name, Email, Phone, Job, Company, Country, Address, Birthdate, Image, Zip, City, Division, Note
            Contact::create([
                'first_name' => $row[1],
                'last_name' => $row[2],
                'email' => $row[3],
                'phone' => $row[4],
                'job' => $row[5],
                'company' => $row[6],
                'country' => $row[7],
                'address' => $row[8],
                'birthdate' => $row[9],
                'zip' => $row[10],
                'city' => $row[11],
                'division' => $row[12],
                'note' => $row[13],
                'user_id' => auth()->id(),
            ]);
        }

        return redirect()->route('contacts')->with('success', 'Contacts imported successfully');
    }
    public function showImportForm()
    {
        return view('import');
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Retrieve the contacts from the database
        $contacts = Contact::all();

        // Set the headers
        $sheet->setCellValue('A1', 'SI No.');
        $sheet->setCellValue('B1', 'first_name');
        $sheet->setCellValue('C1', 'last_name');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Phone');
        $sheet->setCellValue('F1', 'Job');
        $sheet->setCellValue('G1', 'Company');
        $sheet->setCellValue('H1', 'Country');
        $sheet->setCellValue('I1', 'Address');
        $sheet->setCellValue('J1', 'Birthdate');
        $sheet->setCellValue('K1', 'Zip');
        $sheet->setCellValue('L1', 'City');
        $sheet->setCellValue('M1', 'Division');
        $sheet->setCellValue('N1', 'Note');

        // ... Add more headers as needed

        // Add the contacts data
        $row = 2;
        foreach ($contacts as $contact) {
            $sheet->setCellValue('A' . $row, $contact->id);
            $sheet->setCellValue('B' . $row, $contact->first_name);
            $sheet->setCellValue('C' . $row, $contact->last_name);
            $sheet->setCellValue('D' . $row, $contact->email);
            $sheet->setCellValue('E' . $row, $contact->phone);
            $sheet->setCellValue('F' . $row, $contact->job);
            $sheet->setCellValue('G' . $row, $contact->company);
            $sheet->setCellValue('H' . $row, $contact->country);
            $sheet->setCellValue('I' . $row, $contact->address);
            $sheet->setCellValue('J' . $row, $contact->birthdate);
            $sheet->setCellValue('K' . $row, $contact->zip);
            $sheet->setCellValue('L' . $row, $contact->city);
            $sheet->setCellValue('M' . $row, $contact->division);
            $sheet->setCellValue('N' . $row, $contact->note);
            $row++;
        }

        // Create a writer and save the spreadsheet to a file
        $writer = new Xlsx($spreadsheet);
        $filePath = 'contacts.xlsx';
        $writer->save($filePath);

        // Return a download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function updateContacts(CreateContactRequest $request):View
    {
        $contact = Contact::find($request->id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->job = $request->job;
        $contact->company = $request->company;
        $contact->address = $request->address;
        $contact->birthdate = $request->birthdate;
        $contact->zip = $request->zip;
        $contact->city = $request->city;
        $contact->division = $request->division;
        $contact->country = $request->country;
        $contact->note = $request->note;
        $contact->save();
        return view('showcontacts' , ['contacts' => Auth::user()->contacts]);
    }
    public function edit($id)
    {
        $contact = Contact::find($id);
//        dd($contact);
        return view('editcontacts', compact('contact'));
    }
    public function store(CreateContactRequest $request)
    {
//        dd($request->all());
        $user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            // Handle case when no image is provided
            $imageName = null;
        }
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->job = $request->job;
        $contact->company = $request->company;
        $contact->country = $request->country;
        $contact->address = $request->address;
        $contact->birthdate = $request->birthdate;
        $contact->image = $imageName;
        $contact->zip = $request->zip;
        $contact->city = $request->city;
        $contact->division = $request->division;
        $contact->user_id = $user_id;
        $contact->note = $request->note;

        $contact->save();
        return view('showcontacts' , ['contacts' => Auth::user()->contacts]);
    }
    public function showContacts()
    {
        $contacts = auth()->user()->contacts;
        return view('showcontacts', ['contacts' => $contacts]);
    }

}
