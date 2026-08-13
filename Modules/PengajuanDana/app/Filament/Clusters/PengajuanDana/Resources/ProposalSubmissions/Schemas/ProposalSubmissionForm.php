<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalSubmissions\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Modules\PengajuanDana\Enums\ProposalDraftStatus;
use Modules\PengajuanDana\Models\Bank;
use Modules\PengajuanDana\Models\ProposalDraft;

class ProposalSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Detail Submission')->schema([
                    TextInput::make('no_submission')
                        ->label('No. Submission')
                        ->disabled()
                        ->visible(fn (string $operation): bool => $operation === 'edit'),

                    TextInput::make('event_identity')
                        ->label('Identitas Event')
                        ->disabled()
                        ->visible(fn (string $operation): bool => $operation === 'edit'),

                    Select::make('judan_proposal_draft_id')
                        ->label('Proposal Draft')
                        ->options(fn () => ProposalDraft::query()
                            ->with('event')
                            ->where('status', ProposalDraftStatus::Diajukan)
                            ->get()
                            ->mapWithKeys(fn (ProposalDraft $draft): array => [
                                $draft->getKey() => "{$draft->no_pengajuan} - {$draft->event?->nama}",
                            ]))
                        ->searchable()
                        ->preload()
                        ->required()
                        ->disabled(fn (string $operation): bool => $operation === 'edit'),

                    TextInput::make('booking_code')
                        ->label('Booking Code')
                        ->maxLength(255),
                ])->columnSpan(1),

                Section::make('Kebutuhan & Rekening')->schema([
                    Select::make('needs')
                        ->label('Kebutuhan')
                        ->relationship('needs', 'nama_kebutuhan')
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->required(),

                    Repeater::make('bankAccounts')
                        ->label('Rekening Tujuan')
                        ->relationship()
                        ->defaultItems(1)
                        ->addActionLabel('+ Tambah Rekening')
                        ->schema([
                            Select::make('judan_bank_id')
                                ->label('Bank')
                                ->options(fn () => Bank::query()
                                    ->where('is_active', true)
                                    ->pluck('nama_bank', 'id'))
                                ->searchable()
                                ->preload()
                                ->required(),

                            TextInput::make('pemilik')
                                ->label('Nama Pemilik')
                                ->required()
                                ->maxLength(150),

                            TextInput::make('nomor_rekening')
                                ->label('Nomor Rekening')
                                ->required()
                                ->maxLength(50),

                            TextInput::make('sub_total')
                                ->label('Sub Total')
                                ->numeric()
                                ->required(),
                        ]),
                ])->columnSpan(1),
            ]);
    }
}