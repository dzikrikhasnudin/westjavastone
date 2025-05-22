<?php

namespace App\Console\Commands;

use App\Models\Stone;
use App\Models\BlogPost;
use App\Models\Category;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml for West Java Stone website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/about-us'))
            ->add(Url::create('/contact-us'))
            ->add(Url::create('/privacy-policy'))
            ->add(Url::create('/terms-and-conditions'))
            ->add(Url::create('/browse/category'))
            ->add(Url::create('/products'));



        // Tambahkan produk secara dinamis
        $products = Stone::all();
        foreach ($products as $product) {
            $sitemap->add(Url::create("/products/{$product->slug}"));
        }

        $articles = BlogPost::all();
        foreach ($articles as $article) {
            $sitemap->add(Url::create("/article/{$article->slug}"));
        }

        $categories = Category::all();
        foreach ($categories as $category) {
            $sitemap->add(Url::create("/product/category/{$category->slug}"));
        }

        // Simpan ke public/sitemap.xml
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap generated successfully at public/sitemap.xml');
    }
}
