<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Mark as read when viewing
        if (!$contact->is_read) {
            $contact->markAsRead();
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function markAsRead(Contact $contact)
    {
        $contact->markAsRead();
        return back()->with('success', 'Message marked as read.');
    }

    public function markAsUnread(Contact $contact)
    {
        $contact->update(['is_read' => false]);
        return back()->with('success', 'Message marked as unread.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message deleted successfully.');
    }

    public function bulkAction(Request $request)
    {
        $action = $request->input('action');
        $contactIds = $request->input('contact_ids', []);

        if (empty($contactIds)) {
            return back()->with('error', 'No messages selected.');
        }

        switch ($action) {
            case 'mark_read':
                Contact::whereIn('id', $contactIds)->update(['is_read' => true]);
                return back()->with('success', 'Selected messages marked as read.');

            case 'mark_unread':
                Contact::whereIn('id', $contactIds)->update(['is_read' => false]);
                return back()->with('success', 'Selected messages marked as unread.');

            case 'delete':
                Contact::whereIn('id', $contactIds)->delete();
                return back()->with('success', 'Selected messages deleted.');

            default:
                return back()->with('error', 'Invalid action.');
        }
    }
}
