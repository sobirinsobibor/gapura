<?php

namespace Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Resources\ProposalDrafts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Modules\PengajuanDana\Filament\Clusters\PengajuanDana\Concerns\HasMoneyFields;
use Modules\PengajuanDana\Models\Event;

class ProposalDraftForm
{
    use HasMoneyFields;

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Detail Pengajuan')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('no_pengajuan')
                            ->label('No. Pengajuan')
                            ->disabled()
                            ->visible(fn (string $operation): bool => $operation === 'edit'),

                        TextInput::make('event')
                            ->hidden()
                            ->dehydratedWhenHidden()
                            ->required(),

                        Placeholder::make('event_display')
                            ->label('Event')
                            ->content(fn ($get) => Event::find($get('event'))?->nama)
                            ->columnSpanFull(),

                        DatePicker::make('deadline_pembayaran')
                            ->label('Deadline Pembayaran')
                            ->required()
                            ->native(false),

                        Textarea::make('catatan_member')
                            ->label('Catatan Member')
                            ->rows(3)
                            ->columnSpanFull(),

                        FileUpload::make('file_attached')
                            ->label('Invoice / Lampiran')
                            ->disk('local')
                            ->directory('proposal')
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            ->maxSize(5120)
                            ->required(),
                    ]),

                Section::make('Vendor')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Repeater::make('vendors')
                            ->label('Daftar Vendor')
                            ->relationship()
                            ->defaultItems(1)
                            ->addActionLabel('+ Tambah Vendor')
                            ->grid(2)
                            ->schema([
                                TextInput::make('nama_vendor')
                                    ->label('Nama Vendor')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('sub_total')
                                    ->label('Sub Total')
                                    ->mask(RawJs::make('$money($input)'))
                                    ->dehydrateStateUsing(fn ($state) => (int) self::parseRupiah($state))
                                    ->live()
                                    ->required(),

                                TextInput::make('kontak')
                                    ->label('Kontak')
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }
}