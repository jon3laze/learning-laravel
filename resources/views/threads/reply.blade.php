<div class="card mb-3">
	{{ $reply->body }}
	
	<div class="flex flex-col font-normal text-xs -mr-5 mt-5 border-r-2 border-blue pr-4 text-right text-grey">
		<a href="#" class="text-grey no-underline">- {{ $reply->owner->name }}</a>
		<small class="py-2">{{ $reply->created_at->diffForHumans() }}</small>
	</div>
</div>