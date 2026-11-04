<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_is_accessible_and_displays_courses()
    {
        $response = $this->get('/courses');
        $response->assertStatus(200);
    }

    /** @test */
    public function create_page_is_accessible()
    {
        $response = $this->get('/courses/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function store_valid_course_successfully_creates_record()
    {
        $data = [
            'code' => 'LAR-101',
            'name' => 'Laravel Masterclass',
            'description' => 'Belajar Laravel dari dasar',
            'fee' => 300000,
            'quota' => 30,
            'start_date' => '2026-12-01',
            'status' => 'open',
        ];

        $response = $this->post('/courses', $data);

        $response->assertRedirect('/courses');
        $this->assertDatabaseHas('courses', ['code' => 'LAR-101']);
    }

    /** @test */
    public function validation_rejects_empty_code()
    {
        $response = $this->post('/courses', ['code' => '']);
        $response->assertSessionHasErrors('code');
    }

    /** @test */
    public function validation_rejects_code_longer_than_20_chars()
    {
        $response = $this->post('/courses', ['code' => str_repeat('A', 21)]);
        $response->assertSessionHasErrors('code');
    }

    /** @test */
    public function validation_rejects_name_longer_than_120_chars()
    {
        $response = $this->post('/courses', ['name' => str_repeat('A', 121)]);
        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function validation_rejects_invalid_quota()
    {
        $response = $this->post('/courses', ['quota' => 0]);
        $response->assertSessionHasErrors('quota');
    }

    /** @test */
    public function validation_rejects_invalid_status()
    {
        $response = $this->post('/courses', ['status' => 'invalid_status']);
        $response->assertSessionHasErrors('status');
    }
}