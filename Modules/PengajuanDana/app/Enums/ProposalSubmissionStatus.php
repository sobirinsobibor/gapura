<?php

namespace Modules\PengajuanDana\Enums;

enum ProposalSubmissionStatus: string
{
    case Menunggu = 'menunggu';
    case ProsesTransfer = 'proses_tf';
    case Selesai = 'selesai';
    case Ditolak = 'ditolak';
    case Dikembalikan = 'dikembalikan';

    public function label(): string
    {
        return match ($this) {
            self::Menunggu => 'Menunggu',
            self::ProsesTransfer => 'Proses Transfer',
            self::Selesai => 'Selesai',
            self::Ditolak => 'Ditolak',
            self::Dikembalikan => 'Dikembalikan ke Member',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Menunggu => 'warning',
            self::ProsesTransfer => 'info',
            self::Selesai => 'success',
            self::Ditolak => 'danger',
            self::Dikembalikan => 'gray',
        };
    }
}
