<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'diagnostic_test_id'];

    public function diagnosticTest()
    {
        return $this->belongsTo(DiagnosticTest::class);
    }
}
