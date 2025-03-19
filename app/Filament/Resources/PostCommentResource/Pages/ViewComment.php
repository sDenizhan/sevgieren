<?php

namespace App\Filament\Resources\PostCommentResource\Pages;

use App\Filament\Resources\PostCommentResource;
use App\Models\Contact;
use App\Models\Post;
use App\Models\PostComment;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Form;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\HtmlString;

class ViewComment extends ViewRecord
{
    protected static string $resource = PostCommentResource::class;

    public function mutateFormDataBeforeFill(array $data): array
    {
        PostComment::find($data['id'])->update(['is_new' => 1]);
        $data['is_new'] = 1;
        return $data;
    }

    public function form(Form $form): Form
    {
        $record = Post::find($this->record->post_id);

        return $form->schema([
            Card::make([
                Grid::make(3)->schema([
                    Placeholder::make('Adı Soyadı')->content($this->record->name_surname),
                    Placeholder::make('Email Adresi')->content($this->record->email),
                    Placeholder::make('Gönderilme Tarihi')->content($this->record->created_at->format('d F Y H:i')),
                    Placeholder::make('İlgili Blog Yazısı')->content(function () use ($record){
                        return new HtmlString('<a href="'. route('post.details', ['slug' => $record->slug]).'" target="_blank">'. $record->title .'</a>');
                    }),
                    Placeholder::make('Mesaj')->content($this->record->message)->columnSpan(3),
                ])
            ])
        ]);
    }
}
