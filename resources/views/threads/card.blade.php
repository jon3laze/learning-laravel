<div class="card" style="height: 200px;">
	<h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
		<a href="{{ $thread->path() }}" class="text-black no-underline">{{ $thread->title }}</a>
	</h3>
	<div class="text-grey">{{ $thread->body }}</div>

	<div class="flex flex-col font-normal text-xs -mr-5 mt-5 border-r-2 border-blue pr-4 text-right text-grey">
		<a href="#" class="text-grey no-underline">- {{ $thread->owner->name }}</a>
		<small class="py-2">{{ $thread->created_at->diffForHumans() }}</small>
	</div>
</div>