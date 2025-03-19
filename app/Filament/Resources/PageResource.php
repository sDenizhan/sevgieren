<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Collection;
use SplFileInfo;
use Illuminate\Filesystem\Filesystem;


class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $label = 'Sayfa';

    protected static ?string $pluralLabel = 'Sayfalar';

    protected static ?string $navigationGroup = 'Site Yönetimi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('name')
                        ->required()
                        ->label('Sayfa Başlığı')
                        ->reactive()
                        ->afterStateUpdated(function (Closure $set, $state) {
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->disabled()
                        ->label('URL'),
                    Select::make('template')
                        ->reactive()
                        ->options(static::getTemplates()),
                    Select::make('status')
                        ->label('Durum')
                        ->options([
                            0 => 'Pasif',
                            1 => 'Aktif'
                        ])
                        ->default(1)
                ])->columns(2),
                Grid::make()
                    ->columns(12)
                    ->schema([
                        Grid::make()
                            ->columnSpan(12)
                            ->schema([
                                ...static::getTemplateSchemas(),
                            ]),
                        Tabs::make('main')
                            ->columnSpan(12)
                            ->schema([
                                Tabs\Tab::make('seo')
                                    ->label('SEO Ayarları')
                                    ->schema([
                                        TextInput::make('seo.title')
                                            ->label('Seo Başlığı'),
                                        Textarea::make('seo.description')
                                            ->label('SEO Açıklaması'),
                                        Textarea::make('seo.metatags')
                                            ->label('Meta Etiketleri')
                                    ])
                            ])
                    ]),
            ]);
    }

    public static function getTemplates(): Collection {
        return static::getTemplateClasses()->mapWithKeys(fn ($class) => [$class => $class::title()]);
    }

    public static function getTemplateClasses(): Collection
    {
        $filesystem = app(Filesystem::class);

        return collect($filesystem->allFiles(app_path('PageTemplates')))
            ->map(function (SplFileInfo $file): string {
                return (string) Str::of('App\\PageTemplates')
                    ->append('\\', $file->getRelativePathname())
                    ->replace(['/', '.php'], ['\\', '']);
            });
    }

    public static function getTemplateSchemas(): array
    {
        return static::getTemplateClasses()
            ->map(
                fn ($class) =>
                Group::make($class::schema())
                    ->columnSpan(8)
                    ->afterStateHydrated(fn ($component, $state) => $component->getChildComponentContainer()->fill($state))
                    //->statePath(static::getTemplateName($class))
                    ->statePath('data.' . static::getTemplateName($class))
                    ->visible(fn ($get) => $get('template') === $class)
            )
            ->toArray();
    }

    public static function getTemplateName($class)
    {
        return Str::of($class)->afterLast('\\')->snake()->toString();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Sayfa Başlığı')->searchable()->sortable(),
                TextColumn::make('created_at')->label('Tarih')->sortable()
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at')
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
