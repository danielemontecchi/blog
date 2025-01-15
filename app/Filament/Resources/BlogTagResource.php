<?php
namespace App\Filament\Resources;

use App\Filament\Resources\BlogTagResource\Pages;
use App\Models\BlogTag;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogTagResource extends Resource
{
	protected static ?string $model           = BlogTag::class;
	protected static ?string $navigationGroup = 'Blog';
	protected static ?int $navigationSort     = 3;
	protected static ?string $navigationLabel = 'Tags';
	protected static ?string $navigationIcon  = 'heroicon-o-tag';

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
				TextColumn::make('posts_count')
					->badge()
					->counts('posts'),
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
			'index'  => Pages\ListBlogTags::route('/'),
			'create' => Pages\CreateBlogTag::route('/create'),
			'edit'   => Pages\EditBlogTag::route('/{record}/edit'),
		];
	}
}
