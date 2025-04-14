<?php
declare(strict_types=1);

namespace Prhl2375\ZentixPackageTest\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Prhl2375\ZentixPackageTest\Http\Requests\StoreContactRequest;
use Prhl2375\ZentixPackageTest\Models\Contact\Contact;

class ContactController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::with("phones")->orderBy('updated_at', 'desc')->paginate(config('zentixpackage.pagination_per_page', 5));
        return view('zentixpackage::index', ['contacts' => $contacts]);
    }
    public function store(StoreContactRequest $request): RedirectResponse
    {
        Log::info($request);
        $data = $request->validated();
        $contact = Contact::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
        ]);

        foreach ($data['phones'] as $phoneNumber) {
            $contact->phones()->create(['phone' => $phoneNumber]);
        }
        return redirect()->route('zentixpackage.index')
            ->with('status','Contact created successfully.');
    }
    public function destroy($id): RedirectResponse
    {
        Contact::destroy($id);
        return redirect()->route('zentixpackage.index')
            ->with('status','Contact deleted successfully.');
    }
}
