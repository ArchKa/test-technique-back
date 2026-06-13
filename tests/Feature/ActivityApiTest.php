<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Activity;
use App\Models\ActivityData;
use App\Models\User;
use Tests\TestCase;

class ActivityApiTest extends TestCase
{
    /**
     * A basic test example.
     */
    // tests/Feature/ActivityApiTest.php
    public function test_get_user_activity_returns_data()
    {
        $user = User::factory()->create();
        $activity = Activity::factory()->create();
        ActivityData::factory()->create(['user_id' => $user->id, 'activity_id' => $activity->id]);

        $response = $this->getJson("/api/users/{$user->id}/activities/{$activity->id}");

        $response->assertStatus(200)
                ->assertJsonStructure(['average_speed', 'data']);
    }
}
