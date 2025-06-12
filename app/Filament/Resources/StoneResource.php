<?php

namespace App\Filament\Resources;

use App\Enums\StoneStatus;
use Filament\Forms;
use Filament\Tables;
use App\Models\Stone;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StoneResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StoneResource\RelationManagers;

class StoneResource extends Resource
{
    protected static ?string $model = Stone::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Details')
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        TextInput::make('price')->required()->numeric()->prefix('USD'),
                        TextInput::make('weight')->required()->numeric()->suffix('Kilograms'),
                        TextInput::make('dimensions'),
                        FileUpload::make('thumbnail')->image()->required()->directory('stone/thumbnails')->disk('media'),
                        Repeater::make('photos')->relationship('photos')->schema([
                            FileUpload::make('photo')->required()->directory('stone/photos')->disk('media'),
                        ]),
                    ]),
                Fieldset::make('Additional')
                    ->schema([
                        RichEditor::make('description')->required(),
                        Select::make('is_popular')
                            ->options([
                                true => 'Popular',
                                false => 'Not Popular',
                            ])->required(),
                        Select::make('category_id')->relationship('category', 'name')
                            ->searchable()->preload()->required(),
                        Select::make('status')->options(StoneStatus::class)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('category.name'),
                ImageColumn::make('thumbnail')->disk('media'),
                IconColumn::make('is_popular')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Popular'),
                TextColumn::make('status')
                    ->badge()
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('category')
                    ->relationship('category', 'name'),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStones::route('/'),
            'create' => Pages\CreateStone::route('/create'),
            'edit' => Pages\EditStone::route('/{record}/edit'),
        ];
    }
}
