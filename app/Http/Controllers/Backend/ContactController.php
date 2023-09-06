<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;

class ContactController extends Controller
{

    public function __construct(private ContactService $contactService)
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = $this->contactService->index();
        return view('backend.contact.index',
            [
                'contacts' => $contacts
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        if ($this->contactService->store($request) === true) {
            return redirect()->route('contact.index')->with('success', __('general.contact.alerts.contact_successfully_created'));
        } else {
            return redirect()->route('contact.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('backend.contact.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('backend.contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        if ($this->contactService->update($request, $contact) === true) {
            return redirect()->route('contact.index')->with('success', __('general.contact.alerts.contact_successfully_updated'));
        } else {
            return redirect()->route('contact.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            // $this->authorize('delete', $contact);
            $contact->delete();
            return redirect()->route('contact.index')->with('success', __('general.contact.alerts.contact_successfully_deleted'));
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            return redirect()->back()->with('error', __('general.alerts.operation_failed'));
        }
    }
}
