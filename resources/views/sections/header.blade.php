<header class="bg-primary dark:bg-surface-dark">
	<nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="flex items-center justify-between py-4 mx-6 max-w-7xl sm:mx-8 md:mx-10 lg:mx-12 xl:mx-auto" aria-label="penguin ui menu">
		<!-- Brand Logo -->
		<a href="#" class="text-2xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong">
			<span>AJJ Car Rental</span>
			<!-- <img src="./your-logo.svg" alt="brand logo" class="w-10" /> -->
		</a>
		<!-- Desktop Menu -->
		<ul class="hidden items-center gap-8 md:flex">
			<li><a href="/" class="{{ $_SERVER["REQUEST_URI"] === "/" ? "font-bold text-secondary underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark" : "font-medium text-on-surface underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark" }}">Home</a></li>
			<li><a href="/book-now" class="{{ parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) === "/book-now" ? "font-bold text-secondary underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark" : "font-medium text-on-surface underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark" }}">Book now</a></li>
			<li><a href="/gallery" class="{{ $_SERVER["REQUEST_URI"] === "/gallery" ? "font-bold text-secondary underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark" : "font-medium text-on-surface underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark" }}">Gallery</a></li>
			<li><a href="/about-us" class="{{ $_SERVER["REQUEST_URI"] === "/about-us" ? "font-bold text-secondary underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-primary-dark dark:hover:text-primary-dark" : "font-medium text-on-surface underline-offset-2 hover:text-secondary focus:outline-hidden focus:underline dark:text-on-surface-dark dark:hover:text-primary-dark" }}">About us</a></li>
		</ul>
		<!-- Mobile Menu Button -->
		<button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-on-surface dark:text-on-surface-dark md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
			<svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
			</svg>
			<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
			</svg>
		</button>
		<!-- Mobile Menu -->
		<ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-outline rounded-b-radius border-b border-outline bg-white px-6 pb-6 pt-20 dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark-alt md:hidden">
			<li class="py-4"><a href="/" class="{{ $_SERVER["REQUEST_URI"] === "/" ? "w-full text-lg font-bold text-secondary focus:underline dark:text-primary-dark" : "w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark" }}">Home</a></li>
			<li class="py-4"><a href="/book-now" class="{{ parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) === "/book-now" ? "w-full text-lg font-bold text-secondary focus:underline dark:text-primary-dark" : "w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark" }}">Book now</a></li>
			<li class="py-4"><a href="/gallery" class="{{ $_SERVER["REQUEST_URI"] === "/gallery" ? "w-full text-lg font-bold text-secondary focus:underline dark:text-primary-dark" : "w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark" }}">Gallery</a></li>
			<li class="py-4"><a href="/about-us" class="{{ $_SERVER["REQUEST_URI"] === "/about-us" ? "w-full text-lg font-bold text-secondary focus:underline dark:text-primary-dark" : "w-full text-lg font-medium text-on-surface focus:underline dark:text-on-surface-dark" }}">About us</a></li>
		</ul>
	</nav>
</header>