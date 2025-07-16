<section class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">

    @if (Session::has("createDeliverySuccess"))
        <div x-init="$dispatch('notify', {
            variant: 'success',
            title: 'Delivery added!',
            message: '{{ Session("createDeliverySuccess") }}'
        })"></div>
    @endif

     @if (Session::has("deleteDeliverySuccess"))
        <div x-init="$dispatch('notify', {
            variant: 'success',
            title: 'Delivery deleted!',
            message: '{{ Session("deleteDeliverySuccess") }}'
        })"></div>
    @endif

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="w-full">
                <h1 class="text-2xl text-on-surface dark:text-on-surface-dark mb-3">Add Delivery</h1>
                <form action="/create-delivery" method="POST">
                    @csrf
                    <div class="mb-3">
                        <x-penguin_text_input name="delivery_name" placeholder="Enter the name" id="deliveryNameTextInput" title="Name" />
                    </div>
                    <div class="mb-3">
                        <x-penguin_text_input name="delivery_price" placeholder="Enter the price" id="deliveryPriceTextInput" title="Price" />
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Create</button>
                    </div>
                </form>
            </div>
            <div class="w-full">
                <h1 class="text-2xl text-on-surface dark:text-on-surface-dark mb-3">Deliveries</h1>
                <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
                    <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                        <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                            <tr>
                                <th scope="col" class="p-4">Name</th>
                                <th scope="col" class="p-4">Price</th>
                                <th scope="col" class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline dark:divide-outline-dark">
                            @foreach ($deliveries as $delivery)
                                <tr class="even:bg-primary/5 dark:even:bg-primary-dark/10">
                                    <td class="p-4">{{ $delivery->name }}</td>
                                    <td class="p-4">&#8369;{{ number_format($delivery->price, 2, ".", ",") }}</td>
                                    <td class="p-4 flex align-items gap-2">
                                        <a href="/edit-delivery/{{ $delivery->id }}" class="w-full whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Edit</a>
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
                                                        <form action="/delete-delivery/{{ $delivery->id }}" method="POST">
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
