<?php

namespace Modules\PengajuanDana\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $table = 'judan_events';

    protected $fillable = [
        'nama',
        'nama_singkat',
        'slug',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_active',
        'judan_institution_id',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_active' => 'boolean',
    ];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class, 'judan_institution_id');
    }

    public function proposalDrafts(): HasMany
    {
        return $this->hasMany(ProposalDraft::class, 'judan_event_id');
    }
}