<?php

namespace App\Services;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;


class ContactService
{
    public function index()
    {
        $filters = request()->only(
            'search',

        );
        $contacts = Contact:: latest()
            ->filter($filters)
            ->paginate(10);
        return $contacts;
    }

    public function store(ContactRequest $request)
    {
        try {
            DB::beginTransaction();
            Contact::create($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        try {
            DB::beginTransaction();
            $contact->update($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }


}
