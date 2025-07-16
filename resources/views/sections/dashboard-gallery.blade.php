<section class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">

    @if (Session::has("galleryUploadSuccess"))
        <div x-init="$dispatch('notify', {
            variant: 'success',
            title: 'Gallerie(s) uploaded!',
            message: '{{ Session("galleryUploadSuccess") }}'
        })"></div>
    @endif

    @if (Session::has("galleryDeleteSuccess"))
        <div x-init="$dispatch('notify', {
            variant: 'success',
            title: 'Gallery deleted!',
            message: '{{ Session("galleryDeleteSuccess") }}'
        })"></div>
    @endif

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
        <h1 class="text-2xl text-on-surface dark:text-on-surface-dark mb-3">Upload</h1>

        <form action="/upload-gallery" method="POST" enctype="multipart/form-data">
            @csrf
            <x-penguin_file_input name="images[]" accept="image/*" :multiple="true" title="Images" id="imagesInput" validFiles="JPEG, JPG, PNG, SVG, GIF, WebP" />
            <div class="w-full flex justify-end">
                <button type="submit" class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Upload</button>
            </div>
        </form>
        
    </div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl text-on-surface dark:text-on-surface-dark mb-3">Gallery</h1>

        <div class="grid">
            @foreach($galleries as $gallery)
                <div class="p-1">
                    <article class="group flex rounded-radius flex-col overflow-hidden border border-outline bg-surface-alt text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark">
                        <div class="overflow-hidden">
                            <img src="{{ asset("storage/gallery/" . $gallery->name) }}" class="object-cover transition duration-700 ease-out group-hover:scale-105 cursor-pointer viewerElement" alt="{{ $gallery->name }}" />
                        </div>
                        <div class="flex flex-col gap-3 p-4">
                            <div class="flex items-center gap-1 font-medium">
                                <span>Uploaded by {{ $gallery->user->name }}</span>
                            </div>
                            <div x-data="{modalIsOpen: false}">
                                <button x-on:click="modalIsOpen = true" type="button" class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-secondary border border-secondary dark:border-secondary-dark px-4 py-2 text-sm font-medium tracking-wide text-on-secondary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-secondary-dark dark:text-on-secondary-dark dark:focus-visible:outline-secondary-dark">
                                    <x-heroicon-s-trash class="size-5 fill-on-secondary dark:fill-on-primary-dark"/>
                                    Delete
                                </button>
                                <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                                    <!-- Modal Dialog -->
                                    <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface-alt text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark">
                                        <!-- Dialog Header -->
                                        <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20">
                                            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-on-surface-strong dark:text-on-surface-dark-strong">Confirmation</h3>
                                            <button x-on:click="modalIsOpen = false" aria-label="close modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Dialog Body -->
                                        <div class="px-4 py-8"> 
                                            <p>Delete this item? This action cannot be undone.</p>
                                        </div>
                                        <!-- Dialog Footer -->
                                        <div class="flex flex-col-reverse justify-between gap-2 border-t border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20 sm:flex-row sm:items-center md:justify-end">
                                            <button x-on:click="modalIsOpen = false" type="button" class="whitespace-nowrap rounded-radius bg-secondary border border-secondary px-4 py-2 text-sm font-medium tracking-wide text-on-secondary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-secondary-dark dark:border-secondary-dark dark:text-on-secondary-dark dark:focus-visible:outline-secondary-dark">Close</button>
                                            <form action="/delete-gallery/{{ $gallery->id }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button x-on:click="modalIsOpen = false" type="submit" class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                                                    <x-heroicon-s-trash class="size-5 fill-on-primary dark:fill-on-primary-dark"/>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $(() => {
            $(".viewerElement").each((i, el) => {
                new Viewer(el);
            });

            FlexMasonry.init(".grid", {
                responsive: true,
                breakpointCols: {
                    'min-width: 1500px': 4,
                    'min-width: 1200px': 4,
                    'min-width: 992px': 3,
                    'min-width: 768px': 3,
                    'min-width: 576px': 2,
                }
            });
        });
    });
</script>

