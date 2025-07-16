<section class="bg-white dark:bg-surface-dark-alt py-6">
    <h2 class="text-2xl md:text-3xl text-on-surface dark:text-on-surface-dark uppercase tracking-wide font-bold text-center mb-4">Vehicles we offer:</h2>
    <div class="flex flex-col justify-center gap-2 sm:gap-4 sm:flex-row flex-nowrap sm:flex-wrap max-w-7xl mx-6 sm:mx-8 md:mx-10 lg:mx-12 xl:mx-auto">

        @if (count($cars) < 1)
            <span class="text-on-surface dark:text-on-surface-dark uppercase font-semibold text-center py-44">No vehicle uploaded yet.</span>
        @else
            @foreach ($cars as $car)
                <article class="group flex rounded-radius w-full sm:max-w-xs flex-col overflow-hidden text-on-surface dark:text-on-surface-dark">
                    <div class="h-44 overflow-hidden flex justify-center items-center"> 
                        <img src="{{ asset("storage/cars/" . $car->image ) }}" class="viewerElement object-cover transition duration-700 ease-out group-hover:scale-105" alt="view of a coastal Mediterranean village on a hillside, with small boats in the water." />
                    </div>
                    <div class="flex flex-col gap-4 p-6">
                        <h3 class="text-balance text-xl lg:text-2xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong text-center">{{ $car->model }}</h3>
                        <ul class="list-none text-pretty text-base text-on-surface dark:text-on-surface-dark mb-2 flex flex-col items-center">
                            <li>{{ $car->seaters }} Seaters</li>
                            <li>&#8369;{{ number_format($car->price, 2, ".", ",") }}/day</li>
                        </ul>
                        <a href="/book-now?id={{ $car->id }}" class="whitespace-nowrap bg-primary px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark rounded-radius">Book</a>
                    </div>
                </article>
            @endforeach
        @endif
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $(() => {
            $(".viewerElement").each((i, el) => {
                new Viewer(el);
            });
        });
    });
</script>
