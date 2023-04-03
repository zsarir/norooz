<?php

namespace app\content;

use app\database\Database;
use app\App;

class Plans
{
    private $plans;
    public function __construct()
    {
        $db = App::resolve(Database::class);
        $posts = $db->selectQuery('posts', ['post_type' => 'sell_plan'])->all();
        foreach ($posts as $post) {
            $this->plans[]["ID"] = $post['ID'];
            $this->plans[count($this->plans) - 1]["name"] = $post['post_title'];
            $term_taxonomy_ids = $db->selectQuery('term_relationships', ['object_id' => $post['ID']])->all();
            foreach ($term_taxonomy_ids as $term_taxonomy_id) {
                $term_taxonomy = $db->selectQuery('term_taxonomy', ['term_taxonomy_id' => $term_taxonomy_id['term_taxonomy_id']])->one();
                $term = $db->selectQuery('terms', ['term_id' => $term_taxonomy['term_id']])->one();
                $this->plans[count($this->plans) - 1][$term_taxonomy['taxonomy']] = $term['name'];
            }
        }
    }

    private function getIcon()
    {
        $icon = ' <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="none" viewBox="0 0 56 56">
        <circle cx="28" cy="28" r="28" fill="#569AF6" opacity=".2" />
        <path fill="#569AF6" d="M18.806 39.513a2.265 2.265 0 0 1-2.258 2.258H7.215a2.265 2.265 0 0 1-2.258-2.258V29.276a2.265 2.265 0 0 1 2.258-2.258h9.333a2.265 2.265 0 0 1 2.258 2.258v10.237Z" />
        <path fill="#569AF6" d="M35.403 39.513a2.265 2.265 0 0 1-2.258 2.258h-9.333a2.265 2.265 0 0 1-2.258-2.258V23.857a2.265 2.265 0 0 1 2.258-2.258h9.333a2.265 2.265 0 0 1 2.258 2.258v15.656Zm16.597 0a2.265 2.265 0 0 1-2.258 2.258h-9.333a2.265 2.265 0 0 1-2.258-2.258V17.835a2.265 2.265 0 0 1 2.258-2.258h9.333A2.265 2.265 0 0 1 52 17.835v21.678Z" opacity=".4" />
        </svg> ';
        return $icon;
    }

    public function gatPlan($plan)
    {
        $planHTML =
            '<div class="bd-cat_item">' .
            $this->getIcon() .
            '<div class="bd-title-light">' .
            strtoupper($plan['name']) .
            '</div>' .
            '<div class="bd-price-title">' .
            $plan['plan_price'] .
            '</div>' .
            ' <div class="bd-gap-1"></div>' .
            ' <div class="bd-sub-title bd-sub-title_dark bd-text-align-center">' .
            $plan['plan_time'] .
            '<br>' .
            $plan['plan_images'] .
            ' images allowed' .
            '</div>' .
            ' <div class="bd-gap-1"></div>' .
            '<button  class="btn-primary btn-plan-select">SELECT</button>' .
            '</div>';
        return $planHTML;
    }

    public function getPlans()
    {
        $plansHTML = '';
        foreach ($this->plans as $plan) {
            $plansHTML .= $this->gatPlan($plan);
        }
        return $plansHTML;
    }
}
