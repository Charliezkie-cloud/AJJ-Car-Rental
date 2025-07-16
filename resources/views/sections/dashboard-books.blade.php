<section class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl text-on-surface dark:text-on-surface-dark mb-3">Books</h1>

        <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                    <tr>
                        <th scope="col" class="p-4">ID</th>
                        <th scope="col" class="p-4">Name</th>
                        <th scope="col" class="p-4">Email</th>
                        <th scope="col" class="p-4">Contact number</th>
                        <th scope="col" class="p-4">Address</th>
                        <th scope="col" class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline dark:divide-outline-dark">
                    @foreach($books as $book)
                        <tr class="even:bg-primary/5 dark:even:bg-primary-dark/10">
                            <td class="p-4">{{ $book->id }}</td>
                            <td class="p-4">{{ $book->name }}</td>
                            <td class="p-4">{{ $book->email }}</td>
                            <td class="p-4">{{ $book->contact_number }}</td>
                            <td class="p-4">{{ $book->address }}</td>
                            <td class="p-4">
                                <div x-data="{modalIsOpen: false}">
                                    <button x-on:click="modalIsOpen = true" type="button" class="whitespace-nowrap rounded-radius border border-primary dark:border-primary-dark bg-primary px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Rental Details</button>
                                    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true">
                                        <!-- Modal Dialog -->
                                        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface-alt text-on-surface dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark">
                                            <!-- Dialog Header -->
                                            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20">
                                                <h3 class="font-semibold tracking-wide text-on-surface-strong dark:text-on-surface-dark-strong">Rental Details</h3>
                                                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Dialog Body -->
                                            <div class="px-4 py-8">
                                                <div class="mb-3">
                                                    <span class="text-on-surface dark:text-on-surface-dark font-semibold mb-3">Renter's message</span>
                                                    @foreach(explode("\n", $book->message) as $text)
                                                        <p class="text-on-surface dark:text-on-surface-dark mb-2">{{ $text }}</p>
                                                    @endforeach
                                                </div>
                                                <div class="mb-3 flex justify-between items-center">
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark font-semibold">Rental option</span>
                                                    </div>
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark">{{ ucfirst($book->rental_option) }}</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 flex justify-between items-center">
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark font-semibold">Vehicle</span>
                                                    </div>
                                                    <div class="flex w-full">
                                                        @if (!is_null($book->car))
                                                            <span class="text-on-surface dark:text-on-surface-dark">{{ $book->car->model }} | &#8369;{{ $book->car->price }}/day</span>
                                                        @else
                                                            <span class="text-on-surface dark:text-on-surface-dark">No longer available.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3 flex justify-between items-center">
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark font-semibold">Start Date and Time</span>
                                                    </div>
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark">{{ date("F j, Y g:i A", strtotime($book->start_date_time)) }}</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 flex justify-between items-center">
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark font-semibold">End Date and Time</span>
                                                    </div>
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark">{{ date("F j, Y g:i A", strtotime($book->end_date_time)) }}</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 flex justify-between items-center">
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark font-semibold">Mode of Delivery</span>
                                                    </div>
                                                    <div class="flex w-full">
                                                        @if (!is_null($book->delivery))
                                                            <span class="text-on-surface dark:text-on-surface-dark">{{ $book->delivery->name }} | &#8369;{{ $book->delivery->price }}</span>
                                                        @else
                                                            <span class="text-on-surface dark:text-on-surface-dark">No longer available.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3 flex justify-between items-center">
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark font-semibold">Total</span>
                                                    </div>
                                                    <div class="flex w-full">
                                                        <span class="text-on-surface dark:text-on-surface-dark">&#8369;{{ $book->total }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Dialog Footer -->
                                            <div class="flex flex-col-reverse justify-between gap-2 border-t border-outline bg-surface-alt/60 p-4 dark:border-outline-dark dark:bg-surface-dark/20 sm:flex-row sm:items-center md:justify-end">
                                                <button x-on:click="modalIsOpen = false" type="button" class="whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
