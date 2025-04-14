<?php
declare(strict_types=1);

namespace Prhl2375\ZentixPackageTest\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'zentix_package_test_contacts';
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function phones()
    {
        return $this->hasMany(ContactPhone::class, 'contact_id');
    }
}
