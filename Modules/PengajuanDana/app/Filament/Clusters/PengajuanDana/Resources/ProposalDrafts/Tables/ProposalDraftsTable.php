<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\Tables;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Modules\PengajuanDana\Enums\ProposalDraftStatus;

class ProposalDraftsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordAction(null)
            ->defaultSort('created_at', 'desc')
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),

                TextColumn::make('no_pengajuan')
                    ->label('No. Pengajuan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('event.nama')
                    ->label('Event')
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('creativeMember.name')
                    ->label('Pemohon')
                    ->wrap()
                    ->searchable(),

                TextColumn::make('vendors_count')
                    ->label('Vendor')
                    ->counts('vendors')
                    ->badge()
                    ->color('info'),

                TextColumn::make('total_vendor')
                    ->label('Total')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.')),

                TextColumn::make('deadline_pembayaran')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (?ProposalDraftStatus $state): string => $state?->label() ?? '-')
                    ->color(fn (?ProposalDraftStatus $state): string => $state?->color() ?? 'gray')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(collect(ProposalDraftStatus::cases())->mapWithKeys(
                        fn (ProposalDraftStatus $status): array => [$status->value => $status->label()]
                    )),

                SelectFilter::make('judan_event_id')
                    ->label('Event')
                    ->relationship('event', 'nama')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                Action::make('download')
                    ->label('Unduh')
                    ->icon(Heroicon::OutlinedArrowDownTray)
                    ->visible(fn ($record): bool => filled($record->file_attached)
                        && Storage::disk('local')->exists('proposal/' . $record->file_attached))
                    ->action(fn ($record) => response()->download(
                        Storage::disk('local')->path('proposal/' . $record->file_attached)
                    )),

                EditAction::make()
                    ->button()
                    ->hiddenLabel()
                    ->modalHeading('Edit Proposal Draft'),
            ]);
    }
}