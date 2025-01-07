<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogCategoryResource\Pages;
use App\Models\BlogCategory;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogCategoryResource extends Resource
{
	protected static ?string $navigationGroup = 'Blog';
	protected static ?string $model = BlogCategory::class;
	protected static ?int $navigationSort = 1;
	protected static ?string $navigationLabel = 'Categories';
	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('name')->required(),
				TextInput::make('slug')->required(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('name')->searchable(),
				TextColumn::make('slug'),
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
			'index' => Pages\ListBlogCategories::route('/'),
			'create' => Pages\CreateBlogCategory::route('/create'),
			'edit' => Pages\EditBlogCategory::route('/{record}/edit'),
		];
	}
}
