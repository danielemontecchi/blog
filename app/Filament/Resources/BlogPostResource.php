<?php
namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\{DatePicker, Grid, MarkdownEditor, Select, TextInput};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Storage;

class BlogPostResource extends Resource
{
	protected static ?string $navigationGroup = 'Blog';
	protected static ?string $model           = BlogPost::class;
	protected static ?int $navigationSort     = 2;
	protected static ?string $navigationLabel = 'Posts';
	protected static ?string $navigationIcon  = 'heroicon-o-document-text';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				TextInput::make('title')->required(),
				TextInput::make('slug')->required(),
				MarkdownEditor::make('content'),
				Grid::make(1)
					->schema([
						FileUpload::make('cover')
							->image()
							->disk('blog')
							->getUploadedFileNameForStorageUsing(
								fn (TemporaryUploadedFile $file, BlogPost $record): string => $record->id . '-' . $record->slug . '.' . $file->getClientOriginalExtension(),
							)
							->afterStateUpdated(function ($state, BlogPost $record) {
								if ($record->cover && Storage::disk('blog')->exists($record->cover)) {
									Storage::disk('blog')->delete($record->cover);
								}

								return $state;
							})
							->acceptedFileTypes(['image/jpeg', 'image/png'])
							->imageEditor()
							->imageResizeMode('cover')
							->imageCropAspectRatio('16:9')
							->imageResizeTargetWidth('1920')
							->imageResizeTargetHeight('1080'),
						DatePicker::make('published_at'),
						Select::make('tags')
							->multiple()
							->relationship('tags', 'name')
							->preload()
							->createOptionForm([
								TextInput::make('name')->required()->unique(),
							]),
					]),
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
			'index'  => Pages\ListBlogPosts::route('/'),
			'create' => Pages\CreateBlogPost::route('/create'),
			'edit'   => Pages\EditBlogPost::route('/{record}/edit'),
		];
	}
}
