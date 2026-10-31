<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseAuth;
use Filament\Schemas\Components\Component;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;

class Login extends BaseAuth
{
    /**
     * Reemplaza el componente de correo con la firma de tipo correcta
     */
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('correo')
            ->label('Correo Electrónico')
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    /**
     * Mapea el campo ingresado a la columna 'correo' de tu tabla USUARIO
     */
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'correo' => $data['correo'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.correo' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }
}