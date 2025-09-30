<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TemplateSeeder::class,
            PengajuanSuratSeeder::class,
            AspirasiSeeder::class,
            FaqSeeder::class,
            SopSeeder::class,
            PollingSeeder::class,
            PollingOptionSeeder::class,
            PollingAnswerSeeder::class,
            SurveySeeder::class,
            AnnouncementCategorySeeder::class,
            AnnouncementSeeder::class,
            ArticleSeeder::class,
            AgendaSeeder::class,
            GallerySeeder::class,
            DataKependudukanSeeder::class,
            MutasiKependudukanSeeder::class,
            OperationalHourSeeder::class,
            VillageProfileSeeder::class,
            VisiMisiSeeder::class,
            MisiSeeder::class,
            PositionSeeder::class,
            VillageOfficialProfilesSeeder::class,
            BumdsSeeder::class,
            BudgetTypeSeeder::class,
            GroupBudgetTypeSeeder::class,
            DetailBudgetTypeSeeder::class
        ]);
    }
}
