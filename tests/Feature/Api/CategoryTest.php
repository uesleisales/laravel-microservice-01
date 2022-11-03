<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{   

    protected $endpoint = '/categories';
    /**
     * Get All Categories
     *
     * @return void
     */
    public function test_get_all_categories()
    {   
        Category::factory()->count(6)->create();

        $response = $this->getJson($this->endpoint);
        $response->assertJsonCount(6, 'data');
        $response->assertStatus(200);
    }

    /**
     * Erro Get single category
     *
     * @return void
     */

    public function test_error_get_single_category()
    {   
        $category = Category::factory()->create();
        $response = $this->getJson("{$this->endpoint}/{$category->url}");
 
        $response->assertStatus(200);
    }


    /**
     * Update category
     *
     * @return void
     */
    public function test_update_category()
    {   
        $category = Category::factory()->create();
        $data = [
            'title' => 'Title updated',
            'description' => 'Description Updated',
        ];

        $response = $this->putJson("{$this->endpoint}/fake-category", $data);
        $response->assertStatus(404);

        $response = $this->putJson("{$this->endpoint}/fake-category", []);
        $response->assertStatus(422);

        $response = $this->putJson("{$this->endpoint}/{$category->url}", $data);
        $response->assertStatus(200);
    }


    /**
     * Delete category
     *
     * @return void
     */
    public function test_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("{$this->endpoint}/fake-category");
        $response->assertStatus(404);

        $response = $this->deleteJson("{$this->endpoint}/{$category->url}");
        $response->assertStatus(204);
    }

}
