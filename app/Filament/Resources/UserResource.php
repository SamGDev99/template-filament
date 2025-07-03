<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Seguridad';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('activo')->default(true)->inline(false)->required(),
                Grid::make(2)->schema([
                    TextInput::make('name')->label('Nombre')->required(),
                    TextInput::make('email')->label('Correo electrónico')->required()->email(),
                    TextInput::make('password')
                        ->label('Contraseña')
                        ->password()
                        ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                        ->dehydrated(fn (?string $state): bool => filled($state))
                        ->required(fn (string $context) => $context === 'create')
                        ->visible(fn (string $context) => $context === 'edit' || $context === 'create')
                        ->maxLength(255),
                    TextInput::make('email_verified_at')
                        ->label('Correo verificado')
                        ->disabled()
                        ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d/m/Y H:i') : 'No verificado')
                        ->visible(fn (string $context) => in_array($context, ['edit', 'view'])),
                ]),
                CheckboxList::make('roles')
                    ->relationship('roles', 'name')
                    ->searchable(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                ToggleColumn::make('activo'),
                TextColumn::make('roles.name'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationLabel(): string
    {
        return 'Usuarios';
    }
    public static function getModelLabel(): string
    {
        return 'usuario';
    }

    public static function getPluralModelLabel(): string
    {
        return 'usuarios';
    }
}
