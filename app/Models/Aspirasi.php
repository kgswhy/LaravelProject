<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aspirasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('kode_pengaduan', 'like', '%' . $search . '%');
        })->when($filters['tanggal'] ?? null, function ($query, $tanggal) {
            $dates = explode(' to ', $tanggal);
            if (count($dates) == 2) {
                $start = Carbon::parse($dates[0])->startOfDay();
                $end = Carbon::parse($dates[1])->endOfDay();
                $query->whereBetween('created_at', [$start, $end]);
            } else {
                $query->whereDate('created_at', '=', Carbon::parse($dates[0])->toDateString());
            }
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', $status);
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'kode_pengaduan',
        'nik',
        'category_id',
        'lokasi',
        'status',
        'keterangan',
        'gambar',
    ];
}
