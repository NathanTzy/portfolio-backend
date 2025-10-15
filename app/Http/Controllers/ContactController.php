<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('backend.contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'name'  => 'required|string',
            'link'  => 'required|url'
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil ditambahkan');
    }

    public function edit(Contact $contact)
    {
        return view('backend.contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'title' => 'required|string',
            'name'  => 'required|string',
            'link'  => 'required|url'
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diperbarui');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus');
    }
}
