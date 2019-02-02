@extends('layouts.app')

@section('content')
<header class="flex items-center mb-3 py-4">
	<div class="flex justify-between items-end w-full">
		<h2 class="text-grey text-xs font-normal">threads</h2>
		<a href="/threads/create" class="button">new thread</a>
	</div>
</header>
<main class="flex flex-wrap -mx-3">
	@forelse($threads as $thread)
		<div class="w-1/3 px-3 pb-6">
			@include('threads.card')
		</div>
	@empty
		<div>No projects yet...</div>
	@endforelse
</main>
@endsection