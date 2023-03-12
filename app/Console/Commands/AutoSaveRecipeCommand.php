<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Recipe;
use App\Food;
class AutoSaveRecipeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:autosave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto save recipe request from other page';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $food = Food::all()->random(1)->first();
        $currentUrl = "https://www.cooky.vn";
        $foodName = $food->food_name;
        $foodName = str_replace(' ', '-', $foodName);
        $foodName = urlencode($foodName);
        $output = getRequest($currentUrl.'/cach-lam/'.$foodName);

        $result = loadDom($output,'//a[@class="photo"]');
        $url = [];
        if ($result->length > 0) {
            for($i = 0 ; $i < $result->length ; $i++){
                array_push($url, $result->item($i)->getAttribute("href"));
            }
        }
        if(sizeof($url) > 0){
            // Get page công thức
            $output = getRequest($currentUrl.$url[rand(0,sizeof($url)-1)]);
            // Load dom html
            $elementImages = loadDom($output,'//img[@class="photo img-responsive u-photo"]');
            $images = $elementImages->item(0)->getAttribute("src");
            $elementTitle = loadDom($output,'//h1[@class="p-name fn recipe-title "]');
            $title = $elementTitle->item(0)->nodeValue;
            $elementShortTitle = loadDom($output,'//div[@class="summary p-summary"]');
            $shortTitle = $elementShortTitle->item(0)->nodeValue;
            $elementNguyenLieu = loadDom($output,'//ul[@class="list-inline recipe-ingredient-list"]',true);
            $elementContent = loadDom($output,'//div[@id="recipe-step"]',true);
            $fileName = "/recipe_images/".'recipe' . time().'.jpeg';
            $pathImages = __DIR__."/../../../public".$fileName;
            downFile($images,$pathImages);
            $elementImg = loadDom($elementContent,'//img[@class="lazy"]');
            $imgs = [];
            foreach ($elementImg as $key => $img) {
                $stepImg = "/recipe_images/".'recipe' . time().'.jpeg';
                $pathStep = __DIR__."/../../../public".$stepImg;
                downFile($img->getAttribute('data-src'),$pathStep);
                $img = [
                    'old' => $img->getAttribute('data-src'),
                    'new' => "https://vncooky.com".$stepImg
                ];
                array_push($imgs, $img);
            }
            foreach ($imgs as $img) {
                $elementContent = str_replace($img['old'],$img['new'],$elementContent);
            }
            $content = "<h2>Nguyên liệu</h2>".$elementNguyenLieu . $elementContent;
            $recipe = Recipe::create([
                'recipes_title' => $title,
                'recipes_short_title' => $shortTitle,
                'recipes_image' => $fileName,
                'recipes_content' => $content,
                'recipes_user_id' => 1,
                'recipes_food_id' => $food->id,
                'recipes_status' => 0
            ]);
            Log::info('Auto save recipe '.$recipe->id);
        }
    }
}
