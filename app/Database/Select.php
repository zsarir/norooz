<?php

namespace app\Database;

use app\Database;
use app\App;

class Select
{
    public $db;
    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }
    public function ListingsCat()
    {
        $term_ids = $this->db->selectQuery('term_taxonomy', [
            'taxonomy' => 'listing_cat'
        ])->all();
        $categories = [];
        foreach ($term_ids as $term_id) {
            $categories[] =  $this->db->selectQuery('terms', [
                'term_id' => $term_id['term_id']
            ])->one();
        }
        $result = [];
        foreach ($categories as $key) {
            $result[] = $key['name'];
        }
        $result = array_unique($result);
        return  $result;
    }
}
