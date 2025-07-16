<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">

             @if (Session::has("editCarSuccess"))
                <div x-init="$dispatch('notify', {
                    variant: 'success',
                    title: 'Car updated!',
                    message: '{{ Session("editCarSuccess") }}'
                })"></div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form action="/edit-car/{{ $car->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="flex flex-col md:flex-row gap-3 md:gap-4 mb-3">
                        <div class="w-full">
                            <div class="mb-3">
                                <x-penguin_text_input name="model" placeholder="Enter the model" id="modelTextInput" title="Model" value="{{ $car->model }}" />
                            </div>
                            <div class="mb-3">
                                <x-penguin_text_input name="seaters" placeholder="Enter the vehicle seaters. e.g: 7-5" id="seatersTextInput" title="Seaters" value="{{ $car->seaters }}" />
                            </div>
                            <div class="mb-3">
                                <x-penguin_text_input name="price" placeholder="Enter the vehicle price per day" id="priceTextInput" title="Price" value="{{ $car->price }}" />
                            </div>
                        </div>
                    
                        <div class="w-full">
                            <div class="mb-3">
                                <p class="text-sm text-on-surface dark:text-on-surface-dark mb-3">Current image</p>
                                <div class="flex justify-center">
                                    <img src="{{ asset("storage/cars/" . $car->image) }}" alt="{{ $car->image }}" class="h-[200px] cursor-pointer object-cover rounded-md" id="viewerElement">
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-penguin_file_input name="image" title="New image" id="imageInput" accept="image/*" validFiles="JPEG,JPG,PNG,WebP"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="/dashboard" class="whitespace-nowrap rounded-radius bg-secondary border border-secondary px-4 py-2 text-sm font-medium tracking-wide text-on-secondary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-secondary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-secondary-dark dark:border-secondary-dark dark:text-on-secondary-dark dark:focus-visible:outline-secondary-dark">Close</a>
                        <button type="submit" class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Save</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $(() => {
                new Viewer($("#viewerElement").get(0));
            });
        });
    </script>
</x-app-layout>
