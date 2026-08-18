<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\RelationManagers;

use Filament\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\PengajuanDana\Enums\ProposalSubmissionStatus;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasFormattedNumber;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalSubmissions\ProposalSubmissionResource;

class ProposalSubmissionsRelationManager extends RelationManager
{
    use HasFormattedNumber;

    protected static string $relationship = 'submissions';

    protected static ?string $relatedResource = ProposalSubmissionResource::class;

    protected static ?string $label = 'Proposal Submission';

    protected static ?string $pluralLabel = 'Proposal Submissions';

    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                Action::make('create-submission')
                    ->label('Buat Proposal Submission')
                    ->icon(Heroicon::OutlinedPaperAirplane)
                    ->visible(fn (): bool => auth()->user()?->canAccess(
                        ProposalSubmissionResource::getRbacPermissionNames()['create']
                    ) ?? false)
                    ->url(fn (): string => ProposalSubmissionResource::getUrl('create', [
                        'judan_proposal_draft_id' => $this->getOwnerRecord()->getKey(),
                    ])),
            ])
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('no_submission')
                    ->label('No. Submission')
                    ->formatStateUsing(fn ($state) => self::formatDefinedId((string) $state))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('event_identity')
                    ->label('Identitas Event')
                    ->wrap()
                    ->searchable(),

                TextColumn::make('needs_count')
                    ->label('Kebutuhan')
                    ->counts('needs')
                    ->badge()
                    ->color('info'),

                TextColumn::make('bank_accounts_count')
                    ->label('Rekening')
                    ->counts('bankAccounts')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (?ProposalSubmissionStatus $state): string => $state?->label() ?? '-')
                    ->color(fn (?ProposalSubmissionStatus $state): string => $state?->color() ?? 'gray')
                    ->sortable(),
            ]);
    }

    protected function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->with(['needs', 'bankAccounts']);
    }
}