<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OauthAccessTokensResource\Pages;
use App\Filament\Resources\OauthAccessTokensResource\RelationManagers;
use App\Models\OauthAccessTokens;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OauthAccessTokensResource extends Resource
{
    protected static ?string $model = OauthAccessTokens::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('client_id'),
                TextColumn::make('revoked'),
                TextColumn::make('expires_at'),
                TextColumn::make('updated_at'),
            ])
            ->filters([
                Tables\Filters\Filter::make('user_id')
                    ->query(function (Builder $query) {
                        $query->where('user_id', auth()->user()->id);
                    })
                    ->label('User ID')->default()                    ,
                // Tables\Filters\SelectFilter::make('revoked')
                //     ->query(fn (Builder $query): Builder => $query->where('revoked', true))
                //     ->label('Revoked'),

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOauthAccessTokens::route('/'),
        ];
    }
}
