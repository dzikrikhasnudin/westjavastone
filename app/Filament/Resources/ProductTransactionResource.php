<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Stone;
use Filament\Forms\Form;
use App\Models\PromoCode;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ProductTransaction;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductTransactionResource\Pages;
use App\Filament\Resources\ProductTransactionResource\RelationManagers;

class ProductTransactionResource extends Resource
{
    protected static ?string $model = ProductTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Product & Price')
                        ->schema([
                            Grid::make(2)->schema([
                                Select::make('stone_id')
                                    ->relationship('stone', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                        $stone = Stone::find($state);
                                        $price = $stone ? $stone->price : 0;
                                        $quantity = $get('quantity') ?? 1;
                                        $subTotalAmount = $price * $quantity;

                                        $set('price', $price);
                                        $set('sub_total_amount', $subTotalAmount);

                                        $discount = $get('discount_amount') ?? 0;
                                        $grandTotalAmount = $subTotalAmount - $discount;
                                        $set('grand_total_amount', $grandTotalAmount);
                                    }),

                                Select::make('promo_code_id')
                                    ->relationship('promoCode', 'code')
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                        $subTotalAmount = $get('sub_total_amount');
                                        $promoCode = PromoCode::find($state);
                                        $discount = $promoCode ? $promoCode->discount_amount : 0;

                                        $set('discount_amount', $discount);
                                        $grandTotalAmount = $subTotalAmount - $discount;
                                        $set('grand_total_amount', $grandTotalAmount);
                                    }),

                                TextInput::make('sub_total_amount')
                                    ->required()
                                    ->readOnly()
                                    ->numeric()
                                    ->prefix('USD'),

                                TextInput::make('grand_total_amount')
                                    ->required()
                                    ->readOnly()
                                    ->numeric()
                                    ->prefix('USD'),

                                TextInput::make('discount_amount')
                                    ->required()
                                    ->readOnly()
                                    ->numeric()
                                    ->prefix('USD'),

                            ]),
                        ]),

                    Step::make('Customer Information')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('name')->required()->maxLength(255),
                                    TextInput::make('phone')->required()->maxLength(255),
                                    TextInput::make('email')->required()->maxLength(255),
                                    TextInput::make('address')->required()->maxLength(255),
                                    TextInput::make('city')->required()->maxLength(255),
                                    TextInput::make('post_code')->required()->maxLength(255),
                                ]),
                        ]),


                    Step::make('Payment Information')
                        ->schema([
                            TextInput::make('booking_trx_id')->required()->maxLength(255),

                            ToggleButtons::make('is_paid')
                                ->label('Apakah sudah membayar?')
                                ->boolean()
                                ->grouped()
                                ->icons([
                                    true => 'heroicon-o-pencil',
                                    false => 'heroicon-o-clock'
                                ])
                                ->required(),

                            FileUpload::make('proof')
                                ->image()
                                ->required()
                                ->directory('transaction-proof')
                                ->disk('media'),
                        ])
                ])
                    ->columnSpan('full')
                    ->columns(1)
                    ->skippable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('stone.thumbnail'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('booking_trx_id')->searchable(),
                IconColumn::make('is_paid')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Verified')
            ])
            ->filters([
                SelectFilter::make('stone_id')
                    ->label('Stone')
                    ->relationship('stone', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->action(function (ProductTransaction $record) {
                        $record->is_paid = true;
                        $record->save();

                        Notification::make()
                            ->title('Order Approved')
                            ->success()
                            ->body('The order has been successfully approved.')
                            ->send();
                    })
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn(ProductTransaction $record) => !$record->is_paid),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProductTransactions::route('/'),
            'create' => Pages\CreateProductTransaction::route('/create'),
            'edit' => Pages\EditProductTransaction::route('/{record}/edit'),
        ];
    }
}
