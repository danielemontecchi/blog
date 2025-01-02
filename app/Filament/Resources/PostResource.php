<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\{DatePicker, MarkdownEditor, TextInput};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
	protected static ?string $model          = Post::class;
	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('title')->required(),
				TextInput::make('slug')->required(),
				MarkdownEditor::make('content'),
				DatePicker::make('published_at'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('title')->searchable(),
				TextColumn::make('slug'),
				TextColumn::make('published_at')->date(),
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
			'index'  => Pages\ListPosts::route('/'),
			'create' => Pages\CreatePost::route('/create'),
			'edit'   => Pages\EditPost::route('/{record}/edit'),
		];
	}
}
