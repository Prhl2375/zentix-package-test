<?php
declare(strict_types=1);

namespace Prhl2375\ZentixPackageTest\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class ContactPhone extends Model
{
    protected $table = 'zentix_package_test_contact_phones';
    protected $fillable = [
        'phone',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
