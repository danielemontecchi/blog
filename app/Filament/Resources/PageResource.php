<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PageResource extends Resource
{
	protected static ?string $model = Page::class;
	protected static ?string $navigationIcon = 'heroicon-o-document-text';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('title')->required(),
				TextInput::make('slug')->required(),
				MarkdownEditor::make('content'),
				Toggle::make('is_markdown')->default(false),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('title')->searchable(),
				TextColumn::make('slug'),
				IconColumn::make('is_markdown')
					->icon(fn(bool $state): string => $state
						? 'heroicon-o-check-circle'
						: 'heroicon-o-x-circle'
					)
					->color(fn(bool $state): string => $state
						? 'success'
						: 'warning'
					),
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
			'index' => Pages\ListPages::route('/'),
			'create' => Pages\CreatePage::route('/create'),
			'edit' => Pages\EditPage::route('/{record}/edit'),
		];
	}
}
