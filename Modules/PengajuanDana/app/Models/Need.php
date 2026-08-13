<?php

namespace Modules\PengajuanDana\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Need extends Model
{
    use HasFactory;

    protected $table = 'judan_needs';

    protected $fillable = [
        'kode_kebutuhan',
        'nama_kebutuhan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function proposalSubmissions(): BelongsToMany
    {
        return $this->belongsToMany(
            ProposalSubmission::class,
            'judan_need_submissions',
            'judan_need_id',
            'judan_proposal_submission_id'
        );
    }
}
