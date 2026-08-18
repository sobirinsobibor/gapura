<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\Events\Pages\ListEvents;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\ProposalDraftResource;

class ListProposalDrafts extends ListRecords
{
    protected static string $resource = ProposalDraftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('buat-proposal-draft')
                ->label('Buat Proposal Draft')
                ->icon(Heroicon::OutlinedPlus)
                ->url(ListEvents::getUrl()),
        ];
    }
}
