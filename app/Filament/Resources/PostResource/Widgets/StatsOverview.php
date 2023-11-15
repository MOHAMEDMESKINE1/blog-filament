<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Posts', Post::count())  ->description('32k increase')->color('success'),
            Card::make('Categories ', Category::count())->description('32k increase')->color('danger'),
            Card::make('Users', User::count())->description('32k increase')->color('warning'),
        ];
    }
}
