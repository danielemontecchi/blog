<!-- Cookie Banner con Alpine.js -->
<div
	x-data="{ showBanner: localStorage.getItem('cookie_consent') === null }"
	x-show="showBanner"
	class="pointer-events-none fixed inset-x-0 bottom-0 px-6 pb-6"
	x-cloak>
	<div class="pointer-events-auto ml-auto max-w-xl rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-900/10">
		<p class="text-sm/6 text-gray-900">This website uses cookies to ensure you get the best experience. By
			continuing to browse, you accept the use of
			cookies. See our <a href="{{route('pages.terms')}}" class="font-semibold text-indigo-600">cookie
				policy</a>.</p>
		<div class="mt-4 flex items-center gap-x-5">
			<button type="button"
					@click="localStorage.setItem('cookie_consent', 'granted'); showBanner = false; location.reload();"
					class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
				Accept all
			</button>
			<button type="button"
					@click="localStorage.setItem('cookie_consent', 'denied'); showBanner = false; location.reload();"
					class="text-sm/6 font-semibold text-gray-900">Reject all
			</button>
		</div>
	</div>
</div>

<!-- Accettazione Implicita con Click -->
<script>
	document.addEventListener('click', function () {
		if (!localStorage.getItem('cookie_consent')) {
			localStorage.setItem('cookie_consent', 'granted');
		}
	});
</script>
