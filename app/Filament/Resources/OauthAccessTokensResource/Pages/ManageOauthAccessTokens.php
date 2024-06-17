<?php

namespace App\Filament\Resources\OauthAccessTokensResource\Pages;

use App\Filament\Resources\OauthAccessTokensResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOauthAccessTokens extends ManageRecords
{
    protected static string $resource = OauthAccessTokensResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
