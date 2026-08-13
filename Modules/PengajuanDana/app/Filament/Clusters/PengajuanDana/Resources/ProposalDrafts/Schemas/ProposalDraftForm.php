<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Modules\PengajuanDana\Models\Event;

class ProposalDraftForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Detail Pengajuan')->schema([
                    TextInput::make('no_pengajuan')
                        ->label('No. Pengajuan')
                        ->disabled()
                        ->visible(fn (string $operation): bool => $operation === 'edit'),

                    Select::make('judan_event_id')
                        ->label('Event')
                        ->options(fn () => Event::query()
                            ->where('is_active', true)
                            ->get()
                            ->mapWithKeys(fn (Event $event): array => [
                                $event->getKey() => "{$event->nama} ({$event->nama_singkat})",
                            ]))
                        ->searchable()
                        ->preload()
                        ->required(),

                    DatePicker::make('deadline_pembayaran')
                        ->label('Deadline Pembayaran')
                        ->required()
                        ->native(false),

                    Textarea::make('catatan_member')
                        ->label('Catatan Member')
                        ->rows(3),


                    FileUpload::make('file_attached')
                        ->label('Invoice / Lampiran')
                        ->disk('local')
                        ->directory('proposal')
                        ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                        ->maxSize(5120)
                        ->required(),
                ])->columnSpan(1),

                Section::make('Vendor')->schema([
                    Repeater::make('vendors')
                        ->label('Daftar Vendor')
                        ->relationship()
                        ->defaultItems(1)
                        ->addActionLabel('+ Tambah Vendor')
                        ->schema([
                            TextInput::make('nama_vendor')
                                ->label('Nama Vendor')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('sub_total')
                                ->label('Sub Total')
                                ->numeric()
                                ->required(),

                            TextInput::make('kontak')
                                ->label('Kontak')
                                ->maxLength(255),

                            TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->maxLength(255),
                        ]),
                ])->columnSpan(1),
            ]);
    }
}