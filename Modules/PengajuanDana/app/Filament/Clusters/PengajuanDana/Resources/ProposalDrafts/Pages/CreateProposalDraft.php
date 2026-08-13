<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\ProposalDraftResource;
use Modules\PengajuanDana\Models\Event;
use Modules\PengajuanDana\Services\ProposalDraftService;

class CreateProposalDraft extends CreateRecord
{
    protected static string $resource = ProposalDraftResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $event = Event::query()->findOrFail($data['judan_event_id']);
        $data['no_pengajuan'] = app(ProposalDraftService::class)->generateNoPengajuan($event);
        $data['creative_member_id'] = auth()->id();
        $data['status'] = 'menunggu';

        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->record;

        if (! $record->file_attached) {
            return;
        }

        $disk = Storage::disk('local');

        if (! $disk->exists('proposal/' . $record->file_attached)) {
            return;
        }

        $extension = pathinfo($record->file_attached, PATHINFO_EXTENSION);
        $newName = $record->no_pengajuan . '.' . $extension;

        $disk->move('proposal/' . $record->file_attached, 'proposal/' . $newName);
        $record->forceFill(['file_attached' => $newName])->save();
    }
}