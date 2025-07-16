<section class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">

    @if (Session::has("createCarSuccess"))
        <div x-init="$dispatch('notify', {
            variant: 'success',
            title: 'Car added!',
            message: '{{ Session("createCarSuccess") }}'
        })"></div>
    @endif

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl text-on-surface dark:text-on-surface-dark mb-3">Add Cars</h1>

        <form action="/create-car" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col md:flex-row gap-3 md:gap-4 mb-3">
                <div class="w-full">
                    <div class="mb-3">
                        <x-penguin_text_input name="model" placeholder="Enter the model" id="modelTextInput" title="Model" />
                    </div>
                    <div class="mb-3">
                        <x-penguin_text_input name="seaters" placeholder="Enter the vehicle seaters. e.g: 7-5" id="seatersTextInput" title="Seaters" />
                    </div>
                    <div class="mb-3">
                        <x-penguin_text_input name="price" placeholder="Enter the vehicle price per day" id="priceTextInput" title="Price" />
                    </div>
                </div>

                <div class="w-full">
                    <div class="mb-3">
                        <x-penguin_file_input name="image" title="Image" id="imageInput" accept="image/*" validFiles="JPEG,JPG,PNG,WebP"/>
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Create</button>
            </div>
        </form>
    </div>
</section>
