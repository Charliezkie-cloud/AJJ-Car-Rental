<section class="py-6 dark:bg-surface-dark">
    <h2 class="text-2xl md:text-3xl text-on-surface dark:text-on-surface-dark uppercase tracking-wide font-bold text-center mb-4">Gallery</h2>
    <div class="max-w-7xl mx-6 sm:mx-8 md:mx-10 lg:mx-12 xl:mx-auto">
        <div class="grid">
            @foreach($galleries as $gallery)
                <div class="p-1">
                    <img class="viewerElement rounded-md cursor-pointer object-cover" src="{{ asset("storage/gallery/" . $gallery->name) }}" alt="{{ $gallery->name }}">
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
                    'min-width: 1500px': 3,
                    'min-width: 1200px': 3,
                    'min-width: 992px': 2,
                    'min-width: 768px': 2,
                    'min-width: 576px': 2,
                }
            });
        });
    });
</script>