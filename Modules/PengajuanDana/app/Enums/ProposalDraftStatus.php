<?php

namespace Modules\PengajuanDana\Enums;

enum ProposalDraftStatus: string
{
    case Menunggu = 'menunggu';
    case Diajukan = 'diajukan';
    case Diterima = 'diterima';
    case Ditolak = 'ditolak';

    public function label(): string
    {
        return match ($this) {
            self::Menunggu => 'Menunggu',
            self::Diajukan => 'Diajukan',
            self::Diterima => 'Diterima',
            self::Ditolak => 'Ditolak',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Menunggu => 'warning',
            self::Diajukan => 'info',
            self::Diterima => 'success',
            self::Ditolak => 'danger',
        };
    }
}
