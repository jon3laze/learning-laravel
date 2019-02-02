@extends('layouts.app')

@section('content')
<header class="flex items-center mb-3 py-4">
	<div class="flex justify-between items-end w-full">
		<p class="text-grey text-xs font-normal">
			<a href="/threads" class="text-grey text-sm font-normal no-underline">threads</a> / {{ kebab_case($thread->title) }}
		</p>
		<a href="{{ $thread->path() . '/edit' }}" class="button">edit thread</a>
	</div>
</header>
<main>
	<div class="flex -mx-3">
		<div class="w-3/4 px-3">
			<div class="mb-8">
				@include('threads.card')	
			</div>
			<div class="mb-8">
				@forelse ($thread->replies as $reply)
					@include('threads.reply')
				@empty
					<div class="card mb-3">
						no conversation yet...
					</div>
				@endforelse
			</div>
			<div class="mb-8">
				@if(auth()->check())
					<form method="POST" action="{{ $thread->path() . '/replies' }}">
						@csrf
						<div class="field mb-6">
							<div class="control">
								<textarea name="body"
									rows="10" 
									class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
									placeholder="have something to say?"
									required
								></textarea>
							</div>
						</div>

						<div class="field mb-6">
							<div class="control text-center">
								<button type="submit" class="button is-link mr-2">post</button>
								<a href="{{ $thread->path() }}" class="font-normal text-xs no-underline">cancel</a>
							</div>
						</div>
					</form>
				@else
					<div class="field mb-6 text-center">
						<p>Please <a href="{{ route('login') }}" class="no-underline">sign in</a> to participate.</p>
					</div>
				@endif
			</div>
		</div>
		@include('errors')
	</div>
</main>
@endsection


	