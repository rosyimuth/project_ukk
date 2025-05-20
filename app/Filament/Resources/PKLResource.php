<?php

namespace App\Filament\Resources;

use App\Models\PKL;
use Filament\Forms;
use Filament\Tables;
use App\Models\Industri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PKLResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PKLResource\RelationManagers;

class PKLResource extends Resource
{
    protected static ?string $model = PKL::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Data PKL';
    protected static ?string $pluralLabel = 'Daftar Data PKL';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->relationship('siswa', 'nama')
                    ->label('Nama Siswa')
                    ->required(),
                Forms\Components\Select::make('industri_id')
                    ->relationship('industri', 'nama')
                    ->label('Industri')
                    ->required(),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->label('Guru Pembimbing')
                    ->required(),
                Forms\Components\DatePicker::make('mulai')
                    ->label('Tanggal Mulai')
                    ->required(),
                Forms\Components\DatePicker::make('selesai')
                    ->label('Tanggal Selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->label('Nama Siswa')
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('industri.nama')
                    ->label('Nama Industri')
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Nama Guru Pembimbing')
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('mulai')
                    ->label('Tanggal Mulai')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('selesai')
                    ->label('Tanggal Selesai')
                    ->date()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('industri_id')
                    ->label('Industri')
                    ->options(Industri::pluck('nama', 'id')->toArray()),

            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ]);
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePKL::route('/'),
        ];
    }
}
