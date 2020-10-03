<?php

namespace console\controllers;

use common\models\Article;
use tebazil\yii2seeder\Seeder;
use yii\console\Controller;

class SeederController extends Controller
{
    public function actionSeed()
    {
        $seeder = new Seeder();
        $generator = $seeder->getGeneratorConfigurator();
        $faker = $generator->getFakerConfigurator();

        $seeder->table(Article::tableName())
            ->columns([
                'id',
                'text' => $faker->text(300),
                'title' => $faker->text(100),
                'slug' => $faker->slug()
            ])
            ->rowQuantity(60);

        $seeder->refill();
    }
}