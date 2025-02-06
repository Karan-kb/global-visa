<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the tables before seeding
        DB::table('page_contents')->truncate(); // Truncate child table first
        DB::table('pages')->truncate(); // Truncate parent table after
        DB::table('events')->truncate();
    
        DB::table('categories')->truncate();
    
        DB::table('blogs')->truncate();
        
        DB::table('brands')->truncate();
        DB::table('countries')->truncate();
        DB::table('courses')->truncate();
        DB::table('destination_faqs')->truncate();
        DB::table('destinations')->truncate();
        DB::table('english_tests')->truncate();
        DB::table('language_tests')->truncate();
        DB::table('scholarships')->truncate();
        DB::table('services')->truncate();
        DB::table('sliders')->truncate();
        DB::table('universities')->truncate();
      

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        // Paths to the SQL files
        $pagesSqlPath = database_path('seeders/sql/pages.sql');
        $pageContentsSqlPath = database_path('seeders/sql/page_contents.sql');
        $eventsSqlPath = database_path('seeders/sql/events.sql');
        $categoriesSqlPath = database_path('seeders/sql/categories.sql');
        $countriesSqlPath = database_path('seeders/sql/countries.sql');
        $coursesSqlPath = database_path('seeders/sql/courses.sql');
        $destinationsSqlPath = database_path('seeders/sql/destinations.sql');
        $destination_faqsSqlPath = database_path('seeders/sql/destination_faqs.sql');
       
        $english_testsSqlPath = database_path('seeders/sql/english_tests.sql');
        $language_testsSqlPath = database_path('seeders/sql/language_tests.sql');
        $scholarshipsSqlPath = database_path('seeders/sql/scholarships.sql');
        $servicesSqlPath = database_path('seeders/sql/services.sql');
        $slidersSqlPath = database_path('seeders/sql/sliders.sql');
        $universitiesSqlPath = database_path('seeders/sql/universities.sql');
        $blogsSqlPath = database_path('seeders/sql/blogs.sql');
        $brandsSqlPath = database_path('seeders/sql/brands.sql');
  
        
        
       
       

        // Read and execute the SQL files
        $this->executeSqlFile($pagesSqlPath);
        $this->executeSqlFile($pageContentsSqlPath);
        $this->executeSqlFile($eventsSqlPath);
        $this->executeSqlFile($categoriesSqlPath);
        $this->executeSqlFile($countriesSqlPath);
        $this->executeSqlFile($coursesSqlPath);
        $this->executeSqlFile($destination_faqsSqlPath);
        $this->executeSqlFile($destinationsSqlPath);
        $this->executeSqlFile($english_testsSqlPath);
        $this->executeSqlFile($language_testsSqlPath);
        $this->executeSqlFile($scholarshipsSqlPath);
        $this->executeSqlFile($servicesSqlPath);
        $this->executeSqlFile($slidersSqlPath);
        $this->executeSqlFile($universitiesSqlPath);
        $this->executeSqlFile($blogsSqlPath);
        $this->executeSqlFile($brandsSqlPath);
       
    }

    /**
     * Helper function to execute SQL file.
     *
     * @param string $filePath
     * @return void
     */
    private function executeSqlFile(string $filePath)
    {
        if (File::exists($filePath)) {
            $sql = File::get($filePath);
            DB::unprepared($sql);
        } else {
            $this->command->error("SQL file not found: $filePath");
        }
    }
}
