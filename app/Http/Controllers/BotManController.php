<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\DB;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            if (str_contains(strtolower($message), 'product')) {
                $botman->reply("Hey! We've got a wide range of awesome products on Market Mate 🛍️. What are you looking for?");
                $botman->ask("Type 'list' to see our product categories or 'search' to find a specific product", function (Answer $answer) use ($botman) {
                    if (strtolower($answer->getText()) == 'list') {
                        $botman->reply("Here are our product categories: Personal Care, Household, Furniture, and more! 🛋️");
                    } elseif (strtolower($answer->getText()) == 'search') {
                        $botman->ask("What product are you looking for?", function (Answer $answer) use ($botman) {
                            $searchQuery = $answer->getText();
                            $products = DB::table('products')
    ->where('product_name', 'LIKE', "%$searchQuery%")
    ->orWhere('category', 'LIKE', "%$searchQuery%")
    ->get();

if ($products->count() > 0) {
    $botman->reply("We've got it! Our search results for '$searchQuery' are:");
    foreach ($products as $product) {
        $botman->reply(" - $product->product_name ($product->price)");
    }
} else {
    $botman->reply("Sorry, we couldn't find any products matching '$searchQuery'. Try again? 😊");
    // Debugging
    // \Log::info('No products found for search query: ' . $searchQuery);
}
                        });
                    } else {
                        $botman->reply("Sorry, didn't quite understand that. Try again? 😊");
                    }
                });
            } elseif (str_contains(strtolower($message), 'policy')) {
                $botman->reply("No worries! Our sellers have got you covered with their policies. Just reach out to them if you need any help 😊");
            } elseif (str_contains(strtolower($message), 'ship')) {
                $botman->reply("Shipping is a breeze! Our products have fixed prices, so you know exactly what you're getting 📦");
            } elseif (str_contains(strtolower($message), 'pay')) {
                $botman->reply("Easy peasy! Just enter your valid card number at checkout, and you're all set 💸");
            } else {
                $botman->reply("Hmm, didn't quite catch that. Can you try again? 😊");
            }
        });

        $botman->listen();
    }
}
