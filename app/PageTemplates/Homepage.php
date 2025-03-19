<?php

namespace App\PageTemplates;

use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;

final class Homepage
{
    public static function getName(){
        return 'homepage';
    }

    public static function getPath(){
        return 'App\\PageTemplates\\Homepage';
    }

    public static function title()
    {
        return 'Anasayfa';
    }

    public static function schema()
    {
        return [
            Card::make([
                Builder::make('components')
                    ->label('Anasayfa Bileşenleri')
                    ->createItemButtonLabel('Yeni Bileşen Ekle')
                    ->schema([
                        Block::make('home.categories')
                            ->label('Kategoriler')
                            ->schema([
                                TextInput::make('title')->label('Başlık')->required(),
                                TextInput::make('description')->label('Açıklama'),
                                Repeater::make('categories')
                                    ->label('Kategoriler')
                                    ->createItemButtonLabel('Yeni Kategori Ekle')
                                    ->columns(4)
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Başlık')
                                            ->columnSpan(2)
                                            ->required(),
                                        Select::make('category_id')
                                            ->label('Kategori')
                                            ->columnSpan(2)
                                            ->options(function (){
                                                $categories = [];
                                                $cats = ProductCategory::pluck('name', 'id')->toArray();
                                                foreach ($cats as $id => $name){
                                                    $categories[$id] = $name;
                                                }
                                                return $categories;
                                            })
                                            ->required(),
                                        FileUpload::make('image')
                                            ->label('Resim Yükle (624x900) ')
                                            ->columnSpanFull()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                                                return $file->getClientOriginalName();
                                            }),
                                    ])
                            ]),
                        Block::make('home.newsticker')
                            ->label('Mesaj Barı')
                            ->schema([
                                Repeater::make('newsticker')
                                    ->label('Mesaj Barı')
                                    ->createItemButtonLabel('Mesaj Ekle')
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('message')
                                            ->label('Mesaj')
                                            ->columnSpanFull()
                                    ])
                            ]),
                        Block::make('home.showcase')
                            ->label('Vitrin')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık'),
                                TextInput::make('sub_title')
                                    ->label('Açıklama'),
                                TextInput::make('link')
                                    ->label('Link'),
                                TextInput::make('link_text')
                                    ->label('Link Metni'),
                                FileUpload::make('image_1')
                                    ->label('Resim 1 (624x900) ')
                                    ->columnSpanFull()
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                                        return $file->getClientOriginalName();
                                    }),
                                FileUpload::make('image_2')
                                    ->label('Resim Yükle (220x290) ')
                                    ->columnSpanFull()
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                                        return $file->getClientOriginalName();
                                    }),
                            ]),
                        Block::make('home.slider1')
                            ->label('Ürünler Slider 1')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık'),
                                Fieldset::make('product')
                                    ->label('Ürün Ayarları')
                                    ->columns(3)
                                    ->schema([
                                        Select::make('category_id')
                                            ->label('Kategori')
                                            ->options(function (){
                                                $categories = [];
                                                $categories[0] = 'Hepsi';
                                                $cats = ProductCategory::pluck('name', 'id')->toArray();
                                                foreach ($cats as $id => $name){
                                                    $categories[$id] = $name;
                                                }
                                                return $categories;
                                            })
                                            ->default(0),
                                        TextInput::make('count')
                                            ->label('Ürün Adeti')
                                            ->default(10)
                                            ->required(),
                                    ])
                            ]),
                        Block::make('home.slider2')
                            ->label('Ürünler Slider 2')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık'),
                                Repeater::make('products')
                                    ->label('Ürün Seç')
                                    ->createItemButtonLabel('Yeni Ürün Ekle')
                                    ->schema([
                                        Select::make('category_id')
                                            ->label('Kategori')
                                            ->options(function (){
                                                $categories = [];
                                                $categories[0] = 'Hepsi';
                                                $cats = ProductCategory::pluck('name', 'id')->toArray();
                                                foreach ($cats as $id => $name){
                                                    $categories[$id] = $name;
                                                }
                                                return $categories;
                                            })
                                            ->reactive()
                                            ->default(0),
                                        Select::make('product_id')
                                            ->label('Ürün')
                                            ->visible(fn (\Closure $get) => $get('category_id') > 0)
                                            ->options(function (\Closure $get){
                                                $categoryId = $get('category_id');
                                                if (!$categoryId) {
                                                    return [];
                                                }
                                                return Product::with(['category'])->where('category_id', $categoryId)->pluck('title', 'id')->toArray();
                                            }),
                                        FileUpload::make('image')
                                            ->label('Resim Yükle (855x975)')
                                            ->columnSpan(2)
                                            ->multiple()
                                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                                                return \Str::of($file->getClientOriginalName())
                                                        ->replace($file->getClientOriginalExtension(), '')
                                                        ->slug()
                                                        ->append('.'.$file->getClientOriginalExtension());
                                            }),
                                    ])
                            ]),
                        Block::make('home.eight-products')
                            ->label('8 Ürün')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık'),
                                Select::make('category_id')
                                    ->label('Kategori')
                                    ->options(function (){
                                        $categories = [];
                                        $cats = ProductCategory::pluck('name', 'id')->toArray();
                                        foreach ($cats as $id => $name){
                                            $categories[$id] = $name;
                                        }
                                        return $categories;
                                    }),
                                Select::make('order')
                                    ->label('Sıralama')
                                    ->options([
                                        1 => 'Son Eklenenler',
                                        2 => 'A-Z',
                                    ])
                            ]),
                        Block::make('home.shops')
                            ->label('Ürünler')
                            ->columns(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık')
                                    ->required(),
                                TextInput::make('sub_title')
                                    ->label('Küçük Başlık')
                                    ->required(),
                                Fieldset::make('product')
                                    ->label('Ürün Ayarları')
                                    ->columns(3)
                                    ->schema([
                                        Select::make('type')
                                            ->label('Gösterim Türü')
                                            ->options([
                                                1 => 'En Yeni Ürünler',
                                                2 => 'En Ucuz Ürünler'
                                            ]),
                                        Select::make('category_id')
                                            ->label('Kategori')
                                            ->options(function (){
                                                $categories = [];
                                                $categories[0] = 'Hepsi';
                                                $cats = ProductCategory::pluck('name', 'id')->toArray();
                                                foreach ($cats as $id => $name){
                                                    $categories[$id] = $name;
                                                }
                                                return $categories;
                                            })
                                            ->default(0),
                                        TextInput::make('count')
                                            ->label('Ürün Adeti')
                                            ->default(10)
                                            ->required(),
                                    ])
                            ]),
                        Block::make('home.posts')
                            ->label('Blog Yazıları')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık'),
                                TextInput::make('subtiltle')
                                    ->label('Alt Metin'),
                                TextInput::make('count')
                                    ->label('Yazı Adeti')
                                    ->default(3),
                            ]),
                        Block::make('home.gallery')
                            ->label('Galeri')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık'),
                                FileUpload::make('image')
                                    ->label('Resim Yükle')
                                    ->columnSpan(2)
                                    ->multiple()
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                                        return $file->getClientOriginalName();
                                    }),
                            ]),
                        Block::make('home.testimonials')
                            ->label('Müşteri Yorumları')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Başlık'),
                                FileUpload::make('image')
                                    ->label('Resim Yükle (836 x 751) ')
                                    ->columnSpan(2)
                                    ->multiple()
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file):string {
                                        return $file->getClientOriginalName();
                                    }),
                                Repeater::make('comments')
                                    ->label('Yorumlar')
                                    ->createItemButtonLabel('Yeni Ekle')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Ad Soyad')
                                            ->columnSpan(2)
                                            ->required(),
                                        Textarea::make('comment')
                                            ->label('Yorum')
                                            ->columnSpan(2)
                                            ->required(),
                            ])
                    ])
                ]),
            ])
        ];
    }
}
