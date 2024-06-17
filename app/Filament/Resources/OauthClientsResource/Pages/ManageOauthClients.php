<?php

namespace App\Filament\Resources\OauthClientsResource\Pages;

use App\Filament\Resources\OauthClientsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOauthClients extends ManageRecords
{
    protected static string $resource = OauthClientsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
