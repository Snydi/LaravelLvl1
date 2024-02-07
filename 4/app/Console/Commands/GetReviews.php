<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\File;

class GetReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reviews = DB::table('reviews')->select([
            'users.city as city_of_user',
            'reviews.user_id as who_left_review',
            'reviews.text as text_of_review'
        ])
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->join('products', 'reviews.product_id', '=', 'products.id')
            ->where(function($query) {
                $query->where('users.city', 'Самара')
                    ->orWhere('users.city', 'Волгоград');
            })->where('reviews.likes', '>', 10)
            ->orWhereIn('user_id', function (Builder $query) {
                $query->from('reviews')->select('user_id')->groupBy('user_id')->having(DB::raw('count(user_id)'), '>', 10)->get() ;
            })->where('products.price', '>', 3000)
            ->whereIn('users.id', function (Builder $query){
                $query->from('reviews')->select('reviews.user_id')->join('ratings', 'ratings.user_id', '=', 'reviews.user_id')
                    ->groupBy(
                        'reviews.id',
                        'reviews.text',
                        'reviews.likes',
                        'reviews.product_id',
                        'reviews.user_id',
                        'reviews.created_at',
                        'reviews.updated_at',
                        'ratings.id',
                        'ratings.rating',
                        'ratings.user_id',
                        'ratings.product_id',
                        'ratings.review_id',
                        'ratings.created_at',
                        'ratings.updated_at',
                    )
                    ->having(DB::raw('avg(rating)'), '>', 4.0)->get();
            })
            ->get();



//        Storage::disk('local')->put('example.csv', '');
//        foreach ($reviews as $review)
//        {
//            Storage::append('example.csv', $review->city_of_user);
//        }

        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        $filename =  public_path("files/reviews.csv");

        $handle = fopen($filename, 'w');
        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($handle, [
            "text_of_review",
            "who_left_review",
            "city_of_user"
        ], ' ');

        //adding the data from the array
        foreach ($reviews as $review) {
            fputcsv($handle, [

                $review->who_left_review,
                $review->city_of_user,
                $review->text_of_review,
            ], ' ');
        }
        fclose($handle);
    }
}
