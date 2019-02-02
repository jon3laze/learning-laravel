@extends('layouts.app')

@section('content')
<header class="flex items-center mb-3 py-4">
	<div class="flex justify-between items-end w-full">
		<p class="text-grey text-xs font-normal">
			<a href="/projects" class="text-grey text-sm font-normal no-underline">my projects</a> / {{ kebab_case($project->title) }}
		</p>
		<a href="{{ $project->path() . '/edit' }}" class="button">edit project</a>
	</div>
</header>
<main>
	<div class="flex -mx-3">
		<div class="w-3/4 px-3">
			<div class="mb-8">
				<h2 class="text-lg text-grey font-normal mb-3">project</h2>
				@include('projects.card')
			</div>

			<div>
				<h2 class="text-lg text-grey font-normal mb-3">general notes</h2>

				<form method="POST" action="{{ $project->path() }}">
					@method('PATCH')
					@csrf

					<textarea class="card w-full mb-4" 
					name="notes"
					style="min-height: 200px" 
					placeholder="take notes...">{{ $project->notes }}</textarea>

					<button type="submit" class="button">save</button>
				</form>
				@include('errors')
			</div>
		</div>

		<div class="w-1/4 px-3">
			<h2 class="text-lg text-grey font-normal mb-3">tasks</h2>
			<div class="card mb-3 text-xs">
				<form action="{{ $project->path() . '/tasks' }}" method="POST">
					@csrf
					<input placeholder="add a new task..." class="w-full" name="body">
				</form> 
			</div>
			@forelse($project->tasks as $task)
				<div class="card mb-3">
					<form action="{{ $task->path() }}" method="POST">
						@method('PATCH')
						@csrf

						<div class="flex">
							<input name="body" 
								value="{{ $task->body }}" 
								class="w-full {{ $task->completed ? 'text-grey' : '' }} text-xs truncate"
							>
							<input name="completed" 
								type="checkbox" 
								onChange="this.form.submit()" 
								{{ $task->completed ? 'checked' : '' }}
							>
						</div>
					</form>
				</div>
			@empty
				<p class="text-grey text-sm font-normal">no tasks yet...</p>
			@endforelse
		</div>
	</div>
</main>
@endsection


	