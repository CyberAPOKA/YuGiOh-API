<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardImage;
use App\Models\CardPrice;
use App\Models\CardSet;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Node\Stmt\Return_;

class YuGiOhController extends Controller
{
    public function saveCards()
    {
        set_time_limit(1200);
        $url = "https://db.ygoprodeck.com/api/v7/cardinfo.php";
        $response = file_get_contents($url);
        $data = json_decode($response);

        $count = 0;
        $card_properties = ['id', 'name', 'type', 'frameType', 'desc', 'atk', 'def', 'level', 'race', 'attribute'];

        foreach ($data->data as $card) {
            if ($count < 100) {
                $card_data = [];
                foreach ($card_properties as $property) {
                    if (property_exists($card, $property)) {
                        $card_data[$property] = $card->$property;
                    } else {
                        $card_data[$property] = null;
                    }
                }

                $card_model = Card::create($card_data);

                if (property_exists($card, 'card_images')) {
                    foreach ($card->card_images as $card_image) {
                        $card_image_data = [
                            'card_id' => $card_model->id,
                            'image_url' => $card_image->image_url,
                            'image_url_small' => $card_image->image_url_small,
                            'image_url_cropped' => $card_image->image_url_cropped,
                        ];
                        CardImage::create($card_image_data);
                    }
                }

                if (property_exists($card, 'card_sets')) {
                    foreach ($card->card_sets as $card_set) {
                        $card_set_data = [
                            'card_id' => $card_model->id,
                            'set_name' => $card_set->set_name,
                            'set_code' => $card_set->set_code,
                            'set_rarity' => $card_set->set_rarity,
                            'set_rarity_code' => $card_set->set_rarity_code,
                            'set_price' => $card_set->set_price,
                        ];
                        CardSet::create($card_set_data);
                    }
                }

                if (property_exists($card, 'card_prices')) {
                    foreach ($card->card_prices as $card_price) {
                        $card_price_data = [
                            'card_id' => $card_model->id,
                            'cardmarket_price' => $card_price->cardmarket_price,
                            'tcgplayer_price' => $card_price->tcgplayer_price,
                            'ebay_price' => $card_price->ebay_price,
                            'amazon_price' => $card_price->amazon_price,
                            'coolstuffinc_price' => $card_price->coolstuffinc_price,
                        ];
                        CardPrice::create($card_price_data);
                    }
                }

                $count++;
            }
        }
    }





    public function cards()
    {
        $cards = Card::all();

        return Inertia::render('Yugioh/Cards', [
            'cards' => $cards
        ]);
    }
}
