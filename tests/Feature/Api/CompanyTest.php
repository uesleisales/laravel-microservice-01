<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;

class CompanyTest extends TestCase
{
    protected $endpoint = '/companies';
    /**
     * Get All companies
     *
     * @return void
     */
    public function test_get_all_companies()
    {   
        Company::factory()->count(6)->create();

        $response = $this->getJson($this->endpoint);
        $response->assertJsonCount(6, 'data');
        $response->assertStatus(200);
    }

    /**
     * Erro Get single company
     *
     * @return void
     */

    public function test_error_get_single_company()
    {   
        $company = 'fake-uuid';
        $response = $this->getJson("{$this->endpoint}/{$company}");
 
        $response->assertStatus(404);
    }


    /**
     * Update company
     *
     * @return void
     */
    public function test_update_company()
    {
        $company = Company::factory()->create();
        $data = [
            'category_id' => \App\Models\Category::factory()->create()->id,
            'name' => 'Title updated',
            'email' => 'wesleijt@hotmail.com',
            'whatsapp' => '73991120372',
        ];

        $response = $this->putJson("{$this->endpoint}/fake-uuid", $data);
        $response->assertStatus(404);

        $response = $this->putJson("{$this->endpoint}/fake-uuid", []);
        $response->assertStatus(422);

        $response = $this->putJson("{$this->endpoint}/{$company->uuid}", $data);
        $response->assertStatus(200);
    }

    /**
     * Delete company
     *
     * @return void
     */
    public function test_delete_company()
    {
        $company = Company::factory()->create();

        $response = $this->deleteJson("{$this->endpoint}/fake-company");
        $response->assertStatus(404);

        $response = $this->deleteJson("{$this->endpoint}/{$company->uuid}");
        $response->assertStatus(204);
    }
}
