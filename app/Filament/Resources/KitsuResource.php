<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KitsuResource\Pages;
use App\Filament\Resources\KitsuResource\RelationManagers;
use App\Models\Kitsu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KitsuResource extends Resource
{
    protected static ?string $model = Kitsu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kitsu_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kitsu_content')
                    ->required()
                    ->maxLength(5),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->nullable()
                    ->rows(10),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age_rating_code')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start_date')
                    ->nullable(),
                Forms\Components\DatePicker::make('end_date')
                    ->nullable(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('age_rating_code'),
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('end_date'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKitsus::route('/'),
            'edit' => Pages\EditKitsu::route('/{record}/edit'),
        ];
    }
}
