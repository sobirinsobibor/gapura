<?php

namespace Modules\PengajuanDana\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Modules\PengajuanDana\Enums\ProposalSubmissionStatus;
use Modules\PengajuanDana\Models\Event;
use Modules\PengajuanDana\Models\ProposalDraft;
use Modules\PengajuanDana\Models\ProposalSubmission;

class PengajuanDanaStats extends StatsOverviewWidget
{
    public static function canView(): bool
    {
        $user = auth()->user();

        if (! $user) {
            return false;
        }

        if ($user->isSuperAdmin()) {
            return true;
        }

        foreach (['events', 'proposal-drafts', 'proposal-submissions'] as $slug) {
            if ($user->canAccess("pengajuan-dana.{$slug}.view")) {
                return true;
            }
        }

        return false;
    }

    protected function getStats(): array
    {
        $user = auth()->user();

        $canViewAllDrafts = $user->canAccess('pengajuan-dana.proposal-drafts.view');
        $drafts = ProposalDraft::query();
        if (! $canViewAllDrafts) {
            $drafts->where('creative_member_id', $user->getKey());
        }

        $canViewAllSubmissions = $user->canAccess('pengajuan-dana.proposal-submissions.view');
        $submissions = ProposalSubmission::query();
        if (! $canViewAllSubmissions) {
            $submissions->whereHas('proposalDraft', function ($q) use ($user): void {
                $q->where('creative_member_id', $user->getKey());
            });
        }

        $menunggu = (clone $submissions)->where('status', ProposalSubmissionStatus::Menunggu)->count();
        $siapTransfer = (clone $submissions)->where('status', ProposalSubmissionStatus::ProsesTransfer)->count();

        return [
            Stat::make('Event', Event::query()->where('is_active', true)->count())
                ->description('Event aktif')
                ->color('info'),

            Stat::make('Proposal Draft', (clone $drafts)->count())
                ->description($canViewAllDrafts ? 'Semua pengajuan' : 'Pengajuan milik saya')
                ->color('warning'),

            Stat::make('Submission', (clone $submissions)->count())
                ->description($canViewAllSubmissions ? 'Semua submission' : 'Submission milik saya')
                ->color('primary'),

            Stat::make('Menunggu Persetujuan', $menunggu)
                ->description('Menunggu keputusan manager')
                ->color('danger'),

            Stat::make('Siap Transfer', $siapTransfer)
                ->description('Menunggu proses transfer')
                ->color('success'),
        ];
    }
}