<?php

namespace Tests\Feature;

use App\Project;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_add_tasks_to_projects()
    {
    	$project = factory('App\Project')->create();

    	$this->post($project->path() . '/tasks')->assertRedirect('login');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
    	
    	$this->signIn();

    	$project = factory('App\Project')->create();

    	$this->post($project->path() . '/tasks', ['body' => 't4325232'])
    		->assertStatus(403);

    	$this->assertDatabaseMissing('tasks', ['body' => 't4325232']);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_a_task()
    {
    	
    	$this->signIn();

        $project = ProjectFactory::withTasks(1)->create();

    	$this->patch($project->tasks->first()->path(), ['body' => 'changed'])
    		->assertStatus(403);

    	$this->assertDatabaseMissing('tasks', ['body' => 'changed']);
    }

    /** @test */
    public function a_project_can_have_tasks()
    {
    	$project = ProjectFactory::create();

    	$this->actingAs($project->owner)
            ->post($project->path() . '/tasks', ['body' => 't4325232']);

    	$this->get($project->path())
    		->assertSee('t4325232');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
    	$this->withoutExceptionHandling();

        $project = ProjectFactory::withTasks(1)->create();

    	$this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), [
    		'body' => 'changed', 
    		'completed' => true
    	]);

    	$this->assertDatabaseHas('tasks', [
    		'body' => 'changed',
    		'completed' => true
    	]);
    }

    /** @test */
    public function a_task_requires_a_body()
    {
    	$project = ProjectFactory::create();

    	$attributes = factory('App\Task')->raw(['body' => '']);

    	$this->actingAs($project->owner)
            ->post($project->path() . '/tasks', $attributes)
            ->assertSessionHasErrors('body');
    }
}
